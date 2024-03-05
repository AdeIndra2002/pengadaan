<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Tambah Data Supplier')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Supplier</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('supplier.index') }}">Data Supplier</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-md-12">
                    <div class="card">
                        <div class="card-body">
                            <form action="{{ route('supplier.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="namaSupplier">Nama Supplier</label>
                                    <input type="text" name="namaSupplier" id="namaSupplier" class="form-control" placeholder="Masukkan Nama Supplier" required>
                                </div>
                                <div class="form-group">
                                    <label for="nomorHp">Nomor HP/WA</label>
                                    <input type="number" name="nomorHp" id="nomorHp" class="form-control" placeholder="Masukkan Nomor HP/WA" required>
                                </div>
                                <div class="form-group">
                                    <label for="alamat">Alamat</label>
                                    <textarea name="alamat" id="alamat" class="form-control" rows="3" placeholder="Masukkan Alamat" required></textarea>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('supplier.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

@endsection
