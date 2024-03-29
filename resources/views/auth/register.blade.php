@extends('layouts.app')

@section('content')

<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-5">
           <h3 class="mt-3 mb-3">新規会員登録</h3>

            <hr>

            <form method="POST" action="{{ route('register') }}">
            @csrf
            <!-- 氏名 -->
            <div class="form-group row">
            <label for="name" class="col-md-5 col-form-label text-md-left">氏名</label>

            <div class="col-md-7">
            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror login-input" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus placeholder="侍 太郎"> 
            
            @error('name')
                <span class="invalid-feedback" role="alert">
                <strong>氏名を入力してください</strong>
                </span>
            @enderror
            </div>
            </div>

            <!-- メールアドレス -->
            <div class="form-group row">
            <label for="email" class="col-md-5 col-form-label text-md-left">メールアドレス</label>
 
            <div class="col-md-7">
            <input id="email" type="email" class="form-control @error('email') is-invalid @enderror login-input" name="email" value="{{ old('email') }}" required autocomplete="email" placeholder="samurai@samurai.com">
 
            @error('email')
                <span class="invalid-feedback" role="alert">
                <strong>メールアドレスを入力してください</strong>
                </span>
            @enderror
            </div>
            </div>

            <!-- パスワード -->
            <div class="form-group row">
            <label for="password" class="col-md-5 col-form-label text-md-left">パスワード</label>
 
            <div class="col-md-7">
            <input id="password" type="password" class="form-control @error('password') is-invalid @enderror login-input" name="password" required autocomplete="new-password">
 
    
            @error('password')
                <span class="invalid-feedback" role="alert">
                <strong>{{ $message }}</strong>
                </span>
            @enderror
            </div>
            </div>

            <div class="form-group row">
            <label for="password-confirm" class="col-md-5 col-form-label text-md-left">確認</label>
 
            <div class="col-md-7">
            <input id="password-confirm" type="password" class="form-control login-input" name="password_confirmation" required autocomplete="new-password">
            </div>
            </div>

            <div class="register-form-group">
            <button type="submit" class="btn border w-30">アカウント作成</button>
            </div>

            </form>
        </div>
    </div>
</div>

@endsection