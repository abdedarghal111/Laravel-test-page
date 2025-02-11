<!DOCTYPE html>
<html lang="es">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>lista cortos</title>

        @vite(['resources/sass/app.scss', 'resources/js/app.js'])
    </head>
    <body class="p-0 m-0">
        <wrapper>
        @include("partials.header")
        <main class="container my-5">
        @yield('main')
        </main>
        @include("partials.footer")
        </wrapper>
    </body>
</html>