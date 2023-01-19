@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <p> {{ $id_them }}</p>
        <div class="block_test_wrapper">
                <div class="block_test">
                            <div class="mb-3">
                                <label for="exampleInputquestion" class="form-label">Введите вопрос №1</label>
                                <input type="text" name="question" class="form-control" id="exampleInputquestion" >

                            </div>

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
                            <button type="submit" class="btn btn-primary">Добавить вариант ответа</button>
                        </div>
                </div>
        </div>
        <div class="block_test_bottom">
                    <button type="submit" class="btn btn-primary add_question" onclick="add_question();">Добавить вопрос</button>
                    <button type="submit" class="btn btn-primary save_test">Сохранить тест</button>
        </div>
    </div>

    <script>


       function add_question(){
           alert('dsa');

           $(".block_test_wrapper").append($(".block_test"));

       }

    </script>

@endsection
