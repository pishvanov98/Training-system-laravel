@extends('layouts.mainAdmin')
@section('content')

    <div class="main_content_admin">


            <table class="table">
                <thead>
                <tr>
                    <th scope="col">#</th>
                    <th scope="col">Имя</th>
                    <th scope="col">Пройдено вопросов</th>
                    <th scope="col">Всего вопросов</th>
                </tr>
                </thead>
                <tbody>
                @if($mass_user)

                    @foreach($mass_user as $item)

                        <tr>
                            <th scope="row">{{$item[0]}}</th>
                            <td>{{$item[1]}}</td>
                            <td>{{$item[2]}}</td>
                            <td>{{$item[3]}}</td>
                        </tr>

                    @endforeach
                @endif
                </tbody>
            </table>


    </div>

@endsection
