<!DOCTYPE html>
<html lang="en">

<head>
    @include('admin.header')
</head>

<body style="background-image: url(/template/images/login_background.jpg); background-size: cover;"
    class="hold-transition login-page">
    <div class="login-box">
        <div class="login-logo">
            <a href="/"><b>🍊 PureHealthTT 🥦</b></a>
        </div>
        <div class="card">
            <div style="border-radius: 5px" class="card-body login-card-body">
                <p class="login-box-msg">Quên mật khẩu hệ thống</p>
                <p class="login-box-msg">Nhập chính xác địa chỉ email của tài khoản bạn đã quên mật khẩu để chúng tôi có
                    thể giúp
                    bạn đặt lại mật khẩu</p>
                @include('notification')
                <form action="/forgot-password" method="post">
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Nhập email"
                            value="{{old('email')}}">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Gửi yêu cầu</button>
                        </div>
                    </div>
                    @csrf
                </form>

                <p class="mb-1">
                    <a href="/login">Quay lại đăng nhập...</a>
                </p>
                <p class="mb-0">
                    <a href="/register" class="text-center">Chưa có tài khoản...</a>
                </p>
            </div>
        </div>
    </div>
    @include('admin.footer')
</body>

</html>