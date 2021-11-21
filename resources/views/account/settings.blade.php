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
                                        <a class="nav-link" href="{{ route('account.index') }}"><i
                                                class="fi-rs-settings-sliders mr-10"></i>Dashboard</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link " href="{{ route('account.orders') }}"><i
                                                class="fi-rs-shopping-bag mr-10"></i>Orders</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('account.address') }}"><i
                                                class="fi-rs-marker mr-10"></i>My
                                            Address</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link active" href="{{ route('account.settings') }}"><i
                                                class="fi-rs-user mr-10"></i>Account details</a>
                                    </li>
                                    <li class="nav-item">
                                        <a class="nav-link" href="{{ route('logout') }}"><i
                                                class="fi-rs-sign-out mr-10"></i>Logout</a>
                                    </li>
                                </ul>
                            </div>
                        </div>
                        <div class="col-md-9">
                            <div class="tab-content account dashboard-content pl-50">
                                <div class="tab-pane fade active show">
                                    <div class="card">
                                        <div class="card-header">
                                            <h5>Account Details</h5>
                                        </div>
                                        <div class="card-body">
                                            <!-- Session Status -->
                                            <x-auth-session-status class="mb-4" :status="session('status')" />
                                            <x-auth-session-status class="mb-4" :status="session('message')" />

                                            <!-- Validation Errors -->
                                            <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                            <form method="post" action="{{ route('account.updateSettings') }}">
                                                @csrf
                                                @method('PUT')
                                                <div class="row">
                                                    <div class="form-group col-md-12">
                                                        <label>Name <span class="required">*</span></label>
                                                        <input required="" value="{{ Auth::user()->name }}"
                                                            class="form-control" name="name" type="text" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Phone Number <span
                                                                class="required">*</span></label>
                                                        <input required="" class="form-control" name="phone"
                                                            value="{{ Auth::user()->phone_number }}" type="text" />
                                                    </div>
                                                    <div class="form-group col-md-12">
                                                        <label>Address <span class="required">*</span></label>
                                                        <input required="" class="form-control" name="address"
                                                            value="{{ Auth::user()->address }}" type="text" />
                                                    </div>
                                                    <div class="col-md-12">
                                                        <button type="submit"
                                                            class="btn btn-fill-out submit font-weight-bold"
                                                            name="submit" value="Submit">Save Change</button>
                                                    </div>
                                                </div>
                                            </form>
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
