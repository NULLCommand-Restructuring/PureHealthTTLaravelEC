@extends('customer.main')
@section('insertView')
<div style="position: relative; top: -1vw;" class="li-section-title">
    <h2>
        <span
            style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important;">{{$title}}</span>
    </h2>
</div>
@include('notification')
@if(!session()->has('hasFeedback'))
<h1
    style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important; height: 20vh; margin: 40px;display: flex;align-items: center;justify-content: center;">
    Bạn chưa có bất kỳ đơn hàng nào ở trạng thái đã giao thành công, không thể thực hiện phản hồi
</h1>
@else
<div style="display: flex; justify-content: center; margin: 10px;">
    <form class="form-group" method="POST" action="/customer/create-feedback">
        <label>Chọn mã số đơn hàng cần phản hồi: <br>(Xem mã đơn hàng tại trang đơn hàng)</label>
        <select name="ordercode">
            @foreach($orders as $order)
            <option value="{{$order->ordercode}}">{{$order->ordercode}}</option>
            @endforeach
        </select>
        <label>Nội dung phản hồi dành cho đơn hàng:</label>
        <textarea name="content" placeholder="Nhập nội dung" rows="10"></textarea>
        <label>Số điện thoại liên lạc hỗ trợ:</label>
        <input type="number" name="phone" placeholder="Nhập số điện thoại">
        <button style="margin-top: 10px; background-color: black; color: white; border-radius: 20px;" type="submit">Gửi
            phản hồi</button>
        @csrf
    </form>
</div>
@endif
@endsection