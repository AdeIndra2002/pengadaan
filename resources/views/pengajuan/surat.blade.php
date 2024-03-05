<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <title>Surat Pengadaan</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">
    <link rel="icon" type="image/x-icon" href="{{ asset('dist/img/logokalsel.png') }}">


    <!-- Normalize or reset CSS with your favorite library -->
    <link rel="stylesheet" href="{{ asset('/dist/js/normalize.min.css') }}">
    <!-- Load paper.css for happy printing -->
    <link rel="stylesheet" href="{{ asset('/dist/css/paper.css') }}">

    <!-- Set page size here: A5, A4 or A3 -->
    <!-- Set also "landscape" if you need -->
    <style type="text/css" media="print">
        @page {
            size: auto;
            /* auto is the initial value */
            margin: 0mm;
            /* this affects the margin in the printer settings */
        }

    </style>
    <style>
        body {
            font-family: Calibri, sans-serif;
        }

        .sheet {
            padding: 15mm;
        }

        .header {
            text-align: center;
            margin-bottom: 20px;
        }

        h1 {
            font-size: 18px;
            text-decoration: underline;
            margin-top: 20px;
        }

        .table {
            border: solid 1px #DDEEEE;
            border-collapse: collapse;
            border-spacing: 0;
            font: normal 13px Arial, sans-serif;
            width: 100%;
            margin-top: 20px;
        }

        .table thead th {
            background-color: #DDEFEF;
            border: solid 1px #DDEEEE;
            color: #336B6B;
            padding: 10px;
            text-align: left;
            text-shadow: 1px 1px 1px #fff;
        }

        .table tbody td {
            border: solid 1px #DDEEEE;
            color: #333;
            padding: 10px;
            text-shadow: 1px 1px 1px #fff;
        }

    </style>
</head>

<body class="A4 potrait">
    <section class="sheet">
        <!-- Header/Kop Surat -->
        <div class="header">
            <!-- Logo -->
            <img src="{{ asset('dist/img/logo-bawaslu.png') }}" alt="Logo" style="width: 90px; height: auto; float: left; margin-right: 30px;">
            <!-- Informasi Organisasi -->
            <div style="float: left;">
                <h2 style="margin: 0; font-size: 18px;"><b>Badan Pengawas Pemilihan Umum Provinsi Kalimantan Selatan</b></h2>
                <p style="margin: 5px 0;">Jl. RE Martadinata No.3, Kertak Baru Ilir, Kec. Banjarmasin Tengah,</p>
                <p style="margin: 5px 0;">Kota Banjarmasin, Kalimantan Selatan 70231</p>
                <p style="margin: 5px 0;">Telepon: (0511) 6726 437 | Email: set.kalsel@gmail.go.id</p>
            </div>
            <!-- Clearfix untuk mengatasi float -->
            <div style="clear: both;"></div>
            <br>
            <hr style="border-top: 3px solid black; margin-top: 10px; margin-bottom: 10px;">
        </div>

        <h1 style="text-align: center; margin-bottom: 20px;">SURAT PERMOHONAN PENGADAAN</h1>

        <div class="content">
            <p style="margin-bottom: 1px;">Kepada Yth,</p>
            <p style="margin-bottom: 1px;">Kepala Bagian Administrasi</p>
            <p>Di tempat</p>

            <p>Perihal: Pengadaan Barang</p>

            <p>Dengan Hormat,</p>
            <p>Sehubung dengan kelancaran dan kenyamanan bekerja, maka dari itu kami dari {{ $pengajuan->divisi->divisi }} membutuhkan sejumlah barang sebagai berikut:</p>
            <p>{{ $pengajuan->barang }}</p>

            <p>Demikian surat permohonan pengadaan barang ini dibuat. Atas waktu dan perhatian Bapak, kami ucapkan terima kasih.</p>
        </div>
        <div style="margin-top: 20px;">
            <div style="float: right; width: 40%;">
                <p class="text-center align-middle">
                    Banjarmasin, {{ \Carbon\Carbon::parse($pengajuan->tanggalPengajuan)->translatedFormat('d F Y') }}

                    <br>Hormat saya
                </p>
                <br>
                <br>
                <p class="text-center align-middle">

                    <b><u>{{ $pengajuan->namaPengajuan }}</u></b>
                </p>
            </div>
            <div style="float: left; width: 35%;">
                <p class="text-center align-middle">
                    <br>Yang Mengetahui
                </p>
                <br>
                <br>
                <p class="text-center align-middle">

                    <b><u>{{ $pengajuan->divisi->kepalaDivisi }}</u></b>
                </p>
            </div>

        </div>
    </section>
    <script type="text/javascript">
        window.print();

    </script>
</body>

</html>
