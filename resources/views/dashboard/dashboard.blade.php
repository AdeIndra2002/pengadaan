<!-- Menghubungkan dengan view template master -->
@extends('template.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Inventory | DashBoard')

<!-- isi bagian konten -->
@section('konten')
<!-- Content Wrapper. Contains page content -->


<div class="content-wrapper">
    <div id="carouselExampleSlidesOnly" class="carousel slide" data-bs-ride="carousel">
        <h1 style="text-align: center; margin-bottom: 20px;">SELAMAT DATANG DI APLIKASI PENGADAAN BARANG BADAN PENGAWAS PEMILIHAN UMUM PROVINSI KALIMANTAN SELATAN</h1>

        <div class="carousel-inner">
            <div class="carousel-item active">
                <img src="{{ asset('dist/img/bawaslu.jpg') }}" class="d-block w-75 mx-auto" alt="Logo Bawaslu" style="max-height: 75vh; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('dist/img/bawaslutembok.jpeg') }}" class="d-block w-75 mx-auto" alt="Gambar Bawaslu" style="max-height: 75vh; object-fit: cover;">
            </div>
            <div class="carousel-item">
                <img src="{{ asset('dist/img/GedungBawaslu.jpg') }}" class="d-block w-75 mx-auto" alt="Gedung Bawaslu" style="max-height: 75vh; object-fit: cover;">
            </div>
        </div>
    </div>

</div>


<!-- /.content-wrapper -->
@endsection
