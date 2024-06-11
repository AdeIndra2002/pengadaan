<!-- Menghubungkan dengan view template master -->
@extends('template.main')

<!-- isi bagian judul halaman -->
@section('judul_halaman', 'Pengadaan | Data Pengadaan')

<!-- isi bagian konten -->
@section('konten')

<!-- Begin Page Content -->
<main class="h-full pb-16 overflow-y-auto">
    <div class="container grid px-6 mx-auto">
        <h2 class="my-6 text-2xl font-semibold text-gray-700 dark:text-gray-200">
            Tables
        </h2>

        <!-- With actions -->
        <h4 class="mb-4 text-lg font-semibold text-gray-600 dark:text-gray-300">
            Table with actions
        </h4>
        <div class="w-full overflow-hidden rounded-lg shadow-xs">
            <div class="w-full overflow-x-auto">
                <table class="w-full whitespace-no-wrap">
                    <thead>
                        <tr class="text-xs font-semibold tracking-wide text-left text-gray-500 uppercase border-b dark:border-gray-700 bg-gray-50 dark:text-gray-400 dark:bg-gray-800">
                            <th class="px-4 py-3">No</th>
                            <th class="px-4 py-3">Kode Pengadaan</th>
                            <th class="px-4 py-3">Nama Pengadaan</th>
                            <th class="px-4 py-3">Tanggal Pengadaan</th>
                            <th class="px-4 py-3">Nama & Jumlah Barang</th>
                            <th class="px-4 py-3">Divisi Pengadaan</th>
                            <th class="px-4 py-3">Action</th>
                        </tr>
                    </thead>
                    <tbody class="bg-white divide-y dark:divide-gray-700 dark:bg-gray-800">
                        @if ($view_pengajuan->count() > 0)
                        @foreach ($view_pengajuan as $pengajuan)
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3">{{ $loop->iteration }}</td>
                            <td class="px-4 py-3">KP-{{ str_pad($pengajuan->id, 4, '0', STR_PAD_LEFT) }}</td>
                            <td class="px-4 py-3">{{ $pengajuan->namaPengajuan }}</td>
                            <td class="px-4 py-3">{{ $pengajuan->tanggalPengajuan }}</td>
                            <td class="px-4 py-3">{{ $pengajuan->barang }}</td>
                            <td class="px-4 py-3">{{ $pengajuan->divisi->divisi }} - {{ $pengajuan->divisi->kepalaDivisi }}</td>
                            <td class="px-4 py-3">
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
                        <tr class="text-gray-700 dark:text-gray-400">
                            <td class="px-4 py-3" colspan="10">DATA NOT FOUND</td>
                        </tr>
                        @endif

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</main>


@endsection
