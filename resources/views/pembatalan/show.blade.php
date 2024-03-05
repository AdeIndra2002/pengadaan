<!-- Menghubungkan dengan view template master -->
@extends('template.main')

@section('judul_halaman', 'Pengadaan | Detail Data Pembatalan')

@section('konten')
<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Detail Data Pembatalan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pembatalan.index') }}">Data Pembatalan</a></li>
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
                                        <input type="text" name="id" id="id" class="form-control" value="KP-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}" readonly>
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
                                        <label for="barang">Nama & Jumlah Barang</label>
                                        <input type="text" name="barang" id="barang" class="form-control" value="{{ $data->pengajuan->barang }}" readonly>
                                    </div>
                                </div>
                            </div>
                            <div class="row">
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
                                        <label for="kodePembatalan">Kode Pembatalan</label>
                                        <input type="text" name="kodePembatalan" id="kodePembatalan" class="form-control" value="KB-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="tanggalPembatalan">Tanggal Pembatalan</label>
                                        <input type="text" name="tanggalPembatalan" id="tanggalPembatalan" class="form-control" value="{{ $data->tanggalPembatalan }}" readonly>
                                    </div>
                                </div>
                                <div class="col-6">
                                    <div class="form-group">
                                        <label for="keteranganPembatalan">Keterangan Pembatalan</label>
                                        <input type="text" name="keteranganPembatalan" id="keteranganPembatalan" class="form-control" value="{{ $data->keteranganPembatalan }}" readonly>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="card-footer">
                        <a href="{{ route('pembatalan.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                    </div>
                </div>
            </div>
        </div>
</div>
</section>
</div>
@endsection
