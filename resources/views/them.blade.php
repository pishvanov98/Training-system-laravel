@extends('layouts.app')
@section('content')


        <div class="wrapper_them_content">

            <div class="top_block">
                <h1>{{$them->name_theme}}</h1>
                <img src="{{asset('img/'.$them->image)}}">
            </div>
            <div class="content_block">
                <p>
                {{$them->full_description}}
                </p>
            </div>

            <div class="button_group">
                <a href="#">Следующая тема</a>
                <a href="{{route('test.show',$them->id)}}">Тестирование</a>
            </div>

        </div>


@endsection
