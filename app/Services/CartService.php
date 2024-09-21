<?php

namespace App\Services;

use App\Models\Product;
use GuzzleHttp\Handler\Proxy;
use Illuminate\Support\Arr;

class CartService
{
    public function delete($request)
    {
        try {
            if (!session()->has('carts')) {
                return "Có lẽ bạn chưa đăng nhập, vui lòng đăng nhập và thực hiện lại";
            }
            $carts = session()->get('carts');
            unset($carts[$request->input('code')]);
            $total = 0;
            foreach ($carts as $key => $product) {
                if ($key != 'total') {
                    $total = $total + ($carts[$key]['info']->price * (1 - $carts[$key]['info']->sale / 100)) * $carts[$key]['quantity'];
                }
            }
            $carts['total'] = $total;
            if (count($carts) == 1) {
                session()->put('carts', []);
            } else {
                session()->put('carts', $carts);
            }
            return "Xóa thành công";
        } catch (\Exception $error) {
            return 'Có lỗi xảy ra trong quá trình xóa sản phẩm khỏi giỏ hàng của bạn, hãy thực hiện lại';
        }
    }

    public function checkCart()
    {
        $carts = session()->get('carts');
        $listCode = array_keys($carts);
        foreach ($listCode as $code) {
            $checkActive = Product::where('productcode', $code)->where('active', 1)->first();
            if ($code != 'total' && !$checkActive) {
                unset($carts[$code]);
                $total = 0;
                foreach ($carts as $key => $product) {
                    if ($key != 'total') {
                        $total = $total + ($carts[$key]['info']->price * (1 - $carts[$key]['info']->sale / 100)) * $carts[$key]['quantity'];
                    }
                }
                $carts['total'] = $total;
                if (count($carts) == 1) {
                    session()->put('carts', []);
                } else {
                    session()->put('carts', $carts);
                }
            }
        }
    }


    public function handle($request)
    {
        if ($request->input('quantity') <= 0) return "Sản phẩm thêm vào giỏ hàng phải có số lượng lớn hơn 0";
        try {
            if (!session()->has('carts')) {
                return "Có lẽ bạn chưa đăng nhập, vui lòng đăng nhập và thực hiện lại";
            }
            $this->checkCart();
            $carts = session()->get('carts');
            $checkActive = Product::where('productcode', $request->input('code'))->where('active', 1)->first();
            if (!$checkActive) return 'Có lỗi xảy ra trong quá trình thêm sản phẩm vào giỏ hàng của bạn, hãy thực hiện lại';
            if (!Arr::has($carts, $request->input('code'))) {
                $carts[$request->input('code')] = [];
                $carts[$request->input('code')]['quantity'] = $request->input('quantity');
                $carts[$request->input('code')]['info'] = Product::where('productcode', $request->input('code'))->first();
            } else {
                $carts[$request->input('code')]['quantity'] = $carts[$request->input('code')]['quantity']  + $request->input('quantity');
            }
            $total = 0;
            foreach ($carts as $key => $product) {
                if ($key != 'total') {
                    $total = $total + ($carts[$key]['info']->price * (1 - $carts[$key]['info']->discount / 100)) * $carts[$key]['quantity'];
                }
            }
            $carts['total'] = $total;
            session()->put('carts', $carts);
            return 'Thêm vào giỏ hàng thành công';
        } catch (\Exception $error) {
            return 'Có lỗi xảy ra trong quá trình thêm sản phẩm vào giỏ hàng của bạn, hãy thực hiện lại';
        }
    }
}
