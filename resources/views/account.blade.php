@extends('layouts.app')
@section('content')

    <div class="progress" role="progressbar" aria-label="Example with label" aria-valuenow="{{$sum}}" aria-valuemin="0" aria-valuemax="{{$count_mass_test}}">
        <div class="progress-bar" style="width: {{$new_width}}%">{{$sum}} из {{$count_mass_test}}</div>
    </div>

    <span>Тут личный кабинет, тут будет информация о пользователе, строка прогресса и возможность перейти по тестам и пересдать их.</span>


@endsection
