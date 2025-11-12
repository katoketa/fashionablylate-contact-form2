@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/index.css') }}">
@endsection

@section('content')
<div class="content">
    <div class="content__title">
        <h2 class="content__title-text">Contact</h2>
    </div>
    <div class="content__item">
        <form action="/confirm" method="post">
            @csrf
            <table class="contact-form">
                <tr>
                    <th class="contact-form__header contact-form__header--required">お名前</th>
                    <td class="contact-form__item">
                        <div class="contact-form__error">
                            @if ($errors->has('last_name') && $errors->has('first_name'))
                                名前を入力してください
                            @else
                                @error('last_name')
                                {{ $message }}
                                @enderror
                                @error('first_name')
                                {{ $message }}
                                @enderror
                            @endif
                        </div>
                        <div class="contact-form__name">
                            <input class="contact-form__name-input" type="text" name="last_name" placeholder="例: 山田" value="{{ old('last_name') }}">
                            <input class="contact-form__name-input" type="text" name="first_name" placeholder="例: 太郎" value="{{ old('first_name') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="contact-form__header contact-form__header--required">性別</th>
                    <td class="contact-form__item">
                        <div class="contact-form__error">
                            @error('gender')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="contact-form__gender">
                            <input class="contact-form__gender-radio" type="radio" name="gender" id="man" value="1">
                            <label class="contact-form__gender-label" for="man">男性</label>
                            <input class="contact-form__gender-radio" type="radio" name="gender" id="woman" value="2">
                            <label class="contact-form__gender-label" for="woman">女性</label>
                            <input class="contact-form__gender-radio" type="radio" name="gender" id="others" value="3">
                            <label class="contact-form__gender-label" for="others">その他</label>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="contact-form__header contact-form__header--required">メールアドレス</th>
                    <td class="contact-form__item">
                        <div class="contact-form__error">
                            @error('email')
                            {{ $message }}
                            @enderror
                        </div>
                        <input class="contact-form__email-input" type="email" name="email" placeholder="例: test@example.com" value="{{ old('email') }}">
                    </td>
                </tr>
                <tr>
                    <th class="contact-form__header contact-form__header--required">電話番号</th>
                    <td class="contact-form__item">
                        <div class="contact-form__error">
                            @if ($errors->has('tel1'))
                                @error('tel1')
                                {{ $message }}
                                @enderror
                            @elseif ($errors->has('tel2'))
                                @error('tel2')
                                {{ $message }}
                                @enderror
                            @else
                                @error('tel3')
                                {{ $message }}
                                @enderror
                            @endif
                        </div>
                        <div class="contact-form__tel">
                            <input class="contact-form__tel-input" type="tel" name="tel1" placeholder="080" value="{{ old('tel1') }}">
                            <span>-</span>
                            <input class="contact-form__tel-input" type="tel" name="tel2" placeholder="1234" value="{{ old('tel2') }}">
                            <span>-</span>
                            <input class="contact-form__tel-input" type="tel" name="tel3" placeholder="5678" value="{{ old('tel3') }}">
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="contact-form__header contact-form__header--required">住所</th>
                    <td class="contact-form__item">
                        <div class="contact-form__error">
                            @error('address')
                            {{ $message }}
                            @enderror
                        </div>
                        <input class="contact-form__address-input" type="text" name="address" placeholder="例: 東京渋谷区千駄ヶ谷1-2-3" value="{{ old('address') }}">
                    </td>
                </tr>
                <tr>
                    <th class="contact-form__header">建物名</th>
                    <td class="contact-form__item">
                        <input class="contact-form__building-input" type="text" name="building" placeholder="例: 千駄ヶ谷マンション101" value="{{ old('building') }}">
                    </td>
                </tr>
                <tr>
                    <th class="contact-form__header contact-form__header--required">お問い合わせの種類</th>
                    <td class="contact-form__item">
                        <div class="contact-form__error">
                            @error('category_id')
                            {{ $message }}
                            @enderror
                        </div>
                        <div class="contact-form__category">
                            <select class="contact-form__category-select" name="category_id">
                                <option value="" selected hidden>選択してください</option>
                                @foreach($categories as $category)
                                <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                                @endforeach
                            </select>
                        </div>
                    </td>
                </tr>
                <tr>
                    <th class="contact-form__header contact-form__header--required">お問い合わせ内容</th>
                    <td class="contact-form__item">
                        <div class="contact-form__error">
                            @error('detail')
                            {{ $message }}
                            @enderror
                        </div>
                        <textarea class="contact-form__detail-textarea" name="detail" placeholder="お問い合わせ内容をご記載ください">{{ old('detail') }}</textarea>
                    </td>
                </tr>
            </table>
            <div class="contact-form__button">
                <button type="submit" class="contact-form__button-submit">確認画面</button>
            </div>
        </form>
    </div>
</div>
@endsection