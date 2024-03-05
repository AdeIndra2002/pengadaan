<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Tambah Data Penerimaan')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Penerimaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('penerimaan.index') }}">Data Penerimaan</a></li>
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
                            <form action="{{ route('penerimaan.store') }}" method="POST">
                                @csrf
                                <div class="form-group">
                                    <label for="pengajuanId">Nama Pengadaan</label>
                                    <select name="pengajuanId" id="pengajuanId" class="form-control" required>
                                        <option value="">Pilih Nama Pengadaan</option>
                                        @foreach($pengajuans as $pengajuan)
                                        <option value="{{ $pengajuan->id }}">{{ $pengajuan->namaPengajuan }} - KP-{{ str_pad($pengajuan->id, 4, '0', STR_PAD_LEFT) }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="barangId">Nama Barang</label>
                                    <select name="barangId" id="barangId" class="form-control" required>
                                        <option value="">Pilih Barang</option>
                                        @foreach($barangs as $barang)
                                        <option value="{{ $barang->id }}">{{ $barang->barang }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="kategoriId">Kategori Barang</label>
                                    <select name="kategoriId" id="kategoriId" class="form-control" required>
                                        <option value="">Pilih Kategori</option>
                                        @foreach($kategoris as $kategori)
                                        <option value="{{ $kategori->id }}">{{ $kategori->kategori }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalPenerimaan">Tanggal Penerimaan</label>
                                    <input type="date" name="tanggalPenerimaan" id="tanggalPenerimaan" class="form-control" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPenerimaan">Jumlah Penerimaan</label>
                                    <input type="number" name="jumlahPenerimaan" id="jumlahPenerimaan" class="form-control" placeholder="Masukkan Jumlah Penerimaan" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
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
<!-- /.content-wrapper -->

@endsection
