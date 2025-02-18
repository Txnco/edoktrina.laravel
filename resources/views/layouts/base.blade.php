<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>{{ config('app.name') }}</title>
    @vite('resources/css/app.css')

    <!-- jQuery (v3.7.0) -->
    <script src="https://code.jquery.com/jquery-3.7.0.min.js"></script>
    <!-- jQuery Validation Plugin -->
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-validate/1.19.5/jquery.validate.min.js"></script>



</head>
<body>
    

    @yield('content')

  
    <script>

        $(document).ready(function() {
            var currentTheme = localStorage.getItem('theme') || 'light';
            $('html').attr('data-theme', currentTheme);

            $('#theme-toggle').on('click', function() {
                var newTheme = $('html').attr('data-theme') === 'dark' ? 'light' : 'dark';
                $('html').attr('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
            });

            $('#theme-toggle2').on('click', function() {
                var newTheme = $('html').attr('data-theme') === 'dark' ? 'light' : 'dark';
                $('html').attr('data-theme', newTheme);
                localStorage.setItem('theme', newTheme);
            });
        });
    
    </script>

</body>
</html>