<!DOCTYPE html>
<html class="no-js" lang="en">

<head>
    <meta charset="utf-8" />
    <title>Watcher</title>
    <meta http-equiv="x-ua-compatible" content="ie=edge" />
    <meta name="description" content="" />
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <meta name="viewport" content="width=device-width, initial-scale=1" />
    <meta property="og:title" content="" />
    <meta property="og:type" content="" />
    <meta property="og:url" content="" />
    <meta property="og:image" content="" />
    <!-- Favicon -->
    <link rel="shortcut icon" type="image/x-icon" href="{{ asset('assets/imgs/theme/Icon.png') }}" />
    <!-- Template CSS -->
    <link rel="stylesheet" href="{{ asset('assets/css/main.css') }}" />
</head>

<body>
    <header class="header-area header-style-1 header-height-2">
        <div class="header-middle header-middle-ptb-1 d-none d-lg-block">
            <div class="container">
                <div class="header-wrap">
                    <div class="logo logo-width-1">
                        <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/theme/Icon.png') }}"
                                style="object-fit: contain" height="50px" alt="logo" /></a>
                    </div>
                    <div class="header-right">
                        <div class="search-style-2">
                            <form action="{{ route('products.search') }}" method="get">
                                <input type="text" style="max-width: none; width: 100%" name="query"
                                    placeholder="Search for items..." />
                            </form>
                        </div>
                        <div class="header-action-right">
                            <div class="header-action-2">
                                {{-- if auth show --}}
                                @if (Auth::check())
                                    <div class="header-action-icon-2">
                                        <a class="mini-cart-icon" href="{{ route('cart.index') }}">
                                            <img alt="Nest"
                                                src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                            <span
                                                class="pro-count blue">{{ session()->has('cart') ? collect(session()->get('cart'))->sum('quantity') : '0' }}</span>
                                        </a>
                                        <a href="{{ route('cart.index') }}"><span
                                                class="lable">Cart</span></a>
                                        @if (session()->has('cart'))
                                            <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                                <ul>
                                                    @php
                                                        $total = 0;
                                                    @endphp
                                                    @foreach (session('cart') as $id => $details)
                                                        @php
                                                            $total += $details['price'] * $details['quantity'];
                                                        @endphp
                                                        <li>
                                                            <div class="shopping-cart-img">
                                                                <a
                                                                    href="{{ route('product.show', $details['slug']) }}"><img
                                                                        alt="{{ $details['name'] }}"
                                                                        src="{{ $details['image'] }}" /></a>
                                                            </div>
                                                            <div class="shopping-cart-title">
                                                                <h4><a
                                                                        href="{{ route('product.show', $details['slug']) }}">{{ $details['name'] }}</a>
                                                                </h4>
                                                                <h4><span>{{ $details['quantity'] }} ×
                                                                    </span>{{ $details['price'] }}</h4>
                                                            </div>
                                                            <div class="shopping-cart-delete">
                                                                <a href="{{ route('cart.remove', $id) }}"><i
                                                                        class="fi-rs-cross-small"></i></a>
                                                            </div>
                                                        </li>
                                                    @endforeach
                                                </ul>
                                                <div class="shopping-cart-footer">
                                                    <div class="shopping-cart-total">
                                                        <h4>Total <span>{{ $total }}</span></h4>
                                                    </div>
                                                    <div class="shopping-cart-button">
                                                        <a href="{{ route('cart.index') }}"
                                                            class="outline">View
                                                            cart</a>
                                                        <a href="shop-checkout.html">Checkout</a>
                                                    </div>
                                                </div>
                                            </div>
                                        @endif

                                    </div>
                                @endif
                                <div class="header-action-icon-2">
                                    <a href="page-account.html">
                                        <img class="svgInject" alt="Nest"
                                            src="{{ asset('assets/imgs/theme/icons/icon-user.svg') }}" />
                                    </a>
                                    <a href="{{ Auth::check() ? route('account.index') : route('login') }}"><span
                                            class="lable ml-0">Account</span></a>
                                    <div class="cart-dropdown-wrap cart-dropdown-hm2 account-dropdown">
                                        <ul>
                                            @if (Auth::check())
                                                <li><a href="{{ route('account.index') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>My
                                                        Account</a></li>
                                                <li><a href="{{ route('account.orders') }}"><i
                                                            class="fi fi-rs-location-alt mr-10"></i>Order Tracking</a>
                                                </li>
                                                <li><a href="{{ route('account.settings') }}"><i
                                                            class="fi fi-rs-settings-sliders mr-10"></i>Setting</a></li>
                                                <li><a href="{{ route('logout') }}"><i
                                                            class="fi fi-rs-sign-out mr-10"></i>Sign
                                                        out</a></li>
                                            @else
                                                <li><a href="{{ route('login') }}"><i
                                                            class="fi fi-rs-sign-in mr-10"></i>Sign
                                                        in</a></li>
                                                <li><a href="{{ route('register') }}"><i
                                                            class="fi fi-rs-user mr-10"></i>Register</a>
                                                </li>
                                            @endif
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="header-bottom header-bottom-bg-color sticky-bar">
            <div class="container">
                <div class="header-wrap header-space-between position-relative">
                    <div class="logo logo-width-1 d-block d-lg-none">
                        <a href="{{ route('login') }}"><img src="{{ asset('assets/imgs/theme/Icon.png') }}"
                                style="object-fit: contain" height="50px" alt="logo" /></a>
                    </div>
                    <div class="header-nav d-none d-lg-flex">
                        <div class="main-categori-wrap d-none d-lg-block">
                            <a class="categories-button-active" href="#">
                                <span class="fi-rs-apps"></span> <span class="et">Browse</span> All
                                Categories
                                <i class="fi-rs-angle-down"></i>
                            </a>
                            <div class="categories-dropdown-wrap categories-dropdown-active-large font-heading">
                                <div class="d-flex categori-dropdown-inner" style="min-width: fit-content">
                                    <ul>
                                        @php
                                            $categories = App\Models\Category::all();
                                            // divide the categories into two columns
                                            $categories = $categories->chunk(ceil($categories->count() / 2));
                                        @endphp
                                        {{-- first column --}}
                                        @foreach ($categories[0] as $category)
                                            <li>
                                                <a href="{{ route('category.show', ['slug' => $category->slug]) }}">
                                                    <img src="{{ $category->image }}"
                                                        alt="" />{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                    <ul class="end">
                                        @foreach ($categories[1] as $category)
                                            <li>
                                                <a href="{{ route('category.show', ['slug' => $category->slug]) }}">
                                                    <img src="{{ $category->image }}"
                                                        alt="" />{{ $category->name }}</a>
                                            </li>
                                        @endforeach
                                    </ul>
                                </div>
                            </div>
                        </div>
                        <div class="main-menu main-menu-padding-1 main-menu-lh-2 d-none d-lg-block font-heading">
                            <nav>
                                <ul>
                                    <li class="hot-deals "><img
                                            src="{{ asset('assets/imgs/theme/icons/icon-hot.svg') }}"
                                            alt="hot deals" /><a href="{{ route('products.hot') }}"
                                            class="{{ Route::is('products.hot') ? 'active' : '' }}"">Hot Deals</a>
                                    </li>
                                    <li>
                                        <a class="
                                            
                                            
                                            
                                            
                                            
                                            
                                                                      {{ Route::is('home') ? 'active' : '' }}"
                                            href="{{ route('home') }}">Home</a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::is('store.index') ? 'active' : '' }}"
                                            href="{{ route('store.index') }}">Seller</a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::is('about') ? 'active' : '' }}" href="#">About</a>
                                    </li>
                                    <li>
                                        <a class="{{ Route::is('contacts') ? 'active' : '' }}" href="#">Contact</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div>
                    <div class="header-action-icon-2 d-block d-lg-none">
                        <div class="burger-icon burger-icon-white">
                            <span class="burger-icon-top"></span>
                            <span class="burger-icon-mid"></span>
                            <span class="burger-icon-bottom"></span>
                        </div>
                    </div>
                    <div class="header-action-right d-block d-lg-none">
                        <div class="header-action-2">
                            <div class="header-action-icon-2">
                                @auth
                                    <a class="mini-cart-icon" href="{{ route('cart.index') }}">
                                        <img alt="Nest" src="{{ asset('assets/imgs/theme/icons/icon-cart.svg') }}" />
                                        <span
                                            class="pro-count blue">{{ session()->has('cart') ? collect(session()->get('cart'))->sum('quantity') : '0' }}</span>
                                    </a>
                                    @if (session()->has('cart'))
                                        <div class="cart-dropdown-wrap cart-dropdown-hm2">
                                            <ul>
                                                @php
                                                    $total = 0;
                                                @endphp
                                                @foreach (session('cart') as $id => $details)
                                                    @php
                                                        $total += $details['price'] * $details['quantity'];
                                                    @endphp
                                                    <li>
                                                        <div class="shopping-cart-img">
                                                            <a href="{{ route('product.show', $details['slug']) }}"><img
                                                                    alt="{{ $details['name'] }}"
                                                                    src="{{ $details['image'] }}" /></a>
                                                        </div>
                                                        <div class="shopping-cart-title">
                                                            <h4><a
                                                                    href="{{ route('product.show', $details['slug']) }}">{{ $details['name'] }}</a>
                                                            </h4>
                                                            <h4><span>{{ $details['quantity'] }} ×
                                                                </span>{{ $details['price'] }}</h4>
                                                        </div>
                                                        <div class="shopping-cart-delete">
                                                            <a href="{{ route('cart.remove', $id) }}"><i
                                                                    class="fi-rs-cross-small"></i></a>
                                                        </div>
                                                    </li>
                                                @endforeach
                                            </ul>
                                            <div class="shopping-cart-footer">
                                                <div class="shopping-cart-total">
                                                    <h4>Total <span>{{ $total }}</span></h4>
                                                </div>
                                                <div class="shopping-cart-button">
                                                    <a href="{{ route('cart.index') }}">View cart</a>
                                                    <a href="shop-checkout.html">Checkout</a>
                                                </div>
                                            </div>
                                        </div>
                                    @endif
                                @endauth
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <div class="mobile-header-active mobile-header-wrapper-style">
        <div class="mobile-header-wrapper-inner">
            <div class="mobile-header-top">
                <div class="mobile-header-logo">
                    <a href="{{ route('home') }}"><img src="{{ asset('assets/imgs/theme/Icon.png') }}"
                            style="object-fit: contain" height="50px" alt="logo" /></a>
                </div>
                <div class="mobile-menu-close close-style-wrap close-style-position-inherit">
                    <button class="close-style search-close">
                        <i class="icon-top"></i>
                        <i class="icon-bottom"></i>
                    </button>
                </div>
            </div>
            <div class="mobile-header-content-area">
                <div class="mobile-search search-style-3 mobile-header-border">
                    <form action="{{ route('products.search') }}" method="get">
                        @csrf
                        <input type="text" name="query" required />
                        <button type="submit"><i class="fi-rs-search"></i></button>
                    </form>
                </div>
                <div class="mobile-menu-wrap mobile-header-border">
                    <!-- mobile menu start -->
                    <nav>
                        <ul class="mobile-menu font-heading">
                            <li class="menu-item-has-children">
                                <a href="{{ route('home') }}">Home</a>
                            </li>
                            <li class="menu-item-has-children">
                                <a href="{{ route('store.index') }}">Store</a>
                            </li>
                        </ul>
                    </nav>
                    <!-- mobile menu end -->
                </div>
                <div class="mobile-header-info-wrap">
                    <div class="single-mobile-header-info">
                        <a href="{{ route('login') }}"><i class="fi-rs-user"></i>Log In / Sign Up </a>
                    </div>
                </div>
                <div class="mobile-social-icon mb-50">
                    <h6 class="mb-15">Follow Us</h6>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                            alt="" /></a>
                    <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                            alt="" /></a>
                </div>
                <div class="site-copyright">Copyright 2021 © Watcher. All rights reserved. </div>
            </div>
        </div>
    </div>
    <!--End header-->
    <main class="main pages">
        {{ $slot }}
    </main>
    <footer class="main">
        <section class="newsletter mb-15">
            <div class="container">
                <div class="row">
                    <div class="col-lg-12">
                        <div class="position-relative newsletter-inner">
                            <div class="newsletter-content">
                                <h2 class="mb-20">
                                    Stay home & get your watch <br />
                                    from our Marketplace
                                </h2>
                                <p class="mb-45">Start You'r Shopping with <span
                                        class="text-brand">Watcher</span></p>
                                <form class="form-subcriber d-flex">
                                    <input type="email" placeholder="Your emaill address" />
                                    <button class="btn" type="submit">Subscribe</button>
                                </form>
                            </div>
                            <img src="https://static.wixstatic.com/media/2cd43b_70674f11a01e43f19366ee72aee4b8bb~mv2.png/v1/fill/w_320,h_507,q_90/2cd43b_70674f11a01e43f19366ee72aee4b8bb~mv2.png"
                                alt="newsletter" />
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="featured section-padding">
            <div class="container">
                <div class="row">
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 mb-md-4 mb-xl-0">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/imgs/theme/icons/icon-1.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Banyak Promo Menarik</h3>
                                <p>Hingga 100 ribu</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/imgs/theme/icons/icon-2.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Gratis Ongkir</h3>
                                <p>Ke seluruh Indonesia</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/imgs/theme/icons/icon-3.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Promo Menarik</h3>
                                <p>Banyak Promo</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/imgs/theme/icons/icon-4.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Banyak Produk Tersedia</h3>
                                <p>Semua Discount</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/imgs/theme/icons/icon-5.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Mendukung COD</h3>
                                <p>Pembayaran saat barang diterima</p>
                            </div>
                        </div>
                    </div>
                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6 d-xl-none">
                        <div class="banner-left-icon d-flex align-items-center wow fadeIn animated">
                            <div class="banner-icon">
                                <img src="{{ asset('assets/imgs/theme/icons/icon-6.svg') }}" alt="" />
                            </div>
                            <div class="banner-text">
                                <h3 class="icon-box-title">Pengiriman Cepat</h3>
                                <p>Satu hari sampai</p>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <section class="section-padding footer-mid">
            <div class="container pt-15 pb-20">
                <div class="row">
                    <div class="col">
                        <div class="widget-about font-md mb-md-3 mb-lg-3 mb-xl-0">
                            <div class="logo mb-30">
                                <a href="{{ route('login') }}" class="mb-15"><img
                                        src="{{ asset('assets/imgs/theme/Icon.png') }}" style="object-fit: contain"
                                        height="50px" alt="logo" /></a>
                                <p class="font-lg text-heading">Tempat Jual Beli Jam</p>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{ asset('assets/imgs/theme/icons/icon-location.svg') }}"
                                        alt="" /><strong>Address:
                                    </strong> <span>Indonesia</span></li>
                                <li><img src="{{ asset('assets/imgs/theme/icons/icon-contact.svg') }}"
                                        alt="" /><strong>Call Us:
                                    </strong><span>08123456789</span></li>
                                <li><img src="{{ asset('assets/imgs/theme/icons/icon-email-2.svg') }}"
                                        alt="" /><strong>Email:
                                    </strong><span>watcher@gmail.com</span></li>
                            </ul>
                        </div>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Company</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">About Us</a></li>
                            <li><a href="#">Delivery Information</a></li>
                            <li><a href="#">Privacy Policy</a></li>
                            <li><a href="#">Terms &amp; Conditions</a></li>
                            <li><a href="#">Contact Us</a></li>
                            <li><a href="#">Support Center</a></li>
                            <li><a href="#">Careers</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget col">
                        <h4 class="widget-title">Account</h4>
                        <ul class="footer-list mb-sm-5 mb-md-0">
                            <li><a href="#">Sign In</a></li>
                            <li><a href="#">View Cart</a></li>
                            <li><a href="#">My Wishlist</a></li>
                            <li><a href="#">Track My Order</a></li>
                            <li><a href="#">Help Ticket</a></li>
                            <li><a href="#">Shipping Details</a></li>
                            <li><a href="#">Compare products</a></li>
                        </ul>
                    </div>
                    <div class="footer-link-widget widget-install-app col">
                        <h4 class="widget-title">Install App</h4>
                        <p class="wow fadeIn animated">From App Store or Google Play</p>
                        <div class="download-app">
                            <a href="#" class="hover-up mb-sm-2 mb-lg-0"><img class="active"
                                    src="{{ asset('assets/imgs/theme/app-store.jpg') }}" alt="" /></a>
                            <a href="#" class="hover-up mb-sm-2"><img
                                    src="{{ asset('assets/imgs/theme/google-play.jpg') }}" alt="" /></a>
                        </div>
                    </div>
                </div>
            </div>
        </section>
        <div class="container pb-30">
            <div class="row align-items-center">
                <div class="col-12 mb-30">
                    <div class="footer-bottom"></div>
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6">
                    <p class="font-sm mb-0">&copy; 2021, <strong class="text-brand">Watcher</strong> <br />All
                        rights reserved</p>
                </div>
                <div class="col-xl-4 col-lg-6 text-center d-none d-xl-block">
                </div>
                <div class="col-xl-4 col-lg-6 col-md-6 text-end d-none d-md-block">
                    <div class="mobile-social-icon">
                        <h6>Follow Us</h6>
                        <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-facebook-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-twitter-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-instagram-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-pinterest-white.svg') }}"
                                alt="" /></a>
                        <a href="#"><img src="{{ asset('assets/imgs/theme/icons/icon-youtube-white.svg') }}"
                                alt="" /></a>
                    </div>
                </div>
            </div>
        </div>
    </footer>
    <!-- Preloader Start -->
    <div id="preloader-active">
        <div class="preloader d-flex align-items-center justify-content-center">
            <div class="preloader-inner position-relative">
                <div class="text-center">
                    <img src="https://flevix.com/wp-content/uploads/2019/07/Clock-Loading.gif" alt="" />
                </div>
            </div>
        </div>
    </div>
    <!-- Vendor JS-->
    <script src="{{ asset('assets/js/vendor/jquery-3.6.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/jquery-migrate-3.3.0.min.js') }}"></script>
    <script src="{{ asset('assets/js/vendor/bootstrap.bundle.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/slick.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.syotimer.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/wow.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery-ui.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/perfect-scrollbar.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/magnific-popup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/select2.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/waypoints.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/counterup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.countdown.min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/images-loaded.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/isotope.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/scrollup.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.vticker-min.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.theia.sticky.js') }}"></script>
    <script src="{{ asset('assets/js/plugins/jquery.elevatezoom.js') }}"></script>
    <!-- Template  JS -->
    <script src="{{ asset('assets/js/main.js') }}"></script>
    <script src="{{ asset('assets/js/shop.js') }}"></script>
</body>

</html>
