<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title', 'StreeMakeBarbers')</title>
    <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-dark text-gray-100 font-sans min-h-screen flex flex-col">

    @include('layouts.navigation')

    <!-- Contenedor principal que se expande para empujar el footer hacia abajo -->
    <main class="flex-1 pt-24">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>
</html>
