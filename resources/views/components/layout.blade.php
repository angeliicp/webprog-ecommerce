<html lang="en" class="h-full">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    @vite(['resources/css/app.css','resources/js/app.js'])
    <script src="https://cdn.jsdelivr.net/npm/simple-datatables@9.0.3"></script>
    <script src="https://unpkg.com/flowbite@^1/dist/flowbite.min.js" defer></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts@3.46.0/dist/apexcharts.min.js"></script>

    <title>Scentify</title>
</head>

<body class="h-full">
    <div class="min-h-full">

        @include('components.navbar')

        <main>
          <div class="max-w-screen-xl mx-auto py-1 items-center justify-between pt-20">

            @yield('content')
            
          </div>
        </main>

        @include('components.footer')
    </div>
</body>
</html>