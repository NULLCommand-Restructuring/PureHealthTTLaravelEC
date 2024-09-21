<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.header')
</head>

<body style="background-image: url(/template/images/login_background.jpg); background-size: cover;" class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>🍊 PureHealthTT 🥦</b></a>
        </div>
        <div class="card">
            <div style="border-radius: 5px" class="card-body login-card-body">
                <p class="login-box-msg">Đăng ký tài khoản </p>
                @include('notification')
                <form action="/register" method="post">
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Nhập email" value="{{old('email')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="username" type="text" class="form-control" placeholder="Nhập tên người dùng" value="{{old('username')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-user-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="phone" type="text" class="form-control" placeholder="Nhập SĐT" value="{{old('phone')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-phone-alt"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="birthday" type="date" class="form-control" placeholder="Nhập ngày sinh" value="{{ old('birthday')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-calendar"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password" type="password" class="form-control" placeholder="Nhập mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="password_confirmation" type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Đăng ký</button>
                        </div>
                    </div>
                    @csrf
                </form>

                <p class="mb-1">
                    <a href="/login">Quay lại đăng nhập...</a>
                </p>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>