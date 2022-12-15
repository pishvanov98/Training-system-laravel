@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">
        <h2> Страница  с темами</h2>
        @foreach($themes as $theme)
            <div>
                <a href="#">
                    <img  src=" {{ asset($theme->image) }} "  >
                    <span> {{ $theme->name_theme }} </span>
                    <span> {{ $theme->small_description }} </span>
                </a>
            </div>
        @endforeach

    </div>
@endsection
