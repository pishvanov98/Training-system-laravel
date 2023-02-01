@extends('layouts.app')
@section('content')

    @if($themes)
<div class="wrapper_card">
        @foreach($themes as $them )

            <a class="card" href="{{ route('theme.show',$them->id) }}" style="width: 18rem;">
                <img src=" {{ asset('img/'.$them->image) }} " class="card-img-top" alt="...">
                <div class="card-body">
                    {{$them->name_theme}}
                </div>
            </a>

        @endforeach
</div>
    @endif


@endsection
