@extends('layouts.main')
@section('content')

    @guest

        <a href="{{ route('login')  }}">Вход</a>
    @else
        <a  href="{{ route('logout') }}"
           onclick="event.preventDefault();
           document.getElementById('logout-form').submit();">
            Выйти
        </a>

        <form id="logout-form" style="display: none" action="{{ route('logout') }}" method="POST" >
            @csrf
        </form>
    @endguest

@endsection
