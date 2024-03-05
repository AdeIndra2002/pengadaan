<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Sub Divisi')
<!-- isi bagian konten -->
@section('konten')

<!-- Content Wrapper. Contains page content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Utama Data Sub Divisi</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Sub Divisi</li>
                    </ol>
                </div>
            </div>
        </div><!-- /.container-fluid -->
    </section>
    <!-- Main content -->
    <section class="content">
        <div class="container-fluid">
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <!-- /.card-header -->
                        <div class="card-body">
                            <a href="{{ route('divisi.create') }}" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center">
                                        <tr style="height: 50px;">
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Kode Sub Divisi</th>
                                            <th class="text-center align-middle">Nama Sub Divisi</th>
                                            <th class="text-center align-middle">Nama Kepala Bagian</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if ($divisis->count() > 0)
                                        @foreach ($divisis as $data)
                                        <tr style="height: 50px;">
                                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                            <td class="text-center align-middle">KD-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td class="text-center align-middle">{{ $data->divisi }}</td>
                                            <td class="text-center align-middle">{{ $data->kepalaDivisi }}</td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group" role="group" aria-label="basic example">
                                                    <a href="{{ route('divisi.edit', $data->id) }}" class="btn btn-small btn-warning">Edit</a>
                                                    <form action="{{ route('divisi.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah yakin menghapus data ini?')">
                                                        @csrf
                                                        @method('DELETE')
                                                        <button class="btn btn-small btn-danger">Hapus</button>
                                                    </form>
                                                </div>
                                            </td>
                                        </tr>
                                        @endforeach
                                        @else
                                        <tr>
                                            <td class="text-center" colspan="8">DATA NOT FOUND</td>
                                        </tr>
                                        @endif
                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <!-- /.card-body -->
                    </div>
                </div>
                <!-- /.col -->
            </div>
            <!-- /.row -->
        </div>
        <!-- /.container-fluid -->
    </section>
    <!-- /.content -->
</div>

@endsection
