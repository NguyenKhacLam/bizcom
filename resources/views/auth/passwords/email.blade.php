@extends('layouts.layout')

@section('content')
<div class="splash-container">
    <div class="card">
        <div class="card-header text-center"><img class="logo-img" src="src/assets/images/logo.png" alt="logo"><span class="splash-description">Please enter your user information.</span></div>
        <div class="card-body">
            <form method="POST" action="{{ route('password.email') }}">
                @csrf
                <p>Đừng lo, chúng tôi sẽ gửi 1 email đến bạn để đổi mật khâu</p>
                <div class="form-group">
                    <input class="form-control form-control-lg @error('email') is-invalid @enderror" type="email" value="{{ $email ?? old('email') }}" name="email" required="" placeholder="Your Email" required autocomplete="email" autofocus>
                    @error('email')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                    @enderror
                </div>
                <div class="form-group pt-1">
                    <button class="btn btn-block btn-primary btn-xl" type="submit">Đổi mật khẩu</button>
                </div>
            </form>
        </div>
        <div class="card-footer text-center">
            <span>Chưa có tài khoản? <a href="{{ route('register') }}">Đăng ký</a></span>
        </div>
    </div>
</div>
@endsection
