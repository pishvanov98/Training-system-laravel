@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">
        <div class="top_block"><h2> Страница  с темами</h2><a href="#">Добавить тему</a></div>
        @foreach($themes as $theme)
            <div class="container_theme">
                <a href="#">
                    <img  src=" {{ asset($theme->image) }} "  >
                    <span class="name_theme"> {{ $theme->name_theme }} </span>
                    <span class="description_theme"> {{ $theme->small_description }} </span>
                </a>
                <div class="button_edit_theme">
                    <a href="#"> Изменить</a>
                    <a href="#"> Удалить</a>
                </div>
            </div>
        @endforeach

    </div>
@endsection
