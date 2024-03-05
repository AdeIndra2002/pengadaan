<!DOCTYPE html>
<html lang="id">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>BAWASLU | Pengadaan</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logokalsel.png') }}">


    <!-- Google Font: Source Sans Pro -->
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <!-- Font Awesome Icons -->
    <link rel="stylesheet" href="{{ asset('plugins/fontawesome-free/css/all.min.css') }}">
    <!-- overlayScrollbars -->
    <link rel="stylesheet" href="{{ asset('plugins/overlayScrollbars/css/OverlayScrollbars.min.css') }}">
    <!-- Theme style -->
    <link rel="stylesheet" href="{{ asset('dist/css/adminlte.min.css') }}">

</head>
<body class="hold-transition dark-mode sidebar-mini layout-fixed layout-navbar-fixed layout-footer-fixed">
    <div class="wrapper">

        <!-- Preloader -->
        <div class="preloader flex-column justify-content-center align-items-center">
            <img class="" src="{{ asset('dist/img/kalsel.png') }}" alt="BawasluLogo" height="15%" width="20%">

        </div>
        {{-- navbar atas --}}
        @include('template.navbar')

        {{-- sidebar --}}
        @include('template.sidebar')

        @yield('konten')

        <!-- Control Sidebar -->
        <aside class="control-sidebar control-sidebar-dark">
            <!-- Control sidebar content goes here -->
        </aside>
        <!-- /.control-sidebar -->

        {{-- footer --}}
        @include('template.footer')
    </div>
    <!-- ./wrapper -->


    <!-- REQUIRED SCRIPTS -->
    <!-- jQuery -->
    <script src="{{ asset('plugins/jquery/jquery.min.js') }}"></script>
    <!-- Bootstrap -->
    <script src="{{ asset('plugins/bootstrap/js/bootstrap.bundle.min.js') }}"></script>
    <!-- overlayScrollbars -->
    <script src="{{ asset('plugins/overlayScrollbars/js/jquery.overlayScrollbars.min.js') }}"></script>
    <!-- AdminLTE App -->
    <script src="{{ asset('dist/js/adminlte.js') }}"></script>

    <script>
        // Pastikan Bootstrap sudah di-load sebelum kode ini dijalankan
        document.addEventListener("DOMContentLoaded", function(event) {
            // Inisialisasi carousel dengan ID carouselExampleSlidesOnly
            var myCarousel = document.querySelector('#carouselExampleSlidesOnly')
            var carousel = new bootstrap.Carousel(myCarousel, {
                interval: 2000, // Ubah nilai interval sesuai kebutuhan Anda (dalam milidetik)
                wrap: true // Jika ingin carousel berputar secara terus menerus, ubah menjadi true
            })
        });

    </script>

    <!-- PAGE PLUGINS -->
    <!-- jQuery Mapael -->
    <script src="{{ asset('plugins/jquery-mousewheel/jquery.mousewhee') }}l.js"></script>
    <script src="{{ asset('plugins/raphael/raphael.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-mapael/jquery.mapael.min.js') }}"></script>
    <script src="{{ asset('plugins/jquery-mapael/maps/usa_states.min.js') }}"></script>
    <!-- ChartJS -->
    <script src="{{ asset('plugins/chart.js/Chart.min.js') }}"></script>

</body>
</html>
