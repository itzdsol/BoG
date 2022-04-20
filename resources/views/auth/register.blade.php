@extends('layouts.signup')
@section('title','Buyer Signup')
@section('content')

<div class="login_outer">
    <div class="login_inner">
        <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('assets/images/logo_l.png') }}" alt="logo_l" /></a>
        <div class="login_inputs">
            <ul class="nav nav-tabs custom_tabs" id="myTab" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="signin-tab" data-bs-toggle="tab" data-bs-target="#signin" type="button" role="tab" aria-controls="signin" aria-selected="true">Sign In</button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="signup-tab" data-bs-toggle="tab" data-bs-target="#signup" type="button" role="tab" aria-controls="signup" aria-selected="false">Sign Up</button>
                </li>
            </ul>
            <div class="tab-content custom_tabcontent" id="myTabContent">
                <div class="tab-pane fade show active" id="signin" role="tabpanel" aria-labelledby="signin-tab">
                    <div class="contractor_logintitle">Buyer Login</div>
                    <form method="POST" action="{{ route('login') }}">
                        @csrf
                        <div class="input-wrapper">
                            <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                            @error('email')
                                <span class="invalid-feedback" role="alert">
                                    <strong>{{ $message }}</strong>
                                </span>
                            @enderror
                            <label for="user">Email</label>
                        </div>
                        <div class="input-wrapper">
                            <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="current-password">
                            <label for="user">Password</label>
                            <i class="fa-solid fa-eye"></i>
                        </div>
                        <div class="forgot_pwd_div">
                            <div class="forgot_pwd_left">
                                <!--a class="login_buyer_a" href="{{ route('vendor.signup') }}">Login as Vendor</a>
                                <a class="login_vendor_a" href="{{ route('contractor.signup') }}">Login as Contractor</a-->
                            </div>
                            <div class="forgot_pwd_right">
                                <a class="login_vendor_a" href="{{ route('password.request') }}">Forgot password?</a>
                            </div>
                        </div>
                        <div class="signin_btn_outer">
                            <button type="submit" class="signin_a">
                                Sign In
                            </button>
                        </div>
                    </form>
                    <div class="or_text">
                        <hr />
                        <span>OR SIGN IN WITH</span>
                    </div>
                    <div class="facebook_google_div">
                        <a class="fb" href="{{ url('login/facebook') }}"><i class="fa-brands fa-facebook-f"></i>Facebook</a>
                        <a class="gg" href="{{ url('login/google') }}"><i class="fa-brands fa-google"></i>Google</a>
                    </div>
                </div>
                <div class="tab-pane fade" id="signup" role="tabpanel" aria-labelledby="signup-tab">
                    <div class="contractor_logintitle">Buyer Sign Up</div>
                    <form method="POST" action="{{ route('register') }}">
                        @csrf
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <input id="first_name" class="@error('first_name') is-invalid @enderror" name="first_name" value="{{ old('first_name') }}" required autocomplete="first_name" autofocus required />
                                    @error('first_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="user">first name</label>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <input id="last_name" class="@error('last_name') is-invalid @enderror" name="last_name" value="{{ old('last_name') }}" required autocomplete="last_name" autofocus required />
                                    @error('last_name')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                    @enderror
                                    <label for="user">last name</label>
                                    <input type="hidden" name="user_type" value="1">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <div class="input-wrapper">
                                    <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email">
                                    @error('email')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                    <label for="user">email</label>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <input id="password" type="password" class="@error('password') is-invalid @enderror" name="password" required autocomplete="new-password">
                                    <label for="user">Password</label>
                                    <i class="fa-solid fa-eye"></i>
                                </div>
                            </div>
                            <div class="col-md-6">
                                <div class="input-wrapper">
                                    <input id="password-confirm" type="password" class="" name="password_confirmation" required autocomplete="new-password">
                                    <label for="user">Confirm Password</label>
                                    <i class="fa-solid fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        <div class="forgot_pwd_div">
                            <div class="forgot_pwd_left">
                                <!--a class="login_buyer_a" href="{{ route('vendor.signup') }}">Sign Up as Vendor</a>
                                <a class="login_vendor_a" href="{{ route('contractor.signup') }}">Sign Up as Contractor</a-->
                            </div>
                        </div>
                        <div class="signin_btn_outer">
                            <button type="submit" class="signin_a">
                                Sign Up
                            </button>
                        </div>
                    </form>
                    <div class="or_text">
                        <hr />
                        <span>OR SIGN UP WITH</span>
                    </div>
                    <div class="facebook_google_div">
                        <a class="fb" href="{{ url('login/facebook') }}"><i class="fa-brands fa-facebook-f"></i>Facebook</a>
                        <a class="gg" href="{{ url('login/google') }}"><i class="fa-brands fa-google"></i>Google</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection