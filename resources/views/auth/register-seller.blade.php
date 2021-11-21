<x-main-layout>
    <div class="page-header breadcrumb-wrap">
        <div class="page-header breadcrumb-wrap">
            <div class="container">
                <div class="breadcrumb">
                    <a href="{{ route('home') }}" rel="nofollow"><i class="fi-rs-home mr-5"></i>Home</a>
                    <span></span> Pages <span></span> Register
                </div>
            </div>
        </div>
        <div class="page-content pt-150 pb-150">
            <div class="container">
                <div class="row">
                    <div class="col-xl-8 col-lg-10 col-md-12 m-auto">
                        <div class="row">
                            <div class="col-lg-6 pr-30 d-none d-lg-block">
                                <img class="border-radius-15" src="{{ asset('assets/imgs/page/login-1.png') }}"
                                    alt="" />
                            </div>
                            <div class="col-lg-6 col-md-12">
                                <div class="login_wrap widget-taber-content background-white">
                                    <div class="padding_eight_all bg-white">
                                        <div class="heading_s1">
                                            <h1 class="mb-5">Create an Store Account</h1>
                                            <p class="">Already have an account? <a
                                                    href="{{ route('login') }}">Login</a></p>
                                            <p class="mb-30">Become an Customer? <a
                                                    href="{{ route('register') }}">Register Customer</a></p>
                                        </div>
                                        <x-auth-validation-errors class="mb-4" :errors="$errors" />
                                        <form method="post" action="{{ route('seller.register') }}"
                                            enctype="multipart/form-data">
                                            @csrf
                                            <div class="form-group">
                                                <input type="text" required="" name="name" value="{{ old('name') }}"
                                                    placeholder="Store Name" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="username"
                                                    value="{{ old('username') }}" placeholder="Username" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="email" value="{{ old('email') }}"
                                                    placeholder="Email" />
                                            </div>
                                            <div class="form-group">
                                                <input type="text" required="" name="phone" value="{{ old('phone') }}"
                                                    placeholder="Phone Number" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password"
                                                    placeholder="Password" />
                                            </div>
                                            <div class="form-group">
                                                <input required="" type="password" name="password_confirmation"
                                                    placeholder="Confirm password" />
                                            </div>
                                            <div class="form-group">
                                                <input required type="file" name="logo" />
                                            </div>
                                            <div class="login_footer form-group mb-50">
                                                <div class="chek-form">
                                                    <div class="custome-checkbox">
                                                        <input class="form-check-input" type="checkbox" name="agree"
                                                            id="agree" value="" />
                                                        <label class="form-check-label" for="agree"><span>I
                                                                agree to terms &amp; Policy.</span></label>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="form-group mb-30">
                                                <button type="submit"
                                                    class="btn btn-fill-out btn-block hover-up font-weight-bold"
                                                    name="login">Submit &amp; Register</button>
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
</x-main-layout>
