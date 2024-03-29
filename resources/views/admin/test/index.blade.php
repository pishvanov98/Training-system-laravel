@extends('layouts.mainAdmin')
@section('content')

    <div class="main_content_admin">
        <h2> Добавление тестов </h2>
    <div class="wrapper_block_test">
        @if(empty($themes))
            <p>Добавьте тему</p>
        @else

            <form method="get" action="{{route('admin.test.create')}}">

            <select class="form-select " name="them" id="exampleInputThem" aria-label="Default select example">
                <option value="">Выберите тему</option>
            @foreach($themes as $them)
                    <option value="{{$them->id}}" > {{$them->name_theme}} </option>
                @endforeach
            </select>
                <button class="btn btn-secondary" type="submit">Выбрать</button>
            </form>
        @endif
    </div>


        @if($tests)
            <div class="del_test">
                <h2>Удаление тестов</h2>
                <div class="wrapper_block_test">
                <form method="post" action="{{route('admin.test.delete')}}">
                    @csrf
                    @method('delete')
                    <select class="form-select " name="test" id="exampleInputTest" aria-label="Default select example">
                        <option value="">Выберите тему</option>
                        @foreach($tests as $test)
                            <option value="{{$test->id}}" > {{$test->name_tem}} </option>
                        @endforeach
                    </select>
                    <button class="btn btn-secondary" type="submit">Выбрать</button>
                </form>
                </div>

            </div>
        @endif

    </div>

@endsection
