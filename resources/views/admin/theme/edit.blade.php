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
                <select class="form-select  @php if($errors->has('category')) { echo('error'); } @endphp" name="category" id="exampleInputThem" aria-label="Default select example">

                    @if(empty($categories))
                        <option value="" selected>Добавьте категорию</option>
                    @else
                        <option value="" >Выберите категорию</option>
                        @foreach($categories as $category)
                            <option {{  $data->category == $category->id ? 'selected':''  }} value="{{$category->id}}">{{ $category->name_category}}</option>
                        @endforeach
                    @endif
                </select>
            </div>
            <div class="mb-3">
                <label for="exampleInputImage" class="form-label">Картинка темы</label>
                <select class="form-select @php if($errors->has('image')) { echo('error'); } @endphp" name="image" id="exampleInputImage" aria-label="Default select example">

                    @if(empty($images))
                        <option value="" selected>Добавьте картинку</option>
                    @else
                        <option value="" >Выберите картинку</option>
                        @foreach($images as $image)
                            <option {{  $data->image == $image->image_to_server ? 'selected':''  }} value="{{$image->image_to_server}}">{{ $image->image_select}}</option>
                        @endforeach
                    @endif
                </select>

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
