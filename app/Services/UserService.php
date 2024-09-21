<?php

namespace App\Services;

use App\Http\Requests\LoginRequest;
use App\Mail\RegisterMail;
use App\Mail\ResetPasswordMail;
use App\Models\ForgotPassRequest;
use App\Models\PendingUser;
use Illuminate\Support\Facades\Auth;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Session;

class UserService
{
    public function login(LoginRequest $request)
    {
        if (Auth::attempt([
            'email' => $request->input('email'),
            'password' => $request->input('password'),
            'active' => 1
        ])) {
            return true;
        }
        return false;
    }

    public function logout($request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
    }

    public function isLogged()
    {
        return Auth::check() ? true : false;
    }

    public function handleForgotPassword($request)
    {
        try {
            DB::beginTransaction();
            ForgotPassRequest::where('created_at', '<', Carbon::now('Asia/Ho_Chi_Minh')->subDay())->delete();
            $user = User::where('email', $request->input('email'))->where('active', 1)->first();
            if ($user) {
                $codeRandom = 'FG' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
                ForgotPassRequest::insert([
                    'requestcode' => $codeRandom,
                    'usercode' => $user->usercode,
                    'created_at' => Carbon::now('Asia/Ho_Chi_Minh')->addDay()
                ]);
                Mail::to($request->input('email'))->send(new ResetPasswordMail($user->username, $codeRandom));
                DB::commit();
                Session::flash('success', 'Tạo yêu cầu thành công, vui lòng kiểm tra hộp thư trong email của bạn để biết thêm chi tiết');
                return true;
            }
            Session::flash('error', 'Email bạn nhập không tồn tại trong hệ thống, vui lòng kiểm tra lại');
            return false;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function checkResetPassword($code)
    {
        try {
            DB::beginTransaction();
            ForgotPassRequest::where('created_at', '<', Carbon::now('Asia/Ho_Chi_Minh')->subDay())->delete();
            $requestElement = ForgotPassRequest::where('requestcode', $code)->first();
            if ($requestElement) {
                $user = User::where('usercode', $requestElement->usercode)->where('active', 1)->first();
                if ($user) {
                    DB::commit();
                    return $user;
                }
            };
            DB::commit();
            Session::flash('error', 'Yêu cầu không tồn tại hoặc đã hết hạn, vui lòng kiểm tra lại');
            return false;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function handleResetPassword($request)
    {
        try {
            DB::beginTransaction();
            $requestElement = ForgotPassRequest::where('requestcode', $request->input('requestCode'))->first();
            if ($requestElement) {
                $user = User::where('usercode', $requestElement->usercode)->where('active', 1)->first();
                if ($user) {
                    $user->password = bcrypt($request->input('newPassword'));
                    $user->save();
                    $requestElement->delete();
                    DB::commit();
                    Session::flash('success', 'Cập nhật mật khẩu thành công');
                    return true;
                }
            }
            DB::rollBack();
            Session::flash("error", "Phát sinh lỗi trong quá trình cập nhật mật khẩu mới của bạn, vui lòng liên hệ bộ phận CSKH của chúng tôi để được hỗ trợ");
            return false;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function handeChangePassword($username, $oldPassword, $newPassword)
    {
        $user = Auth::user();
        if (Hash::check($oldPassword, $user->password) && $username == $user->username) {
            $user = User::where('username', $user->username)->first();
            if ($user) {
                try {
                    $user->password = bcrypt($newPassword);
                    $user->save();
                    Session::flash('success', 'Thay đổi mật khẩu thành công');
                    return true;
                } catch (\Exception $error) {
                    Session::flash('error', $error->getMessage());
                    return false;
                }
            }
        }
        Session::flash('error', "Thay đổi mật khẩu thất bại, vui lòng kiểm tra lại thông tin");
        return false;
    }

    public function handleRegister($request)
    {
        $check = User::where('email', $request->input('email'))->first();
        if ($check) {
            Session::flash('error', 'Email bạn nhập đã tồn tại trong hệ thống');
            return false;
        }
        $check = User::where('username', $request->input('username'))->first();
        if ($check) {
            Session::flash('error', 'Tên người dùng bị trùng, vui lòng lấy tên khác');
            return false;
        }
        $check = PendingUser::where('email', $request->input('email'))->first();
        if ($check) {
            Session::flash('error', 'Email bạn nhập đã tồn tại trong hệ thống');
            return false;
        }
        $check = PendingUser::where('username', $request->input('username'))->first();
        if ($check) {
            Session::flash('error', 'Tên người dùng bị trùng, vui lòng lấy tên khác');
            return false;
        }

        try {
            DB::beginTransaction();
            $codeRandom = 'CU' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            PendingUser::insert([
                'usercode' => $codeRandom,
                'username' => $request->input('username'),
                'email' => $request->input('email'),
                'password' => bcrypt($request->input('password')),
                'birthday' => $request->input('birthday'),
                'phone' => $request->input('phone'),
                'role' => 2,
                'active' => 0,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            Mail::to($request->input('email'))->send(new RegisterMail($request->input('username'), $codeRandom));
            DB::commit();
            Session::flash('success', 'Yêu cầu tạo tài khoản thành công, vui lòng kiểm tra hộp thư điện tử của bạn để hoàn thành đăng ký tài khoản');
            return true;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }

    public function handleConfirmRegister($code)
    {
        $check = PendingUser::where('usercode', $code)->first();
        if (!$check) {
            Session::flash('error', 'Không tồn tại phiên xác minh này trong hệ thống của chúng tôi,vui lòng liên hệ bộ phận CSKH của chúng tôi để được hỗ trợ');
            return false;
        }
        try {
            DB::beginTransaction();
            $codeRandom = 'CU' . str_pad(random_int(0, 999999), 6, '0', STR_PAD_LEFT);
            User::insert([
                'usercode' => $check->usercode,
                'username' => $check->username,
                'email' => $check->email,
                'password' => $check->password,
                'birthday' => $check->birthday,
                'phone' => $check->phone,
                'role' => 2,
                'active' => 1,
                'created_at' => Carbon::now('Asia/Ho_Chi_Minh'),
            ]);
            $check->delete();
            DB::commit();
            Session::flash('success', 'Xác minh tạo tài khoản thành công, hãy đăng nhập và mua sắm ngay nào');
            return true;
        } catch (\Exception $error) {
            DB::rollBack();
            Session::flash('error', $error->getMessage());
            return false;
        }
    }
}
