@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/register.css') }}">
@endsection

@section('content')
<div class="register-page">
    <div class="register-page__title">
        <h2 class="register-page__title-text">Register</h2>
    </div>
    <form action="/register" method="post" class="register-form">
        <div class="register-form__inner">
            <div class="register-form__header">お名前</div>
            <input type="text" name="name" class="register-form__input" value="{{ old('name') }}" placeholder="例: 山田 太郎">
            <div class="register-form__header">メールアドレス</div>
            <input type="email" name="email" class="register-form__input" value="{{ old('email') }}" placeholder="例: test@example.com">
            <div class="register-form__header">パスワード</div>
            <input type="password" name="password" class="register-form__input" value="{{ old('password') }}" placeholder="例: coachtech1106">
            <div class="register-form__button">
                <button type="submit" class="register-form__button-submit">登録</button>
            </div>

        </div>
    </form>
</div>
@endsection