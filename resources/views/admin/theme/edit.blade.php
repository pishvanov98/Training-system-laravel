@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <form action="{{ route('admin.theme.update',$data->id) }}" method="post">
            @csrf
            @method('patch')
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Название</label>
                <input type="text" value="{{$data->name_theme}}" name="name_theme" class="form-control" id="exampleInputName" >
            </div>
            <div class="mb-3">
                <label for="exampleInputThem" class="form-label">Категория темы</label>
                <input type="text" value="{{$data->category}}" name="category" class="form-control" id="exampleInputThem" >
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Картинка темы</label>
                <input type="text" value="{{$data->image}}" name="image" class="form-control" id="exampleInputImage" >
            </div>
            <div class="mb-3">
                <label for="exampleInputSmallDescription" class="form-label">Маленькое описание темы</label>
                <textarea name="small_description" class="form-control" id="exampleInputSmallDescription" rows="3">{{$data->small_description}}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputFullDescription" class="form-label">Полное описание темы</label>
                <textarea name="full_description" class="form-control" id="exampleInputFullDescription" rows="3">{{$data->full_description}}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Изменить</button>
        </form>

    </div>
@endsection
