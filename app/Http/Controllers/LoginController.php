<?php

namespace App\Http\Controllers;

use App\Http\Requests\LoginRequest;
use App\Http\Requests\RegisterRequest;
use App\Services\UserService;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Session;

use function PHPUnit\Framework\returnSelf;

class LoginController extends Controller
{
    protected $userService;

    public function __construct(UserService $userService)
    {
        $this->userService = $userService;
    }

    public function viewLogin()
    {
        if ($this->userService->isLogged()) return redirect('/');
        return view('login.login', [
            'title' => 'PureHealthTT - Đăng nhập'
        ]);
    }

    public function actionLogin(LoginRequest $request)
    {
        $checkUser = $this->userService->login($request);
        Session::put('carts', []);
        if ($checkUser) return redirect('/');
        Session::forget('carts');
        Session::flash('error', 'Email hoặc mật khẩu không chính xác, vui lòng kiểm tra lại');
        return redirect()->back();
    }

    public function actionLogout(Request $request)
    {
        $this->userService->logout($request);
        return redirect('/');
    }

    public function viewForgotPassword()
    {
        if ($this->userService->isLogged()) return redirect('/');
        return view('login.forgot_password', [
            'title' => 'PureHealthTT - Quên mật khẩu'
        ]);
    }

    public function actionForgotPassword(Request $request)
    {

        $this->validate(
            $request,
            [
                'email' => 'required|email',
            ],
            [
                'email.required' => 'Vui lòng nhập địa chỉ email',
                'email.email' => 'Vui lòng nhập đúng định dạng email'
            ]
        );
        $checkStatus = $this->userService->handleForgotPassword($request);
        if ($checkStatus) {
            return redirect('/login');
        }
        return redirect()->back();
    }

    public function viewResetPassword($code)
    {
        if ($this->userService->isLogged()) return redirect('/');
        $checkRequest = $this->userService->checkResetPassword($code);
        if ($checkRequest) {
            return view('login.reset_password', [
                'title' => 'PureHealthTT - Đặt lại mật khẩu',
                'requestCode' => $code,
                'username' => $checkRequest->username
            ]);
        }
        return redirect('/login');
    }

    public function  actionResetPassword(Request $request)
    {
        $this->validate($request, [
            'newPassword' => 'required|min:6|confirmed',
        ], [
            'newPassword.required' => 'Vui lòng nhập vào mật khẩu',
            'newPassword.confirmed' => 'Mật khẩu xác nhận không giống',
            'newPassword.min' => 'Mật khẩu phải có ít nhất :min ký tự',
        ]);
        $handleResult = $this->userService->handleResetPassword($request);
        return redirect('/login');
    }

    public function viewRegister()
    {
        if ($this->userService->isLogged()) return redirect('/');
        return view('login.register', [
            'title' => 'PureHealthTT - Đăng ký',
        ]);
    }

    public function actionRegister(RegisterRequest $request)
    {
        $handle = $this->userService->handleRegister($request);
        if ($handle) return redirect('/login');
        return redirect()->back();
    }

    public function actionConfirmRegister($code, Request $request)
    {
        $this->userService->logout($request);
        $handle = $this->userService->handleConfirmRegister($code);
        return redirect('/login');
    }
}
