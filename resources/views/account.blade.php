@extends('layouts.app')
@section('content')

    <div class="wrapper_content_lk">
        <div class="item_lk">
            <h2>{{ Auth::user()->name }}</h2>
        </div>
        <div class="item_lk">
            <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="{{$sum}}" aria-valuemin="0" aria-valuemax="{{$count_mass_test}}">
                <div class="progress-bar" style="width: {{$new_width}}%"></div>
            </div>
            <h5>{{$sum}} из {{$count_mass_test}}</h5></br>
            @php
            if($answer_tem){ @endphp

            <h2>Ваши темы</h2>
            @foreach($answer_tem as $item)
                <a href="{{route('theme.show', $item[0])}}"> {{$item[1]}}</a>
            @endforeach

            @php } @endphp


        </div>
    </div>

@endsection
