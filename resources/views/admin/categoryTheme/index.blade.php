@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">
        <div class="top_block"><h2> Страница  с категориями к темам</h2><a href="{{ route('admin.category.create')  }}">Добавить категорию</a></div>

        @foreach($data as $category_theme)
            <div class="container_category_theme">
                <div class="content_theme">
                    <span class="name_theme"> {{ $category_theme->name_category }} </span>
                </div>
                <div class="button_edit_theme">
                    <form action="{{ route('admin.category.delete',$category_theme->id)  }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection
