<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Edit Data Pengadaan')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Pengadaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengajuan.index') }}">Data Pengadaan</a></li>
                        <li class="breadcrumb-item active">Edit Data</li>
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
                            <form action="{{ route('pengajuan.update', $pengajuan->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="namaPengajuan">Nama Pengadaan</label>
                                    <input type="text" name="namaPengajuan" id="namaPengajuan" class="form-control" value="{{ $pengajuan->namaPengajuan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalPengajuan">Tanggal Pengadaan</label>
                                    <input type="date" name="tanggalPengajuan" id="tanggalPengajuan" class="form-control" value="{{ $pengajuan->tanggalPengajuan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="barang">Nama & Jumlah Pengadaan</label>
                                    <input type="text" name="barang" id="barang" class="form-control" value="{{ $pengajuan->barang }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="divisiId">Divisi Pengadaan</label>
                                    <select name="divisiId" id="divisiId" class="form-control" required>
                                        <option value="">Pilih Divisi</option>
                                        @foreach($divisis as $divisi)
                                        <option value="{{ $divisi->id }}" {{ $divisi->id == $pengajuan->divisiId ? 'selected' : '' }}>{{ $divisi->divisi }} - {{ $divisi->kepalaDivisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
