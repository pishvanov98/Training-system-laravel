@extends('layouts.app')
@section('content')

@if($json_decode_test)


@foreach($json_decode_test as $item)

    {{$item['name_tem']}}

@endforeach

@endif

@endsection
