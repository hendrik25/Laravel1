<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
    <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Source+Sans+Pro:300,400,400i,700&display=fallback">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/fontawesome-free/css/all.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}plugins/icheck-bootstrap/icheck-bootstrap.min.css">
    <link rel="stylesheet" href="{{ asset('/') }}dist/css/adminlte.min.css?v=3.2.0">
    <link rel="stylesheet" href="{{ asset('/') }}global.css">
    <title>Laporan Print</title>
    <style>
        /* Atur ukuran halaman cetak */
        @media print {
            body {
                width: 210mm; /* Lebar halaman A4 */
                height: 297mm; /* Tinggi halaman A4 */
                margin: 0;
                padding: 20mm;
            }

            /* Sembunyikan elemen-elemen yang tidak perlu dicetak */
            header,
            footer,
            .no-print {
                display: none;
            }
        }

        /* Atur gaya tampilan halaman */
        body {
            font-family: Arial, sans-serif;
        }

        h1 {
            text-align: center;
            margin-bottom: 20px;
        }
        .row {
            display: flex;
            justify-content: center;
        }

        .col-sm-6 {
            width: 50%;
        }
        table {
            margin: 0 auto;
        }
    </style>
</head>
<body >
    @foreach ($vertifikasis as $p)
    <h1>Laporan Cuti Karyawan</h1>
    <!-- Tambahkan konten cetak yang diinginkan -->

    <form>
        {{ csrf_field() }}
        <div class="row">
            <div class="col-sm-6">
                <h3 style="text-align: center;">Informasi Karyawan</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="info-label">NIK</td>
                            <td>:</td>
                            <td>{{ $p->nik }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">NAMA LENGKAP</td>
                            <td>:</td>
                            <td>{{ $p->name }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">TEMPAT LAHIR</td>
                            <td>:</td>
                            <td>{{ $p->tempat_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">TANGGAL LAHIR</td>
                            <td>:</td>
                            <td>{{ $p->tgl_lahir }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">AGAMA</td>
                            <td>:</td>
                            <td>{{ $p->agama }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">JENIS KELAMIN</td>
                            <td>:</td>
                            <td>{{ $p->jenis_kelamin }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">NO HP</td>
                            <td>:</td>
                            <td>{{ $p->no_hp }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">EMAIL</td>
                            <td>:</td>
                            <td>{{ $p->email }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">ALAMAT</td>
                            <td>:</td>
                            <td>{{ $p->alamat }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">JABATAN</td>
                            <td>:</td>
                            <td>{{ $p->jabatan }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">BAGIAN</td>
                            <td>:</td>
                            <td>{{ $p->bagian }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">TANGGAL MASUK</td>
                            <td>:</td>
                            <td>{{ $p->tgl_masuk }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
            <div class="col-sm-6">
                <h3 style="text-align: center;">Informasi Cuti</h3>
                <table>
                    <tbody>
                        <tr>
                            <td class="info-label">NAMA CUTI</td>
                            <td>:</td>
                            <td>{{ $p->nama_cuti }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">PERIODE CUTI</td>
                            <td>:</td>
                            <td>{{ $p->periode }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">TANGGAL PENGAJUAN</td>
                            <td>:</td>
                            <td>{{ $p->tgl_pengajuan }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">JUMLAH CUTI</td>
                            <td>:</td>
                            <td>{{ $p->jumlah_cuti }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">TANGGAL AWAL CUTI</td>
                            <td>:</td>
                            <td>{{ $p->tgl_awal }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">TANGGAL AKHIR CUTI</td>
                            <td>:</td>
                            <td>{{ $p->tgl_akhir }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">KETERANGAN</td>
                            <td>:</td>
                            <td>{{ $p->keterangan }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">HAK CUTI</td>
                            <td>:</td>
                            <td>{{ $p->hak_cuti }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">CUTI DIAMBIL</td>
                            <td>:</td>
                            <td>{{ $p->cuti_diambil }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">SISA CUTI</td>
                            <td>:</td>
                            <td>{{ $p->sisa_cuti }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">APP KABAG</td>
                            <td>:</td>
                            <td>{{ $p->approval_kabag }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">APP MANAGER</td>
                            <td>:</td>
                            <td>{{ $p->approval_manager }}</td>
                        </tr>
                        <tr>
                            <td class="info-label">VERTIFIKASI ADMIN</td>
                            <td>:</td>
                            <td>{{ $p->vertifikasi_admin }}</td>
                        </tr>
                    </tbody>
                </table>
            </div>
        </div>
    </form>
    @endforeach
    <!-- Otomatis jalankan fungsi print saat halaman dimuat -->
    <script>
        window.onload = function() {
            window.print();
        }
    </script>

    <!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.2.1.slim.min.js" integrity="sha384-KJ3o2DKtIkvYIK3UENzmM7KCkRr/rE9/Qpg6aAZGJwFDMVNA/GpGFF93hXpG5KkN" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
</body>
</html>
