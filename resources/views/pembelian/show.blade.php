<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Detail Pembelian')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text">Detail Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashbaord</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pembelian.index') }}">Data Pembelian</a></li>
                        <li class="breadcrumb-item active">Detail Pembelian</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="row">
                                <div class="col-md-6">
                                    <h5><strong>Kode Pembelian:</strong> KB-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</h5>
                                    <h5><strong>Tanggal Pembelian:</strong> {{ $data->tanggalPembelian }}</h5>
                                    <h5><strong>Nama Barang:</strong> {{ $data->namaBarang }}</h5>
                                    <h5><strong>Jumlah Barang:</strong> {{ $data->jumlahBarang }}</h5>
                                    <h5><strong>Total Harga:</strong> {{ $data->totalHarga }}</h5>
                                    <h5><strong>Nama Supplier:</strong> {{ $data->namaSupplier }}</h5>
                                    <h5><strong>Nomor HP Supplier:</strong> {{ $data->nomorHp }}</h5>
                                    <h5><strong>Alamat Supplier:</strong> {{ $data->alamat }}</h5>
                                </div>
                                <div class="col-md-6">
                                    <img src="{{ $data->gambar }}" alt="Gambar Nota" class="img-thumbnail" width="400">
                                </div>
                            </div>
                            <div class="row mt-3">
                                <div class="col-md-12">
                                    <a href="{{ route('pembelian.index') }}" class="btn btn-primary"><i class="fas fa-chevron-left"></i> Kembali</a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>


@endsection
