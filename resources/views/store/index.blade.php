<x-main-layout>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{route('home')}}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Store List
            </div>
        </div>
    </div>
    <div class="page-content pt-50">
        <div class="container">
            <div class="archive-header-2 text-center">
                <h1 class="display-2 mb-50">Store List</h1>
            </div>
            <div class="row mb-50">
                <div class="col-12 col-lg-8 mx-auto">
                    <div class="shop-product-fillter">
                        <div class="totall-product">
                            <p>We have <strong class="text-brand">{{ $stores->count() }}</strong> store now</p>
                        </div>
                    </div>
                </div>
            </div>

            <div class="row vendor-grid">
                @foreach ($stores as $store)
                    <div class="col-lg-3 col-md-6 col-12 col-sm-6">
                        <div class="vendor-wrap mb-40">
                            <div class="vendor-img-action-wrap">
                                <div class="vendor-img">
                                    <a href="{{ route('store.show', $store->slug) }}">
                                        <img class="default-img" src="{{ $store->logo }}" alt="" />
                                    </a>
                                </div>
                                <div class="product-badges product-badges-position product-badges-mrg">
                                    <span class="hot">Official</span>
                                </div>
                            </div>
                            <div class="vendor-content-wrap">
                                <div class="d-flex justify-content-between align-items-end mb-30">
                                    <div>
                                        <h4 class="mb-5"><a
                                                href="{{ route('store.show', $store->slug) }}">{{ $store->name }}</a>
                                        </h4>

                                    </div>

                                    <div class="mb-10">
                                        <span class="font-small total-product">{{ $store->products->count() }}
                                            products</span>
                                    </div>
                                </div>

                                <div class="vendor-info mb-30">
                                    <ul class="contact-infor text-muted">
                                        <li><img src="{{ asset('assets/imgs/theme/icons/icon-location.svg') }}"
                                                alt="" /><strong>Address:
                                            </strong> <span>{{ $store->address }}</span></li>
                                        <li><img src="{{ asset('assets/imgs/theme/icons/icon-contact.svg') }}"
                                                alt="" /><strong>Call
                                                Us:</strong><span>{{ $store->phone }}</span></li>
                                    </ul>
                                </div>
                                <a href="{{ route('store.show', $store->slug) }}" class="btn btn-xs">Visit Store
                                    <i class="fi-rs-arrow-small-right"></i></a>
                            </div>
                        </div>
                    </div>
                @endforeach
            </div>

        </div>
    </div>
</x-main-layout>
