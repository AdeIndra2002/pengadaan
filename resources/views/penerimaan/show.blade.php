<!-- Menghubungkan dengan view template master -->
@extends('template.main')

@section('judul_halaman', 'Detail Data Penerimaan')

@section('konten')
<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Penerimaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('penerimaan.index') }}">Data Penerimaan</a></li>
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
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="id">Kode Pengajuan</label>
                                        <input type="text" name="id" id="id" class="form-control" value="KP-{{ str_pad($data->pengajuan->id, 4, '0', STR_PAD_LEFT) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="namaPengajuan">Nama Pengajuan</label>
                                        <input type="text" name="namaPengajuan" id="namaPengajuan" class="form-control" value="{{ $data->pengajuan->namaPengajuan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tanggalPengajuan">Tanggal Pengajuan</label>
                                        <input type="text" name="tanggalPengajuan" id="tanggalPengajuan" class="form-control" value="{{ $data->pengajuan->tanggalPengajuan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="barang">Nama & Jumlah Barang Yang Di Ajukan</label>
                                        <input type="text" name="barang" id="barang" class="form-control" value="{{ $data->pengajuan->barang }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="barang">Barang Yang Di terima</label>
                                        <input type="text" name="barang" id="barang" class="form-control" value="{{ $data->barang->barang }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="stokBarang">Stok Barang</label>
                                        <input type="text" name="stok" id="stokBarang" class="form-control" value="{{ $data->barang->stok }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="kategori">Kategori</label>
                                        <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $data->kategori->kategori }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="divisi">Divisi</label>
                                        <input type="text" name="divisi" id="divisi" class="form-control" value="{{ $data->divisi->divisi }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="kepalaDivisi">Kepala Divisi</label>
                                        <input type="text" name="kepalaDivisi" id="kepalaDivisi" class="form-control" value="{{ $data->divisi->kepalaDivisi }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="kodePenerimaan">Kode Penerimaan</label>
                                        <input type="text" name="kodePenerimaan" id="kodePenerimaan" class="form-control" value="KT-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tanggalPenerimaan">Tanggal Penerimaan</label>
                                        <input type="text" name="tanggalPenerimaan" id="tanggalPenerimaan" class="form-control" value="{{ $data->tanggalPenerimaan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="jumlahPenerimaan">Jumlah Penerimaan</label>
                                        <input type="text" name="jumlahPenerimaan" id="jumlahPenerimaan" class="form-control" value="{{ $data->jumlahPenerimaan }}" readonly>
                                    </div>
                                </div>

                            </div>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('penerimaan.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
