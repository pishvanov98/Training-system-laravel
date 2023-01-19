@extends('layouts.mainAdmin')
@section('content')
    <div class="main_content_admin">

        <p> {{ $id_them }}</p>
        <div class="block_test_wrapper">


{{--            шаблон вопроса--}}
            <div class="block_test hide">
                <div class="mb-3">
                    <label for="exampleInputquestion" class="form-label num_question"></label>
                    <input type="text" name="question" class="form-control" id="exampleInputquestion" >

                </div>

                <div class="answer_create_block">

                    <div class="mb-3 answer_create_item">
                        <label for="exampleInputanswer" class="form-label num_answer"></label>
                        <input type="text" name="answer" class="form-control" id="exampleInputanswer" >
                        <div class="form-check">
                            <input class="form-check-input" name="correct_answer" type="checkbox" value="" id="correct_answer">
                            <label class="form-check-label" for="correct_answer">
                                Правильный ответ
                            </label>
                        </div>
                    </div>
                </div>
                <button type="submit" class="btn btn-primary add_answer " onclick="add_answer();">Добавить вариант ответа</button>
            </div>




            {{--            шаблон ответа--}}
            <div class="mb-3 answer_create_item hide">
                <label for="exampleInputanswer" class="form-label num_answer">Введите вариант ответа</label>
                <input type="text" name="answer" class="form-control" id="exampleInputanswer" >
                <div class="form-check">
                    <input class="form-check-input" name="correct_answer" type="checkbox" value="" id="correct_answer">
                    <label class="form-check-label" for="correct_answer">
                        Правильный ответ
                    </label>
                </div>
            </div>



            {{-- сделать реализацию добавления доп полей с вариантами ответа,  делаем перебор по одинаковым классам и берем
             у них вариант ответа и правильный он или нет и передаем аджаксом вопрос и варианты ответа jsonom и записываем в бд id темы вопрос и варианты --}}

        </div>
        <div class="block_test_bottom">
                    <button type="submit" class="btn btn-primary add_question" onclick="add_question();">Добавить вопрос</button>
                    <button type="submit" class="btn btn-primary save_test">Сохранить тест</button>
        </div>
    </div>

    <script>

        $(function() {
            add_question();
        });

        var num=1;
        var num_answer = 2;
        function add_question(){

           $(".block_test.hide").clone().appendTo($(".block_test_wrapper"));

           $('.block_test:last-child').removeClass('hide');

           $('.block_test:last-child .num_question').text("Введите вопрос №"+num);
            // $('.block_test:last-child ').addClass("block_test_num"+question);
            $('.block_test:last-child .answer_create_block').addClass("add_answer_num"+num);
            $('.block_test:last-child .add_answer').attr("onclick","add_answer('add_answer_num"+num+"')");
           $('.block_test:last-child .answer_create_block .num_answer').text("Введите вариант ответа №1");
            num++;
            num_answer= 2;
       }

           function add_answer(item_answer){
               console.log();
               $(".answer_create_item.hide").clone().appendTo($("."+item_answer));
               $(".answer_create_block .answer_create_item:last-child .num_answer").text("Введите вариант ответа №"+num_answer);
               $(".answer_create_block .answer_create_item:last-child").removeClass('hide');
               num_answer++;
           }

    </script>

@endsection
