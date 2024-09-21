@extends('customer.main')
@section('insertView')
<div style="position: relative; top: -1vw;" class="li-section-title">
    <h2>
        <span style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important;">{{$title}}</span>
    </h2>
</div>
<div style="margin: -40px;">
    @if (session()->has('hasProducts'))
    <div style="margin: 100px;">
        <div class="row">
            @foreach($products as $product)
            <div class="col-lg-4 col-md-4 col-sm-6 mt-40">
                <!-- single-product-wrap start -->
                <div class="single-product-wrap">
                    <div class="product-image">
                        <a href="/customer/product-details/{{$product->productcode}}">
                            <img src="{{$product->picturelink}}" alt="Li's Product Image">
                        </a>
                        @if (now()->diffInDays(\Carbon\Carbon::parse($product->created_at)) < 3) <span class="sticker">
                            New</span>
                            @endif
                    </div>
                    <div class="product_desc">
                        <div class="product_desc_info">
                            <div class="product-review">
                                <h5 class="manufacturer">
                                    <a href="/customer/type/{{$product->typecode}}">{{$product->type->typename}}</a>
                                </h5>
                                <div class="rating-box">
                                    <ul class="rating">
                                        @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgRateProducts[$product->
                                            productcode])
                                            <li><i class="fa fa-star-o"></i></li>
                                            @else
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endif
                                            @endfor
                                    </ul>
                                </div>
                            </div>
                            <h4><a class="product_name" href="/customer/product-details/{{$product->productcode}}">{{$product->productname}}</a>
                            </h4>
                            <div class="price-box">
                                <span class="new-price new-price-2">{{number_format($product->price*(100-$product->discount)/100)}}
                                    VND/{{$product->unit->unitname}}</span>
                                <br>
                                <span class="old-price">{{number_format($product->price)}}
                                    VND/{{$product->unit->unitname}}</span>
                                <span class="discount-percentage">Giảm {{$product->discount}}%</span>
                            </div>
                        </div>
                        <div class="add-actions">
                            <ul class="add-actions-link">
                                <li class="add-cart active"><a href="#" onclick="addCart('/customer/add-carts?code={{$product->productcode}}&quantity=1')">Thêm
                                        vào
                                        giỏ</a></li>
                                <li><a href="#" title="quick view" class="quick-view-btn" data-toggle="modal" data-target="#exampleModalCenter_{{$product->productcode}}"><i class="fa fa-eye"></i></a></li>
                            </ul>
                        </div>
                    </div>
                </div>
                <!-- single-product-wrap end -->
            </div>
            @endforeach
        </div>
    </div>
    @else
    <h1 style="font-family:'Segoe UI', Tahoma, Geneva, Verdana, sans-serif !important; font-weight: 600 !important; height: 20vh; margin: 50px;display: flex;align-items: center;justify-content: center;">
        Không tìm
        thấy
        sản phẩm nào
    </h1>
    @endif
</div>
@endsection
@section('quickView')
@foreach($products as $product)
<div class="modal fade modal-wrapper" id="exampleModalCenter_{{$product->productcode}}">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
                <div class="modal-inner-area row">
                    <div class="col-lg-5 col-md-6 col-sm-6">
                        <!-- Product Details Left -->
                        <div class="product-details-left">
                            <div class="product-details-images slider-navigation-1">
                                <div class="lg-image">
                                    <img src="{{$product->picturelink}}" alt="product image">
                                </div>
                            </div>
                        </div>
                        <!--// Product Details Left -->
                    </div>

                    <div class="col-lg-7 col-md-6 col-sm-6">
                        <div class="product-details-view-content pt-60">
                            <div class="product-info">
                                <h2>Sản phẩm: {{$product->productname}}</h2>
                                <a href="/customer/type/{{$product->typecode}}" class="product-details-ref">Phân
                                    loại:
                                    {{$product->type->typename}}</a>
                                <div class="rating-box pt-20">
                                    <ul class="rating rating-with-review-item">
                                        @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgRateProducts[$product->
                                            productcode])
                                            <li><i class="fa fa-star-o"></i></li>
                                            @else
                                            <li class="no-star"><i class="fa fa-star-o"></i></li>
                                            @endif
                                            @endfor
                                            <br>
                                            <li><a href="/customer/product-details/{{$product->productcode}}">Xem
                                                    chi
                                                    tiết hơn</a></li>
                                    </ul>
                                </div>
                                <div class="price-box pt-20">
                                    <span class="new-price new-price-2">Giá giảm:
                                        {{number_format($product->price*(100-$product->discount)/100)}}
                                        VND/{{$product->unit->unitname}}</span>
                                    <br><br>
                                    <span class="old-price">Giá gốc: {{number_format($product->price)}}
                                        VND/{{$product->unit->unitname}}</span>
                                </div>
                                <div class="product-desc">
                                    <p>
                                        <span>Hiện đang giảm giá: {{$product->discount}}%<br> Mô tả nhanh:
                                            {{$product->shortdescription}}
                                        </span>
                                    </p>
                                </div>
                                <div class="single-add-to-cart">
                                    <form class="cart-quantity" id="add-to-cart-form-{{$product->code}}">
                                        <div class="quantity">
                                            <input type="hidden" value="{{$product->productcode}}" name="code">
                                            <label>Số lượng:</label>
                                            <div class="cart-plus-minus">
                                                <input name="quantity" class="cart-plus-minus-box" value="1" type="text">
                                                <div class="dec qtybutton"><i class="fa fa-angle-down"></i>
                                                </div>
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i>
                                                </div>
                                            </div>
                                        </div>
                                        @csrf
                                        <button class="add-to-cart" type="submit">Thêm vào giỏ</button>
                                    </form>
                                </div>
                                <div class="product-additional-info pt-25">
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endforeach
@endsection
@section('paginate')
@if (session()->has('hasProducts'))
<div style="display: flex; justify-content: space-between; margin-top: -10px;" class="pagination">
    <div class="ml-2 pagination__previous">
        {!! $products->previousPageUrl() ? '<a href="'.$products->previousPageUrl().'">👈 Trang trước</a>' : '' !!}
    </div>
    <div>
        <ul class="pagination__numbers" style="display: flex; list-style: none;">
            @php
            $currentPage = $products->currentPage();
            $lastPage = $products->lastPage();
            $startPage = max($currentPage - 2, 1);
            $endPage = min($currentPage + 2, $lastPage);
            @endphp

            @for ($page = $startPage; $page <= $endPage; $page++) <li class="{{ $page == $currentPage ? 'active' : '' }}" style="margin-right: 10px;">
                @if ($page == $currentPage)
                <span>{{ $page }}</span>
                @else
                <a href="{{ $products->url($page) }}">{{ $page }}</a>
                @endif
                </li>
                @endfor
        </ul>
    </div>
    <div class="mr-2 pagination__next">
        {!! $products->nextPageUrl() ? '<a href="'.$products->nextPageUrl().'">Trang tiếp 👉</a>' : '' !!}
    </div>
</div>
@endif
@endsection