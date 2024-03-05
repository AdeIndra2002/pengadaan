<!-- Menghubungkan dengan view template master -->
@extends('template.main')
<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Tambah Data Pembelian')
<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<div class="content-wrapper">
    <!-- Content Header (Page header) -->
    <section class="content-header">
        <div class="container-fluid">
            <div class="row mb-2">
                <div class="col-sm-6">
                    <h1>Tambah Data Pembelian</h1>
                </div>
                <div class="col-sm-6">
                    <ol class="breadcrumb float-sm-right">
                        <li class="breadcrumb-item"><a href="{{ route('dashboard') }}">Dashboard</a></li>
                        <li class="breadcrumb-item"><a href="{{ route('pembelian.index') }}">Data Pembelian</a></li>
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
                            <form action="{{ route('pembelian.store') }}" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="tanggalPembelian">Tanggal Pembelian</label>
                                            <input type="date" class="form-control @error('tanggalPembelian') is-invalid @enderror" id="tanggalPembelian" placeholder="Masukan Tanggal Pembelian" name="tanggalPembelian" value="{{ old('tanggalPembelian') }}">
                                            @error('tanggalPembelian')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaBarang">Nama Barang</label>
                                            <input type="text" class="form-control @error('namaBarang') is-invalid @enderror" id="namaBarang" placeholder="Masukan Nama Barang" name="namaBarang" value="{{ old('namaBarang') }}">
                                            @error('namaBarang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="jumlahBarang">Jumlah Barang</label>
                                            <input type="number" class="form-control @error('jumlahBarang') is-invalid @enderror" id="jumlahBarang" placeholder="Masukan Jumlah Pembelian" name="jumlahBarang" value="{{ old('jumlahBarang') }}">
                                            @error('jumlahBarang')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="totalHarga">Total Harga</label>
                                            <input type="text" class="form-control @error('totalHarga') is-invalid @enderror" id="totalHarga" placeholder="Masukan Total Harga" name="totalHarga" value="{{ old('totalHarga') }}">
                                            @error('totalHarga')
                                            <div class="invalid-feedback">{{ $message }}</div>
                                            @enderror
                                        </div>
                                    </div>
                                    <script>
                                        document.getElementById('totalHarga').addEventListener('input', function(e) {
                                            // Remove non-digit characters from the input value
                                            let harga = e.target.value.replace(/\D/g, '');

                                            // Format the number with thousand separators
                                            let formattedHarga = harga.replace(/\B(?=(\d{3})+(?!\d))/g, '.');

                                            // Set the formatted value back to the input field
                                            e.target.value = formattedHarga;
                                        });

                                    </script>

                                </div>
                                <div class="row">
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="namaSupplier">Supplier</label>
                                            <select name="namaSupplier" id="namaSupplier" class="form-control" required>
                                                <option value="">Pilih Supplier</option>
                                                @foreach($suppliers as $supplier)
                                                <option value="{{ $supplier->id }}">{{ $supplier->namaSupplier }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-6">
                                        <div class="form-group">
                                            <label for="gambar" class="font-weight-bold">Gambar Nota</label>
                                            <div class="input-group">
                                                <div class="custom-file">
                                                    <input type="file" class="custom-file-input" id="gambar" accept="image/" multiple name="gambar" onchange="updateFileName(this)">
                                                    <label class="custom-file-label" id="gambarLabel" for="gambar">Pilih Gambar</label>
                                                </div>
                                                <div class="input-group-append">
                                                </div>
                                            </div>
                                            @error('gambar')
                                            <div class="text-danger">{{ $message }}</div>
                                            @enderror
                                        </div>
                                        <script>
                                            function updateFileName(input) {
                                                var label = document.getElementById('gambarLabel');
                                                var fileName = input.files[0].name;
                                                label.innerHTML = fileName;
                                            }

                                        </script>
                                    </div>
                                </div>
                                <button type="submit" class="btn btn-primary">Tambah Data</button>
                            </form>
                        </div>
                        <div class="card-footer">
                            <a href="{{ route('pembelian.index') }}" type="button" class="btn btn-secondary">Kembali</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>
<!-- /.content-wrapper -->

@endsection
