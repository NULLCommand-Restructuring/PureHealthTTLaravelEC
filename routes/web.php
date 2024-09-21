<?php

use App\Http\Controllers\AddressController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AIController;
use App\Http\Controllers\CartController;
use App\Http\Controllers\CustomerController;
use App\Http\Controllers\LoginController;
use App\Services\CustomerService;
use Illuminate\Auth\Events\Login;
use Illuminate\Support\Facades\Route;

/* Login site */

Route::get('/login', [LoginController::class, 'viewLogin']);
Route::post('/login', [LoginController::class, 'actionLogin']);
Route::get('/logout', [LoginController::class, 'actionLogout']);
Route::get('/forgot-password', [LoginController::class, 'viewForgotPassword']);
Route::post('/forgot-password', [LoginController::class, 'actionForgotPassword']);
Route::get('/forgot-password/{code}', [LoginController::class, 'viewResetPassword']);
Route::post('reset-password', [LoginController::class, 'actionResetPassword']);
Route::get('/register', [LoginController::class, 'viewRegister']);
Route::post('/register', [LoginController::class, 'actionRegister']);
Route::get('/register/{code}', [LoginController::class, 'actionConfirmRegister']);

/* Admin site */
Route::middleware(['admin'])->group(function () {
    Route::get('/dashboard', [AdminController::class, 'viewDashboard']);

    //AI
    Route::post('/api/bard', [AIController::class, 'callBard']);
    Route::post('/api/openai', [AIController::class, 'callGPT']);
    Route::post('/api/bing', [AIController::class, 'callBing']);

    //Type
    Route::get('/add-type', [AdminController::class, 'viewAddType']);
    Route::post('/add-type', [AdminController::class, 'actionAddType']);
    Route::get('/list-type', [AdminController::class, 'viewListType']);
    Route::get('/edit-type/{code}', [AdminController::class, 'viewEditType']);
    Route::post('/edit-type', [AdminController::class, 'actionEditType']);
    Route::delete('/delete-type', [AdminController::class, 'actionDeleteType']);

    //User setting
    Route::get('/change-password', [AdminController::class, 'viewChangePassword']);
    Route::post('/change-password', [AdminController::class, 'actionChangePassword']);

    //Product
    Route::get('/add-product', [AdminController::class, 'viewAddProduct']);
    Route::post('/add-product', [AdminController::class, 'actionAddProdcut']);
    Route::get('list-product', [AdminController::class, 'viewListProduct']);
    Route::get('/edit-product/{code}', [AdminController::class, 'viewEditProduct']);
    Route::post('/edit-product', [AdminController::class, 'actionEditProduct']);
    Route::delete('delete-product', [AdminController::class, 'actionDeleteProduct']);

    //Unit
    Route::get('/add-unit', [AdminController::class, 'viewAddUnit']);
    Route::post('/add-unit', [AdminController::class, 'actionAddUnit']);
    Route::get('/list-unit', [AdminController::class, 'viewListUnit']);
    Route::delete('/delete-unit', [AdminController::class, 'actionDeleteUnit']);

    //Order
    Route::get('/list-order-wait', [AdminController::class, 'viewOrderListWait']);
    Route::get('/list-order', [AdminController::class, 'viewOrderList']);
    Route::get('/edit-order/{code}', [AdminController::class, 'viewEditOrder']);
    Route::post('/edit-order', [AdminController::class, 'actionEditOrder']);
    Route::get('/order-details/{code}', [AdminController::class, 'viewOrderDetails']);
    Route::delete('/delete-order',  [AdminController::class, 'actionDeleteOrder']);

    //Feedback
    Route::get('list-feedback', [AdminController::class, 'viewFeedback']);
    Route::get('check-feedback/{code}', [AdminController::class, 'actionCheckFeedback']);

    //User
    Route::get('/list-user', [AdminController::class, 'viewListUser']);
    Route::get('/user-details/{code}', [AdminController::class, 'viewSingleUser']);
    Route::get('/change-user/{code}', [AdminController::class, 'actionChangeActiveUser']);
    Route::delete('/delete-user/', [AdminController::class, 'actionDeleteActiveUser']);

    //Upload image
    Route::post('/upload-img', [AdminController::class, 'actionUploadImage']);
});

/* Customer site */
// Home page
Route::get('/', [CustomerController::class, 'viewHome']);

Route::prefix('/customer')->group(function () {
    //Map
    Route::get('/map', [CustomerController::class, 'viewMap']);

    //Policy
    Route::get('/policy', [CustomerController::class, 'viewPolicy']);

    //Cart
    Route::post('/add-carts', [CartController::class, 'actionAddToCarts']);
    Route::delete('/delete-cart', [CartController::class, 'actionDeleteProductCarts']);

    //Change password user
    Route::get('/change-password', [CustomerController::class, 'viewChangePassword']);
    Route::post('/change-password', [CustomerController::class, 'actionChangePassword']);

    //Type view
    Route::get('/type/{code}', [CustomerController::class, 'viewProductFollowType']);

    //Single product
    Route::get('/product-details/{code}', [CustomerController::class, 'viewSingleProduct']);

    //Post assessment
    Route::post('/post-assessment', [CustomerController::class, 'actionAddAssessment']);

    /* New code */
    //Search
    Route::get('/search', [CustomerController::class, 'viewProductSearch']);

    //Feedback
    Route::get('/feedback', [CustomerController::class, 'viewFeedback']);
    Route::post('/create-feedback', [CustomerController::class, 'actionCreateFeedback']);

    //Product list
    Route::get('/product-list', [CustomerController::class, 'viewProductList']);

    //View cart
    Route::get('/view-cart', [CustomerController::class, 'viewCart']);

    //Create order
    Route::get('/create-order', [CustomerController::class, 'viewCreateOrder']);
    Route::post('/create-order', [CustomerController::class, 'actionCreateOrder']);

    //View order
    Route::get('/view-order-list', [CustomerController::class, 'viewOrderList']);
    Route::get('/order-details/{code}', [CustomerController::class, 'viewOrderDetails']);

    //Checkout
    Route::get('/checkout/{code}', [CustomerController::class, 'viewCheckout']);
    Route::get('/checkout-result', [CustomerController::class, 'viewCheckoutResult']);

    //Confirm order
    Route::get('/confirm-order/{code}', [CustomerController::class, 'actionConfirmOrder']);
    Route::get('/cancel-order/{code}', [CustomerController::class, 'actionCancelOrder']);

    //Chatbox
    Route::get('/chatbox', [CustomerController::class, 'viewChatbox']);
});
