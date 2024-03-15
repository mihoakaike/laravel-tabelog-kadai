@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
            <h3 class="mt-3 mb-3">ログイン</h3>

            <hr>
            <form method="POST" action="{{ route('login') }}">
            @csrf
            
            <!-- メールアドレス -->
            <div class="form-group">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus placeholder="メールアドレス">

            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>メールアドレスが正しくない可能性があります。</strong>
                </span>
            @enderror

            <!-- パスワード -->
            <div class="form-group">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror login-input" name="password" required autocomplete="current-password" placeholder="パスワード">
 
            @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>パスワードが正しくない可能性があります。</strong>
                </span>
            @enderror
            </div>
            </div>

            <!-- 自動ログイン -->
            <div class="form-group">
            <div class="form-check">
            <input class="form-check-input" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>
 
            <label class="form-check-label check-label w-100" for="remember">次回から自動的にログインする</label>
            </div>
            </div>

            <div class="form-group">
            <button type="submit" class="mt-3 btn border submit-button w-100">ログイン</button>
            </div>
            
            </form>
 
            <hr>

        </div>
    </div>
</div>

@endsection