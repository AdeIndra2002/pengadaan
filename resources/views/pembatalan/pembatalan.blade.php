<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Pembatalan')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Utama Data Pembatalan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashbaord</a></li>
                        <li class="breadcrumb-item active">Data Pembatalan</li>
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
                            <a href="{{ route('pembatalan.create') }}" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center">
                                        <tr style="height: 50px;">
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Kode Pembatalan</th>
                                            <th class="text-center align-middle">Tanggal Pembatalan</th>
                                            <th class="text-center align-middle">Keterangan Pembatalan</th>
                                            <th class="text-center align-middle">Nama Pengaju</th>
                                            <th class="text-center align-middle">Divisi & Kepala Divisi</th>
                                            <th class="text-center align-middle">Tanggal Pengajuan</th>
                                            <th class="text-center align-middle">Nama & Jumlah Barang</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if ($view_pembatalan->count() > 0)
                                        @foreach ($view_pembatalan as $data)
                                        <tr style="height: 50px;">
                                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                            <td class="text-center align-middle">KB-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td class="text-center align-middle">{{ $data->tanggalPembatalan }}</td>
                                            <td class="text-center align-middle">{{ $data->keteranganPembatalan }}</td>
                                            <td class="text-center align-middle">{{ $data->pengajuan->namaPengajuan }}</td>
                                            <td class="text-center align-middle">{{ $data->divisi->divisi }} - {{ $data->divisi->kepalaDivisi }}</td>
                                            <td class="text-center align-middle">{{ $data->pengajuan->tanggalPengajuan }}</td>
                                            <td class="text-center align-middle">{{ $data->pengajuan->barang }}</td>
                                            <td class="align-middle">
                                                <div class="btn-group" role="group" aria-label="basic example">
                                                    <a href="{{ route('pembatalan.show', $data->id) }}" class="btn btn-small btn-secondary">Detail</a>
                                                    <a href="{{ route('pembatalan.edit', $data->id) }}" class="btn btn-small btn-warning">Edit</a>
                                                    <form action="{{ route('pembatalan.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah yakin menghapus data ini?')">
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
                                            <td class="text-center" colspan="14">DATA NOT FOUND</td>
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
