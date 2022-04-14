<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>The Competition</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">

        <link href="{{ asset('/view/css/bootstrap.min.css') }}" rel="stylesheet">
        <link href="{{ asset('/view/css/style.css') }}" rel="stylesheet">

        @livewireStyles
    </head>
    <body>

    @livewire('start-game')

    <script src="{{ asset('/view/js/jquery.min.js') }}"></script>
    <script src="{{ asset('/view/js/bootstrap.min.js') }}"></script>
    <script src="{{ asset('/view/js/scripts.js') }}"></script>

    @livewireScripts
    </body>
</html>
