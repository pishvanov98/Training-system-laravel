@extends('layouts.app')
@section('content')

    @if($mass_test)
        <script src="{{asset('js/owl.carousel.min.js')}}"></script>
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
        <div class="button_hide_test">
            <div class="go-prev">назад</div>
            <div class="go-next">вперед</div>
        </div>
        <script>
            $(document).ready(function() {

                var owl = $('.owl-carousel');

                owl.owlCarousel({
                    loop: true,
                    margin: 10,
                    nav: false,
                    dots: false,
                    responsive: {
                        0: {
                            items: 2
                        }
                    }
                });

                $('.go-prev').click(function() {
                    owl.trigger('prev.owl.carousel');
                });

                $('.go-next').click(function() {
                    owl.trigger('next.owl.carousel');
                });
            });


        </script>
@endif

@endsection
