@extends('layouts.app')
 
@section('content')

    <main>
        
    <!-- 店舗一覧 -->
        <div id ="main-header">
            <h2>店舗一覧</h2>
            <form action="" method="get">
                <input class="search" name="search" placeholder="キーワード">
                <input class="fas" type="submit" value="&#xf002">
            </form>
            </div>

        @foreach ($stores as $store)

            <section id="content">
                <ul>
                <li class="shop">
                    <div class="shop-details">
                    <h2>{{ $store->name }}</h2>
                    <img class="shop-img" src="{{asset('img/shop.jpg')}}" alt="店のイメージ画像">
                    <div class="frame1">
                    <div class="category">
                    <p><span class="frame2">カテゴリ：</span><span class="frame3">カテゴリーネーム</span></p>
                    </div>
                    <div class="opening">
                    <p><span class="frame2">営業時間：</span><span class="frame3">{{ $store->opening_time }}~{{ $store->closeing_time }}</span></p>
                    </div>
                    <div class="money">
                    <p><span class="frame2">予算：</span><span class="frame3">¥{{ $store->lowest_price }}~¥{{ $store->highest_price }}</span></p>
                    </div>
                    </div>
                    </div>
                </li>
                </ul>
            </section>

        @endforeach
       
    </main>

@endsection
