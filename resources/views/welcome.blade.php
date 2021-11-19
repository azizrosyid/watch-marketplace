<x-main-layout>
    <section class="home-slider position-relative mb-30">
        <div class="home-slide-cover">
            <div class="hero-slider-1 style-4 dot-style-1 dot-style-1-position-1">
                @foreach ($banners as $banner)
                    <div class="single-hero-slider rectangle single-animation-wrap"
                        style="background-image: url({{ $banner->banner_image }})">
                    </div>
                @endforeach
            </div>
            <div class="slider-arrow hero-slider-1-arrow"></div>
        </div>
    </section>
    <!--End hero-->
    <div class="container mb-30">
        <div class="row">
            <div class="col-lg-5-5">
                <section class="product-tabs section-padding position-relative">
                    <div class="section-title style-2">
                        <h3>Popular Products</h3>
                    </div>
                    <!--End nav-tabs-->
                    <div class="tab-content" id="myTabContent">
                        <div class="tab-pane fade show active" id="tab-one" role="tabpanel" aria-labelledby="tab-one">
                            <div class="row product-grid-4">
                                @foreach ($products as $product)
                                    <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                                        <div class="product-cart-wrap mb-30">
                                            <div class="product-img-action-wrap">
                                                <div class="product-img product-img-zoom">
                                                    <a href="{{ route('product.show', $product->slug) }}">
                                                        <img class="default-img" src="{{ $product->image }}"
                                                            alt="" />
                                                        <img class="hover-img" src="{{ $product->image }}"
                                                            alt="" />
                                                    </a>
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
                                                <h2><a
                                                        href="{{ route('product.show', $product->slug) }}">{{ $product->name }}</a>
                                                </h2>
                                                <div class="product-rate-cover">
                                                    <x-rating />
                                                </div>
                                                <div>
                                                    <span class="font-small text-muted">By <a
                                                            href="{{ route('store.show', $product->store->slug) }}">{{ $product->store->name }}</a></span>
                                                </div>
                                                <div class="product-card-bottom">
                                                    <div class="product-price">
                                                        <span>Rp. {{ $product->price }}</span>
                                                    </div>
                                                    <div class="add-cart">
                                                        <a class="add" href="shop-cart.html"><i
                                                                class="fi-rs-shopping-cart mr-5"></i>Add </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                @endforeach
                            </div>
                            <!--End product-grid-4-->
                        </div>
                    </div>
                    <!--End tab-content-->
                </section>
                <!--Products Tabs-->
            </div>
        </div>
    </div>
</x-main-layout>
