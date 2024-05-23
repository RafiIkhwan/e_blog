<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
  <head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    @vite(['resources/css/app.css', 'resources/js/app.js', 'node_modules/flowbite/dist/flowbite.min.js'])
    <title>@yield('title')</title>
  </head>
  <body class="bg-[#F4F8FD] font-montserrat">
    <x-navbar />
    <main>
      @yield('content')
    </main>
  </body>
</html>