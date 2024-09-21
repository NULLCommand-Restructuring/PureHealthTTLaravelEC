<?php

namespace App\Http\Controllers;

use App\Exceptions\Handler;
use App\Http\Requests\AddProductRequest;
use App\Services\AdminService;
use App\Services\DashboardService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class AdminController extends Controller
{
    protected $adminService;
    protected $userService;
    protected $dashboardService;

    public function __construct(DashboardService $dashboardService, UserService $userService, AdminService $adminService)
    {
        $this->adminService = $adminService;
        $this->userService = $userService;
        $this->dashboardService = $dashboardService;
    }

    public function viewDashboard()
    {
        $totalOrder = $this->dashboardService->getTotalOrder(1);
        $totalWaitOrder = $this->dashboardService->getTotalOrder(0);
        $totalUser = $this->dashboardService->getTotalUser();
        $totalProduct = $this->dashboardService->getTotalProduct();
        $totalFeedback = $this->dashboardService->getTotalFeedback();
        $inforChart1 = $this->dashboardService->getInforChart1();
        $inforChart2 = $this->dashboardService->getInforChart2();
        $requestString1 = $this->dashboardService->requestString1();
        $requestString2 = $this->dashboardService->requestString2();
        $requestString3 = $this->dashboardService->requestString3();
        return view('admin.dashboard', [
            'title' => 'PureHealthTT - Bảng điều khiển',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'totalOrder' => $totalOrder,
            'totalWaitOrder' => $totalWaitOrder,
            'totalUser' => $totalUser,
            'totalProduct' => $totalProduct,
            'totalFeedback' => $totalFeedback,
            'inforChart1' => $inforChart1,
            'inforChart2' => $inforChart2,
            'requestString1' => $requestString1,
            'requestString2' => $requestString2,
            'requestString3' => $requestString3,
        ]);
    }

    public function viewAddType()
    {
        return view('admin.type.add', [
            'title' => 'PureHealthTT - Thêm phân loại sản phẩm',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email
        ]);
    }

    public function actionAddType(Request $request)
    {
        $this->validate($request, [
            'typename' => 'required|min:3',
            'description' => 'required|min:10'
        ], [
            'typename.required' => 'Vui lòng nhập tên của phân loại',
            'typename.min' => 'Tên phân loại phải có ít nhất :min ký tự',
            'description.required' => 'Vui lòng nhập mô tả cho phân loại',
            'description.min' => 'Mô tả phân loại phải có ít nhất :min ký tự'
        ]);

        $this->adminService->handleAddType($request);
        return redirect()->back();
    }

    public function viewListType()
    {
        $getTypeList = $this->adminService->getTypeList();
        return view('admin.type.list', [
            'title' => 'PureHealthTT - Danh sách phân loại sản phẩm',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'types' => $getTypeList
        ]);
    }

    public function viewEditType($code)
    {
        $getTypeElement = $this->adminService->getTypeElement($code);
        if ($getTypeElement) {
            return view('admin.type.edit', [
                'title' => 'PureHealthTT - Chỉnh sửa phân loại sản phẩm',
                'username' => Auth::user()->username,
                'email' => Auth::user()->email,
                'typeElement' => $getTypeElement,
            ]);
        }
        return redirect('/list-type');
    }

    public function actionEditType(Request $request)
    {
        $this->validate($request, [
            'typename' => 'required|min:3',
            'description' => 'required|min:10'
        ], [
            'typename.required' => 'Vui lòng nhập tên của phân loại',
            'typename.min' => 'Tên phân loại phải có ít nhất :min ký tự',
            'description.required' => 'Vui lòng nhập mô tả cho phân loại',
            'description.min' => 'Mô tả phân loại phải có ít nhất :min ký tự'
        ]);

        $handle = $this->adminService->handleEditType($request);
        if ($handle) return redirect('/list-type');
        return redirect()->back();
    }

    public function actionDeleteType(Request $request)
    {
        $handle = $this->adminService->handleDeleteType($request);
        if ($handle == '') {
            return response()->json(['error' => false, 'message' => 'Xóa thành công']);
        }
        return response()->json(['error' => true, 'message' => $handle]);
    }

    public function viewChangePassword()
    {
        return view('admin.user.change_password', [
            'title' => 'PureHealthTT - Thay đổi mật khẩu',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
        ]);
    }

    public function actionChangePassword(Request $request)
    {
        $this->validate($request, [
            'username' => 'required',
            'oldPassword' => 'required',
            'newPassword' => 'required|min:6|confirmed'
        ], [
            'username.required' => "Không tìm thấy thông tin tên người dùng đi kèm",
            'oldPassword.required' => "Hãy nhập mật khẩu cũ để thay đổi mật khẩu",
            'newPassword.required' => "Hãy nhập mật khẩu mới",
            'newPassword.min' => "Mật khẩu mới có tối thiểu :min ký tự",
            'newPassword.confirmed' => "Mật khẩu xác nhận không khớp"
        ]);

        $handle = $this->userService->handeChangePassword($request->input('username'), $request->input('oldPassword'), $request->input('newPassword'));
        return redirect()->back();
    }

    public function actionUploadImage(Request $request)
    {
        $getUrl = $this->adminService->handleUploadImage($request);
        if ($getUrl !== false) {
            return response()->json([
                'error' => false,
                'url'   => $getUrl
            ]);
        }
        return response()->json(['error' => true]);
    }

    public function viewAddProduct()
    {
        $getTypeList = $this->adminService->getAllTypeList();
        $getUnitList = $this->adminService->getAllUnitList();
        return view('admin.product.add', [
            'title' => 'PureHealthTT - Thêm sản phẩm mới',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'types' => $getTypeList,
            'units' => $getUnitList
        ]);
    }

    public function actionAddProdcut(AddProductRequest $request)
    {
        $handle = $this->adminService->handleAddProduct($request);
        return redirect()->back();
    }

    public function viewListProduct()
    {
        $getProductList = $this->adminService->getProductList();
        return view('admin.product.list', [
            'title' => 'PureHealthTT - Danh sách sản phẩm',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'products' => $getProductList
        ]);
    }

    public function viewEditProduct($code)
    {
        $getTypeList = $this->adminService->getAllTypeList();
        $getUnitList = $this->adminService->getAllUnitList();
        $getElement = $this->adminService->getProductElement($code);
        if ($getElement) {
            return view('admin.product.edit', [
                'title' => 'PureHealthTT - Chỉnh sửa thông tin sản phẩm',
                'username' => Auth::user()->username,
                'email' => Auth::user()->email,
                'product' => $getElement,
                'types' => $getTypeList,
                'units' => $getUnitList
            ]);
        }
        return redirect('/list-product');
    }

    public function actionEditProduct(AddProductRequest $request)
    {
        $handle = $this->adminService->handleEditProduct($request);
        if ($handle) return redirect('/list-product');
        return redirect()->back();
    }

    public function actionDeleteProduct(Request $request)
    {
        $handle = $this->adminService->handleDeleteProduct($request);
        if ($handle == '') {
            return response()->json(['error' => false, 'message' => 'Xóa thành công']);
        }
        return response()->json(['error' => true, 'message' => $handle]);
    }

    public function viewAddUnit()
    {
        return view('admin.unit.add', [
            'title' => 'PureHealthTT - Thêm sản phẩm mới',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
        ]);
    }

    public function actionAddUnit(Request $request)
    {
        $handle = $this->adminService->handleAddUnit($request);
        return redirect()->back();
    }

    public function  viewListUnit()
    {
        $getUnitList = $this->adminService->getUnitList();
        return view('admin.unit.list', [
            'title' => 'PureHealthTT - Danh sách đơn vị hàng',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'units' => $getUnitList
        ]);
    }

    public function actionDeleteUnit(Request $request)
    {
        $handle = $this->adminService->handleDeleteUnit($request);
        if ($handle == '') {
            return response()->json(['error' => false, 'message' => 'Xóa thành công']);
        }
        return response()->json(['error' => true, 'message' => $handle]);
    }

    /* New code */
    public function viewOrderList()
    {
        $allOrder = $this->adminService->getAllOrder();
        return view('admin.order.list', [
            'title' => "PureHealthTT - Danh sách đơn hàng",
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'orders' => $allOrder
        ]);
    }

    public function viewOrderListWait()
    {
        $allOrder = $this->adminService->getWaitOrder();
        return view('admin.order.list_wait', [
            'title' => "PureHealthTT - Danh sách đơn hàng chưa hoàn thành",
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'orders' => $allOrder
        ]);
    }

    public function viewEditOrder($code)
    {
        $orderElement = $this->adminService->getOrderElement($code);
        $allStatus = $this->adminService->getAllOrderStatus();
        if (!$orderElement) {
            Session::flash('error', 'Không tìm thấy đơn hàng này');
            return redirect('/list-order');
        }
        return view('admin.order.edit', [
            'title' => 'PureHealthTT - Chỉnh sửa đơn hàng ' . $code,
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'order' => $orderElement,
            'orderStatus' => $allStatus
        ]);
    }

    public function actionEditOrder(Request $request)
    {
        $handleResult = $this->adminService->handleEditOrder($request);
        if ($handleResult) return redirect('/list-order');
        return redirect()->back();
    }

    public function viewOrderDetails($code)
    {
        $orderDetails = $this->adminService->getOrderDetails($code);
        if ($orderDetails->count() == 0) {
            Session::flash('error', 'Không tìm thấy đơn hàng này');
            return redirect('/list-order');
        }
        return view('admin.order.order_details', [
            'title' => 'PureHealthTT - Chi tiết đơn hàng ' . $code,
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'orderDetails' =>  $orderDetails
        ]);
    }

    public function actionDeleteOrder(Request $request)
    {
        $handle = $this->adminService->handleDeleteOrder($request->input('code'));
        if ($handle == '') {
            return response()->json(['error' => false, 'message' => 'Xóa thành công']);
        }
        return response()->json(['error' => true, 'message' => $handle]);
    }

    public function viewFeedback()
    {
        $feedbacks = $this->adminService->getAllFeedback();
        return view('admin.feedback.list', [
            'title' => 'PureHealthTT - Danh sách phản hồi',
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
            'feedbacks' => $feedbacks
        ]);
    }

    public function actionCheckFeedback($code)
    {
        $this->adminService->handleCheckFeedback($code);
        return redirect()->back();
    }

    public function viewListUser()
    {
        $users = $this->adminService->getAllUser();
        return view('admin.user.list', [
            'title' => 'PureHealthTT - Danh sách tài khoản',
            'users' => $users,
            'username' => Auth::user()->username,
            'email' => Auth::user()->email,
        ]);
    }

    public function viewSingleUser($code)
    {
        $user = $this->adminService->getSingleUser($code);
        if (!$user) {
            Session::flash('error', 'Không tìm thấy người dùng này');
            return redirect()->back();
        } else {
            return view('admin.user.details', [
                'title' => 'PureHealthTT - Chi tiết tài khoản ' . $code,
                'username' => Auth::user()->username,
                'email' => Auth::user()->email,
                'user'  => $user
            ]);
        }
    }

    public function actionChangeActiveUser($code)
    {
        $this->adminService->changeActiveUser($code);
        return redirect()->back();
    }

    public function actionDeleteActiveUser(Request $request)
    {
        $handleResult = $this->adminService->deleteActiveUser($request->input('code'));
        if ($handleResult == '') {
            return response()->json(['error' => false, 'message' => 'Xóa thành công']);
        }
        return response()->json(['error' => true, 'message' => $handleResult]);
    }
}
