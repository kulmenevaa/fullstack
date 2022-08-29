<!DOCTYPE html>
<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta name="csrf-token" content="{{ csrf_token() }}">
        <link rel="shortcut icon" href="{{ asset('/public/favicon.ico') }}" type="image/x-icon">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/boxicons@latest/css/boxicons.min.css">
        <link rel="stylesheet" href="{{ asset('/public/css/app.css') }}">
    </head>
    <body>
        <div id="app">
            <app></app>
        </div>
        <script src="{{ asset('/public/js/app.js') }}"></script>
    </body>
</html>
