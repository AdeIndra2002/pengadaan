<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Sub Divisi')
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
                                    <h3 class="card-title">Edit Data Sub Divisi</h3>
                                </div>
                                <!-- /.card-header -->
                                <!-- form start -->
                                <form action="{{ route('divisi.update', $data->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('put')
                                    <div class="card-body">
                                        <div class="row">
                                            <!-- First Column -->
                                            <div class="col-md">
                                                <div class="form-group">
                                                    <label for="divisi">Nama Sub Divisi</label>
                                                    <input type="text" class="form-control @error('divisi') is-invalid @enderror" id="divisi" placeholder="Enter Nama Sub Divisi" name="divisi" value="{{ old('divisi', $data->divisi) }}">
                                                    @error('divisi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                                <div class="form-group">
                                                    <label for="kepalaDivisi">Nama Kepala Bagian</label>
                                                    <input type="text" class="form-control @error('kepalaDivisi') is-invalid @enderror" id="kepalaDivisi" placeholder="Enter Nama Kepala Bagian" name="kepalaDivisi" value="{{ old('kepalaDivisi', $data->kepalaDivisi) }}">
                                                    @error('kepalaDivisi')
                                                    <div class="invalid-feedback">{{ $message }}</div>
                                                    @enderror
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <!-- /.card-body -->
                                    <div class="card-footer">
                                        <button type="submit" class="btn btn-primary">Submit</button>
                                        <a href="{{ route('divisi.index') }}" type="button" class="btn btn-secondary">Kembali</a>
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
