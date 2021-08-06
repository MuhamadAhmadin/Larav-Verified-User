@extends('layouts.applogin')

@section('content')
<div class="limiter">
    <div class="container-login100">
        <div class="wrap-login100">
            <div class="login100-pic js-tilt">
                <img src="https://2.bp.blogspot.com/-l9nGy2e3PnA/XLzG5A6u_cI/AAAAAAAAAgI/31bl8XZOrTwN0kTN8c18YOG3OhNiTUrsQCLcBGAs/s1600/rocket.png" alt="IMG">
            </div>

                <form method="POST" action="{{ route('register') }}" class="login100-form validate-form">
                    @csrf
                    <span class="login100-form-title">
                        Register
                    </span>
                    <div class="wrap-input100 validate-input" data-validate="Username is Required">
                            <input id="name" type="text" class="form-control{{ $errors->has('name') ? ' is-invalid' : '' }} input100" name="name" value="{{ old('name') }}" placeholder="Username" required autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="bi bi-person-circle" aria-hidden="true"></i>
                            </span>
                            @if ($errors->has('name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('name') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="First Name is Required">
                            <input id="first_name" type="text" class="form-control{{ $errors->has('first_name') ? ' is-invalid' : '' }} input100" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="bi bi-text-indent-right" aria-hidden="true"></i>
                            </span>
                            @if ($errors->has('first_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('first_name') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Last Name is Required">
                            <input id="last_name" type="text" class="form-control{{ $errors->has('last_name') ? ' is-invalid' : '' }} input100" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" required autofocus>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="bi bi-text-indent-right" aria-hidden="true"></i>
                            </span>
                            @if ($errors->has('last_name'))
                                <span class="invalid-feedback">
                                    <strong>{{ $errors->first('last_name') }}</strong>
                                </span>
                            @endif
                    </div>

                    <div class="wrap-input100 validate-input" data-validate="Email is Required">
                            <input id="email" type="email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }} input100" name="email" value="{{ old('email') }}" placeholder="Email" required>
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

                    <div class="wrap-input100 validate-input" data-validate="Password is Required">
                            <input id="password" type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }} input100" name="password" placeholder="Password" required>
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

                    <div class="wrap-input100 validate-input" data-validate="Password is Required">

                            <input id="password-confirm" type="password" class="form-control input100" name="password_confirmation" placeholder="Password Confirmation" required>
                            <span class="focus-input100"></span>
                            <span class="symbol-input100">
                                <i class="bi bi-lock" aria-hidden="true"></i>
                            </span>
                        </div>


                    @if(config('settings.reCaptchStatus'))
                        <div class="form-group">
                            <div class="col-sm-6 col-sm-offset-4">
                                <div class="g-recaptcha" data-sitekey="{{ config('settings.reCaptchSite') }}"></div>
                            </div>
                        </div>
                    @endif

                        <div class="container-login100-form-btn">
                            <button type="submit" class="login100-form-btn">
                                {{ __('Register') }}
                            </button>
                        </div>

                    {{-- <div class="row">
                        <div class="col-12 col-lg-10 offset-lg-1 col-xl-8 offset-xl-2">
                            <p class="text-center mb-4">
                                Or Use Social Logins to Register
                            </p>
                            @include('partials.socials')
                        </div>
                    </div> --}}

                </form>
                <div class="text-center mt-5 text-lg fs-4">
                    <p class='text-gray-600'>Already have an account? <a href="{{ __('login') }}" class="font-bold">Log
                            in</a>.</p>
                </div>
            </div>
        </div>
        <div class="col-lg-7 d-none d-lg-block">
            <div id="auth-right">
    
            </div>
        </div>
    </div>
    
        </div>
@endsection

@section('footer_scripts')
    @if(config('settings.reCaptchStatus'))
        <script src='https://www.google.com/recaptcha/api.js'></script>
    @endif
@endsection
