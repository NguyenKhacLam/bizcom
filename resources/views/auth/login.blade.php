@extends('layouts.layout')

@section('content')
<div class="splash-container">
    <div class="card">
        <div class="card-header text-center"><a href="."><img class="logo-img" src="src/assets/images/logo.png" alt="logo"></a><span class="splash-description">Nhập thông tin đăng nhập của bạn.</span></div>
        <div class="card-body">
            <form method="POST" action="{{ route('login') }}">
                @csrf
                <div class="form-group">
                    <input id="email" type="email" class="form-control form-control-lg @error('email') is-invalid @enderror" name="email" placeholder="Email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <input id="password" type="password" class="form-control form-control-lg @error('password') is-invalid @enderror" name="password" placeholder="Mật khẩu" required autocomplete="current-password">

                    @error('password')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group">
                    <label class="custom-control custom-checkbox">
                        <input class="custom-control-input" type="checkbox" {{ old('remember') ? 'checked' : '' }}><span class="custom-control-label">Duy trì đăng nhập</span>
                    </label>
                </div>
                <div class="form-group">
                    <button type="submit" class="btn btn-primary btn-lg btn-block">Đăng nhập</button>
                </div>
            </form>
        </div>
        <div class="card-footer bg-white p-0  ">
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{ route('register') }}" class="footer-link">Tạo tài khoản</a></div>
            <div class="card-footer-item card-footer-item-bordered">
                <a href="{{ route('password.request') }}" class="footer-link">Quên mật khẩu</a>
            </div>
        </div>
    </div>
</div>
@endsection
