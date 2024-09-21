<!doctype html>
<html class="no-js" lang="zxx">

<!-- index28:48-->

<head>
    @include('customer.header')
</head>

<body>
    <div class="body-wrapper">
        <!-- Begin Header Area -->
        <header>
            <!-- Begin Header Top Area -->
            <div class="header-top">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Top Left Area -->
                        <div class="col-lg-3 col-md-4">
                            <div class="header-top-left">
                                <ul class="phone-wrap">
                                    <li><span>Zalo CSKH:</span><a href="#">0866860918</a></li>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Left Area End Here -->
                        <!-- Begin Header Top Right Area -->
                        <div class="col-lg-9 col-md-8">
                            <div class="header-top-right">
                                <ul class="ht-menu">
                                    <!-- Begin Setting Area -->
                                    <li>
                                        @if(!Auth::check())
                                        <div class="ht-setting-trigger"><span>Đăng nhập/ Đăng ký</span></div>
                                        <div class="setting ht-setting">
                                            <ul class="ht-setting-list">
                                                <li><a href="/login">Đăng nhập</a></li>
                                                <li><a href="/register">Đăng ký</a></li>
                                            </ul>
                                        </div>
                                        @else
                                        <div class="ht-setting-trigger"><span>Xin chào,
                                                {{Auth::user()->username}}</span></div>
                                        <div class="setting ht-setting">
                                            <ul class="ht-setting-list">
                                                <li><a href="/customer/change-password">Đổi mật khẩu</a></li>
                                                <li><a href="/customer/view-cart">Giỏ hàng của tôi</a></li>
                                                <li><a href="/customer/feedback">Phản hồi đơn hàng của tôi</a></li>
                                                <li><a href="/logout">Đăng xuất</a></li>
                                            </ul>
                                        </div>
                                        @endif
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <!-- Header Top Right Area End Here -->
                    </div>
                </div>
            </div>
            <!-- Header Top Area End Here -->
            <!-- Begin Header Middle Area -->
            <div class="header-middle pl-sm-0 pr-sm-0 pl-xs-0 pr-xs-0">
                <div class="container">
                    <div class="row">
                        <!-- Begin Header Logo Area -->
                        <div class="col-lg-3">
                            <div class="logo pb-sm-30 pb-xs-30">
                                <a href="/">
                                    <img width="100px" height="60px" src="/template/customer/images/logo.jpg" alt="">
                                </a>
                            </div>
                        </div>
                        <!-- Header Logo Area End Here -->
                        <!-- Begin Header Middle Right Area -->
                        <div class="col-lg-9 pl-0 ml-sm-15 ml-xs-15">
                            <!-- Begin Header Middle Searchbox Area -->
                            <form action="/customer/search" method="GET" class="hm-searchbox">
                                <select name="typecode" class="nice-select select-search-category">
                                    <option value="0">Tất cả</option>
                                    @foreach($types as $type)
                                    <option value="{{$type->typecode}}">{{$type->typename}}</option>
                                    @endforeach
                                </select>
                                <input type="text" name="keyword" placeholder="Nhập từ khóa tìm kiếm...">
                                <button class="li-btn" type="submit"><i class="fa fa-search"></i></button>
                            </form>
                            <!-- Header Middle Searchbox Area End Here -->
                            @if(!session()->has('carts'))
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <li class="hm-minicart">
                                        <div class="hm-minicart-trigger">
                                            <span class="item-icon"></span>
                                            <span class="item-text">0 VND
                                                <span class="cart-item-count">0</span>
                                            </span>
                                        </div>
                                        <span></span>
                                        <div class="minicart">
                                            <h6>Bạn chưa đăng nhập, hãy đăng nhập để sử dụng chức
                                                năng
                                                này</h6>
                                            <div class="minicart-button">
                                                <a href="/login" class="li-button li-button-fullwidth li-button-dark">
                                                    <span>Đăng nhập</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Header Mini Cart Area End Here -->
                                </ul>
                            </div>
                            @else
                            @if(session()->get('carts') == [])
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <li class="hm-minicart">
                                        <div class="hm-minicart-trigger">
                                            <span class="item-icon"></span>
                                            <span class="item-text">0 VND
                                                <span class="cart-item-count">0</span>
                                            </span>
                                        </div>
                                        <span></span>
                                        <div class="minicart">
                                            <p class="minicart-total">Tổng thanh toán: <span>0 VND</span></p>
                                            <div class="minicart-button">
                                                <a href="/customer/view-cart" class="li-button li-button-fullwidth li-button-dark">
                                                    <span>Xem giỏ hàng</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Header Mini Cart Area End Here -->
                                </ul>
                            </div>
                            @else
                            <div class="header-middle-right">
                                <ul class="hm-menu">
                                    <li class="hm-minicart">
                                        <div class="hm-minicart-trigger">
                                            <span class="item-icon"></span>
                                            <span class="item-text">{{number_format(session()->get('carts')['total'])}}
                                                VND
                                                <span class="cart-item-count">{{count(session()->get('carts')) - 1}}</span>
                                            </span>
                                        </div>
                                        <span></span>
                                        <div class="minicart">
                                            <ul class="minicart-product-list">
                                                @foreach(session()->get('carts') as $key => $productInCart)
                                                @if($key != 'total')
                                                <li>
                                                    <a href="/customer/product-details/{{$productInCart['info']->productcode}}" class="minicart-product-image">
                                                        <img src="{{$productInCart['info']->picturelink}}" alt="cart products">
                                                    </a>
                                                    <div class="minicart-product-details">
                                                        <h6><a href="/customer/product-details/{{$productInCart['info']->productcode}}">{{$productInCart['info']->productname}}</a>
                                                        </h6>
                                                        <span>{{number_format($productInCart['info']->price*(1-$productInCart['info']->discount/100))}}
                                                            x {{$productInCart['quantity']}}</span>
                                                    </div>
                                                    <button class="close" title="Xóa">
                                                        <a href="#" onclick="deleteCart('/customer/delete-cart?code={{$productInCart['info']->productcode}}')">
                                                            <i class="fa fa-close"></i></a>
                                                    </button>
                                                </li>
                                                @endif
                                                @endforeach

                                            </ul>
                                            <p class="minicart-total">Tổng thanh toán:
                                                <span>{{number_format(session()->get('carts')['total'])}}
                                                    VND</span>
                                            </p>
                                            <div class="minicart-button">
                                                <a href="/customer/view-cart" class="li-button li-button-fullwidth li-button-dark">
                                                    <span>Xem giỏ hàng</span>
                                                </a>
                                            </div>
                                        </div>
                                    </li>
                                    <!-- Header Mini Cart Area End Here -->
                                </ul>
                            </div>
                            @endif
                            @endif
                            <!-- Header Middle Right Area End Here -->
                        </div>
                    </div>
                </div>
                <!-- Header Middle Area End Here -->
                <!-- Begin Header Bottom Area -->
                <div class="header-bottom header-sticky d-none d-lg-block d-xl-block">
                    <div class="container">
                        <div class="row">
                            <div class="col-lg-12">
                                <!-- Begin Header Bottom Menu Area -->
                                <div class="hb-menu">
                                    <nav>
                                        <ul>
                                            <li class="dropdown-holder"><a class="purehealth_drop_menu" href="#">Trang</a>
                                                <ul class="hb-dropdown">
                                                    <li><a href="/">Trang chủ</a></li>
                                                    @if(Auth::check() )
                                                    <li><a href="/customer/view-order-list">Trang đơn hàng</a></li>
                                                    @endif
                                                    @if(Auth::check() && Auth::user()->role == 1)
                                                    <li><a href="/dashboard">Trang quản trị</a></li>
                                                    @endif
                                                </ul>
                                            </li>
                                            <li class="dropdown-holder"><a class="purehealth_drop_menu" href="#">Phân
                                                    loại</a>
                                                <ul class="hb-dropdown">
                                                    @foreach($types as $type)
                                                    <li><a href="/customer/type/{{$type->typecode}}">{{$type->typename}}</a>
                                                    </li>
                                                    @endforeach
                                                </ul>
                                            </li>
                                            <li class="dropdown-holder"><a class="purehealth_drop_menu" href="#">Tư vấn
                                                    công nghệ AI</a>
                                                <ul class="hb-dropdown">
                                                    <li><a href="{{$poelink}}">Tư vấn Poe (Sử dụng tài khoản google)</a>
                                                    </li>
                                                    <li><a href="/customer/chatbox">Tư vấn chatbox</a></li>
                                                </ul>
                                            </li>
                                            <li><a href="/customer/product-list">Tất cả sản phẩm</a></li>
                                            <li><a href="/customer/view-cart">Giỏ hàng</a></li>
                                            <li><a href="/customer/map">Bản đồ</a></li>
                                            <li><a href="/customer/policy">Chính sách đổi trả</a></li>
                                        </ul>
                                    </nav>
                                </div>
                                <!-- Header Bottom Menu Area End Here -->
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Header Bottom Area End Here -->
                <!-- Begin Mobile Menu Area -->
                <div class="mobile-menu-area d-lg-none d-xl-none col-12">
                    <div class="container">
                        <div class="row">
                            <div class="mobile-menu">
                            </div>
                        </div>
                    </div>
                </div>
                <!-- Mobile Menu Area End Here -->
        </header>
        @yield('insertView')
        @yield('paginate')
        <div class="footer">
            <!-- Begin Footer Static Top Area -->
            <div class="footer-static-top">
                <div class="container">
                    <!-- Begin Footer Shipping Area -->
                    <div class="footer-shipping pt-60 pb-55 pb-xs-25">
                        <div class="row">
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="/template/customer/images/shipping-icon/1.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>Dịch vụ giao hàng</h2>
                                        <p>Giao hàng nhanh, tận nơi và hoàn toàn miễn phí</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-sm-55 pb-xs-55">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="/template/customer/images/shipping-icon/2.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>Thanh toán an toàn</h2>
                                        <p>Thanh toán tiền mặt hoặc trực tuyến thông qua VNPay</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="/template/customer/images/shipping-icon/3.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>An toàn thực phẩm</h2>
                                        <p>Sản phẩm đã thông qua kiểm định an toàn thực phẩm</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                            <!-- Begin Li's Shipping Inner Box Area -->
                            <div class="col-lg-3 col-md-6 col-sm-6 pb-xs-30">
                                <div class="li-shipping-inner-box">
                                    <div class="shipping-icon">
                                        <img src="/template/customer/images/shipping-icon/4.png" alt="Shipping Icon">
                                    </div>
                                    <div class="shipping-text">
                                        <h2>Dịch vụ CSKH</h2>
                                        <p>Dịch vụ CSKH 24/7, giải đáp mọi thắc mắc của khách hàng</p>
                                    </div>
                                </div>
                            </div>
                            <!-- Li's Shipping Inner Box Area End Here -->
                        </div>
                    </div>
                    <!-- Footer Shipping Area End Here -->
                </div>
            </div>
            <!-- Footer Static Top Area End Here -->
            <!-- Begin Footer Static Middle Area -->
            <div class="footer-static-middle">
                <div class="container">
                    <div class="footer-logo-wrap pt-50 pb-35">
                        <div class="row">
                            <!-- Begin Footer Logo Area -->
                            <div style="margin-left: 7vw;" class="col-lg-4 col-md-6">
                                <ul style="margin-top: 10px;" class="des">
                                    <li>
                                        <span style="font-size: large;">Thông tin nhà cung cấp🍀:</span>
                                    </li>
                                    <li>
                                        <span>Đỉa chỉ: </span>
                                        Đường XXX/XX, Phường X, Quận X, Thành phố Hồ Chí Minh
                                    </li>
                                    <li>
                                        <span>Zalo CSKH: </span>
                                        <a href="#">0866860918</a>
                                    </li>
                                    <li>
                                        <span>Đỉa chỉ email: </span>
                                        <a href="mailto://purehealthtt@gmail.com">purehealthtt@gmail.com</a>
                                    </li>
                                </ul>
                            </div>
                            <!-- Footer Logo Area End Here -->
                            <!-- Begin Footer Block Area -->
                            <div style="margin-left: 8vw;" class="col-lg-4">
                                <div class="footer-block">
                                    <h3 class="footer-block-title">Theo dõi chúng tôi:</h3>
                                    <ul class="social-link">
                                        <li class="twitter">
                                            <a href="https://twitter.com/" data-toggle="tooltip" target="_blank" title="Twitter">
                                                <i class="fa fa-twitter"></i>
                                            </a>
                                        </li>
                                        <li class="rss">
                                            <a href="https://rss.com/" data-toggle="tooltip" target="_blank" title="RSS">
                                                <i class="fa fa-rss"></i>
                                            </a>
                                        </li>
                                        <li class="google-plus">
                                            <a href="https://www.plus.google.com/discover" data-toggle="tooltip" target="_blank" title="Google Plus">
                                                <i class="fa fa-google-plus"></i>
                                            </a>
                                        </li>
                                        <li class="facebook">
                                            <a href="https://www.facebook.com/" data-toggle="tooltip" target="_blank" title="Facebook">
                                                <i class="fa fa-facebook"></i>
                                            </a>
                                        </li>
                                        <li class="youtube">
                                            <a href="https://www.youtube.com/" data-toggle="tooltip" target="_blank" title="Youtube">
                                                <i class="fa fa-youtube"></i>
                                            </a>
                                        </li>
                                        <li class="instagram">
                                            <a href="https://www.instagram.com/" data-toggle="tooltip" target="_blank" title="Instagram">
                                                <i class="fa fa-instagram"></i>
                                            </a>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                            <!-- Footer Block Area End Here -->
                        </div>
                    </div>
                </div>
            </div>
            <!-- Footer Static Middle Area End Here -->
            <!-- Begin Quick View | Modal Area -->
            @yield('quickView')
        </div>
        @include('customer.footer')
        @yield('fixjQuery')
</body>

</html>