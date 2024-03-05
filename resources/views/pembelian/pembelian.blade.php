<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Pembelian')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1 class="text-center">Halaman Utama Data Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashbaord</a></li>
                        <li class="breadcrumb-item active">Data Pembelian</li>
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
                            <a href="{{ route('pembelian.create') }}" type="button" class="btn btn-primary mb-3"><i class="fas fa-plus"></i> Tambah Data</a>
                            <a href="{{ route('pembelian.laporan') }}" type="button" class="btn btn-secondary mb-3">Cetak Laporan</a>
                            <div class="table-responsive">
                                <table id="example2" class="table table-bordered table-hover">
                                    <thead class="text-center">
                                        <tr style="height: 50px;">
                                            <th class="text-center align-middle">No</th>
                                            <th class="text-center align-middle">Kode Pembelian</th>
                                            <th class="text-center align-middle">Tanggal Pembelian</th>
                                            <th class="text-center align-middle">Nama Barang</th>
                                            <th class="text-center align-middle">Jumlah Barang</th>
                                            <th class="text-center align-middle">Total Harga</th>
                                            <th class="text-center align-middle">Nama Supplier</th>
                                            <th class="text-center align-middle">Gambar Nota</th>
                                            <th class="text-center align-middle">Action</th>
                                        </tr>
                                    </thead>
                                    <tbody class="text-center">
                                        @if ($view_pembelian->count() > 0)
                                        @foreach ($view_pembelian as $data)
                                        <tr style="height: 50px;">
                                            <td class="text-center align-middle">{{ $loop->iteration }}</td>
                                            <td class="text-center align-middle">KB-{{ str_pad($data->id, 4, '0', STR_PAD_LEFT) }}</td>
                                            <td class="text-center align-middle">{{ $data->tanggalPembelian }}</td>
                                            <td class="text-center align-middle">{{ $data->namaBarang }}</td>
                                            <td class="text-center align-middle">{{ $data->jumlahBarang }}</td>
                                            <td class="text-center align-middle">Rp {{ ($data->totalHarga) }}</td>
                                            <td class="text-center align-middle">{{ $data->supplier->namaSupplier }}</td>
                                            <td class="text-center align-middle"><img src="{{ $data->gambar }}" alt="Gambar Nota" class="img-thumbnail" width="100"></td>
                                            <td class="text-center align-middle">
                                                <div class="btn-group" role="group" aria-label="basic example">
                                                    <a href="{{ route('pembelian.show', $data->id) }}" class="btn btn-small btn-secondary">Detail</a>
                                                    <a href="{{ route('pembelian.edit', $data->id) }}" class="btn btn-small btn-warning">Edit</a>
                                                    <form action="{{ route('pembelian.destroy', $data->id) }}" method="POST" onsubmit="return confirm('Apakah yakin menghapus data ini?')">
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
                                            <td class="text-center" colspan="11">DATA NOT FOUND</td>
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
