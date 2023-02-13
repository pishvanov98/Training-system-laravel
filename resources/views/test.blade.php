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

                               <div>
                                   <input type="radio" id="contactChoice{{$key}}"
                                          name="test{{$i}}" value="{{$item[1]}}">
                                   <label for="contactChoice{{$key}}">{{$item[0]}}</label>
                               </div>
                           @endforeach
                       </div>
                       @php $i++; @endphp
                   </div>
               @endforeach
           </div>


       </div>

        <script>
            var owl = $('.owl-carousel');
            $(document).ready(function() {

                owl.owlCarousel({
                    loop: false,
                    margin: 10,
                    nav: true,
                    // navText: ["<<",">>"],
                    dots: false,
                    items:1,
                });


                // $('.go-prev').click(function() {
                //     owl.trigger('prev.owl.carousel');
                // });
                //
                // $('.go-next').click(function() {
                //     owl.trigger('next.owl.carousel');
                // });



                // $('.owl-carousel').on('changed.owl.carousel', function(e) {
                //
                //     var items     = e.item.count;     // Number of items
                //     var item      = e.item.index;     // Position of the current item
                //     var size      = e.page.size;      // Number of items per page
                //
                //     if (item < items) {
                //
                //
                //         if(!$('.go-next').hasClass('active')){
                //             $('.go-next').addClass('active');
                //         }
                //
                //
                //     }
                //
                //     if ((items - item) === size) {
                //
                //         if($('.go-next').hasClass('active')){
                //             $('.go-next').removeClass('active');
                //         }
                //
                //     }
                //
                // });


            });



        </script>
@endif

@endsection
