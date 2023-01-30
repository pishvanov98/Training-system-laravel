@extends('layouts.app')
@section('content')

    @if($themes)

        @foreach($themes as $them )

            <div class="card" style="width: 18rem;">
                <img src="..." class="card-img-top" alt="...">
                <div class="card-body">
                    {{$them->small_description}}
                </div>
            </div>

        @endforeach

    @endif


@endsection
