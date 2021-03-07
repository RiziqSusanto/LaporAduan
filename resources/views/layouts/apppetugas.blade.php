<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
    <link href="{{ asset('css/styles.css') }}" rel="stylesheet">
    <link href="{{ asset('fontawesome/css/all.min.css') }}" rel="stylesheet">
    <link href="{{ asset('plugin/dataTables.bootstrap4.min.css') }}" rel="stylesheet">
</head>
<body class="bg-dark-600">
    @include('components.navbarpetugas')
    @yield('content')
    <!-- Scripts -->
    <script src="{{ asset('plugin/jquery.min.js') }}"></script>
    <script src="{{ asset('js/app.js') }}"></script>
    <script src="{{ asset('fontawesome/js/all.min.js') }}"></script>
    <script src="{{ asset('plugin/jquery.dataTables.min.js') }}"></script>
    <script src="{{ asset('plugin/dataTables.bootstrap4.min.js') }}"></script>
    <script>
        $(document).ready(function() {
            $('#pengaduanJoin').DataTable({
                "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
            });
            $('#logStatus').DataTable({
                "lengthMenu": [ 5, 10, 25, 50, 75, 100 ]
            });
            $('#pengaduan').DataTable();
            $('#activitylog').DataTable();
        })
    </script>
</body>
</html>