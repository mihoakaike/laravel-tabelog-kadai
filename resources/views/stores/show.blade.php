@extends('layouts.app')

@section('content')

<main>
        <!-- 店舗一覧 -->
        <div id ="main-header">
        <p class="display-6">グッドウィン</p>
        </div>
        @auth
        <a href="{{ route('reservations.create', ['store_id' => $store->id]) }}">予約する</a>
        @endauth

        <section id="carousel-section">
            <div class="carousel">
                <div>
                  <img class="carouselImg" src="../nagoyameshi/kyoutu/img/shop.jpg">
                </div>
                <div>
                  <img class="carouselImg" src="../nagoyameshi/kyoutu/img/drink.jpg">
                </div>
                <div>
                  <img class="carouselImg" src="../nagoyameshi/kyoutu/img/Inside the store.jpg">
                </div>
              </div>
        </section>

        <section id="information">
        <h2>基本情報</h2> 
        
        <section class="box">
        <div class="detail-information">
            <div class="name">
            <p><span class="frame1">店名</span><span class="frame2">グッドウィン</span></p>
            </div>
            <div class="category">
            <p><span class="frame1">カテゴリ</span><span class="frame2">天ぷら</span></p>
            </div>
            <div class="opening">
            <p><span class="frame1">営業時間</span><span class="frame2">16:00~22:00</span></p>
            </div>
            <div class="closing-day">
            <p><span class="frame1">定休日</span><span class="frame2">なし</span></p>
            </div>
            <div class="money">
            <p><span class="frame1">予算</span><span class="frame2">¥1,000~¥2,500</span></p>
            <div class="address">
            <p><span class="frame1">住所</span><span class="frame2">〒839-9353　和歌山県 井高市加藤町鈴木9-10-8 コーポ渚105号</span></p>
            </div>
            </div>
        </div>

        <div class="about">
            光る砂すなのだ。けれどもらっしゃしょうの灯あかりトパーズの正面しょうの子が投なげました。
            ジョバンニもカムパネルラ、僕らみだな。そのすきの通りながカムパネルラが出てもも天の川は二つのようなしく両手りょうしているそっちへ来たのです。
            けれどもやっぱいは電いな涙なみちをふるえて、少しかしの方たちはしい狐火きつけてしました。
            「もう、ときにおい、そうに赤い点々てんてつどうか」という証拠しょうか」と言い。
        </div>
        </section>

        </div>

            </section>
    

        <div class="offset-1 col-11">
            <hr class="w-100">
            <h3 class="float-left">カスタマーレビュー</h3>
        </div>

        <div class="offset-1 col-10">
            <div class="row">
                @foreach($reviews as $review)
                <div class="offset-md-5 col-md-5">
                <p class="h3">{{$review->content}}</p>
                <label>{{$review->created_at}} {{$review->user->name}}</label>
                </div>
                @endforeach
            </div><br/>
 
            @auth
            <div class="row">
            <div class="offset-md-5 col-md-5">
            <form method="POST" action="{{ route('reviews.store') }}">
            @csrf
            <h4>レビュー内容</h4>
                @error('content')
                    <strong>レビュー内容を入力してください</strong>
                @enderror
            <textarea name="content" class="form-control m-2"></textarea>
            <input type="hidden" name="store_id" value="{{$store->id}}">
            <button type="submit" class="btn submit-button ml-2">レビューを追加</button>
            </form>
            </div>
            </div>

        
            @endauth
        </div>

        </main>

@endsection