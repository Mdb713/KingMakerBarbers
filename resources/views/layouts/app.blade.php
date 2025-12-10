<!DOCTYPE html>
<html lang="es">

<head>
    @include('layouts.navigation')
</head>

<body class="bg-dark text-gray-100 font-sans min-h-screen flex flex-col">


    <main class="flex-1 pt-24">
        @yield('content')
    </main>

    @include('layouts.footer')

</body>

</html>
