@extends('layouts.app')
@section('content')

@if($mass_test)

@foreach($mass_test as $key=> $item_mass)

    {{$key}}

    @foreach($item_mass as $item)
        {{$item}}
    @endforeach

@endforeach

@endif

@endsection
