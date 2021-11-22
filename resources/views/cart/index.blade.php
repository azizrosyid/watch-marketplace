@php
$total = 0;
@endphp
<x-main-layout>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Cart
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Your Cart</h1>
                <div class="d-flex justify-content-between">
                    <h6 class="text-body"></h6>
                    <h6 class="text-body"><a href="{{ route('cart.clear') }}" class="text-muted"><i
                                class="fi-rs-trash mr-5"></i>Clear Cart</a></h6>
                </div>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-8">
                <div class="table-responsive shopping-summery">
                    <table class="table table-wishlist">
                        <thead>
                            <tr class="main-heading">
                                <th class="custome-checkbox start pl-30"> </th>
                                <th scope="col" colspan="2">Product</th>
                                <th scope="col">Unit Price</th>
                                <th scope="col">Quantity</th>
                                <th scope="col">Subtotal</th>
                                <th scope="col" class="end">Remove</th>
                            </tr>
                        </thead>
                        <tbody>
                            @if (session('cart'))
                                @foreach (session('cart') as $id => $details)
                                    @php
                                        $total += $details['price'] * $details['quantity'];
                                    @endphp
                                    <tr class="pt-30">
                                        <td class="custome-checkbox pl-30"> </td>
                                        <td class="image product-thumbnail pt-40"><img src="{{ $details['image'] }}"
                                                alt="#"></td>
                                        <td class="product-des product-name">
                                            <h6 class="mb-5"><a class="product-name mb-10 text-heading"
                                                    href="{{ route('product.show', $details['slug']) }}">{{ $details['name'] }}</a>
                                            </h6>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <h4 class="text-body">{{ $details['price'] }}</h4>
                                        </td>
                                        <td class="text-center detail-info" data-title="Stock">
                                            <div class="detail-extralink mr-15">
                                                <div class="detail-qty border radius">

                                                    <span class="qty-val">{{ $details['quantity'] }}</span>

                                                </div>
                                            </div>
                                        </td>
                                        <td class="price" data-title="Price">
                                            <h4 class="text-brand">{{ $details['total_price'] }}</h4>
                                        </td>
                                        <td class="action text-center" data-title="Remove"><a
                                                href="{{ route('cart.remove', $id) }}" class="text-body"><i
                                                    class="fi-rs-trash"></i></a></td>
                                    </tr>
                                @endforeach
                            @else
                                <tr>
                                    <td colspan="7" class="text-center">
                                        <h4>No items in cart</h4>
                                    </td>
                                </tr>
                            @endif
                        </tbody>
                    </table>
                </div>
                <div class="divider-2 mb-30"></div>
                <div class="cart-action d-flex justify-content-between">
                    <a class="btn" href="{{ route('home') }}"><i
                            class="fi-rs-arrow-left mr-10"></i>Continue Shopping</a>
                </div>
            </div>
            <div class="col-lg-4">
                @if (session('cart'))
                    <div class="border p-md-4 cart-totals ml-30">
                        <div class="table-responsive">
                            <table class="table no-border">
                                <tbody>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Subtotal</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{ $total }}</h4>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Shipping</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h5 class="text-heading text-end">Free</h5>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Estimate for</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            @if (Auth::user()->address)
                                                <h5 class="text-heading text-end">{{ Auth::user()->address }}</h5>
                                            @else
                                                <h5 class="text-heading text-end">
                                                    <a href="{{ route('account.settings') }}"> Set your address</a>
                                                </h5>
                                            @endif
                                        </td>
                                    </tr>
                                    <tr>
                                        <td scope="col" colspan="2">
                                            <div class="divider-2 mt-10 mb-10"></div>
                                        </td>
                                    </tr>
                                    <tr>
                                        <td class="cart_total_label">
                                            <h6 class="text-muted">Total</h6>
                                        </td>
                                        <td class="cart_total_amount">
                                            <h4 class="text-brand text-end">{{ $total }}</h4>
                                        </td>
                                    </tr>
                                </tbody>
                            </table>
                        </div>
                        <a href="{{ route('checkout.index') }}" class="btn mb-20 w-100">Proceed To CheckOut<i
                                class="fi-rs-sign-out ml-15"></i></a>
                    </div>
                @endif
            </div>
        </div>
    </div>

</x-main-layout>
