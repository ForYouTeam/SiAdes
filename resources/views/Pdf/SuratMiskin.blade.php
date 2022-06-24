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
            border: 1px solid;
            padding-top: 30px;
            padding-left: 30px;
            padding-right: 30px;
            padding-bottom: 80px;
            font-size: 10pt;
        }

        #halaman #gambar img {
            width: 80px;
            margin-top: -90px;

        }

        #halaman .kop {
            text-align: center;
            margin-top: -20px;
        }

        #halaman .nama {
            text-align: center;
        }

        #halaman .isi {
            margin-top: 10px;
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
            <img src="{{ $data['path'] }}" alt="">
        </div>
        <p class="kop">Alamat : Lr. 09, Jl. Poros Desa Taripa, Kode Pos 92985</p>
        <hr>
        <hr>
        <div class="nama">
            <h3><u>SURAT KETERANGAN KURANG MAMPU</u></h3>
            <p style="margin-top: -15px;">Nomor : 401/_____ / DT-KA</p>
        </div>
        <div class="isi">
            <p>Yang bertanda tangan dibawah ini Pemerintah Desa Taripa Kecamatan Angkona Kabupaten Luwu Timur
                menerangkan bahwa:</p>

            <table>
                <tr>
                    <td style="width: 30%;">I. Nama Ayah</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['nama_ayah'] }}</td>
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
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['alamat'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">II. Nama Ibu</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['nama_ibu'] }}</td>
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
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['alamat'] }}</td>
                </tr>
                <tr>
                    <td>Adalah Orang Tua/Wali Dari</td>
                </tr>
                <tr>
                    <td style="width: 30%;">III. Nama</td>
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
                    <td style="width: 30%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['pekerjaan'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['alamat'] }}</td>
                </tr>
            </table>

            <p>Berdasarkan Pengamatan kami bahwa yang bersangkutan diatas adalah benar warga Desa Taripa Kecamatan
                Angkona Kabupaten Luwu Timur yang berpenghasilan rendah atau kurang mampu.
                <br>Demikian surat keterangan ini dibuat dengan sebenarnya dan diberikan kepada yang bersangkutan
                sebagai persyaratan untuk kepengurusan beasiswa.
            </p>
        </div>
        <div class="ttd">Taripa, {{ $data['created_at'] }}</div><br><br>
        <div class="ttd">{{ $data['ttd'] }},</div><br><br><br><br>
        <div class="ttd"><u>husnul Maniah</u></div>

    </div>
</body>

</html>