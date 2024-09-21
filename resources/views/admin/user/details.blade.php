@extends('admin.main')
@section('insertView')
<div style="margin: 10px;">
    <label for="">Mã số: {{$user->usercode}}</label>
    <br>
    <label for="">Tên người dùng: {{$user->username}}</label>
    <br>
    <label for="">Email: {{$user->email}}</label>
    <br>
    <label for="">Điện thoại: {{$user->phone}}</label>
    <br>
    <label for="">Ngày sinh: {{\Carbon\Carbon::parse($user->birthday)->format('d-m-Y')}}</label>
    <br>
    <label for="">Phân quyền: {{$user->role == 1 ? 'Quản trị viên' : 'Khách hàng'}}</label>
    <br>
    <label for="">Trạng thái: {{$user->active == 1 ? 'Kích hoạt' : 'Không kích hoạt'}}</label>
    <br>
    <label for="">Thời gian tạo: {{$user->created_at}}</label>
</div>
@endsection
