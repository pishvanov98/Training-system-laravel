@extends('layouts.mainAdmin')
@section('content')

            <div class="main_content_admin">
                <h2> Загрузка картинки</h2>
                <div class=" wrapper_block_image">
                    <div class="mb-3">
                        <form action="{{  route('admin.image.upload') }}" method="post" enctype="multipart/form-data">
                            @csrf

                            <div class="flex_block">
                                <input class="form-control" name="image_upload" type="file" id="exampleInputImageUpload">
                                <button class="btn btn-secondary" type="submit">Загрузить</button>
                            </div>
                        </form>
                    </div>
                </div>

                @if(!empty($images))



                    <div class="del_test">
                        <h2>Удаление картинок</h2>
                        <div class="wrapper_block_test">
                            <form method="post" action="{{route('admin.image.delete')}}">
                                @csrf
                                @method('delete')
                                <select class="form-select " name="image" id="exampleInputImg" aria-label="Default select example">
                                    <option value="">Выберите картинку</option>
                                    @foreach($images as $image)
                                        <option value="{{$image->id}}" > {{$image->image_select}} </option>
                                    @endforeach
                                </select>
                                <button class="btn btn-secondary" type="submit">Выбрать</button>
                            </form>
                        </div>

                    </div>
                @endif

            </div>

@endsection
