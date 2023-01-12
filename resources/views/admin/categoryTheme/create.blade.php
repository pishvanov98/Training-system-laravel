@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <form action="{{ route('admin.category.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Название</label>
                <input type="text" name="name_category" class="form-control" id="exampleInputName" >
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

    </div>
@endsection
