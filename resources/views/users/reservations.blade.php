@extends('layouts.app')

@section('content')
    @if($reservations->count() == 0)
    予約情報はありません。
    @else
    @foreach ($reservations as $reservation)
    {{ $reservation->store->name }}
    {{ $reservation->number_of_people }}
    {{ $reservation->date_time }}

    <form action="{{route('reservations.destroy', $reservation)}}" method="post" onsubmit="return confirm('予約をキャンセルします。よろしいですか？');">
      @csrf
      @method('DELETE')  
      <button type="submit">キャンセルする</button>
    </form>

    @endforeach
    @endif
@endsection