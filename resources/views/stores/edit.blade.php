@extends('layouts.app')

@section('content')

<div class="container">
    <h1>新しい店舗を追加</h1>

    <form action="{{ route('stores.store') }}" method="POST">
        @csrf
        <div class="form-group">
            <label for="store-name">店舗名</label>
            <input type="text" name="name" id="store-name" class="form-control">
        </div>

        <div class="form-group">
            <label for="store-description">店舗説明</label>
            <textarea name="description" id="store-description" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="store-opening-time">営業時間（開始）</label>
            <input type="time" name="time" id="store-opening-time" class="form-control">
        </div>

        <div class="form-group">
            <label for="store-closing-time">営業時間（終了）</label>
            <input type="time" name="time" id="store-closing-time" class="form-control">
        </div>

        <div class="form-group">
             <label for="store-lowest-price">価格（最低）</label>
             <input type="number" name="price" id="store-lowest-price" class="form-control">
        </div>

        <div class="form-group">
             <label for="store-highest-price">価格（最高）</label>
             <input type="number" name="price" id="store-highest-price" class="form-control">
        </div>

        <div class="form-group">
            <label for="store-post-code">郵便番号</label>
            <input type="text" name="post-code" id="store-post-code" class="form-control" minlength="7" maxlength="8">
        </div>

        <div class="form-group">
            <label for="store-address">住所</label>
            <input type="text" name="address" id="store-address" class="form-control">
        </div>

        <div class="form-group">
            <label for="store-phone-numbe">電話番号</label>
            <input type="tel" name="phone-numbe" id="store-phone-numbe" class="form-control" size="15" maxlength="15">
        </div>

        <div class="form-group">
            <label for="store-holiday">定休日</label>
            <textarea name="description" id="store-holiday" class="form-control"></textarea>
        </div>

        <div class="form-group">
            <label for="store-major-category">大カテゴリ</label>
            <select name="major-category-id" class="form-control" id="store-major-category">
                @foreach ($major_categories as $major_category)
                    @if ($major_category->id == $store->category_id)
                    <option value="{{ $major_category->id }}">{{ $major_category->name }}</option>
                    @else
                    <option value="{{ $major_category->id }}">{{ $major_category->name }}</option>
                @endforeach
            </select>
        </div>

        <div class="form-group">
            <label for="store-category">小カテゴリ</label>
            <select name="category-id" class="form-control" id="store-category">
                @foreach ($categories as $category)
                    @if ($category->id == $store->category_id)
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                    @else
                    <option value="{{ $category->id }}">{{ $category->name }}</option>
                @endforeach
            </select>
        </div>

        <button type="submit" class="btn btn-danger">更新</button>
    </form>

    <a href="{{ route('stores.index') }}">店舗一覧に戻る</a>

</div>
@endsection