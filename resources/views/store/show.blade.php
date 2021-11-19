<x-main-layout>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Store <span></span> {{ $store->name }}
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="archive-header-3 mt-30 mb-80"
            style="background-image: url('https://live.staticflickr.com/3678/8986672784_bbf77b2aeb_b.jpg')">
            <div class="archive-header-3-inner">
                <div class="vendor-logo mr-50">
                    <img src="{{ $store->logo }}" alt="" />
                </div>
                <div class="vendor-content">
                    <h3 class="mb-5 text-white"><a href="{{ route('store.show', $store->slug) }}"
                            class="text-white">{{ $store->name }}</a></h3>
                    <div class="row">
                        <div class="col-lg-4">
                            <div class="vendor-des mb-15">
                                <p class="font-sm text-white">{!! nl2br(e($store->description)) !!}</p>
                            </div>
                        </div>
                        <div class="col-lg-3">
                            <div class="vendor-info text-white mb-15">
                                <ul class="font-sm">
                                    <li><img class="mr-5"
                                            src="{{ asset('assets/imgs/theme/icons/icon-location.svg') }}"
                                            alt="" /><strong>Address: </strong> <span>{{ $store->address }}</span>
                                    </li>
                                    <li><img class="mr-5"
                                            src="{{ asset('assets/imgs/theme/icons/icon-contact.svg') }}"
                                            alt="" /><strong>Call Us:</strong><span>{{ $store->phone }}</span></li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-lg-4">
                            <div class="follow-social">
                                <h6 class="mb-15 text-white">Follow Us</h6>
                                <ul class="social-network">
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset('assets/imgs/theme/icons/social-tw.svg') }}" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset('assets/imgs/theme/icons/social-fb.svg') }}" alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset('assets/imgs/theme/icons/social-insta.svg') }}"
                                                alt="" />
                                        </a>
                                    </li>
                                    <li class="hover-up">
                                        <a href="#">
                                            <img src="{{ asset('assets/imgs/theme/icons/social-pin.svg') }}"
                                                alt="" />
                                        </a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="row flex-row-reverse">
            <div class="col-lg-5-5">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ $store->products->count() }}</strong>
                            items for you!</p>
                    </div>
                </div>
                <div class="product-list mb-50">
                    @foreach ($store->products as $product)
                        <div class="product-cart-wrap">
                            <div class="product-img-action-wrap">
                                <div class="product-img product-img-zoom">
                                    <div class="product-img-inner">
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            <img class="default-img" src="{{ $product->image }}" alt="" />
                                            <img class="hover-img" src="{{ $product->image }}" alt="" />
                                        </a>
                                    </div>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <x-badge />
                                </div>
                            </div>
                            <div class="product-content-wrap">
                                <div class="product-category">
                                    <a
                                        href="{{ route('category.show', $product->category->slug) }}">{{ $product->category->name }}</a>
                                </div>
                                <h2><a href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                </h2>
                                <p class="mt-15 mb-15">
                                    {{ \Illuminate\Support\Str::limit($product->description, 200, '...') }}</p>

                                <div class="product-price">
                                    <span>Rp. {{ $product->price }} </span>
                                </div>

                                <div class="mt-30 d-flex align-items-center">
                                    <a aria-label="Buy now" class="btn" href="shop-cart.html"><i
                                            class="fi-rs-shopping-cart mr-5"></i>Add to Cart</a>
                                </div>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</x-main-layout>
