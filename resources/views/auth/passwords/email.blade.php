@extends('layouts.signup')
@section('title','Forgot Password')
@section('content')
<div class="login_outer">
    <div class="login_inner">
      <a class="navbar-brand" href="{{url('/')}}"><img src="{{ asset('assets/images/logo_l.png') }}" alt="logo_l" /></a>
      <div class="login_inputs">
        <div class="tab-content custom_tabcontent" id="myTabContent">
            @if (session('status'))
                <div class="alert alert-success" role="alert">
                    {{ session('status') }}
                </div>
            @endif
            <div class="contractor_logintitle">{{ __('Reset Password') }}</div>
            <form method="POST" action="{{ route('password.email') }}">
            @csrf
                <div class="input-wrapper">
                <input id="email" type="email" class="@error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                @error('email')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                <label for="user">{{ __('Email Address') }}</label>
                </div>
                <div class="forgot_pwd_div">
                <div class="forgot_pwd_left">
                </div>
                <div class="forgot_pwd_right">
                    <a class="login_vendor_a" href="{{ route('register') }}">Back To Login</a>
                </div>
                </div>
                <div class="signin_btn_outer">
                <button type="submit" class="signin_a">
                    Request Reset Link
                </button>
                </div>
            </form>
          </div>
      </div>
    </div>
</div>


<!--div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Reset Password') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <form method="POST" action="{{ route('password.email') }}">
                        @csrf

                        <div class="row mb-3">
                            <label for="email" class="col-md-4 col-form-label text-md-end">{{ __('Email Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Send Password Reset Link') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div-->
@endsection
