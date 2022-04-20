@extends('layouts.signup')
@section('title','Code Verification')
@section('content')

<div class="login_outer">
    <div class="login_inner">
      <a class="navbar-brand" href="{{url('/')}}"><img src="assets/images/logo_l.png" alt="logo_l"></a>
      <div class="login_inputs">
        <div class="tab-content custom_tabcontent" id="myTabContent">
            <div class="contractor_logintitle">Code Verification</div>

            <form method="POST" class="form_custom" action="{{ route('2fa.post') }}">
                @csrf
                <p class="text-center">We sent code to email : {{ substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2) }}</p>

                @if(auth()->user()->user_type == 2)
                    <input id="code1" class="otp @error('code1') is-invalid @enderror" name="code1" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 value="6" autocomplete="code1" autofocus>
                    <input id="code2" class="otp @error('code2') is-invalid @enderror" type="text" name="code2" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 value="7" autocomplete="code2" autofocus>
                    <input id="code3" class="otp @error('code2') is-invalid @enderror" type="text" name="code3" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 value="8" autocomplete="code3" autofocus>
                    <input id="code4" class="otp @error('code4') is-invalid @enderror" type="text" name="code4" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1 value="9" autocomplete="code4" autofocus>
                @else
                    <input id="code1" class="otp @error('code1') is-invalid @enderror" name="code1" oninput='digitValidate(this)' onkeyup='tabChange(1)' maxlength=1 value="{{ old('code1') }}" autocomplete="code1" autofocus>
                    <input id="code2" class="otp @error('code2') is-invalid @enderror" type="text" name="code2" oninput='digitValidate(this)' onkeyup='tabChange(2)' maxlength=1 value="{{ old('code2') }}" autocomplete="code2" autofocus>
                    <input id="code3" class="otp @error('code2') is-invalid @enderror" type="text" name="code3" oninput='digitValidate(this)' onkeyup='tabChange(3)' maxlength=1 value="{{ old('code3') }}" autocomplete="code3" autofocus>
                    <input id="code4" class="otp @error('code4') is-invalid @enderror" type="text" name="code4" oninput='digitValidate(this)' onkeyup='tabChange(4)' maxlength=1 value="{{ old('code4') }}" autocomplete="code4" autofocus>
                @endif

                @error('code1')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('code2')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('code3')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                @error('code4')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                @enderror
                
                <div class="resendcode_title" style="margin-top:40px;"><a href="{{ route('2fa.resend') }}" style="cursor:pointer"><i class="fa-solid fa-arrows-rotate"></i>Resend Code</a></div>
                
                <div class="signin_btn_outer">
                <button type="submit" class="signin_a">
                    Verify
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
                <div class="card-header">2FA Verification</div>
  
                <div class="card-body">
                    <form method="POST" action="{{ route('2fa.post') }}">
                        @csrf
  
                        <p class="text-center">We sent code to email : {{ substr(auth()->user()->email, 0, 5) . '******' . substr(auth()->user()->email,  -2) }}</p>
  
                        @if ($message = Session::get('success'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-success alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif
  
                        @if ($message = Session::get('error'))
                            <div class="row">
                              <div class="col-md-12">
                                  <div class="alert alert-danger alert-block">
                                    <button type="button" class="close" data-dismiss="alert">×</button> 
                                      <strong>{{ $message }}</strong>
                                  </div>
                              </div>
                            </div>
                        @endif
  
                        <div class="form-group row">
                            <label for="code" class="col-md-4 col-form-label text-md-right">Code</label>
  
                            <div class="col-md-6">
                                <input id="code" type="number" class="form-control @error('code') is-invalid @enderror" name="code" value="{{ old('code') }}" required autocomplete="code" autofocus>
  
                                @error('code')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>
  
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <a class="btn btn-link" href="{{ route('2fa.resend') }}">Resend Code?</a>
                            </div>
                        </div>
  
                        <div class="form-group row mb-0">
                            <div class="col-md-8 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    Submit
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