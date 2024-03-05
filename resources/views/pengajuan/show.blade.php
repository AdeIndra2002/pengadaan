@extends('template.main')

@section('judul_halaman', 'Pengadaan | Detail Data Pengadaan')

@section('konten')
<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Pengadaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pengajuan.index') }}">Data Pengadaan</a></li>
                        <li class="breadcrumb-item active">Detail Data</li>
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
                            <div class="form-group">
                                <label for="id">Kode Pengadaan</label>
                                <input type="text" name="id" id="id" class="form-control" value="KP-{{ str_pad($pengajuan->id, 4, '0', STR_PAD_LEFT) }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="namaPengajuan">Nama Pengadaan</label>
                                <input type="text" name="namaPengajuan" id="namaPengajuan" class="form-control" value="{{ $pengajuan->namaPengajuan }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="tanggalPengajuan">Tanggal Pengadaan</label>
                                <input type="text" name="tanggalPengajuan" id="tanggalPengajuan" class="form-control" value="{{ \Carbon\Carbon::parse($pengajuan->tanggalPengajuan)->translatedFormat('l d F Y') }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="barang">Nama & Jumlah Barang</label>
                                <input type="text" name="barang" id="barang" class="form-control" value="{{ $pengajuan->barang }}" readonly>
                            </div>
                            <div class="form-group">
                                <label for="divisiId">Divisi Pengadaan</label>
                                <input type="text" name="divisiId" id="divisiId" class="form-control" value="{{ $pengajuan->divisi->divisi }} - {{ $pengajuan->divisi->kepalaDivisi }}" readonly>
                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('pengajuan.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                            <a href="{{ route('pengajuan.generate', $pengajuan->id) }}" type="button" class="btn btn-secondary">Cetak Surat</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@endsection
