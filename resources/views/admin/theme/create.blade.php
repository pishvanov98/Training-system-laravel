@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <form action="{{ route('admin.theme.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Название</label>
                <input type="text" name="name_theme" class="form-control" id="exampleInputName" >
            </div>
            <div class="mb-3">
            <label for="exampleInputThem" class="form-label">Категория темы</label>
            <select class="form-select" name="category" id="exampleInputThem" aria-label="Default select example">
                <option selected>Выберите категорию</option>
                @foreach($categories as $category)
                    <option value="{{$category->id}}">{{ $category->name_category}}</option>
                    @endforeach
            </select>
            </div>
            <div class="mb-3">
                    <label for="exampleInputImage" class="form-label">Картинка темы</label>
                    <input class="form-control" name="image" type="file" id="exampleInputImage">
            </div>
            <div class="mb-3">
                <label for="exampleInputSmallDescription" class="form-label">Маленькое описание темы</label>
                <textarea name="small_description" class="form-control" id="exampleInputSmallDescription" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputFullDescription" class="form-label">Полное описание темы</label>
                <textarea name="full_description" class="form-control" id="exampleInputFullDescription" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

    </div>
@endsection
