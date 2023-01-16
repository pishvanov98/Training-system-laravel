@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <form action="{{ route('admin.theme.store') }}" method="post">
            @csrf
            <div class="mb-3">
                <label for="exampleInputName" class="form-label">Название</label>
                <input value="{{ old('name_theme') }}" type="text" name="name_theme" class="form-control  @php if($errors->has('name_theme')) { echo('error'); } @endphp " id="exampleInputName" >
            </div>
            <div class="mb-3">
            <label for="exampleInputThem" class="form-label">Категория темы</label>
            <select class="form-select @php if($errors->has('category')) { echo('error'); } @endphp " name="category" id="exampleInputThem" aria-label="Default select example">

                @if(empty($categories))
                    <option value="" selected>Добавьте категорию</option>
                @else
                    <option value="" selected>Выберите категорию</option>
                    @foreach($categories as $category)
                        <option value="{{$category->id}}">{{ $category->name_category}}</option>
                    @endforeach
                @endif
            </select>
            </div>
            <div class="mb-3">
                    <label for="exampleInputImage" class="form-label">Картинка темы</label>
                    <select class="form-select @php if($errors->has('image')) { echo('error'); } @endphp " name="image" id="exampleInputImage" aria-label="Default select example">

                        @if(empty($images))

                            <option value="" selected>Добавьте картинку</option>

                        @else

                            <option value="" selected>Выберите картинку</option>
                            @foreach($images as $image)
                                <option value="{{$image->image_to_server}}">{{ $image->image_select}}</option>
                            @endforeach

                            @endif
                    </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputSmallDescription" class="form-label">Маленькое описание темы</label>
                <textarea name="small_description" class="form-control  @php if($errors->has('small_description')) { echo('error'); } @endphp" id="exampleInputSmallDescription" rows="3">{{ old('small_description') }}</textarea>
            </div>
            <div class="mb-3">
                <label for="exampleInputFullDescription" class="form-label">Полное описание темы</label>
                <textarea name="full_description" class="form-control @php if($errors->has('full_description')) { echo('error'); } @endphp " id="exampleInputFullDescription" rows="3">{{ old('full_description') }}</textarea>
            </div>

            <button type="submit" class="btn btn-primary">Добавить</button>
        </form>

    </div>
@endsection
