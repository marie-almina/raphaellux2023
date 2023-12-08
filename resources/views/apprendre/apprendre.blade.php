@extends('template')

@section('content')

    <img src="{{asset('img/themes/' . $theme->id . '.png')}}" class="img-fluid" alt="{{ $theme->titre }}" width="200" height="200">

    <p>{!! nl2br($theme->description) !!}</p>

@endsection