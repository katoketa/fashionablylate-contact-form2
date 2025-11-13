@extends('layouts.app')

@section('css')
<link rel="stylesheet" href="{{ asset('css/admin.css') }}">
@endsection

@section('content')
<div class="admin-page">
    <div class="admin-page__title">
        <h2 class="admin-page__title-text">Admin</h2>
    </div>
    <div class="contacts-search">
        <form action="/search" method="get" class="search-form">
            @csrf
            <input type="text" name="keyword" class="search__keyword" placeholder="名前やメールアドレスを入力してください" value="{{ old('keyword') }}">
            <div class="search__gender">
                <select name="gender" class="search__gender-select">
                    <option value="" selected hidden>性別</option>
                    <option value="1">男性</option>
                    <option value="2">女性</option>
                    <option value="3">その他</option>
                </select>
            </div>
            <div class="search__category">
                <select name="category_id" class="search__category-select">
                    <option value="" selected hidden>お問い合わせの種類</option>
                    @foreach ($categories as $category)
                    <option value="{{ $category['id'] }}">{{ $category['content'] }}</option>
                    @endforeach
                </select>
            </div>
            <input type="date" name="created_at" class="search__date" placeholder="年/月/日" value="{{ old('created_at') }}">
            <button type="submit" class="search-form__button">検索</button>
        </form>
        <form action="/reset" method="get" class="search-reset">
            @csrf
            <button type="submit" class="search-reset__button">リセット</button>
        </form>
    </div>
    <div class="admin-utilities">
        <button type="submit" class="admin-export__button">エクスポート</button>
        {{ $contacts->appends(request()->query())->links() }}
    </div>
    <table class="contacts-table">
        <tr class="contacts-table__row">
            <th class="contacts-table__header">お名前</th>
            <th class="contacts-table__header">性別</th>
            <th class="contacts-table__header">メールアドレス</th>
            <th class="contacts-table__header">お問い合わせの種類</th>
            <th class="contacts-table__header"></th>
        </tr>
        @foreach ($contacts as $contact)
        <tr class="contacts-table__row">
            <td class="contacts-table__item">
                <span class="contacts-table__item-name">
                    {{ $contact['last_name'] }}
                </span>
                <span class="contacts-table__item-name">
                    {{ $contact['first_name'] }}
                </span>
            </td>
            <td class="contacts-table__item">
                @switch ($contact['gender'])
                    @case (1)
                        男性
                        @break
                    @case (2)
                        女性
                        @break
                    @case (3)
                        その他
                        @break
                @endswitch
            </td>
            <td class="contacts-table__item">{{ $contact['email'] }}</td>
            <td class="contacts-table__item">{{ $contact['category']['content'] }}</td>
            <td class="contacts-table__item">
                <button wire:click="openModal()" class="contacts-table__open-modal">詳細</button>
            </td>
        </tr>
        @endforeach
    </table>
</div>
@endsection