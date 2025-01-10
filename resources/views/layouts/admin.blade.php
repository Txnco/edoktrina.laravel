<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')
  
</head>
<body class="bg-[#f1f1f1] text-[#333] font-sans">
    @include('partials.admin.header')

    @yield('content')

</body>
</html>
