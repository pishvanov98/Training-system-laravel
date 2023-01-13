@extends('layouts.mainAdmin')
@section('content')

            <div class="main_content_admin">

                <p>Загрузка картинки</p>

                <div class="mb-3">
                    <form action="{{  route('admin.image.upload') }}" method="post" enctype="multipart/form-data">
                        @csrf

                        <label for="exampleInputImageUpload" class="form-label">Картинка темы</label>
                        <input class="form-control" name="image_upload" type="file" id="exampleInputImageUpload">

                        <button type="submit">Загрузить</button>
                    </form>
                </div>

            </div>

@endsection
