@extends('frontend.auth.app')

@section('content')

<div class="user-form register-form">
    <div class="login-popup">
        <h3 class="text-center"> --- Register ---- </h3>
        <div class="tab-content">
            <div class="tab-pane active" id="register">
                <form action="{{ route('user.register') }}" method="POST">
                    @csrf
                    <!-- User name --->
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="name" name="name" placeholder="Username *"
                            value="{{ old('name') }}" required />
                        @error('name')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Email --->
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address *"
                            value="{{ old('email') }}" required />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Password--->
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password" {{ old('password') }}
                            placeholder="Password *" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <!-- Confirm Password--->
                    <div class="form-group">
                        <input type="password" class="form-control" id="password_confirmation"
                            {{ old('password_confirmation') }} name="password_confirmation"
                            placeholder="Confirm Password *" required />
                        @error('password_confirmation')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-footer">
                        <div class="form-checkbox">
                            <input type="checkbox" class="custom-checkbox" id="agree-policy" name="agree-policy"/>
                            <label class="form-control-label" for="agree-policy">I agree to the privacy policy</label>
                        </div>
                        @error('agree-policy')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <button class="btn btn-dark btn-block btn-rounded" type="submit">Register</button>
                </form>
                <div class="already-account text-center mb-2">
                    <a class="" href="{{ route('user.login') }}">I already have an account !</a>
                </div>
                <div class="form-choice text-center">
                    <label class="ls-m">or Login With</label>
                    <div class="social-links">
                        <a href="#" class="social-link social-google fab fa-google border-no"></a>
                        <a href="#" class="social-link social-facebook fab fa-facebook-f border-no"></a>
                        <a href="#" class="social-link social-twitter fab fa-twitter border-no"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
