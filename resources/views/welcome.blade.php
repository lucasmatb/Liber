<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>Liber</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">
        <link rel="stylesheet" href="{{ asset('css/welcome.css') }}">

    </head>
    <body>
        <div class="flex-center position-ref full-height">
            @if (Route::has('login'))
                    <div class="top-right links">
                    @if(Auth::guard('professor')->check() || Auth::check() || Auth::guard('admin')->check())
                        <a href="{{ url('/home') }}">Home</a>
                    @else
                        <a href="{{ route('login') }}">Aluno</a>
                        <a href="{{ url('/professor') }}">Professor</a>
                    @endif
                </div>
            @endif
            <div class="content">
                <div class="title m-b-md">
                    Liber
                </div>
            </div>
        </div>
    </body>
</html>
