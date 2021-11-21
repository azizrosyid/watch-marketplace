<x-main-layout>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Shop
                <span></span> Checkout
            </div>
        </div>
    </div>
    <div class="container mb-80 mt-50">
        <div class="row">
            <div class="col-lg-8 mb-40">
                <h1 class="heading-2 mb-10">Checkout</h1>
            </div>
        </div>
        <div class="row">
            <div class="col-lg-7">
                <div class="row">
                    <h4 class="mb-30">Billing Details</h4>
                    <form method="post" action="{{ route('checkout.process') }}">
                        @csrf
                        <div class="row">
                            <div class="form-group col-lg-12">
                                <label for="name">First Name</label>
                                <input id="name" type="text" readonly name="name" value="{{ Auth::user()->name }}">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="email">Email</label>
                                <input id="email" type="email" readonly name="email"
                                    value="{{ Auth::user()->email }}">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="phone">Phone</label>
                                <input id="phone" type="text" readonly name="phone"
                                    value="{{ Auth::user()->phone_number }}">
                            </div>
                            <div class="form-group col-lg-12">
                                <label for="address">Address</label>
                                <input id="address" type="text" readonly name="address"
                                    value="{{ Auth::user()->address }}">
                            </div>
                        </div>
                        <div class="payment">
                            <h4 class="mb-30">Payment</h4>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option"
                                        value="Bank Transfer" id="bank-transfer">
                                    <label class="form-check-label" for="bank-transfer" data-bs-toggle="collapse"
                                        data-target="#bank-transfer" aria-controls="bank-transfer">Bank Transfer</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="payment_option"
                                        value="Cash On Delivery" id="cash-delivery">
                                    <label class="form-check-label" for="cash-delivery" data-bs-toggle="collapse"
                                        data-target="#cash-delivery" aria-controls="cash-delivery">Cash on
                                        delivery</label>
                                </div>
                            </div>
                        </div>
                        <div class="payment">
                            <h4 class="mb-30">Shipment</h4>
                            <div class="payment_option">
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="shipment_option"
                                        value="Pickup" id="pickup">
                                    <label class="form-check-label" for="pickup" data-bs-toggle="collapse"
                                        data-target="#pickup" aria-controls="pickup">Pick Up</label>
                                </div>
                                <div class="custome-radio">
                                    <input class="form-check-input" required="" type="radio" name="shipment_option"
                                        value="Delivery" id="delivery">
                                    <label class="form-check-label" for="delivery" data-bs-toggle="collapse"
                                        data-target="#delivery" aria-controls="delivery">Delivery</label>
                                </div>
                            </div>
                        </div>
                        <button class="btn btn-fill-out btn-block mt-30">Place an Order<i
                                class="fi-rs-sign-out ml-15"></i></button>
                    </form>
                </div>
            </div>
            <div class="col-lg-5">
                <div class="border p-40 cart-totals ml-30 mb-50">
                    <div class="d-flex align-items-end justify-content-between mb-30">
                        <h4>Your Order</h4>
                        <h6 class="text-muted">Subtotal</h6>
                    </div>
                    <div class="divider-2 mb-30"></div>
                    <div class="table-responsive order_table checkout">
                        <table class="table no-border">
                            <tbody>
                                @foreach (session('cart') as $id => $details)
                                    <tr>
                                        <td class="image product-thumbnail"><img src="{{ $details['image'] }}"
                                                alt="#">
                                        </td>
                                        <td>
                                            <h6 class="w-160 mb-5">
                                                <a href="{{ route('product.show', $details['slug']) }}"
                                                    class="text-heading">{{ $details['name'] }}</a>
                                            </h6>
                                        </td>
                                        <td>
                                            <h6 class="text-muted pl-20 pr-20">x {{ $details['quantity'] }}</h6>
                                        </td>
                                        <td>
                                            <h4 class="text-brand">{{ $details['total_price'] }}</h4>
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>

            </div>
        </div>
    </div>
</x-main-layout>
