@extends('layouts.app')

@section('content')

<main>
    <!-- 予約完了メッセージ-->
    @if (session('message'))
    {{ session('message') }}
    @endif

    <!-- 店舗名 -->
    <p class="offset-1 display-6">{{ $store->name }}</p>
    
    <!-- イメージ画像 -->
    <section id="carousel-section">
        <div class="carousel">
        <div>
        <img class="carouselImg" src="{{asset('img/shop.jpg')}}">
        </div>
        <div>
        <img class="carouselImg" src="{{asset('img/drink.jpg')}}">
        </div>
        <div>
        <img class="carouselImg" src="{{asset('img/inside the store.jpg')}}">
        </div>
        </div>
    </section>

    <!-- 店舗説明 -->
    <div class="offset-1 col-sm-10 p-4">
    <div class="description">{{ $store->description }}</div>
    </div>

    <!-- 予約 -->
    <div class="reservation-button">
    @auth
    <a href="{{ route('reservations.create', ['store_id' => $store->id]) }}">RESERVATION FORM</a>
    @endauth
    </div>

    <hr>

    <!-- レビュー -->
    <div class="offset-1 col-11">
    <p class="float-left display-6">REVIEW <i class="fa-solid fa-user-pen"></i></p>
    </div>

    <div class="offset-1 review-container-1">
        <div class="review-container-2">
            @foreach($reviews as $review)
            <div class="review-container-3">
                <p class="review-rating-color">{{ str_repeat('★', $review->rating) }}</p>
                <p>{{$review->comment}}</p>
                <label>{{$review->created_at}} {{$review->user->name}}</label>
            </div>
            @endforeach
        </div>

        <div>
        {{ $reviews->links('vendor.pagination.tailwind') }}
        </div>

        @auth
        <div class="col-md-11  comment-container">
            <hr>
            <p class="fs-4 fw-normal">REVIEW FORM</p>
            <form class="comment-container-form" method="POST" action="{{ route('reviews.store') }}">
            @csrf
            <select name="rating" class="form-control mb-1">
                <option value="5">★★★★★</option>
                <option value="4">★★★★☆</option>
                <option value="3">★★★☆☆</option>
                <option value="2">★★☆☆☆</option>
                <option value="1">★☆☆☆☆</option>
            </select>
            
            @error('comment')
            <strong>レビュー内容を入力してください</strong>
            @enderror
            <textarea name="comment"></textarea>
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <button type="submit" class="btn border submit-button ml-2">レビューを追加</button>
            </form>     
        </div>   
        @endauth
    </div>

    <hr>

    <!-- 基本情報 -->
    <div class="offset-1 col-11">
    <p class="float-left display-6">INFORMATION <i class="fa-regular fa-circle-check"></i></p>    
        
    <div class="detail-information">
    <dl class="row">
        <dt class="col-5">店名</dt>
        <dd class="col-5">{{ $store->name }}</dd>
        <dt class="col-5">カテゴリ</dt>
        <dd class="col-5">{{ $store->category->name }}</dd>
        <dt class="col-5">予算</dt>
        <dd class="col-5">¥{{ $store->lowest_price }}~¥{{ $store->highest_price }}</dd>            
        <dt class="col-5">お問い合わせ</dt>
        <dd class="col-5">{{ $store->phone_number }}</dd>
        <dt class="col-5">住所</dt>
        <dd class="col-5">〒{{ $store->post_code }}</dd>
        <dt class="col-5"></dt>
        <dd class="col-5">{{ $store->address }}</dd>
        <dt class="col-5">営業時間</dt>
        <dd class="col-5">{{ $store->opening_time }}~{{ $store->closing_time }}</dd>
        <dt class="col-5">定休日</dt>
        <dd class="col-5">{{ $store->holiday }}</dd>
    </dl>
    </div>
        

    </div>

</main>
@endsection