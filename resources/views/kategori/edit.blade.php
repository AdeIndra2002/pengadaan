<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Kategori')
<!-- isi bagian konten -->
@section('konten')

<div class="content-wrapper">
    <section class="content">
        <div class="container-fluid">
            <div class="card">
                <!-- general form elements -->
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card card-primary">
                                <div class="card-header">
                                    <h3 class="card-title">Edit Data Kategori</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('kategori.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- First Column -->
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="kategori">Nama Kategori</label>
                                                    <input type="text" class="form-control @error('kategori') is-invalid @enderror" id="kategori" placeholder="Enter Kategori" name="kategori" value="{{ old('kategori', $data->kategori) }}">
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
