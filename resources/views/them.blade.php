@extends('layouts.app')
@section('content')

    @if($them)

        <img src="{{asset('img/'.$them->image)}}">

    @endif

@endsection
