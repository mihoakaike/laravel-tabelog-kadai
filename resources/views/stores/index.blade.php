@extends('layouts.app')
 
@section('content')

    <main>
        
    <!-- 店舗一覧 -->
    <figure class="text-center">
        <p class="display-6">店舗一覧</p>
    </figure>    
            
    <form action="" method="get">
        <input type=text class="index-search" name="search" >
        <input class="fas" type="submit" value="&#xf002">
    </form>    

    <section id="content">   
    <ul>
    @foreach ($stores as $store)
        <li class="shop">
            <div class="shop-details">
            <p class="fs-3">{{ $store->name }}</p>
            <img class="shop-img" src="{{asset('img/shop.jpg')}}" alt="店のイメージ画像">
            
            <dl class="row">
            <dt class="col-5">カテゴリ：</dt>
            <dd class="col-5">{{ $store->category->name }}</dd>
            <dt class="col-5">営業時間：</dt>
            <dd class="col-5">{{ $store->opening_time }}~{{ $store->closeing_time }}</dd>
            <dt class="col-5">予算：</dt>
            <dd class="col-5">¥{{ $store->lowest_price }}~¥{{ $store->highest_price }}</dd>
            </dl>
            
            </div>
        </li>    
    @endforeach
    </ul>
    </section>
       
    </main>

@endsection
