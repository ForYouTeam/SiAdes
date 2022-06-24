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
            margin-left: 17%;
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
            <h3><u>SURAT KETERANGAN KEMATIAN</u></h3>
            <p style="margin-top: -15px;">Nomor : 472.12/_____ / DT-KA</p>
        </div>
        <div class="isi">
            <p>Yang bertanda tangan di bawah ini Pemerintah Desa Taripa Kec. Angkona Kab. Luwu Timur menerangkan bahwa :
            </p>

            <table>
                <tr>
                    <td style="width: 30%;">Nama</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Arbrian Abdul Jamal</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tempat lahir</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tanggal lahir</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Jenis Kelamin</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Kewarganegaraan</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Agama</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Status Perkawinan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Pekerjaan</td>
                    <td style="width: 5%;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%; vertical-align: top;">Alamat</td>
                    <td style="width: 5%; vertical-align: top;">:</td>
                    <td style="width: 65%;">Kampung Sambak RT 01 RW 09 Kelurahan Danyang
                        Kecamatan Purwodadi Kabupaten Grobogan</td>
                </tr>
            </table>
            <p>Berdasarkan atas keterangan dari ahli waris bahwa yang tersebut namanya diatas telah meninggal pada :</p>
            <table>
                <tr>
                    <td style="width: 30%;">Hari/tanggal</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Arbrian Abdul Jamal</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Jam</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tempat Kematian</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Sebab Kematian</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Yang Menentukan</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
                <tr>
                    <td style="width: 30%;">Tempat Pemakaman</td>
                    <td style="width: 5px;">:</td>
                    <td style="width: 65%;">Grobogan, 3 Maret 1993</td>
                </tr>
            </table>
            <p>Demikian surat keterangan kematian ini dibuat agar dapat digunakan sebagaimana mestinya.</p>
        </div>
        <div class="ttd">Taripa, 22 Juni 2022</div><br>
        <div class="ttd">Kepala Desa,</div><br><br><br><br>
        <div class="ttd"><u>husnul Maniah</u></div>

    </div>
</body>

</html>
