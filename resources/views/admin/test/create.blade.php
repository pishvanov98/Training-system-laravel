@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <p> {{ $id_them }}</p>


            <div class="mb-3">
                <label for="exampleInputquestion" class="form-label">Введите вопрос</label>
                <input type="text" name="question" class="form-control" id="exampleInputquestion" >

            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>

{{-- сделать реализацию добавления доп полей с вариантами ответа,  делаем перебор по одинаковым классам и берем
у них вариант ответа и правильный он или нет и передаем аджаксом вопрос и варианты ответа jsonom и записываем в бд id темы вопрос и варианты --}}

        <div class="answer_create_block">

            <div class="mb-3 answer_create_item">
                <label for="exampleInputanswer" class="form-label">Введите вариант ответа</label>
                <input type="text" name="answer" class="form-control" id="exampleInputanswer" >
                <div class="form-check">
                    <input class="form-check-input" name="correct_answer" type="checkbox" value="" id="correct_answer">
                    <label class="form-check-label" for="correct_answer">
                        Правильный ответ
                    </label>
                </div>
            </div>

            <button type="submit" class="btn btn-primary">Сохранить</button>
            <button type="submit" class="btn btn-primary">Добавить вариант ответа</button>
        </div>

    </div>
@endsection
