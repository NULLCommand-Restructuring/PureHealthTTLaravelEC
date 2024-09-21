<?php

namespace App\Services;

use App\Mail\ConfirmOrderMail;
use App\Models\Assessment;
use App\Models\Feedback;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\Product;
use App\Models\Type;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class CustomerService
{
    public function getAvgRate($products)
    {

        $productCodes = $products->pluck('productcode');
        $avgRate = [];
        foreach ($productCodes as $productCode) {
            $average = Assessment::where('productcode', $productCode)
                ->avg('rate');
            $avgRate[$productCode] = !$average ? 5 : $average;
        }
        return $avgRate;
    }

    public function getSliderProduct($number)
    {
        return Product::where('active', 1)->orderBy('discount', 'desc')->take($number)->get();
    }

    public function getNewProduct($number)
    {
        return Product::where('active', 1)->orderBy('created_at', 'desc')
            ->take($number)
            ->get();
    }

    public function getBestSellerProduct($number)
    {
        $orderDetails = OrderDetail::select('productcode', DB::raw('SUM(number) as total'))
            ->groupBy('productcode')
            ->orderByDesc('total')
            ->take($number)
            ->get();

        $products = collect();

        foreach ($orderDetails as $orderDetail) {
            $product = Product::where('productcode', $orderDetail->productcode)->where('active', 1)
                ->first();

            $product->sold_quantity = $orderDetail->total;

            $products->push($product);
        }
        if ($products->count() < 10) {
            $remaining = 10 - $products->count();
            $existCodes = $products->pluck('productcode');
            $additionalProducts = Product::whereNotIn('productcode', $existCodes)->where('active', 1)
                ->orderBy('productcode')
                ->take($remaining)
                ->get();

            foreach ($additionalProducts as $product) {
                $products->push($product);
            }
        }

        return $products;
    }

    public function getAllType()
    {
        return Type::where('active', 1)->get();
    }

    public function getOnlyNameType($code)
    {
        if ($element = Type::where('typecode', $code)->where('active', 1)->first()) return $element->typename;
        return 'Không rõ';
    }

    public function  getProductsForType($code)
    {
        if (!Type::where('typecode', $code)->where('active', 1)->first()) return Product::where('productcode', "None")->paginate();
        return Product::where('typecode', $code)->where('active', 1)->paginate(6);
    }

    public function getSingleProduct($code)
    {
        return Product::where('productcode', $code)->where('active', 1)->first();
    }

    public function getAllAssessmentsForProduct($code)
    {
        return Assessment::where('productcode', $code)->orderByDesc('rate')->get();
    }

    public function handlePostAssessment($request)
    {
        $orderDetails = OrderDetail::where('productcode', $request->input('productcode'))
            ->join('orders', 'orders.ordercode', '=', 'order_details.ordercode')
            ->where('orders.customercode', $request->input('customercode'))
            ->where('orders.statuscode', 'OS4')
            ->get();
        $request->request->add(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        if ($orderDetails->count() != 0) {
            try {
                Assessment::create($request->all());
                return "Thêm đánh giá thành công!";
            } catch (\Exception $error) {
                return $error;
            }
        }

        return 'Có lẽ bạn chưa mua sản phẩm này, hãy mua sản phẩm và trải nghiệm chất lượng của nó trước khi đánh giá!';
    }

    /* New code */
    public function getSameTypeProducts($typecode, $number)
    {
        return Product::where('typecode', $typecode)->where('active', 1)->take($number)->get();
    }

    public function getProductsForSearch($request)
    {
        $keyword = $request->input('keyword');
        $typecode = $request->input('typecode');

        $products = [];
        if ($typecode == 0) {
            $products = Product::where('productname', 'like', '%' . $keyword . '%')->where('active', 1)->paginate(6);
        } else {
            $products = Product::where('typecode', $typecode)
                ->where('productname', 'like', '%' . $keyword . '%')
                ->where('active', 1)
                ->paginate(6);
        }
        $products->appends(['keyword' => $keyword, 'typecode' => $typecode]);
        return $products;
    }

    public function getProductsOnRequest($request)
    {
        $default = [
            'typeOption' => '0',
            'discountOption' => '0%',
            'minPrice' => '',
            'maxPrice' => '',
        ];
        if ($request->has('typeOption')) $default['typeOption'] = $request->input('typeOption');
        if ($request->has('discountOption')) $default['discountOption'] = $request->input('discountOption');
        if ($request->has('minPrice')) $default['minPrice'] = $request->input('minPrice');
        if ($request->has('maxPrice')) $default['maxPrice'] = $request->input('maxPrice');
        $filterElement = Product::where('active', 1);
        if ($default['typeOption'] != 0) $filterElement = $filterElement->where('typecode', $default['typeOption']);
        if ($default['discountOption'] != '0%') $filterElement = $filterElement->where('discount', '>=', $default['discountOption']);
        if ($default['minPrice'] != '') $filterElement = $filterElement->where('price', '>=', $default['minPrice']);
        if ($default['maxPrice'] != '') $filterElement = $filterElement->where('price', '<=', $default['maxPrice']);
        $productFill = $filterElement->paginate(5);
        $productFill->appends($default);
        return [
            'products' => $productFill,
            'default' => $default
        ];
    }

    public function getOrdersForCustomer()
    {
        if (!Auth::check()) return Order::where('customercode', 'customercode')->paginate(10);
        return Order::where('customercode', Auth::user()->usercode)->paginate(10);
    }

    public function getOrderDetails($code)
    {
        $checkOrderAuth = Order::where('ordercode', $code)->where('customercode', Auth::user()->usercode)->first();
        if (!$checkOrderAuth) return '404';
        $orderDetails = OrderDetail::where('ordercode', $code)->get();
        return $orderDetails;
    }

    public function handleConfirmOrder($code)
    {
        $checkOrderAuth = Order::where('ordercode', $code)->where('customercode', Auth::user()->usercode)->first();
        if (!$checkOrderAuth) return '404';
        try {
            $checkOrderAuth->update(['statuscode' => 'OS2']);
            return 'Đơn hàng mã số ' . $code . ' của bạn đã được xác nhận';
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    public function handleCancelOrder($code)
    {
        $checkOrderAuth = Order::where('ordercode', $code)->where('customercode', Auth::user()->usercode)->first();
        if (!$checkOrderAuth) return '404';
        try {
            $checkOrderAuth->update(['statuscode' => 'OS5']);
            return 'Đơn hàng mã số ' . $code . ' của bạn đã được hủy';
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }

    public function getOrder($code)
    {
        return Order::where('ordercode', $code)->first();
    }

    public function handleCreateOrder($request)
    {
        try {
            DB::beginTransaction();
            $codeRandom = 'OD' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $request->request->add(['ordercode' => $codeRandom]);
            $request->request->add(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
            $request->request->add(['note' => 'Không']);
            $request->request->add(['statuscode' => 'OS1']);
            $request->request->add(['shipaddress' => $request->input('extraAddress') . ', ' . $request->input('subDistrict') . ', ' . $request->input('district')]);
            $request->request->add(['customercode' => Auth::user()->usercode]);
            $request->request->add(['total' => Session::get('carts')['total']]);
            Order::create($request->all());

            foreach (Session::get('carts') as $key => $productInCart) {
                if ($key != 'total') {
                    OrderDetail::create([
                        'ordercode' => $codeRandom,
                        'productcode' => $productInCart['info']->productcode,
                        'number' =>  $productInCart['quantity'],
                        'realprice' =>  $productInCart['info']->price,
                        'created_at' =>  Carbon::now('Asia/Ho_Chi_Minh'),
                    ]);
                }
            }
            Mail::to(Auth::user()->email)->send(new ConfirmOrderMail(Auth::user()->username, $codeRandom));
            Session::forget('carts');
            Session::put('carts', []);
            Session::flash('success', 'Đặt hàng thành công');
            DB::commit();
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function getAllOrderSuccess()
    {
        return Order::where('customercode', Auth::user()->usercode)->where('statuscode', 'OS4')->get();
    }

    public function handeCreateFeedback($request)
    {
        $orderCheck = Order::where('ordercode', $request->input('ordercode'))->first();
        if (!$orderCheck) {
            Session::flash('error', 'Không tìm thấy thông tin đơn hàng đang phản hồi');
            return;
        }
        $codeRandom = 'FB' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
        $request->request->add(['feedbackcode' => $codeRandom]);
        $request->request->add(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
        $request->request->add(['status' => 0]);
        $request->request->add(['customercode' => Auth::user()->usercode]);
        try {
            Feedback::create($request->all());
            Session::flash('success', 'Gửi phản hồi thành công');
        } catch (\Exception $err) {
            Session::flash('error', $err);
        }
    }
}
