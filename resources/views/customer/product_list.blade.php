@extends('customer.main')
@section('insertView')
<div style="margin-top: -50px;" class="content-wraper pt-60 pb-60">
    <div class="container">
        <div class="row">
            <div class="col-lg-9 order-1 order-lg-2">
                <!-- Begin Li's Banner Area -->
                <div class="single-banner shop-page-banner">
                    <a href="#">
                        <img src="/template/customer/images/banner2.jpg" alt="Li's Static Banner">
                    </a>
                </div>
                <!-- Li's Banner Area End Here -->
                <!-- shop-products-wrapper start -->
                <div class="shop-products-wrapper">
                    <div class="tab-content">
                        <div id="list-view" class="tab-pane fade product-list-view active show " role="tabpanel">
                            <div class="row">
                                <div class="col">
                                    @foreach($products as $product)
                                    <div class="row product-layout-list">
                                        <div class="col-lg-3 col-md-5 ">
                                            <div class="product-image">
                                                <a href="{{$product->picturelink}}">
                                                    <img src="{{$product->picturelink}}" alt="Li's Product Image">
                                                </a>
                                                @if (now()->diffInDays(\Carbon\Carbon::parse($product->created_at)) < 3)
                                                    <span class="sticker">New</span>
                                                    @endif
                                            </div>
                                        </div>
                                        <div class="col-lg-5 col-md-7">
                                            <div class="product_desc">
                                                <div class="product_desc_info">
                                                    <div class="product-review">
                                                        <h5 class="manufacturer">
                                                            <a
                                                                href="/customer/type/{{$product->typecode}}">{{$product->type->typename}}</a>
                                                        </h5>
                                                        <div class="rating-box">
                                                            <ul class="rating">
                                                                @for ($i = 1; $i <= 5; $i++) @if($i
                                                                    <=$avrgRateProducts[$product->
                                                                    productcode])
                                                                    <li><i class="fa fa-star-o"></i></li>
                                                                    @else
                                                                    <li class="no-star"><i class="fa fa-star-o"></i>
                                                                    </li>
                                                                    @endif
                                                                    @endfor
                                                            </ul>
                                                        </div>
                                                    </div>
                                                    <h4><a class="product_name"
                                                            href="/customer/product-details/{{$product->productcode}}">{{$product->productname}}</a>
                                                    </h4>
                                                    <div class="price-box">
                                                        <span
                                                            class="new-price new-price-2">{{number_format($product->price*(100-$product->discount)/100)}}
                                                            VND/{{$product->unit->unitname}}</span>
                                                        <br>
                                                        <span class="old-price">{{number_format($product->price)}}
                                                            VND/{{$product->unit->unitname}}</span>
                                                        <span class="discount-percentage">Giảm
                                                            {{$product->discount}}%</span>
                                                    </div>
                                                    <br>
                                                    <p>Mô tả nhanh: {{$product->shortdescription}}</p>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="col-lg-4">
                                            <div class="shop-add-action mb-xs-30">
                                                <ul class="add-actions-link">
                                                    <li class="add-cart active"><a href="#"
                                                            onclick="addCart('/customer/add-carts?code={{$product->productcode}}&quantity=1')">Thêm
                                                            vào
                                                            giỏ</a></li>
                                                    <li><a class="quick-view" data-toggle="modal"
                                                            data-target="#exampleModalCenter_{{$product->productcode}}"
                                                            href="#"><i class="fa fa-eye"></i>Xem nhanh</a></li>
                                                </ul>
                                            </div>
                                        </div>
                                    </div>
                                    @endforeach
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- shop-products-wrapper end -->
            </div>
            <div class="col-lg-3 order-2 order-lg-1">
                <!--sidebar-categores-box start  -->
                <div class="sidebar-categores-box">
                    <div class="sidebar-title">
                        <h2>Bộ lọc</h2>
                    </div>
                    <!-- filter-sub-area start -->
                    <form action="">
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Phân loại:</h5>
                            <div class="categori-checkbox">
                                <select style="background-color: white;" name="typeOption">
                                    <option value="0" {{$default['typeOption'] == '0' ? 'selected' : ''}}>Tất cả
                                    </option>
                                    @foreach($types as $type)
                                    <option value="{{$type->typecode}}"
                                        {{$default['typeOption'] == $type->typecode ? 'selected' : ''}}>
                                        {{$type->typename}}
                                    </option>
                                    @endforeach
                                </select>
                            </div>
                        </div>
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Mức giảm giá:</h5>
                            <div class="categori-checkbox">
                                <select style="background-color: white;" name="discountOption" id="">
                                    <option value="0%" {{$default['discountOption'] == '0%' ? 'selected' : ''}}>Không
                                        chọn</option>
                                    <option value="10%" {{$default['discountOption'] == '10%' ? 'selected' : ''}}>10%
                                    </option>
                                    <option value="20%" {{$default['discountOption'] == '20%' ? 'selected' : ''}}>20%
                                    </option>
                                    <option value="30%" {{$default['discountOption'] == '30%' ? 'selected' : ''}}>30%
                                    </option>
                                    <option value="40%" {{$default['discountOption'] == '40%' ? 'selected' : ''}}>40%
                                    </option>
                                    <option value="50%" {{$default['discountOption'] == '50%' ? 'selected' : ''}}>50%
                                    </option>
                                </select>
                            </div>
                        </div>
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Giá thấp nhất (VND):</h5>
                            <input style="background-color: white;" type="number" name="minPrice"
                                value="{{$default['minPrice']}}">
                        </div>
                        <div class="filter-sub-area">
                            <h5 class="filter-sub-titel">Giá cao nhất (VND):</h5>
                            <input style="background-color: white;" type="number" name="maxPrice"
                                value="{{$default['maxPrice']}}">
                        </div>
                        <button
                            style="margin: 15px 0px; width: 150px; border-radius: 5px; color:white; background-color: black;"
                            type="submit">Lọc sản phẩm</button>
                        <a style="margin-left: 15px;" href="/customer/product-list/">Xóa lọc</a>
                    </form>
                    <!-- filter-sub-area end -->
                </div>
                <!--sidebar-categores-box end  -->
            </div>
        </div>
    </div>
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
                                <a href="/customer/type/{{$product->typecode}}" class="product-details-ref">Phân loại:
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
                                            <li><a href="/customer/product-details/{{$product->productcode}}">Xem chi
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
                                                <input name="quantity" class="cart-plus-minus-box" value="1"
                                                    type="text">
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

            @for ($page = $startPage; $page <= $endPage; $page++) <li
                class="{{ $page == $currentPage ? 'active' : '' }}" style="margin-right: 10px;">
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
@endsection