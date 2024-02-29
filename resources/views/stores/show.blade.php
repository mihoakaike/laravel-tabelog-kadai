@extends('layouts.app')

@section('content')

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
            <input type="hidden" name="product_id" value="{{$product->id}}">
            <button type="submit" class="btn submit-button ml-2">レビューを追加</button>
            </form>
            </div>
            </div>
            @endauth
        </div>

@endsection








@endsection