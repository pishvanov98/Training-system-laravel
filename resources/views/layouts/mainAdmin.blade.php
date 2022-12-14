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
                        <a class="active" href="#"> Главная </a>
                    </li>
                    <li>
                        <a href="#">Темы </a>
                    </li>
                    <li>
                        <a href="#"> Тесты </a>
                    </li>
                    <li>
                        <a href="#"> Практика </a>
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
