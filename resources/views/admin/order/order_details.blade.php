@extends('admin.main')
@section('insertView')
<table class="table">
    <thead>
        <tr>
            <th>Mã số</th>
            <th>Mã sản phẩm</th>
            <th>Số lượng</th>
            <th>Giá gốc (VND)</th>
        </tr>
    </thead>
    <tbody>
        @foreach($orderDetails as $order)
        <tr>
            <td><a href="/order-details/{{$order->ordercode}}">{{$order->ordercode}}</a></td>
            <td><a href="/customer/product-details/{{$order->productcode}}">{{$order->productcode}}</a></td>
            <td style="padding-left: 30px;">{{$order->number}}</td>
            <td>{{number_format($order->realprice)}}</td>
        </tr>
        @endforeach
    </tbody>
</table>
@endsection