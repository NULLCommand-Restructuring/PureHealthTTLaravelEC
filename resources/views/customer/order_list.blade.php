@extends('customer.main')
@section('insertView')
<div style="position: relative; top: -1vw;" class="li-section-title">
    <h2>
        <span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important;">{{$title}}</span>
    </h2>
</div>
@if(!Auth::check())
<h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important; height: 20vh; margin: 20px auto;display: flex;align-items: center;justify-content: center;">
    Bạn chưa đăng nhập, vui lòng đăng nhập và để xem những đơn hàng của bạn
</h1>
@elseif(!session()->has('hasOrder'))
<h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important; height: 20vh; margin: 40px;display: flex;align-items: center;justify-content: center;">
    Bạn chưa đặt bất kỳ đơn hàng nào, hãy chọn những sản phẩm thêm vào giỏ hàng và đặt hàng ngay nào!
</h1>
@else
<div style="margin-top: -40px;" class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Tên người nhận</th>
                                <th>Số điện thoại người nhận</th>
                                <th>Địa chỉ nhận hàng</th>
                                <th>Ghi chú</th>
                                <th>Tổng thanh toán (VND)</th>
                                <th>Trạng thái</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orders as $order)
                            <tr>
                                <td><a href="/customer/order-details/{{$order->ordercode}}">{{$order->ordercode}}</a>
                                </td>
                                <td>{{$order->receivername}}</td>
                                <td>{{$order->receiverphone}}</td>
                                <td>{{$order->shipaddress}}</td>
                                <td>{{$order->note}}</td>
                                <td>{{number_format($order->total)}}</td>
                                @if($order->statuscode == 'OS2')
                                <td><a href="/customer/checkout/{{$order->ordercode}}">{{$order->orderStatus->description}}</a>
                                </td>
                                @else
                                <td>{{$order->orderStatus->description}}</td>
                                @endif
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endif
@endsection
@section('paginate')
@if (session()->has('hasOrder'))
<div style="display: flex; justify-content: space-between; margin-top: -10px;" class="pagination">
    <div class="ml-2 pagination__previous">
        {!! $orders->previousPageUrl() ? '<a href="'.$orders->previousPageUrl().'">👈 Trang trước</a>' : '' !!}
    </div>
    <div>
        <ul class="pagination__numbers" style="display: flex; list-style: none;">
            @php
            $currentPage = $orders->currentPage();
            $lastPage = $orders->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++) <li class="{{ $page == $currentPage ? 'active' : '' }}" style="margin-right: 10px;">
                @if ($page == $currentPage)
                <span>{{ $page }}</span>
                @else
                <a href="{{ $orders->url($page) }}">{{ $page }}</a>
                @endif
                </li>
                @endfor
        </ul>
    </div>
    <div class="mr-2 pagination__next">
        {!! $orders->nextPageUrl() ? '<a href="'.$orders->nextPageUrl().'">Trang tiếp 👉</a>' : '' !!}
    </div>
</div>
@endif
@endsection