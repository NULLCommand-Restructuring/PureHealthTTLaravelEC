<?php

namespace App\Http\Controllers;

use App\Http\Requests\CreateOrderRequest;
use App\Models\Type;
use App\Services\AddressService;
use App\Services\CheckoutService;
use App\Services\CustomerService;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class CustomerController extends Controller
{
    protected $customerService;
    protected $userService;
    protected $addressService;
    protected $checkoutService;

    public function __construct(CheckoutService $checkoutService, CustomerService $customerService, UserService $userService, AddressService $addressService)
    {
        $this->customerService = $customerService;
        $this->userService = $userService;
        $this->addressService = $addressService;
        $this->checkoutService = $checkoutService;
    }

    public function viewHome()
    {
        $getBestSellerProduct = $this->customerService->getBestSellerProduct(10);
        $getSliderProduct = $this->customerService->getSliderProduct(5);
        $getBestDiscountProduct = $this->customerService->getSliderProduct(10);
        $getNewProduct = $this->customerService->getNewProduct(10);
        return view('customer.home', [
            'title' => 'PureHealthTT - Trang chủ',
            'sliderProducts' => $getSliderProduct,
            'newProducts' => $getNewProduct,
            'avrgRateNewProducts' =>  $this->customerService->getAvgRate($getNewProduct),
            'bestDiscountProducts' => $getBestDiscountProduct,
            'avrgBestDiscountProducts' => $this->customerService->getAvgRate($getBestDiscountProduct),
            'bestSellerProducts' => $getBestSellerProduct,
            'avrgBestSellerProducts' => $this->customerService->getAvgRate($getBestSellerProduct),
        ]);
    }

    public function viewChangePassword()
    {
        return view('customer.change_password', [
            'title' => 'PureHealthTT - Đổi mật khẩu',
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

    public function viewProductFollowType($code)
    {
        Session::forget('hasProducts');
        $productsForType = $this->customerService->getProductsForType($code);
        if ($productsForType->total() != 0) {
            Session::flash('hasProducts', 'ok');
            return view('customer.view_only_type', [
                'title' => 'PureHealthTT - Phân loại: ' . $this->customerService->getOnlyNameType($code),
                'typepage' => $this->customerService->getOnlyNameType($code),
                'products' => $productsForType,
                'avrgRateProducts' => $this->customerService->getAvgRate($productsForType)
            ]);
        }
        return view('customer.view_only_type', [
            'title' => 'PureHealthTT - Phân loại: ' . $this->customerService->getOnlyNameType($code),
            'typepage' => $this->customerService->getOnlyNameType($code),
            'products' => $productsForType,
        ]);
    }

    public function viewSingleProduct($code)
    {
        $product = $this->customerService->getSingleProduct($code);
        if (!$product) abort(404);
        $getAllAssessments = $this->customerService->getAllAssessmentsForProduct($code);
        $sameTypeProducts = $this->customerService->getSameTypeProducts($product->typecode, 10);
        return view('customer.single_product', [
            'title' => 'PureHealthTT - Chi tiết sản phẩm',
            'product' => $product,
            'avrgProduct' =>  $this->customerService->getAvgRate($product),
            'assessments' => $getAllAssessments,
            'sameTypeProducts' => $sameTypeProducts,
            'avrgRateSameTypeProduct' => $this->customerService->getAvgRate($sameTypeProducts)
        ]);
    }

    public function actionAddAssessment(Request $request)
    {
        try {
            $this->validate($request, [
                'productcode' => 'required',
                'customercode' => 'required',
                'content' => 'required|min:3',
                'rate' => 'required'
            ]);
            $result = $this->customerService->handlePostAssessment($request);
            return response()->json([
                'message' => $result,
                'error' => 0
            ]);
        } catch (\Illuminate\Validation\ValidationException $e) {
            return response()->json([
                'message' => 'Vui lòng nhập đầy đủ các trường thông tin để thực hiện đăng đánh giá!',
                'error' => 1
            ]);
        }
    }

    /* New code */
    public function viewProductSearch(Request $request)
    {
        Session::forget('hasProducts');
        $productsForSearch = $this->customerService->getProductsForSearch($request);
        if ($productsForSearch->total() != 0) {
            Session::flash('hasProducts', 'ok');
            return view('customer.result_search', [
                'title' => 'PureHealthTT - Kết quả tìm kiếm',
                'products' => $productsForSearch,
                'avrgRateProducts' => $this->customerService->getAvgRate($productsForSearch),
            ]);
        }
        return view('customer.result_search', [
            'title' => 'PureHealthTT - Kết quả tìm kiếm',
            'products' => $productsForSearch,
        ]);
    }

    public function viewProductList(Request $request)
    {
        $allProducts = $this->customerService->getProductsOnRequest($request);
        return view('customer.product_list', [
            'title' => 'PureHealthTT - Danh sách sản phẩm',
            'products' => $allProducts['products'],
            'default' => $allProducts['default'],
            'avrgRateProducts' => $this->customerService->getAvgRate($allProducts['products']),
        ]);
    }

    public function viewCart()
    {
        return view(
            'customer.cart',
            [
                'title' => 'PureHealthTT - Giỏ hàng'
            ]
        );
    }

    public function viewCreateOrder()
    {
        return view('customer.order', [
            'title' => 'PureHealthTT - Đặt hàng',
            'address' => $this->addressService->getInfoAddress(),
        ]);
    }

    public function viewOrderList()
    {
        Session::forget('hasOrder');
        $orderForCustomer = $this->customerService->getOrdersForCustomer();
        if ($orderForCustomer->total() != 0) Session::flash('hasOrder', 'ok');
        return view('customer.order_list', [
            'title' => 'PureHealthTT - Danh sách đơn hàng',
            'orders' => $orderForCustomer
        ]);
    }

    public function viewOrderDetails($code)
    {
        if (!Auth::check()) abort(404);
        $orderDetails = $this->customerService->getOrderDetails($code);
        if ($orderDetails == '404') abort(404);
        return view('customer.order_details', [
            'title' => 'Chi tiết đơn hàng ' . $code,
            'orderDetails' => $orderDetails
        ]);
    }

    public function actionConfirmOrder($code)
    {
        if (!Auth::check()) abort(404);
        $messageHanlde = $this->customerService->handleConfirmOrder($code);
        if ($messageHanlde == '404') abort(404);
        return view('customer.confirm_order', [
            'title' => 'PureHealthTT - Xác nhận đơn hàng ' . $code,
            'message' => $messageHanlde
        ]);
    }

    public function actionCancelOrder($code)
    {
        if (!Auth::check()) abort(404);
        $messageHanlde = $this->customerService->handleCancelOrder($code);
        if ($messageHanlde == '404') abort(404);
        return view('customer.confirm_order', [
            'title' => 'PureHealthTT - Hủy đơn hàng ' . $code,
            'message' => $messageHanlde
        ]);
    }

    public function actionCreateOrder(CreateOrderRequest $request)
    {
        $this->customerService->handleCreateOrder($request);
        return redirect()->back();
    }

    public function viewCheckout($code)
    {
        if (!Auth::check() || !Auth::user()->active == 1) abort(404);
        $orderInfo = $this->customerService->getOrder($code);
        if ($orderInfo) {
            return view('customer.checkout', [
                'title' => "PureHealthTT - Thanh toán đơn hàng",
                'order' => $orderInfo
            ]);
        } else abort(404);
    }

    public function viewCheckoutResult(Request $request)
    {
        $orderInfo = $this->customerService->getOrder($request->input('vnp_OrderInfo'));
        if (!$orderInfo) abort(404);
        $checkHash = $this->checkoutService->checkHash($request);

        if ($checkHash) {
            $handleStatus = $this->checkoutService->handleStatusOrder($request);
            return view('customer.checkout_result', [
                'title' => 'PureHealtTT - Kết quả thanh toán',
                'order' => $orderInfo,
                'result' => $handleStatus
            ]);
        }
        return view('customer.checkout_result', [
            'title' => 'PureHealtTT - Kết quả thanh toán',
            'order' => $orderInfo,
            'result' => 'Thanh toán thất bại. Lý do: Chữ ký không hợp lệ'
        ]);
    }

    public function viewFeedback()
    {
        if (!Auth::check()) abort(404);
        $orderFeedback = $this->customerService->getAllOrderSuccess();
        if ($orderFeedback->count() == 0) Session::forget('hasFeedback');
        else Session::flash('hasFeedback', 'ok');
        return view('customer.feedback', [
            'title' => 'PureHealthTT - Phản hồi đơn hàng',
            'orders' => $orderFeedback,
        ]);
    }

    public function actionCreateFeedback(Request $request)
    {
        if (!Auth::check()) abort(404);
        $this->validate($request, [
            'ordercode' => 'required',
            'content' => 'required|min:5',
            'phone' => 'required|regex:/^0[0-9]{9}$/|digits:10',
        ], [
            'ordercode.required' => 'Không tìm thấy thông tin đơn hàng đang phản hồi',
            'content.required' => 'Không tìm thấy nội dung phản hồi',
            'content.min' => 'Phản hồi không được quá ngắn',
            'phone.required' => 'Không tìm thấy thông tin số điện thoại',
            'phone.regex' => 'Số điện thoại có vẻ không đúng định dạng',
            'phone.digits' => 'Số điện thoại phải chứa 10 chữ số.',
        ]);

        $this->customerService->handeCreateFeedback($request);
        return redirect()->back();
    }

    public function viewChatbox()
    {
        return view('customer.chatbox', [
            'title' => 'PureHealthTT - Chatbox AI',
        ]);
    }

    public function viewMap()
    {
        return view('customer.map', [
            'title' => 'PureHealthTT - Bản đồ'
        ]);
    }

    public function viewPolicy()
    {
        return view('customer.policy', [
            'title' => 'PureHealthTT - Chính sách đổi trả'
        ]);
    }
}
