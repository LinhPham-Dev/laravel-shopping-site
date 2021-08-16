@extends('frontend.auth.app')

@section('content')

<div class="user-form login-form">
    <div class="login-popup">
        <h3 class="text-center"> --- Login ---- </h3>
        <div class="tab-content">
            <div class="tab-pane active" id="signin">
                <form action="{{ route('user.login') }}" method="POST">
                    @csrf
                    <div class="form-group mb-3">
                        <input type="text" class="form-control" id="email" name="email" placeholder="Email Address *"
                            value="{{ old('email') }}" required />
                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-group">
                        <input type="password" class="form-control" id="password" name="password"
                            placeholder="Password *" required />
                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="form-footer">
                        <div class="form-checkbox">
                            <input type="checkbox" class="custom-checkbox" id="remember_me"
                                name="remember_me" />
                            <label class="form-control-label" for="remember_me">Remember me</label>
                        </div>
                        <a href="#" class="lost-link">Lost your password?</a>
                    </div>
                    <button class="btn btn-dark btn-block btn-rounded" type="submit">Login</button>
                </form>
                <div class="already-account text-center mb-2">
                    <a class="" href="{{ route('user.register') }}">I don't have an account !</a>
                </div>
                <div class="form-choice text-center">
                    <label class="ls-m">or Login With</label>
                    <div class="social-links">
                        <a href="" class="social-link social-google fab fa-google border-no"></a>
                        <a href="{{ route('facebook_login', 'facebook') }}" class="social-link social-facebook fab fa-facebook-f border-no"></a>
                        <a href="" class="social-link social-twitter fab fa-twitter border-no"></a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
