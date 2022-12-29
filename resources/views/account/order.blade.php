<x-main-layout>
    <div class="page-header breadcrumb-wrap">
        <div class="container">
            <div class="breadcrumb">
                <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                <span></span> Pages <span></span> My Account
            </div>
        </div>
    </div>
    <div class="page-content pt-150 pb-150">
        <div class="container">
            <div class="row">
                <div class="col-lg-10 m-auto">
                    <div class="row">
                        <div class="col-md-3">
                            <div class="dashboard-menu">
                                <ul class="nav flex-column" role="tablist">
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('account.index') }}"><i class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('account.orders') }}"><i class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('account.address') }}"><i class="fi-rs-marker mr-10"></i>My
                                            Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('account.settings') }}"><i class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"><i class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show">
                                    <div class="card">
                                        <div class="card-header">
                                            <h3 class="mb-0">Your Orders</h3>
                                        </div>
                                        <div class="card-body">
                                            <div class="table-responsive">
                                                <table class="table">
                                                    <thead>
                                                        <tr>
                                                            <th width="40%">Product</th>
                                                            <th width="20%">Unit Price</th>
                                                            <th width="20%">Quantity</th>
                                                            <th width="20%" class="text-end">Total</th>
                                                        </tr>
                                                    </thead>
                                                    <tbody>
                                                        @foreach ($order->order_items as $item)
                                                        <tr>
                                                            <td>
                                                                <a style="display: flex" href="{{ route('product.show', $item->product->slug) }}">
                                                                    <div class="left">
                                                                        <img src="{{ $item->product->image }}" width="40" height="40" style="object-fit: cover;min-width: 40px;margin-right: 5px" class="img-xs" alt="Item">
                                                                    </div>
                                                                    <div class="info">
                                                                        {{ $item->product->name }}
                                                                    </div>
                                                                </a>
                                                            </td>
                                                            <td>{{ $item->product->getFormattedPriceAttribute() }}
                                                            </td>
                                                            <td>{{ $item->quantity }}</td>
                                                            <td class="text-end">Rp.
                                                                {{ number_format($item->product->price * $item->quantity, 0, ',', '.') }}
                                                            </td>
                                                        </tr>
                                                        @endforeach
                                                        <tr>
                                                            <td>
                                                                <!-- upload payment -->
                                                                @if ($order->status == 'UNPAID')
                                                                <form action="{{ route('account.uploadPayment',  $order->id) }}" method="POST" enctype="multipart/form-data">
                                                                    @csrf
                                                                    <div class="custom-file">
                                                                        <input type="file" class="custom-file-input" id="validatedCustomFile" required style="cursor: pointer; padding:0; height: 100%; margin-bottom: 10px;" name="payment">
                                                                    </div>
                                                                    <button type="submit" class="btn btn-primary" style="width:100%">Upload
                                                                        Payment</button>
                                                                </form>
                                                                @elseif ($order->status == 'PENDING' || $order->status == 'PAID')
                                                                <!-- image display -->
                                                                <div class="card" style="width: 100%; height: 100%; object-fit: cover;">
                                                                    @if ($order->image)
                                                                    <img src="{{$order->image}}" alt="payment" style="width: 100%; height: 100%; object-fit: cover;">
                                                                    @endif
                                                                </div>
                                                                @elseif ($order->status == 'ON_DELIVERY')
                                                                <div class="card" style="width: 100%; height: 100%; object-fit: cover;">
                                                                    @if ($order->delivery_code)
                                                                    <div class="card-body">
                                                                        <h5 class="card-title">Tracking Code</h5>
                                                                        <p class="card-text">{{ $order->delivery_code }}</p>
                                                                    </div>
                                                                    @endif
                                                                    <form action="{{ route('account.confirmReceived',  $order->id) }}" method="POST">
                                                                        @csrf
                                                                        <button type="submit" class="btn btn-primary" style="width:100%">Confirm Received</button>
                                                                    </form>
                                                                </div>
                                                                @endif
                                                            </td>
                                                            <td colspan="3">
                                                                <article class="float-end">
                                                                    <dl style="display: flex">
                                                                        <dt>Subtotal:</dt>
                                                                        <dd style="margin-left: 40px;vertical-align: baseline;flex-grow: 1;margin-bottom: 0;text-align: right;">
                                                                            {{ $order->getFormattedTotalPriceAttribute() }}
                                                                        </dd>
                                                                    </dl>
                                                                    <dl style="display: flex">
                                                                        <dt>Shipping cost:</dt>
                                                                        <dd style="margin-left: 40px;vertical-align: baseline;flex-grow: 1;margin-bottom: 0;text-align: right;">
                                                                            Free</dd>
                                                                    </dl>
                                                                    <dl style="display: flex">
                                                                        <dt>Grand total:</dt>
                                                                        <dd style="margin-left: 40px;vertical-align: baseline;flex-grow: 1;margin-bottom: 0;text-align: right;">
                                                                            <b class="h5">{{ $order->getFormattedTotalPriceAttribute() }}</b>
                                                                        </dd>
                                                                    </dl>
                                                                    <dl style="display: flex">
                                                                        <dt class="text-muted">Status:</dt>
                                                                        <dd style="margin-left: 40px;vertical-align: baseline;flex-grow: 1;margin-bottom: 0;text-align: right;">
                                                                            @if ($order->status == 'UNPAID')
                                                                            <span class="badge rounded-pill alert-danger text-danger">{{ $order->status }}</span>
                                                                            @elseif ($order->status == 'PAID')
                                                                            <span class="badge rounded-pill alert-info text-info">{{ $order->status }}</span>
                                                                            @elseif ($order->status == 'PENDING')
                                                                            <span class="badge rounded-pill alert-warning text-warning">{{ $order->status }}</span>
                                                                            @elseif ($order->status == 'DELIVERED')
                                                                            <span class="badge rounded-pill alert-success text-success">{{ $order->status }}</span>
                                                                            @elseif ($order->status == 'ON_DELIVERY')
                                                                            <span class="badge rounded-pill alert-primary text-primary">{{ $order->status }}</span>
                                                                            @endif
                                                                        </dd>
                                                                    </dl>
                                                                </article>
                                                            </td>
                                                        </tr>
                                                    </tbody>
                                                </table>
                                            </div>
                                            <!-- table-responsive// -->
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</x-main-layout>