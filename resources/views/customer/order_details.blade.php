@extends('customer.main')
@section('insertView')
<div style="position: relative; top: -1vw;" class="li-section-title">
    <h2>
        <span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important;">{{$title}}</span>
    </h2>
</div>
<div style="margin-top: -40px;" class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-content table-responsive">
                    <table class="table">
                        <thead>
                            <tr>
                                <th>Mã đơn hàng</th>
                                <th>Mã sản phẩm</th>
                                <th>Số lượng mua</th>
                                <th>Giá gốc (VND)</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($orderDetails as $order)
                            <tr>
                                <td>{{$order->ordercode}}
                                </td>
                                <td><a href="/customer/product-details/{{$order->productcode}}">{{$order->productcode}}</a>
                                </td>
                                <td>{{$order->number}}
                                </td>
                                <td>{{number_format($order->realprice)}}
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection