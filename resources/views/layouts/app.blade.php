<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'HairLab')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-dark text-gray-100 font-sans">

@include('layouts.navigation')

<main class="pt-24">
    @yield('content')
</main>

@include('layouts.footer')

</body>
</html>
