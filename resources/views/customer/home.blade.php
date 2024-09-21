@extends('customer.main')
@section('insertView')
<div class="slider-with-banner">
    <div class="container">
        <div class="row">
            <!-- Begin Slider Area -->
            <div class="col-lg-8 col-md-8">
                <div class="slider-area">
                    <div class="slider-active owl-carousel">
                        @foreach($sliderProducts as $slider)
                        <div style="background-image: url({{$slider->picturelink}});" class="single-slide align-center-left animation-style-02 bg-2">
                            <div class="slider-progress"></div>
                            <div class="slider-content">
                                <h5>Giảm giá sốc <span>{{$slider->discount}}%</span> thời điểm hiện tại</h5>
                                <h2>{{$slider->productname}}</h2>
                                <h3>Giá chỉ từ
                                    <span>{{number_format($slider->price*(100-$slider->discount)/100)}}
                                        VND/{{$slider->unit->unitname}}</span>
                                </h3>
                                <div class="default-btn slide-btn">
                                    <a class="links" href="/customer/product-details/{{$slider->productcode}}">Mua
                                        ngay</a>
                                </div>
                            </div>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
            <div class="col-lg-4 col-md-4 text-center pt-xs-30">
                <div class="li-banner">
                    <a href="#">
                        <img src="template/customer/images/1.jpg" alt="">
                    </a>
                </div>
                <div class="li-banner mt-15 mt-sm-30 mt-xs-30">
                    <a href="#">
                        <img src="template/customer/images/2.jpg" alt="">
                    </a>
                </div>
            </div>
        </div>
    </div>
</div>
<section style="margin-top: 20px;" class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Top 10 sản phẩm mới nhất</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($newProducts as $product)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/customer/product-details/{{$product->productcode}}">
                                        <img src="{{$product->picturelink}}" alt="Li's Product Image">
                                    </a>
                                    @if (now()->diffInDays(\Carbon\Carbon::parse($product->created_at)) < 3) <span class="sticker">New</span>
                                        @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="/customer/type/{{$product->typecode}}">{{$product->type->typename}}
                                                </a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgRateNewProducts[$product->productcode])
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        @else
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        @endif
                                                        @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/customer/product-details/{{$product->productcode}}">{{$product->productname}}
                                            </a>
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
                <!-- Li's Section Area End Here -->
            </div>
        </div>
</section>
<section style="margin-top: 20px;" class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Top 10 sản phẩm giảm giá</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($bestDiscountProducts as $product)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/customer/product-details/{{$product->productcode}}">
                                        <img src="{{$product->picturelink}}" alt="Li's Product Image">
                                    </a>
                                    @if (now()->diffInDays(\Carbon\Carbon::parse($product->created_at)) < 3) <span class="sticker">New</span>
                                        @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="/customer/type/{{$product->typecode}}">{{$product->type->typename}}
                                                </a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgBestDiscountProducts[$product->productcode])
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        @else
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        @endif
                                                        @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/customer/product-details/{{$product->productcode}}">{{$product->productname}}
                                            </a>
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
                <!-- Li's Section Area End Here -->
            </div>
        </div>
</section>
<div class="li-static-home">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <!-- Begin Li's Static Home Image Area -->
                <div class="li-static-home-image"></div>
                <!-- Li's Static Home Image Area End Here -->
                <!-- Begin Li's Static Home Content Area -->
                <div class="li-static-home-content">
                    <p>Giảm giá khủng<span> -40%</span> hiện tại</p>
                    <h2>Nhiều Sản Phẩm</h2>
                    <h2>Mới Trong 2023</h2>
                    <div class="mt-4 default-btn">
                        <a href="/customer/product-list" class="links">Mua ngay</a>
                    </div>
                </div>
                <!-- Li's Static Home Content Area End Here -->
            </div>
        </div>
    </div>
</div>
<section style="margin-top: 20px;" class="product-area li-laptop-product li-trendding-products best-sellers pb-45">
    <div class="container">
        <div class="row">
            <!-- Begin Li's Section Area -->
            <div class="col-lg-12">
                <div class="li-section-title">
                    <h2>
                        <span>Top 10 sản phẩm bán chạy</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($bestSellerProducts as $product)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/customer/product-details/{{$product->productcode}}">
                                        <img src="{{$product->picturelink}}" alt="Li's Product Image">
                                    </a>
                                    @if (now()->diffInDays(\Carbon\Carbon::parse($product->created_at)) < 3) <span class="sticker">New</span>
                                        @endif
                                </div>
                                <div class="product_desc">
                                    <div class="product_desc_info">
                                        <div class="product-review">
                                            <h5 class="manufacturer">
                                                <a href="/customer/type/{{$product->typecode}}">{{$product->type->typename}}
                                                </a>
                                            </h5>
                                            <div class="rating-box">
                                                <ul class="rating">
                                                    @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgBestSellerProducts[$product->productcode])
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        @else
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        @endif
                                                        @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name" href="/customer/product-details/{{$product->productcode}}">{{$product->productname}}
                                            </a>
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
                <!-- Li's Section Area End Here -->
            </div>
        </div>
</section>
@endsection
@section('quickView')
@foreach($newProducts as $product)
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
                                        @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgRateNewProducts[$product->
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
@foreach($bestSellerProducts as $product)
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
                                        @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgBestSellerProducts[$product->
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
                                                <input class="cart-plus-minus-box" name="quantity" value="1" type="text">
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
@foreach($bestDiscountProducts as $product)
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
                                        @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgBestDiscountProducts[$product->
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
                                                <input class="cart-plus-minus-box" name="quantity" value="1" type="text">
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
<script>
    if (!confirm(
            'Đơn vị triển khai (Nguyễn Hữu Tài và Hà Quang Thinh) xin thông báo:\nTrang thương mại điện tử này đang ở trang thái demo, mọi chức năng đều mang tính chất thử nghiệm (kể cả chức năng thanh toán trực tuyến bằng VNPay) và không nhằm mục đích thương mại.\nTrong trường hợp bạn muốn thử nghiệm chức năng thanh toán trực tuyến VNPay, có thể sử dụng thẻ test do VNPay cung cấp trong liên kết:\nhttps://sandbox.vnpayment.vn/apis/vnpay-demo/\nTuyệt đối không sử dụng thẻ thật để thực hiện thanh toán trực tuyến trên website của chúng tôi. Nếu bạn bỏ qua cảnh báo này đồng nghĩa với việc bạn chịu trách nhiệm hoàn toàn với hành động của mình. Xin cảm ơn!'
        )) {
        location.reload();
    }
</script>
@endsection