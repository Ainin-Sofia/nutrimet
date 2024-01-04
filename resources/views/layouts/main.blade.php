<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>@yield('title')</title>
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
                        primary5: '#880B22'
                    }
                }
            }
        }
    </script>
    @yield('styles')
</head>
<body class="font-montserrat">
    @yield('contents')

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script>
        import Swal from 'sweetalert2';
    </script>
    @yield('scripts')
</body>
</html>