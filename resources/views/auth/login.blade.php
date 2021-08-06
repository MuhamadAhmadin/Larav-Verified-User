@extends('layouts.applogin')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt">
                <img src="https://2.bp.blogspot.com/-l9nGy2e3PnA/XLzG5A6u_cI/AAAAAAAAAgI/31bl8XZOrTwN0kTN8c18YOG3OhNiTUrsQCLcBGAs/s1600/rocket.png" alt="IMG">
            </div>

        <form method="POST" action="{{ route('login') }}" class="login100-form validate-form">
            @csrf
            <span class="login100-form-title">
                Login
            </span>
                <div class="wrap-input100 validate-input" data-validate="Valid email is required: ex@abc.xyz"">
                    <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input100" placeholder="Email" name="email" value="{{ old('email') }}" required autofocus>
                    <span class="focus-input100"></span>
                        <span class="symbol-input100">
                            <i class="bi bi-envelope" aria-hidden="true"></i>
                        </span>
                    @if ($errors->has('email'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
            

                <div class="wrap-input100 validate-input" data-validate="Password is required">
                    <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input100" placeholder="Password" name="password" required>
                    <span class="focus-input100"></span>
                    <span class="symbol-input100">
                        <i class="bi bi-lock" aria-hidden="true"></i>
                    </span>
                    @if ($errors->has('password'))
                        <span class="invalid-feedback">
                            <strong>{{ $errors->first('password') }}</strong>
                        </span>
                    @endif
                    
                </div>

            <div class="form-group row">
                <div class="col-md-6 offset-md-1">
                    <div class="checkbox">
                        <label>
                            <input type="checkbox" name="remember" {{ old('remember') ? 'checked' : '' }}> {{ __('Remember Me') }}
                        </label>
                    </div>
                </div>
            </div>
            
            <div class="container-login100-form-btn">
                    <button type="submit" class="login100-form-btn">
                        {{ __('Login') }}
                    </button>
                </div>
                <div class="text-center">
                    <a class="txt2" href="{{ __('register') }}">
                        Create your Account
                        <i class="fa fa-long-arrow-right m-l-5" aria-hidden="true"></i>
                    </a>
                    <br>
                    <a class="txt2" href="{{ route('password.request') }}">
                        {{ __('auth.forgot') }}
                    </a>
                </div>
                
            </div>
            
        </form>
    </div>
    
        </div>
@endsection
