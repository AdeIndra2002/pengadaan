<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Edit Data Penerimaan')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Edit Data Penerimaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('penerimaan.index') }}">Data Penerimaan</a></li>
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
                            <form action="{{ route('penerimaan.update', $data->id) }}" method="POST">
                                @csrf
                                @method('PUT')
                                <div class="form-group">
                                    <label for="pengajuanId">Nama Pengaju</label>
                                    <select name="pengajuanId" id="pengajuanId" class="form-control" required>
                                        @foreach($pengajuans as $pengajuan)
                                        <option value="{{ $pengajuan->id }}" {{ $data->pengajuanId == $pengajuan->id ? 'selected' : '' }}>
                                            {{ $pengajuan->namaPengajuan }} - KP-{{ str_pad($pengajuan->id, 4, '0', STR_PAD_LEFT) }}
                                        </option>
                                        @endforeach
                                    </select>
                                </div>
                                <input type="hidden" name="barangId" value="{{ $data->barang->id }}">
                                <div class="form-group">
                                    <label for="barang">Barang Yang Di terima</label>
                                    <input type="text" name="barang" id="barang" class="form-control" value="{{ $data->barang->barang }}" readonly>
                                </div>
                                <input type="hidden" name="kategoriId" value="{{ $data->kategori->id }}">
                                <div class="form-group">
                                    <label for="kategori">Kategori</label>
                                    <input type="text" name="kategori" id="kategori" class="form-control" value="{{ $data->kategori->kategori }}" readonly>
                                </div>
                                <div class="form-group">
                                    <label for="tanggalPenerimaan">Tanggal Penerimaan</label>
                                    <input type="date" name="tanggalPenerimaan" id="tanggalPenerimaan" class="form-control" value="{{ $data->tanggalPenerimaan }}" required>
                                </div>
                                <div class="form-group">
                                    <label for="jumlahPenerimaan">Jumlah Penerimaan</label>
                                    <input type="number" name="jumlahPenerimaan" id="jumlahPenerimaan" class="form-control" value="{{ $data->jumlahPenerimaan }}" placeholder="Masukkan Jumlah Penerimaan" required>
                                </div>
                                <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
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
