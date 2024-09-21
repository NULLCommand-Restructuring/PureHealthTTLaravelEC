@extends('admin.main')

@section('insertView')
<form action="/change-password" method="POST">
    <div class="card-body">
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="brandName">Tên đăng nhập</label>
                    <input type="text" name="username" value="{{$username}}" class="form-control" readonly>
                </div>
            </div>

        </div>
        <div class="row">
            <div class="col-md-12">
                <div class="form-group">
                    <label for="brandName">Email</label>
                    <input type="text" name="email" value="{{$email}}" class="form-control" disabled>
                </div>
            </div>

        </div>

        <div class="form-group">
            <label>Mật khẩu cũ</label>
            <input type="password" name="oldPassword" class="form-control" placeholder="Nhập mật khẩu cũ"></input>
        </div>

        <div class="form-group">
            <label>Mật khẩu mới</label>
            <input type="password" name="newPassword" class="form-control" placeholder="Nhập mật khẩu mới"></input>
        </div>

        <div class="form-group">
            <label>Xác nhận mật khẩu</label>
            <input type="password" name="newPassword_confirmation" class="form-control" placeholder="Xác nhận mật khẩu"></input>
        </div>

    </div>

    <div class="card-footer">
        <button type="submit" class="btn btn-primary col-md-12">Cập nhật</button>
    </div>
    @csrf
</form>
@endsection