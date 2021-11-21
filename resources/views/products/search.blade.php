<x-main-layout>
    <div class="page-header mt-30 mb-50">
        <div class="container">
            <div class="archive-header">
                <div class="row align-items-center">
                    <div class="col-xl-3">
                        <h1 class="mb-15"> Search Result </h1>
                        <div class="breadcrumb">
                            <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                            <span></span> Shop <span></span> Search
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container mb-30">
        <div class="row">
            <div class="col-12">
                <div class="shop-product-fillter">
                    <div class="totall-product">
                        <p>We found <strong class="text-brand">{{ $products->count() }}</strong> items for you!
                        </p>
                    </div>
                </div>
                <div class="row product-grid">
                    @foreach ($products as $product)
                        <div class="col-lg-1-5 col-md-4 col-12 col-sm-6">
                            <div class="product-cart-wrap mb-30">
                                <div class="product-img-action-wrap">
                                    <div class="product-img product-img-zoom">
                                        <a href="{{ route('product.show', $product->slug) }}">
                                            <img class="default-img" src="{{ $product->image }}" alt="" />
                                            <img class="hover-img" src="{{ $product->image }}" alt="" />
                                        </a>
                                    </div>
                                    <div class="product-badges product-badges-position product-badges-mrg">
                                        <span class="hot">Hot</span>
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
            </div>
        </div>
    </div>
</x-main-layout>
