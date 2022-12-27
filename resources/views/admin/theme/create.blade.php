@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <form>
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Название</label>
                <input type="text" class="form-control" id="exampleInputName" aria-describedby="NameHelp">
                <div id="NameHelp" class="form-text">Введите название темы</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputThem" class="form-label">Категория темы</label>
                <input type="text" class="form-control" id="exampleInputThem" aria-describedby="ThemHelp">
                <div id="ThemHelp" class="form-text">Введите название категории</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Картинка темы</label>
                <input type="text" class="form-control" id="exampleInputImage" aria-describedby="ImageHelp">
                <div id="ImageHelp" class="form-text">Введите название каринки</div>
            </div>
            <div class="mb-3">
                <label for="exampleInputSmallDescription" class="form-label">Маленькое описание темы</label>
                <textarea class="form-control" id="exampleInputSmallDescription" rows="3"></textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputFullDescription" class="form-label">Полное описание темы</label>
                <textarea class="form-control" id="exampleInputFullDescription" rows="3"></textarea>
            </div>

            <button type="submit" class="btn btn-primary">Submit</button>
        </form>

    </div>
@endsection
