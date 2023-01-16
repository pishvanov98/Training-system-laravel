@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">
        <div class="top_block"><h2> Страница  с темами</h2><a href="{{ route('admin.theme.create')  }}">Добавить тему</a></div>
        @foreach($data as $theme)
            <div class="container_theme">
                <div class="content_theme">

                    <img  src=" {{ asset('img/'.$theme->image) }} "  >
                    <span class="name_theme"> {{ $theme->name_theme }} </span>
                    <span class="description_theme"> {{ $theme->small_description }} </span>
                </div>
                <div class="button_edit_theme">

                    <a href="{{ route('admin.theme.edit',$theme->id )  }}" > Изменить</a>

                    <form action="{{ route('admin.theme.delete',$theme->id)  }}" method="post">
                        @csrf
                        @method('delete')
                        <input type="submit" value="Удалить">
                    </form>
                </div>
            </div>
        @endforeach

    </div>
@endsection
