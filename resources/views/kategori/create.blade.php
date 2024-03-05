<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Kategori')
<!-- isi bagian konten -->
@section('konten')

<div class="content-wrapper">
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Kategori</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('kategori.index') }}">Data Kategori</a></li>
                        <li class="breadcrumb-item active">Tambah Data</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>

    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- general form elements -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Tambah Data Kategori</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('kategori.store') }}" method="POST" enctype="multipart/form-data">
                                    @csrf

                                    <div class="card-body">
                                        <div class="row">
                                            <!-- First Column -->
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="kategori">Nama Kategori</label>
                                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" placeholder="Enter Nama Kategori" name="kategori" value="{{ old('kategori') }}">
                                                    @error('kategori')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('kategori.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <!-- /.card-body -->
            </div>
        </div>
    </section>
</div>
@endsection
