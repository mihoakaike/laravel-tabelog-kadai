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

    <div class="offset-1 tenposhousai-container">
        <div class="review-container">
            @foreach($reviews as $review)
            <p class="review-score-color">{{ str_repeat('★', $review->score) }}</p>
            <p>{{$review->comment}}</p>
            <label>{{$review->created_at}} {{$review->user->name}}</label>
            @endforeach
        </div>

        @auth
        <div class="comment-container">
            <form method="POST" action="{{ route('reviews.store') }}">
            @csrf
            
            <h4>評価</h4>
            <select name="score" class="form-control m-2 review-score-color">
                <option value="5" class="review-score-color">★★★★★</option>
                <option value="4" class="review-score-color">★★★★</option>
                <option value="3" class="review-score-color">★★★</option>
                <option value="2" class="review-score-color">★★</option>
                <option value="1" class="review-score-color">★</option>
            </select>
            
            <p class="h4">COMMENT</p>
            @error('comment')
            <strong>レビュー内容を入力してください</strong>
            @enderror
            <textarea name="comment"></textarea>
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <button type="submit" class="btn submit-button ml-2">レビューを追加</button>
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