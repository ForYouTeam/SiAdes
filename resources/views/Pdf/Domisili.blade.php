<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        body {
            font-family: 'Times New Roman', Times, serif;
        }

        #judul {
            text-align: center;
        }

        #halaman {
            width: auto;
            height: auto;
            position: absolute;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 40px;
            padding-bottom: 80px;
        }

        #halaman #gambar {
            margin-top: -80px;
        }

        #halaman .kop {
            text-align: center;
            margin-top: -30px;
        }

        #halaman .nama {
            text-align: center;
        }

        #halaman .isi p {
            margin-top: 20px;
            text-align: justify;
        }

        #halaman .ttd {
            width: 50%;
            text-align: center;
            float: right;
        }

        table {
            margin-left: 100px;
        }
    </style>

</head>

<body>
    <div id=halaman>
        <h3 id=judul>PEMERINTAH KABUPATEN LUWU TIMUR <br> KECAMATAN ANGKONA <br> DESA TARIPA</h3>
        <div id="gambar">
            <img src="{{ public_path($data['path']) }}" alt="" width="80">
        </div>
        <p class="kop">Alamat : Lr. 09, Jl. Poros Desa Taripa, Kode Pos 92985</p>
        <hr>
        <hr>
        <div class="nama">
            <h3><u>SURAT DOMISILI</u></h3>
            <p style="margin-top: -15px;">Nomor : 470/{{ $data['no_surat'] }}/ DT-KA</p>
        </div>
        <div class="isi">
            <p>Yang bertanda tangan di bawah ini Kepala Desa Taripa Kec. Angkona Kab. Luwu Timur menerangkan dengan
                sebenarnyaa bahwa :</p>

            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['nama'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tempat lahir</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['tmpLahir'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tanggal lahir</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['tglLahir'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">NIK</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['nik'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Jenis Kelamin</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['jk'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Agama</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['agama'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['pekerjaan'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Status Keluarga</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['statKeluarga'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['alamat'] }}</td>
                </tr>
            </table>

            <p>Yang tersebut namanya diatas adalah benar warga desa {{ $data['alamat_sebelumnya'] }} dan yang
                bersangkutan saat ini berdomisili di Desa Taripa, Kec. Angkona Kab.
                Luwu Timur, Provinsi Sulawesi Selatan. <br> Demikian surat
                keterangan ini dibuat sebagai Persyaratan untuk {{ $data['keperluan'] }}</p>
        </div>
        <div class="ttd">Taripa, {{ $data['dateNow'] }}</div><br><br>
        <div class="ttd">{{ $data['ttdRole']['jabatan'] }},</div><br><br><br><br>
        <div class="ttd"><u>{{ $data['ttdRole']['nama'] }}</u></div>

    </div>
</body>

</html>