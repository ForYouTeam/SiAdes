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
        }

        #halaman #gambar img {
            width: 80px;
            margin-top: -90px;

        }

        #halaman .kop {
            text-align: center;
            margin-top: -30px;
        }

        #halaman .nama {
            text-align: center;
        }

        #halaman .isi {
            margin-top: 20px;
            text-align: justify;
        }

        #halaman .ttd {
            width: 100%;
            text-align: center;
        }

        #halaman .ttd1 {
            width: 48%;
            text-align: center;
            float: left;
        }

        #halaman .ttd2 {
            width: 49%;
            text-align: center;
            float: right;
        }

        #halaman .ttd3 {
            width: 49%;
            text-align: center;
            margin-left: 25%;
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
            <h3><u>SURAT PERNYATAAN PENGAKUAN WARGA</u></h3>
            <p style="margin-top: -15px;">Nomor : 291/{{ $data['no_surat'] }}/ DT-KA</p>
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
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">{{ $data['pendudukRole']['alamat'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">nama Ayah</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['ayahRole']['nama'] }}</td>
                </tr>
                <tr>
                    <td style="width: 30%;">nama Ibu</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">{{ $data['ibuRole']['nama'] }}</td>
                </tr>
            </table>

            <p>Yang tersebut namanya diatas adalah benar warga kami berdomisili di Desa Taripa,
                Kec. Angkona Kab. Luwu Timur. <br> Demikian surat pernyataan ini kami buat dengan sebenarnya, apabila
                keterangan tersebut di atas tidak sesuai dengan keadaan sebenarnya kami bersedia dikenakan sanksi sesuai
                peraturan yang berlaku</p>
        </div>
        <div class="ttd">
            <div class="ttd1">
                <p></p>
                <p>Kepala Dusun,</p><br>
                <p><u>___________</u></p>
            </div>
            <div class="ttd2">
                <p>Taripa, {{ $data['dateNow'] }}</p>
                <p>Ketua RT,</p><br>
                <p><u>___________</u></p>
            </div>
        </div>
        <div class="ttd3"></div><br>
        <div class="ttd3">{{ $data['ttdRole']['jabatan'] }},</div><br><br><br><br>
        <div class="ttd3"><u>{{ $data['ttdRole']['nama'] }}</u></div>

    </div>
</body>

</html>
