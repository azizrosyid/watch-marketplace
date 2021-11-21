<x-main-layout>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> <a
                    href="{{ route('category.show', $product->category->slug) }}">{{ $product->category->name }}
                </a> <span></span>
                {{ $product->name }}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-xl-11 col-lg-12 m-auto">
                <div class="row">
                    <div class="col-xl-9">
                        <div class="product-detail accordion-detail">
                            <div class="row mb-50 mt-30">
                                <div class="col-md-6 col-sm-12 col-xs-12 mb-md-0 mb-sm-5">
                                    <div class="detail-gallery">
                                        <div class="product-image-slider">
                                            <figure class="border-radius-10">
                                                <img src="{{ $product->image }}" alt="product image" />
                                            </figure>
                                        </div>
                                    </div>
                                    <!-- End Gallery -->
                                </div>
                                <div class="col-md-6 col-sm-12 col-xs-12">
                                    <div class="detail-info pr-30 pl-30">
                                        <h2 class="title-detail">{{ $product->name }}</h2>
                                        <div class="product-detail-rating">
                                            <div class="product-rate-cover text-end">
                                                @php
                                                    $width = (rand(10, 50) / 10) * 20;
                                                @endphp
                                                <div class="product-rate d-inline-block">
                                                    <div class="product-rating" style="width: {{ $width }}%">
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="clearfix product-price-cover">
                                            <div class="product-price primary-color float-left">
                                                <span class="current-price text-brand" style="font-size: 40px">Rp.
                                                    {{ $product->price }}</span>
                                            </div>
                                        </div>
                                        <div class="detail-extralink mb-50">
                                            <div class="product-extra-link2">
                                                <form action="{{ route('cart.add', $product->id) }}" method="get">
                                                    <button type="submit" class="button button-add-to-cart"><i
                                                            class="fi-rs-shopping-cart"></i>Add to cart</button>
                                                </form>

                                            </div>
                                        </div>
                                    </div>
                                    <!-- Detail Info -->
                                </div>
                            </div>
                            <div class="product-info">
                                <div class="tab-style3">
                                    <div class="tab-content shop_info_tab entry-main-content" style="margin-top: 0">
                                        <div class="tab-pane fade show active" id="Description">
                                            <div class="">
                                                <p>{!! nl2br(e($product->description)) !!} </p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                        </div>
                    </div>
                    <div class="col-xl-3 primary-sidebar sticky-sidebar mt-30">
                        <div class="sidebar-widget widget-delivery mb-30 bg-grey-9 box-shadow-none">
                            @auth
                                <h5 class="section-title style-3 mb-20">Delivery</h5>
                                <ul>
                                    <li>
                                        <i class="fi fi-rs-marker mr-10 text-brand"></i>
                                        @if (auth()->user()->address)
                                            <span>
                                                {{ auth()->user()->address }}
                                            </span>
                                        @else
                                            <span>
                                                Please add your address
                                            </span>
                                        @endif
                                        <a href="{{ route('account.settings') }}" class="change float-end">Change</a>
                                    </li>
                                    <li class="hr"><span></span></li>
                                </ul>
                            @endauth
                            <h5 class="section-title style-3 mb-20">Return & Warranty</h5>
                            <ul>
                                <li>
                                    <i class="fi fi-rs-shield-check mr-10 text-brand"></i>
                                    <span> 100% Authentic </span>
                                </li>
                                <li>
                                    <i class="fi fi-rs-time-forward-ten mr-10 text-brand"></i>
                                    <span> 10 Days Return </span>
                                </li>
                                <li>
                                    <i class="fi fi-rs-diploma mr-10 text-brand"></i>
                                    <span> 12 Months Warranty </span>
                                </li>
                            </ul>
                        </div>
                        <div class="sidebar-widget widget-vendor mb-30 bg-grey-9 box-shadow-none">
                            <h5 class="section-title style-3 mb-20">Seller</h5>
                            <div class="vendor-logo d-flex mb-30">
                                <img src="{{ $product->store->logo }}" style="max-width: 50px; object-fit: contain"
                                    alt="" />
                                <div class="vendor-name ml-15">
                                    <h6>
                                        <a href="{{ $product->store->slug }}">{{ $product->store->name }}</a>
                                    </h6>
                                    <div class="product-rate-cover text-end">
                                        <div class="product-rate d-inline-block">
                                            <div class="product-rating" style="width: {{ $width }}%"></div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <ul class="contact-infor">
                                <li><img src="{{ asset('assets/imgs/theme/icons/icon-location.svg') }}"
                                        alt="" /><strong>Address:
                                    </strong> <span>{{ $product->store->address }}</span>
                                </li>
                                <li><img src="{{ asset('assets/imgs/theme/icons/icon-contact.svg') }}"
                                        alt="" /><strong>Contact
                                        Seller:</strong><span>{{ $product->store->phone }}</span></li>
                                <li class="hr"><span></span></li>
                            </ul>
                            <div class="d-flex justify-content-between">
                                <div>
                                    <p class="text-brand font-xs">Rating</p>
                                    <h4 class="mb-0">92%</h4>
                                </div>
                                <div>
                                    <p class="text-brand font-xs">Ship on time</p>
                                    <h4 class="mb-0">100%</h4>
                                </div>
                                <div>
                                    <p class="text-brand font-xs">Chat response</p>
                                    <h4 class="mb-0">89%</h4>
                                </div>
                            </div>
                            <ul>
                                <li class="hr"><span></span></li>
                            </ul>
                            <p>Become a Store? <a href="{{ route('seller.register') }}"> Register now</a></p>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
