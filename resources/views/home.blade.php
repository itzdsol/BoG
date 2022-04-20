@extends('layouts.bogapp')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8" style="margin-top:15%">
            <div class="card">
                <div class="card-header">{{ __('Dashboard') }}</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif

                    <p>My name: {{Auth::user()->first_name}}</p>
                    <p>My Email: {{Auth::user()->email}}</p>
                    @if (Auth::user()->profile_pic != "")
                        <img alt="{{Auth::user()->name}}" style="border-radius: 50%;" src="{{Auth::user()->profile_pic}}"/>
                    @endif
                    {{ __('You are logged in!') }}
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
