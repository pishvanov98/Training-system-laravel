@extends('layouts.app')
@section('content')

    @if($mass_test)
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
       <div class="wrapper_test_slider">
           <div class="owl-carousel owl-theme">
               @php $i=1; @endphp
               @foreach($mass_test as $key=> $item_mass)
                   <div class="wrapper_test_item">
                       <div class="num_test"> {{$i.'/'.$count_mass_test}} </div>
                       <div class="text_quantity"> {{$key}} </div>
                       <div class="quantity_test">
                           @foreach($item_mass as $key=> $item)

                               <p>
                                   <input type="radio" id="contactChoice{{$key}}"
                                          name="test{{$i}}" >
                                   <label for="contactChoice{{$key}}">{{$item[0]}}</label>
                               </p>
                           @endforeach
                       </div>
                       @php $i++; @endphp
                   </div>
               @endforeach
           </div>

       </div>

        <div class="button_hide_test">
            <div class="go-prev"><</div>
            <div  class="go-next">></div>
        </div>
        <div class="wrapper_button_succes_test">

            <button type="button" class=" button_succes_test " onclick="check_status_test();" >Узнать результаты</button>

        </div>
        <div class="modal fade " id="exampleModalLive" tabindex="-1" aria-labelledby="exampleModalLiveLabel"  aria-modal="true" role="dialog">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h1 class="modal-title fs-5" id="exampleModalLiveLabel">Результат</h1>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body content_modal_block">

                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary close_modal_button" data-bs-dismiss="modal">Закрыть</button>
                        <button type="button" class="btn btn-primary action_modal_button"></button>
                    </div>
                </div>
            </div>
        </div>
        <script>
            var owl = $('.owl-carousel');
            $(document).ready(function() {

                @php if(!empty($isset_to_table)){ @endphp
                $('.content_modal_block').html('<p>Вы уже проходили тестирование</p>');
                $('.action_modal_button').text('Пройти повторно');
                $('.action_modal_button').attr('onclick', 'replay()');
                $('.modal.fade').addClass('show');

                @php }  @endphp

                owl.owlCarousel({
                    loop: false,
                    margin: 10,
                    dots: false,
                    items:1,
                });


                $('.go-prev').click(function() {
                    owl.trigger('prev.owl.carousel');
                });

                $('.go-next').click(function() {
                    owl.trigger('next.owl.carousel');
                });

            });


            $('.quantity_test p input ').on('click', function (){

                var count_test_all= {{$count_mass_test}};
                var count_test_active= 0;
                $( ".owl-item" ).each(function( index ) {
                    $( this ).find('p input').each(function ( index2 ){
                        if ($(this).is(':checked')){
                            count_test_active++;
                            return false;
                        }
                    })
                });

                if(count_test_active == count_test_all){
                    if(!$('.button_succes_test').hasClass('active')){
                        $('.button_succes_test').addClass('active');
                    }
                }

            });

            $('.close_modal_button').on('click', function (){

                if($('.modal').hasClass('show')){
                    $('.modal').removeClass('show');
                }

            });


            function login (){
                window.location.href = '{{ route('login') }}';
            }

            function replay (){

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

                $.ajax({
                    url:'{{route('test.delInfo')}}',
                    method:'post',
                    dataType:'json',
                    data:{id_test_tem : {{$id}}}
                })

                window.location.href = '{{ route('test.show',$id) }}';
            }

            function check_status_test (){

                var mass_test_all= new Array();


                $( ".owl-item" ).each(function( index ) {
                    var num_test_block = index+1;
                    $( this ).find('.quantity_test p').each(function ( index2 ){
                        var num_test = index2+1;
                        if ($(this).find('input').is(':checked')){
                            mass_test_all.push([num_test_block, num_test]);
                            return false;
                        }
                    })

                });

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url:'{{route('test.store')}}',
                method:'post',
                dataType:'json',
                data:{data : mass_test_all, mass_test_answer: '{{$mass_test_answer}}', id_test_tem : {{$id}}},
                success: function(data){
                  if(data['result'] == 0){
                      $('.content_modal_block').html('<p>Для анализа тестирования необходимо авторизоваться</p>');
                      $('.action_modal_button').text('Авторизоваться');
                      $('.action_modal_button').attr('onclick', 'login()');
                  }else if (data['result'] == 1){
                      $('.content_modal_block').html('<p>Вы уже проходили тестирование</p>');
                      $('.action_modal_button').text('Пройти повторно');
                      $('.action_modal_button').attr('onclick', 'replay()');
                  }else{
                      if(data['success']){
                          $('.content_modal_block').html(data['success']);
                          $('.action_modal_button').text('Пройти повторно');
                          $('.action_modal_button').attr('onclick', 'replay()');
                      }

                  }
                  $('.modal.fade').addClass('show');
                }

            })


            }



        </script>
@endif

@endsection
