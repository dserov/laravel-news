<!doctype html>
<html lang="ru" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <title>@section("title") Страница @show</title>
</head>
<body class="h-full">
    <div class="container h-full border-2 bg-gray-100 mx-auto max-w-screen-lg">
        <div class="content min-h-full">
            <div class="header border-b-2">
                @include("blocks.menu")
            </div>
            @yield("content")
            <div class="h-24"></div>
        </div>
        <div class="footer -mt-24 h-24 border-t-2 bg-gray-400">
            Все права защишены &copy; @php date('Y') @endphp
        </div>
    </div>
</body>
</html>
