@extends('customer.main')
@section('insertView')
<div style=" margin-bottom:20px; display: flex; justify-content: center;">
    <div style=" max-width: 500px; width: 90vw; " class="contact-page-side-content">
        <h3 class="contact-page-title">Kết quả thanh toán đơn hàng</h3>
        <p class="contact-page-message mb-25">Mã đơn hàng: {{$order->ordercode}} <br> Tên người nhận:
            {{$order->receivername}} <br>Tổng thanh toán:
            {{number_format($order->total)}} VND <br>Kết quả thanh toán:
            @if($result == 'Thanh toán thành công')
        <p style="color: lime; margin-top: -25px;">{{$result}}</p>
        @else
        <p style="color: red; margin-top: -25px;">{{$result}}</p>
        @endif
        </p>
        <div class="single-contact-block">
            <h4><i class="fa fa-fax"></i> Địa chỉ giao hàng:</h4>
            <p>{{$order->shipaddress}}</p>
        </div>
        <div class="single-contact-block">
            <h4><i class="fa fa-phone"></i> Số điện thoại người nhận hàng:</h4>
            <p>{{$order->receiverphone}}</p>
        </div>
    </div>
</div>
@endsection