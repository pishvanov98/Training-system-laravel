<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href=" {{ asset('css/app.css') }} ">

    <title>Document</title>
</head>
<body>

<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
    <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Company name</a>
</header>

<div class="container-fluid">
    <div class="row">
        <nav id="sidebarMenu" class="col-xl-2 col-md-3 col-lg-2 d-md-block bg-light sidebar ">
            <div class="position-sticky pt-3">
                <ul class="nav flex-column">
                    <li class="nav-item">
                        <a class="nav-link active"  href="#">
                            Главная
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Темы
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Тесты
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                           Практика
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" href="#">
                            Ученики
                        </a>
                    </li>
                </ul>
            </div>
        </nav>

    @yield('content')

    </div>
</div>

</body>
</html>
