<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">

    <title>Админ панель</title>
</head>
<body>

<header class="header_top_block">
    <a href="#">Company name</a>
</header>
<div class="wrapper_content_admin">
<div class="container-list">
                <ul>
                    <li >
                        <a  href="{{ route('admin')  }}"> Главная </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.theme')  }}">Темы </a>
                    </li>
                    <li>
                        <a href="{{ route('admin.category')  }}">Категории тем </a>
                    </li>
                    <li>
                        <a href="#"> Тесты тем </a>
                    </li>
                    <li>
                        <a href="#"> Практика тем </a>
                    </li>
                    <li >
                        <a href="#"> Ученики</a>
                    </li>
                </ul>

</div>
    @yield('content')
</div>
</body>
</html>
