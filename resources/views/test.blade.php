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

        <script>
            var owl = $('.owl-carousel');
            $(document).ready(function() {

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



                $('.owl-carousel').on('changed.owl.carousel', function(e) {



                    // var items     = e.item.count;     // Number of items
                    // var item      = e.item.index;     // Position of the current item
                    // var size      = e.page.size;      // Number of items per page

                    // if (item < items) {
                    //
                    //
                    //     console.log('Start');
                    //
                    //
                    // }
                    //
                    // if ((items - item) === size) {
                    //
                    //  console.log('the end');
                    //
                    // }

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
                    console.log('Все заполнено');
                    if(!$('.button_succes_test').hasClass('active')){
                        $('.button_succes_test').addClass('active');
                    }
                }

            });


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
            console.log(mass_test_all);

                $.ajaxSetup({
                    headers: {
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    }
                });

            $.ajax({
                url:'{{route('test.store')}}',
                method:'post',
                dataType:'json',
                data:{data : mass_test_all, id_test : {{$id}}},
                success: function(data){
                    alert(data);
                }

            })


            }



        </script>
@endif

@endsection
