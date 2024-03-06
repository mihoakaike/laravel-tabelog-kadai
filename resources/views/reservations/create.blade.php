@extends('layouts.app')

@section('content')

  <form action="{{ route('reservations.store') }}" method="POST">
    @csrf
    <input type="number" name="reservation_people" value="{{old('reservation_people')}}">
    <input type="date" name="date" value="{{old('date')}}">
    <select name="time">
    @for($i = date('G',strtotime($store->opening_time)) ; $i <= date('G',strtotime($store->closeing_time)); $i++)
    <option value="{{str_pad($i, 2, 0, STR_PAD_LEFT)}}">{{str_pad($i, 2, 0, STR_PAD_LEFT)}}:00</option>
    @endfor
    </select>
    <input type="hidden" name="store_id" value="{{ $store->id }}">
    <button type="submit" class="btn btn-success mt-4">予約</button>
  </form>
  @if (isset($errors))
  @foreach ($errors->all() as $error)
{{ $error }}
  @endforeach
  @endif
@endsection