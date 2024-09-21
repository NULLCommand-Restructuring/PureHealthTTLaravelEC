@extends('customer.main')
@section('insertView')
<div style="position: relative; top: -1vw;" class="li-section-title">
    <h2>
        <span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important;">{{$title}}</span>
    </h2>
</div>
@if(!Auth::check())
<h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important; height: 20vh; margin: 20px;display: flex;align-items: center;justify-content: center;">
    Bạn chưa đăng nhập, vui lòng đăng nhập và sử dụng giỏ hàng của bạn
</h1>
@elseif(session()->get('carts') == [])
<h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important; height: 20vh; margin: 20px;display: flex;align-items: center;justify-content: center;">
    Chưa có sản phẩm nào trong giỏ hàng của bạn, hãy thêm ngay nào!
</h1>
@else
<div style="margin-top: -40px;" class="Shopping-cart-area pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <form action="#">
                    <div class="table-content table-responsive">
                        <table class="table">
                            <thead>
                                <tr>
                                    <th class="li-product-remove">Xóa</th>
                                    <th class="li-product-thumbnail">Hình ảnh</th>
                                    <th class="cart-product-name">Tên sản phẩm</th>
                                    <th class="li-product-price">Giá gốc (VND)</th>
                                    <th class="li-product-price">Giá giảm (VND)</th>
                                    <th class="li-product-quantity">Số lượng mua</th>
                                    <th class="li-product-subtotal">Tổng tiền (VND)</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach(session()->get('carts') as $key => $productInCart)
                                @if($key != 'total')
                                <tr>
                                    <td class="li-product-remove"><a onclick="deleteCart('/customer/delete-cart?code={{$productInCart['info']->productcode}}')" href="#"><i class="fa fa-times"></i></a></td>
                                    <td class="li-product-thumbnail"><a href="#"><img src="{{$productInCart['info']->picturelink}}" alt="Li's Product Image"></a></td>
                                    <td class="li-product-name"><a href="/customer/product-details/{{$productInCart['info']->productcode}}">{{$productInCart['info']->productname}}</a>
                                    </td>
                                    <td class="li-product-price"><span class="amount">{{$productInCart['info']->price}}</span></td>
                                    <td class="li-product-price"><span class="amount">{{number_format($productInCart['info']->price*(1-$productInCart['info']->discount/100))}}</span>
                                    </td>
                                    <td class="quantity">
                                        <label>{{$productInCart['quantity']}}
                                            {{$productInCart['info']->unit->unitname}}</label>
                                    </td>
                                    <td class="product-subtotal"><span class="amount">{{number_format($productInCart['info']->price*(1-$productInCart['info']->discount/100) *(int)$productInCart['quantity'])}}</span>
                                    </td>
                                </tr>
                                @endif
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                    <div class="row">
                        <div class="col-md-5 ml-auto">
                            <div class="cart-page-total">
                                <h2>Tổng quan:</h2>
                                <ul>
                                    <li>Số sản phẩm trong giỏ:
                                        <span>{{(count(session()->get('carts')) - 1) < 0 ? 0 : count(session()->get('carts')) - 1}}</span>
                                    </li>
                                    <li>Tổng thanh toán: <span>{{number_format(session()->get('carts')['total'])}}
                                            VND</span></li>
                                </ul>
                                <a href="/customer/create-order">Tiến hành đặt hàng</a>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
@endif
@endsection