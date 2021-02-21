@extends('layouts.app')

@section('content')

<div class="container">
    <div class="d-flex justify-content-center">
        <div class="card h-50" style="margin:100px 0 0 0;">
            <div class="card-header text-center" style="background-color: rgb(221, 187, 34);">
                <h3>Sign In</h3>
                <div class="d-flex justify-content-end social_icon">
                    {{-- <span><i class="fab fa-facebook-square"></i></span>
                    <span><i class="fab fa-google-plus-square"></i></span> --}}
                    <!-- <span><i class="fab fa-twitter-square"></i></span> -->
                </div>
            </div>
            <div class="card-body bg-success">
                <form method="POST" action="{{ url('post-login') }}">
                    @csrf
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-user"></i></span>
                        </div>
                        <!-- <input type="text" class="form-control" placeholder="Email"> -->
                        <input id="email" type="email" class="form-control @error('email') is-invalid @enderror"
                            name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                        @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror

                    </div>
                    <div class="input-group form-group">
                        <div class="input-group-prepend">
                            <span class="input-group-text"><i class="fas fa-key"></i></span>
                        </div>
                        <!-- <input type="password" class="form-control" placeholder="password"> -->
                        <input id="password" type="password"
                            class="form-control @error('password') is-invalid @enderror" name="password" required
                            autocomplete="current-password">

                        @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="row align-items-center remember" style="font-size: 12px">
                        <!-- <input type="checkbox">Remember Me -->
                        <div class="col-md-6">
                            <input type="checkbox" style="height: 15px;" name="remember" id="remember"
                                {{ old('remember') ? 'checked' : '' }}>
                            <label class="form-check-label" for="remember">
                                {{ __('Remember Me') }}
                            </label>

                        </div>
                        <!-- <a href="#">Forgot your password?</a> -->
                        <div class="col-md-6">
                            @if (Route::has('password.request'))
                            <a class="btn btn-link text-white" style="font-size: 12px;"
                                href="{{ route('password.request') }}">{{ __('Forgot Your Password?') }}</a>
                            @endif

                        </div>
                    </div>
                    <br>
                    <div class="form-group text-center">
                        <input type="submit" value="Login" class="btn  login_btn">
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
@endsection
