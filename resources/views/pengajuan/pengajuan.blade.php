<!-- Menghubungkan dengan view template master -->
@extends('template.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Pengadaan')

<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-center">Halaman Utama Data Pengadaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item active">Data Pengadaan</li>
                    </ol>
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
                            <a href="{{ route('pengajuan.create') }}" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                            <form action="{{ route('pengajuan.laporan') }}" method="GET">
                                <div class="form-group">
                                    <label for="division">Pilih Divisi:</label>
                                    <select class="form-control" id="division" name="division">
                                        <option value="">Semua Divisi</option>
                                        @foreach ($divisis as $divisi)
                                        <option value="{{ $divisi->id }}">{{ $divisi->divisi }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary mb-3">Cetak Laporan Divisi</button>
                            </form>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center">
                                        <tr style="height: 50px;">
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Kode Pengadaan</th>
                                            <th class="text-center align-middle">Nama Pengadaan</th>
                                            <th class="text-center align-middle">Tanggal Pengadaan</th>
                                            <th class="text-center align-middle">Nama & Jumlah Barang</th>
                                            <th class="text-center align-middle">Divisi Pengadaan</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if ($view_pengajuan->count() > 0)
                                        @foreach ($view_pengajuan as $pengajuan)
                                        <tr style="height: 50px;">
                                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                            <td class="text-center align-middle">KP-{{ str_pad($pengajuan->id, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td class="text-center align-middle">{{ $pengajuan->namaPengajuan }}</td>
                                            <td class="text-center align-middle">{{ $pengajuan->tanggalPengajuan }}</td>
                                            <td class="text-center align-middle">{{ $pengajuan->barang }}</td>
                                            <td class="text-center align-middle">{{ $pengajuan->divisi->divisi }} - {{ $pengajuan->divisi->kepalaDivisi }}</td>
                                            <td class="align-middle">
                                                <div class="btn-group" role="group" aria-label="basic example">
                                                    <a href="{{ route('pengajuan.show', $pengajuan->id) }}" class="btn btn-small btn-secondary">Detail</a>
                                                    {{-- <a href="{{ route('pengajuan.surat', $pengajuan->id) }}" class="btn btn-small btn-primary">Cetak</a> --}}
                                                    <a href="{{ route('pengajuan.edit', $pengajuan->id) }}" class="btn btn-small btn-warning">Edit</a>
                                                    <form action="{{ route('pengajuan.destroy', $pengajuan->id) }}" method="POST" onsubmit="return confirm('Apakah yakin menghapus data ini?')">
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
                                            <td class="text-center" colspan="10">DATA NOT FOUND</td>
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
