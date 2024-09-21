@extends('customer.main')
@section('insertView')
<div class="content-wraper">
    <div class="container">
        <div class="row single-product-area">
            <div class="col-lg-5 col-md-6">
                <!-- Product Details Left -->
                <div class="product-details-left">
                    <div class="product-details-images slider-navigation-1 slick-initialized slick-slider">
                        <div aria-live="polite" class="slick-list draggable">
                            <div class="lg-image slick-slide slick-current slick-active" data-slick-index="0"
                                aria-hidden="false" tabindex="-1" role="option" aria-describedby="slick-slide00"
                                style="width: 470px;">
                                <a class="popup-img venobox vbox-item" href="{{$product->picturelink}}"
                                    data-gall="myGallery" tabindex="0">
                                    <img src="{{$product->picturelink}}" alt="product image">
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
                <!--// Product Details Left -->
            </div>

            <div class="col-lg-7 col-md-6">
                <div class="product-details-view-content pt-60">
                    <div class="product-info">
                        <h2>Sản phẩm: {{$product->productname}}</h2>
                        <a href="/customer/type/{{$product->typecode}}" class="product-details-ref">Phân loại:
                            {{$product->type->typename}}</a>
                        <div class="rating-box pt-20">
                            <ul class="rating rating-with-review-item">
                                @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgProduct[$product->
                                    productcode])
                                    <li><i class="fa fa-star-o"></i></li>
                                    @else
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    @endif
                                    @endfor
                                    <br>
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
                                        <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
                                    </div>
                                </div>
                                @csrf
                                <button class="add-to-cart" type="submit">Thêm vào giỏ</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="product-area pt-35">
    <div class="container">
        <div class="row">
            <div class="col-lg-12">
                <div class="li-product-tab">
                    <ul class="nav li-product-menu">
                        <li><a style="font-family: 'Quicksand', sans-serif;" data-toggle="tab"
                                href="#description"><span>Mô tả chi tiết<table></table>
                                </span></a></li>
                        <li><a style="font-family: 'Quicksand', sans-serif;" data-toggle="tab" href="#reviews"
                                class="active show"><span>Đánh giá của người
                                    mua ({{$assessments->count()}})</span></a></li>
                    </ul>
                </div>
                <!-- Begin Li's Tab Menu Content Area -->
            </div>
        </div>
        <div class="tab-content">
            <div id="description" class="tab-pane" role="tabpanel">
                <div class="product-description">
                    <span>{!!nl2br($product->description) !!}</span>
                </div>
            </div>
            <div id="reviews" class="tab-pane active show" role="tabpanel">
                <div class="product-reviews">
                    <div class="product-details-comment-block">
                        <div class="comment-review">
                            <span>Tổng sao đánh giá: </span>
                            <ul class="rating">
                                @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgProduct[$product->
                                    productcode])
                                    <li><i class="fa fa-star-o"></i></li>
                                    @else
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    @endif
                                    @endfor
                            </ul>
                        </div>
                        @foreach($assessments as $assessment)
                        <div class="comment-author-infos pt-25">
                            <span>Khách hành: {{$assessment->customer->username}}</span>
                            <ul class="rating">
                                @for ($i = 1; $i <= 5; $i++) @if($i <=$assessment->rate)
                                    <li><i class="fa fa-star-o"></i></li>
                                    @else
                                    <li class="no-star"><i class="fa fa-star-o"></i></li>
                                    @endif
                                    @endfor
                            </ul>
                            <em>Đăng ngày: {{$assessment->created_at}}</em>
                            <p>{{$assessment->content}}</p>
                        </div>
                        @endforeach
                        @if(Auth::check())
                        <a class="mt-3 review-links" href="#" data-toggle="modal" data-target="#mymodal">Viết đánh
                            giá</a>
                        @else
                        <a class="mt-3 review-links" href="/login">Đăng nhập để đánh giá</a>
                        @endif
                        <!-- Begin Quick View | Modal Area -->
                        <div class="modal fade modal-wrapper" id="mymodal">
                            <div class="modal-dialog modal-dialog-centered" role="document">
                                <div class="modal-content">
                                    <div class="modal-body">
                                        <h3 class="review-page-title">Viết đánh giá sản phẩm</h3>
                                        <div class="modal-inner-area row">
                                            <div class="col-lg-6">
                                                <div class="li-review-product">
                                                    <img src="{{$product->picturelink}}" alt="Li's Product">
                                                    <div class="li-review-product-desc">
                                                        <p class="li-product-name">Sản phẩm: {{$product->productname}}
                                                        </p>
                                                        <p>
                                                            <span>Mô tả: <br> {!! nl2br($product->description)
                                                                !!}</span>
                                                        </p>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="col-lg-6">
                                                <div class="li-review-content">
                                                    <!-- Begin Feedback Area -->
                                                    <div class="feedback-area">
                                                        <div class="feedback">
                                                            <h3 class="feedback-title">Đánh giá sản phẩm</h3>
                                                            <form id="form_post_assessment">
                                                                <p class="your-opinion">
                                                                    <label>Sao:</label>
                                                                    <select name="rate" id="">
                                                                        <option value="1">1 ⭐</option>
                                                                        <option value="2">2 ⭐</option>
                                                                        <option value="3">3 ⭐</option>
                                                                        <option value="4">4 ⭐</option>
                                                                        <option value="5">5 ⭐</option>
                                                                    </select>
                                                                </p>
                                                                <p class="feedback-form">
                                                                    <label for="feedback">Nội dung: <span
                                                                            class="required">*</label>
                                                                    <textarea id="feedback" name="content" cols="45"
                                                                        rows="8" aria-required="true"></textarea>
                                                                </p>
                                                                <div class="feedback-input">
                                                                    <p class="feedback-form-author">
                                                                        <label for="author">Tên người dùng: <span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <input id="author" name="username"
                                                                            value="{{Auth::check() ? Auth::user()->username : ''}}"
                                                                            size="30" aria-required="true" type="text"
                                                                            readonly>
                                                                    </p>
                                                                    <p class="feedback-form-author feedback-form-email">
                                                                        <label for="email">Email: <span
                                                                                class="required">*</span>
                                                                        </label>
                                                                        <input id="email" name="email"
                                                                            value="{{Auth::check() ?Auth::user()->email : ''}}"
                                                                            size="30" aria-required="true" type="text"
                                                                            disabled>
                                                                    </p>
                                                                    <div class="feedback-btn pb-15">
                                                                        <a href="#" class="close" data-dismiss="modal"
                                                                            aria-label="Close">Đóng</a>
                                                                        <a href="#" id="submit_assessment">Đăng</a>
                                                                    </div>
                                                                    <span class="required"><sub>*</sub> Lưu ý: Nếu bạn
                                                                        chưa mua sản phẩm này lần nào, đánh giá của bạn
                                                                        sẽ bị từ chối!</span>
                                                                </div>
                                                                <input type="hidden" name="productcode"
                                                                    value="{{$product->productcode}}">
                                                                <input type="hidden" name="customercode"
                                                                    value="{{Auth::check() ?Auth::user()->usercode : ''}}">
                                                            </form>
                                                        </div>
                                                    </div>
                                                    <!-- Feedback Area End Here -->
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <!-- Quick View | Modal Area End Here -->
                    </div>
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
                        <span>Những sản phẩm cùng phân loại</span>
                    </h2>
                </div>
                <div class="row">
                    <div class="product-active owl-carousel">
                        @foreach($sameTypeProducts as $product)
                        <div class="col-lg-12">
                            <!-- single-product-wrap start -->
                            <div class="single-product-wrap">
                                <div class="product-image">
                                    <a href="/customer/product-details/{{$product->productcode}}">
                                        <img src="{{$product->picturelink}}" alt="Li's Product Image">
                                    </a>
                                    @if (now()->diffInDays(\Carbon\Carbon::parse($product->created_at)) < 3) <span
                                        class="sticker">New</span>
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
                                                    @for ($i = 1; $i <= 5; $i++) @if($i
                                                        <=$avrgRateSameTypeProduct[$product->
                                                        productcode])
                                                        <li><i class="fa fa-star-o"></i></li>
                                                        @else
                                                        <li class="no-star"><i class="fa fa-star-o"></i></li>
                                                        @endif
                                                        @endfor
                                                </ul>
                                            </div>
                                        </div>
                                        <h4><a class="product_name"
                                                href="/customer/product-details/{{$product->productcode}}">{{$product->productname}}
                                            </a>
                                        </h4>
                                        <div class="price-box">
                                            <span
                                                class="new-price new-price-2">{{number_format($product->price*(100-$product->discount)/100)}}
                                                VND/{{$product->unit->unitname}}</span>
                                            <br>
                                            <span class="old-price">{{number_format($product->price)}}
                                                VND/{{$product->unit->unitname}}</span>
                                            <span class="discount-percentage">Giảm {{$product->discount}}%</span>
                                        </div>
                                    </div>
                                    <div class="add-actions">
                                        <ul class="add-actions-link">
                                            <li class="add-cart active"><a href="#"
                                                    onclick="addCart('/customer/add-carts?code={{$product->productcode}}&quantity=1')">Thêm
                                                    vào
                                                    giỏ</a></li>
                                            <li><a href="#" title="quick view" class="quick-view-btn"
                                                    data-toggle="modal"
                                                    data-target="#exampleModalCenter_{{$product->productcode}}"><i
                                                        class="fa fa-eye"></i></a></li>
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
@foreach($sameTypeProducts as $product)
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
                                        @for ($i = 1; $i <= 5; $i++) @if($i <=$avrgRateSameTypeProduct[$product->
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
                                                <div class="inc qtybutton"><i class="fa fa-angle-up"></i></div>
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
@section('fixjQuery')
<script>
$(document).ready(function() {
    $('.dec').click(function(e) {
        e.stopPropagation();

        var qty = $(this).parent().find(
            '.cart-plus-minus-box').val();
        if (qty > 1) {
            $(this).parent().find('.cart-plus-minus-box')
                .val(parseInt(qty) - 1);
        }
    });

    $('.inc').click(function(e) {
        e.stopPropagation();

        var qty = $(this).parent().find(
            '.cart-plus-minus-box').val();
        $(this).parent().find('.cart-plus-minus-box').val(
            parseInt(qty) + 1);
    });
});
</script>
@endsection