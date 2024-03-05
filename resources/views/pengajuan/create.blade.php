<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Tambah Data Pengadaan')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Pengadaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengajuan.index') }}">Data Pengadaan</a></li>
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
                            <form action="{{ route('pengajuan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="namaPengajuan">Nama Pengajuan</label>
                                    <input type="text" name="namaPengajuan" id="namaPengajuan" class="form-control" placeholder="Masukan Nama Pengajuan" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalPengajuan">Tanggal Pengajuan</label>
                                    <input type="date" name="tanggalPengajuan" id="tanggalPengajuan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="barang">Nama & Jumlah Barang</label>
                                    <input type="text" name="barang" id="barang" class="form-control" placeholder="nama barang x10 = Pulpen x10, Double Tip x5, dst  " required>
                                </div>
                                <div class="form-group">
                                    <label for="divisiId">Divisi Pengaju</label>
                                    <select name="divisiId" id="divisiId" class="form-control" required>
                                        <option value="">Pilih Divisi</option>
                                        @foreach($divisis as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->divisi }} - {{ $divisi->kepalaDivisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                            <div class="card-footer">
                                <a href="{{ route('pengajuan.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

@endsection
