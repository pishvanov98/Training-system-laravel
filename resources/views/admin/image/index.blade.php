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
            </div>

@endsection
