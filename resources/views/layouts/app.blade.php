<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>AdminLTE 3 | Starter</title>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js"
        integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ=="
        crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet"
        href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/fontawesome-free/css/all.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('backend/dist/css/adminlte.min.css') }}">
    <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">
        <link rel="stylesheet"
        href="{{ asset('backend/plugins/tempusdominus-bootstrap-4/css/tempusdominus-bootstrap-4.css') }}">
  {{--   <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script> --}}
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <!-- iCheck -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/icheck-bootstrap/icheck-bootstrap.min.css') }}">
    <!-- Select2 -->
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2/css/select2.min.css') }}">
    <link rel="stylesheet" href="{{ asset('backend/plugins/select2-bootstrap4-theme/select2-bootstrap4.min.css') }}">
    <!-- Styles -->

    @vite(['resources/css/app.css', 'resources/js/app.js', 'resources/css/custom.css'])
    <!-- Styles -->

    @livewireStyles
</head>

<body class="font-sans antialiased">
    <x-banner />

    @include('layouts.partials.header')
    @yield('hero')

    {{--  <main class="container mx-auto px-5 flex flex-grow"> --}}
    <main class="container">
        {{ $slot }}

    </main>

    @include('layouts.partials.footer')
    @stack('modals')

    {{-- <livewire:Scripts> --}}
    <script src="{{ asset('backend/plugins/jquery/jquery.min.js') }}"></script>
    <script type="text/javascript" src="{{ asset('backend/plugins/moment/moment.js') }}"></script>
    {{-- <script type="text/javascript" src="https://unpkg.com/moment"></script> --}}
    <script type="text/javascript"
        src="{{ asset('backend/plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js') }}"></script>
    <script src="{{ asset('backend/plugins/select2/js/select2.full.min.js') }}"></script>


    {{--  <script>
        $(document).ready(function() {
            jQuery('#publicarDate').datetimepicker();
        });


        $('#publicarDate').on('change', function(){
                    var valor=this.value;

                      $('#span1').text(valor);
                }) --}}

    {{--   /*   $(document).ready(function() {
            $('#appointmentDate').datatimepicker({
                format: 'dd/mm/yyyy',
                language: 'es',
                autoclose: true,
            })

            $('#appointmentDate').on("change.datetimepicker", function(e) {
                alert('here');
            });
        }); */
    </script> --}}
    {{-- <livewire:Scripts/> --}}
    <script>
        $(document).ready(function() {
            $('#testdropdown').select2();
        });
    </script>
    {{-- @stack('js') --}}
    @livewireScripts
</body>
</html>
