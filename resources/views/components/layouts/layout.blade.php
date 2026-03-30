<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <title>Document</title>
    <style>
        input, select, textarea {
            color: #000 !important;
        }

        input::placeholder {
            color: #555 !important;
        }
    </style>


    @vite (["resources/css/app.css", "resources/js/app.js"])

</head>

<body>
<x-layouts.header />
<x-layouts.nav />
<x-pruebas.cabecera>Hola pruebas cabecera</x-pruebas.cabecera>

<main class="lg:h-main bg-main">
    {{$slot}}
    @yield('content')
</main>
<x-danger-button>danger button</x-danger-button>
<x-pruebas.boton>Hola pruebas boton</x-pruebas.boton>
<x-layouts.aside  />
<x-layouts.footer />

@stack('scripts')
</body>

</html>
