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
                <p class="login-box-msg">Đặt lại mật khẩu</p>
                <p class="login-box-msg">Bạn đang thực hiện yêu cầu đặt lại mật khẩu trên PureHealthTT có mã tham chiếu
                    {{$requestCode}}.
                </p>
                @include('notification')
                <form action="/reset-password" method="post">
                    <div class="input-group mb-3">
                        <input name="email" type="email" class="form-control" placeholder="Nhập email" value="Tên đăng nhập: {{$username}}" disabled>
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-envelope"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="newPassword" type="password" class="form-control" placeholder="Nhập mật khẩu mới">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div class="input-group mb-3">
                        <input name="newPassword_confirmation" type="password" class="form-control" placeholder="Xác nhận mật khẩu">
                        <div class="input-group-append">
                            <div class="input-group-text">
                                <span class="fas fa-lock"></span>
                            </div>
                        </div>
                    </div>
                    <div style="margin-bottom: 10px" class="row">
                        <div class="col-12">
                            <button type="submit" class="btn btn-primary btn-block">Cập nhật</button>
                        </div>
                    </div>
                    <input type="hidden" name="requestCode" value="{{$requestCode}}">
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