<?php

namespace App\Services;

use App\Models\Feedback;
use App\Models\Order;
use App\Models\OrderDetail;
use App\Models\OrderStatus;
use App\Models\Product;
use App\Models\Type;
use App\Models\Unit;
use App\Models\User;
use Carbon\Carbon;
use Hamcrest\Core\Set;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Session;

use function PHPSTORM_META\elementType;

class AdminService
{
    public function handleAddType($request)
    {
        try {
            DB::beginTransaction();
            $codeRandom = 'TY' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $request->request->add(['typecode' => $codeRandom]);
            $request->request->add(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
            Type::create($request->all());
            Session::flash('success', 'Thêm phân loại mới thành công');
            DB::commit();
            return true;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function getTypeList()
    {
        return Type::paginate(10);
    }

    public function getAllTypeList()
    {
        return Type::where('active', 1)->get();
    }

    public function getTypeElement($code)
    {
        $getTypeElement = Type::where('typecode', $code)->first();
        if ($getTypeElement) {
            return $getTypeElement;
        } else {
            Session::flash('error', 'Không tồn tại mã phân loại bạn yêu cầu chỉnh sửa, vui lòng kiểm tra lại');
            return false;
        }
    }


    public function handleEditType($request)
    {
        $getTypeElement = Type::where('typecode', $request->input('typecode'))->first();

        if ($getTypeElement) {
            try {
                $getTypeElement->fill($request->all());
                $getTypeElement->save();
                Session::flash('success', "Cập nhật thông tin phân loại thành công");
                return true;
            } catch (\Exception $error) {
                Session::flash('error', $error->getMessage());
                return false;
            }
        }
        Session::flash('error', 'Phân loại này đã bị xóa trước đó, vui lòng thử lại sau');
        return false;
    }

    public function handleDeleteType($request)
    {
        $getTypeElement = Type::where('typecode', $request->input('code'))->first();
        if ($getTypeElement) {
            try {
                $getTypeElement->delete();
                return '';
            } catch (\Exception $error) {
                return $error->getMessage();
            }
        }
        return 'Không tìm thấy đối tượng cần xóa, vui lòng kiểm tra lại';
    }

    public function handleUploadImage($request)
    {
        if ($request->hasFile('imgFile')) {
            try {
                $name = $request->file('imgFile')->getClientOriginalName();
                $extension = substr($name, -4);
                $valid_extensions = ['.jpg', '.png'];
                if (!in_array($extension, $valid_extensions)) return false;
                $pathFull = 'uploads/' . date("Y/m/d");

                $request->file('imgFile')->storeAs(
                    'public/' . $pathFull,
                    $name
                );

                return '/storage/' . $pathFull . '/' . $name;
            } catch (\Exception $error) {
                return false;
            }
        }
    }

    public function handleAddProduct($request)
    {
        try {
            DB::beginTransaction();
            $codeRandom = 'PR' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $request->request->add(['productcode' => $codeRandom]);
            $request->request->add(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
            Product::create($request->all());
            DB::commit();
            Session::flash('success', 'Thêm sản phẩm thành công');
            return true;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function getProductList()
    {
        return Product::paginate(5);
    }

    public function getProductElement($code)
    {
        $getProductElement = Product::where('productcode', $code)->first();
        if ($getProductElement) {
            return $getProductElement;
        } else {
            Session::flash('error', 'Không tồn tại mã sản bạn yêu cầu chỉnh sửa, vui lòng kiểm tra lại');
            return false;
        }
    }

    public function handleEditProduct($request)
    {
        $getProductElement = Product::where('productcode', $request->input('productcode'))->first();

        if ($getProductElement) {
            try {
                $getProductElement->fill($request->all());
                $getProductElement->save();
                Session::flash('success', "Cập nhật thông tin sản phẩm thành công");
                return true;
            } catch (\Exception $error) {
                Session::flash('error', $error->getMessage());
                return false;
            }
        }
        Session::flash('error', 'Sản phẩm này đã bị xóa trước đó, vui lòng thử lại sau');
        return false;
    }


    public function handleDeleteProduct($request)
    {
        $getProductElement = Product::where('productcode', $request->input('code'))->first();
        if ($getProductElement) {
            try {
                $getProductElement->delete();
                return '';
            } catch (\Exception $error) {
                return $error->getMessage();
            }
        }
        return 'Không tìm thấy đối tượng cần xóa, vui lòng kiểm tra lại';
    }

    public function handleAddUnit($request)
    {
        try {
            DB::beginTransaction();
            $codeRandom = 'UN' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            $request->request->add(['unitcode' => $codeRandom]);
            $request->request->add(['created_at' => Carbon::now('Asia/Ho_Chi_Minh')]);
            Unit::create($request->all());
            DB::commit();
            Session::flash('success', 'Thêm dơn vị hàng thành công');
            return true;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function getUnitList()
    {
        return Unit::paginate(10);
    }

    public function getAllUnitList()
    {
        return Unit::all();
    }

    public function handleDeleteUnit($request)
    {
        $getUnitElement = Unit::where('unitcode', $request->input('code'))->first();
        if ($getUnitElement) {
            try {
                $getUnitElement->delete();
                return '';
            } catch (\Exception $error) {
                return $error->getMessage();
            }
        }
        return 'Không tìm thấy đối tượng cần xóa, vui lòng kiểm tra lại';
    }

    /* New code */
    public function getAllOrder()
    {
        return Order::paginate(10);
    }

    public function getWaitOrder()
    {
        return Order::whereNotIn('statuscode', ['OS4'])->paginate(10);
    }

    public function getOrderElement($code)
    {
        return Order::where('ordercode', $code)->first();
    }

    public function getAllOrderStatus()
    {
        return OrderStatus::all();
    }

    public function handleEditOrder($request)
    {
        $order = Order::where('ordercode', $request->input('ordercode'))->first();
        if (!$order) {
            Session::flash('error', "Không tìm thấy đơn hàng đang chỉnh sửa");
            return false;
        }
        try {
            $order->statuscode = $request->input('statuscode');
            $order->note = $request->input('note');
            $order->save();
            Session::flash('success', 'Cập nhật thành công');
            return true;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return false;
        }
    }

    public function getOrderDetails($code)
    {
        return OrderDetail::where('ordercode', $code)->get();
    }

    public function handleDeleteOrder($code)
    {
        $orderElement = Order::where('ordercode', $code)->first();
        if (!$orderElement) {
            return "Không tồn tại đơn hàng bạn đang xóa";
        }
        try {
            DB::beginTransaction();
            $orderElement->delete();
            $listOrderDetails = OrderDetail::where('ordercode', $code)->get();
            foreach ($listOrderDetails as $order) $order->delete();
            DB::commit();
            return '';
        } catch (\Exception $err) {
            DB::rollBack();
            return $err->getMessage();
        }
    }

    public function getAllFeedback()
    {
        return Feedback::paginate(10);
    }

    public function handleCheckFeedback($code)
    {
        $feedback = Feedback::where('feedbackcode', $code)->first();
        if (!$feedback) {
            Session::flash('error', 'Không tìm thấy phản hồi');
            return;
        }
        try {
            $feedback->delete();
            Session::flash('success', 'Thành công');
            return;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return;
        }
    }

    public function getAllUser()
    {
        return User::paginate(10);
    }

    public function getSingleUser($code)
    {
        return User::where('usercode', $code)->first();
    }

    public function changeActiveUser($code)
    {
        $user = User::where('usercode', $code)->first();
        if (!$user) {
            Session::flash('error', 'Không tìm thấy thông tin tài khoản');
            return;
        }
        try {
            if ($user->active == 1) $user->active = 0;
            else $user->active = 1;
            $user->save();
            return;
        } catch (\Exception $err) {
            Session::flash('error', $err->getMessage());
            return;
        }
    }

    public function deleteActiveUser($code)
    {
        $user = User::where('usercode', $code)->first();
        if (!$user) return 'Không tìm thấy tài khoản này';
        if ($user->username == 'admin')  return 'Không thể xóa root của hệ thống';
        try {
            $user->delete();
            return '';
        } catch (\Exception $err) {
            return $err->getMessage();
        }
    }
}
