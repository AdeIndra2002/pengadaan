<!DOCTYPE html>
<html :class="{ 'theme-dark': dark }" x-data="data()" lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <title>Pengadaan | Dashboard</title>
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logokalsel.png') }}">
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@400;500;600;700;800&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="./assets/css/tailwind.output.css" />
    <script src="https://cdn.jsdelivr.net/gh/alpinejs/alpine@v2.x.x/dist/alpine.min.js" defer></script>
    <script src="./assets/js/init-alpine.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.css" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.9.3/Chart.min.js" defer></script>
    <script src="./assets/js/charts-lines.js" defer></script>
    <script src="./assets/js/charts-pie.js" defer></script>

    <style>
        main::-webkit-scrollbar {
            display: none;
        }

        main {
            -ms-overflow-style: none;
            scrollbar-width: none;
        }

        /* .sidebar-menu-item.active {
            background-color: purple;
            /* Ganti warna latar belakang sesuai kebutuhan */
        color: #000;
        /* Ganti warna teks sesuai kebutuhan */
        }

        */ .active {
            background-color: purple;
            /* Warna background untuk elemen aktif */
            color: white;
            /* Warna teks untuk elemen aktif */
        }

    </style>

</head>
<body>
    <div class="flex h-screen bg-gray-50 dark:bg-gray-900" :class="{ 'overflow-hidden': isSideMenuOpen }">

        {{-- sidebar --}}
        @include('template.sidebar')
        <div class="flex flex-col flex-1 w-full">
            @include('template.navbar')


            @yield('konten')

        </div>
    </div>
    <script>
        // Ambil semua item menu
        const menuItems = document.querySelectorAll('.sidebar-menu-item');

        // Tambahkan event listener untuk setiap item menu
        menuItems.forEach(item => {
            item.addEventListener('click', () => {
                // Hapus kelas aktif dari semua item menu
                menuItems.forEach(menu => {
                    menu.classList.remove('active');
                });
                // Tambahkan kelas aktif ke item menu yang dipilih
                item.classList.add('active');
            });
        });

    </script>

</body>
</html>
