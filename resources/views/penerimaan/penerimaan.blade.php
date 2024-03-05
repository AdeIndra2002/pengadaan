<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Penerimaan')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Halaman Utama Data Penerimaan</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashbaord</a></li>
                        <li class="breadcrumb-item active">Data Penerimaan</li>
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
                            <a href="{{ route('penerimaan.create') }}" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                            <form action="{{ route('penerimaan.laporan') }}" method="GET">
                                <div class="form-group">
                                    <label for="namaPengajuan">Pilih Nama:</label>
                                    <select class="form-control" id="namaPengajuan" name="namaPengajuan">
                                        <option value="">Semua Nama</option>
                                        @foreach ($pengajuans as $pengajuan)
                                        <option value="{{ $pengajuan->id }}">{{ $pengajuan->namaPengajuan }}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <button type="submit" class="btn btn-secondary mb-3">Cetak Laporan</button>
                            </form>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center">
                                        <tr style="height: 50px;">
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Kode Penerimaan</th>
                                            <th class="text-center align-middle">Tanggal Penerimaan</th>
                                            <th class="text-center align-middle">Jumlah Penerimaan</th>
                                            <th class="text-center align-middle">Nama Pengajuan</th>
                                            <th class="text-center align-middle">Divisi & Kepala Divisi</th>
                                            <th class="text-center align-middle">Tanggal Pengajuan</th>
                                            <th class="text-center align-middle">Nama & Jumlah Barang Yanag Di ajukan</th>
                                            <th class="text-center align-middle">Nama Barang</th>
                                            <th class="text-center align-middle">Kategori</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if ($view_penerimaan->count() > 0)
                                        @foreach ($view_penerimaan as $data)
                                        <tr style="height: 50px;">
                                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                            <td class="text-center align-middle">KT-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td class="text-center align-middle">{{ $data->tanggalPenerimaan }}</td>
                                            <td class="text-center align-middle">{{ $data->jumlahPenerimaan }}</td>
                                            <td class="text-center align-middle">{{ $data->pengajuan->namaPengajuan }}</td>
                                            <td class="text-center align-middle">{{ $data->divisi->divisi }} - {{ $data->divisi->kepalaDivisi }}</td>
                                            <td class="text-center align-middle">{{ $data->pengajuan->tanggalPengajuan }}</td>
                                            <td class="text-center align-middle">{{ $data->pengajuan->barang }}</td>
                                            <td class="text-center align-middle">{{ $data->barang->barang }}</td>
                                            <td class="text-center align-middle">{{ $data->kategori->kategori }}</td>
                                            {{-- <td class="text-center align-middle">{{ $data->divisi->kepalaDivisi }}</td> --}}

                                            <td class="align-middle">
                                                <div class="btn-group" role="group" aria-label="basic example">
                                                    <a href="{{ route('penerimaan.show', $data->id) }}" class="btn btn-small btn-secondary">Detail</a>
                                                    <a href="{{ route('penerimaan.edit', $data->id) }}" class="btn btn-small btn-warning">Edit</a>
                                                    <form action="{{ route('penerimaan.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah yakin menghapus data ini?')">
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
