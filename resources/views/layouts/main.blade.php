<!DOCTYPE html>
<html lang="ru">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Pastebin</title>
{{--    @vite(['resources/js/app.js'])--}}
    <!-- CodeMirror -->
    @include('layouts.codemirror')
    <!----------------------->
    <style>
        .form-control {
            background: white;
            color: black;
        }
    </style>
</head>

<body>
    <div class="container-fluid mt-3">
        <div class="row">
            <div class="col-1">
                <a href="{{ route('pastes.create') }}">Создать пасту</a>
                <h4>Новые пасты</h4>
                @foreach ($publicPastes as $paste)
                    <p><a href="{{ route('pastes.show', $paste->url) }}">{{ $paste->title }}</a></p>
                @endforeach
            </div>

            <div class="col-10">
                @yield('content')
            </div>

            <div class="col-1">
                @include('layouts.auth')
            </div>
        </div>
    </div>
</body>

</html>
