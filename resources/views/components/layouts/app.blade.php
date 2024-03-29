<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <title>@yield('title')</title>

        <link rel="icon" type="image/x-icon" href="{{ asset('/img/Logo NUtrimet No Text.png') }}">
        <link rel="preconnect" href="https://fonts.googleapis.com">
        <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
        <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;500;700&display=swap" rel="stylesheet">
        <script src="https://cdn.tailwindcss.com"></script>
        <script>
            tailwind.config = {
                theme: {
                    extend: {
                        fontFamily: {
                            montserrat: ['Montserrat']
                        },
                        colors: {
                            primary1: '#DD6077',
                            primary2: '#D43955',
                            primary3: '#CC1133',
                            primary4: '#AA0E2A',
                            primary5: '#880B22',
                            success: '#00FF00'
                        }
                    }
                }
            }
        </script>
    </head>
    @yield('styles')
    @livewireStyles
    <body class="font-montserrat">
        @yield('contents')
        {{ $slot }}

        <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
        <script>
            import Swal from 'sweetalert2';
        </script>
        @yield('scripts')
        @livewireScripts
    </body>
</html>
