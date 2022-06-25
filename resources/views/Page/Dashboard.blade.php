@extends('Layout.Base')
@section('content')
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-facebook d-flex align-items-center">
            <div class="card-body py-5">
                <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-email-open text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Surat Keluar</h5>
                        <h4 class="mt-2 text-white card-text">{{ $data['arsipkeluar'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-google d-flex align-items-center">
            <div class="card-body py-5">
                <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-email-variant text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Surat MasuK</h5>
                        <h4 class="mt-2 text-white card-text">{{ $data['arsipmasuk'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-twitter d-flex align-items-center">
            <div class="card-body py-5">
                <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-folder-multiple text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Total Barang</h5>
                        <h4 class="mt-2 text-white card-text">{{ $data['barang'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-3 grid-margin stretch-card">
        <div class="card bg-secondary d-flex align-items-center">
            <div class="card-body py-5">
                <div
                    class="d-flex flex-row align-items-center flex-wrap justify-content-md-center justify-content-xl-start py-1">
                    <i class="mdi mdi-human-male-female text-white icon-lg"></i>
                    <div class="ml-3 ml-md-0 ml-xl-3">
                        <h5 class="text-white font-weight-bold">Total Penduduk</h5>
                        <h4 class="mt-2 text-white card-text">{{ $data['penduduk'] }}</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 w-100">
        <img src="{{ asset('assets/images/desa.JPEG') }}" alt="" style="width: 100%;">
    </div>
    <div class="col-lg-12 grid-margin ml-3 mt-3">
        <h3>A. Sejarah Terbentuknya Desa</h3>
        <p class="text-justify">
            Sejarah Desa Taripa di awali dengan adanya program pemerintah RI, yang mengadakan
            Transsimigrasi guna pemerataan Penyebaran Penduduk di seluruh wilayah Indonesia. Salah satu Penempatannya
            adalah di Wilayah Angkona ini. Pada awalnya kecamatan Angkona juga merupakan daerah Wilayah Kecamatan
            Malili, yang kemudian dilakukan Pembentukan Kecamatan Baru sebagi salah satu cara melakukan Pendekatan
            Pelayanan terhadap Masyarakat. Dengan adanya kedatangan Masyarakat Trasimigrasi otomatis akan terbentuk
            suatu pemerintahan baru yang akan mengelola/memberdayakan masyarakat setempat. Inilah cikal bakal kemunculan
            dari desa ini. Oleh karena pada awalnya tidak akan mungkin di lkukan pembentukan desa langsung maka wilayah
            ini masuk ke wilayah desa Tampinna. Dari Desa Tampinna pada Tahun 1981, dikarenakan memiliki wilayah yang
            cukup luas serta keinginan sebagain besar warga untuk memisahkan diri dari wilayah Tampinna Kecamatan Malili
            maka dilaksanakan pemekaran Induk dari Desa Tampina menjadi Desa Taripa dan hasil pemekaran Desa Tampina
            adalah menjadi Desa Taripa,.
            Paska pemekaran dan pemisahan diri dari Desa Tampinna yang sekarang menjadi Taripa , Desa Taripa dipimpin
            dengan Kepemimpinan pertama Kepala Unit yaitu H. Abdul Aziz pada Tahun 1981 yang kemudian dilakukanlah
            persiapan untuk menjadi desa yang depinitif Pelaksana Pejabat Pertama adalah Abdul Samad dari Tahun 1992
            sampai dengan 1997.</p>
    </div>
    <div class="col-lg-12 grid-margin ml-3 mt-3">
        <h3>B. Keadaan Geografis Desa</h3>
        <p class="text-justify">
            a. Letak Wilayah
            Desa Taripa memiliki luas wilayah yang sangat luas karena 2/3 wilayahnya adalah hutan termasuk didalamnya adalah
            Kawasan pelestraian Alam sejumlah 2.902,75 Ha , Hutan lindung 105,01 Ha,Hutan Produksi 1.245,09 Ha, Hutan
            produksi terbatas 668,18 Ha wilayah pemukiman 125 Ha ,Wilayah perkebunan (perkebunan Masyarakat dan perkebunan
            PTPN Persero) Dan wilayah Persawahan yang luasnya 1.527 Ha, jadi luas Total Desa Taripa kesuluruhan mencapai
            6.576,03 Ha., Merupakan daerah administratif yang luas jika menilik ke Desa lainnya yang terdapat di Kecamatan
            Angkona adalah menjadi salah satu Desa yang memiliki wilayah administratif Luas karena hutannya, Namun demikian
            dengan besarnya wilayah yang harus dikembangkan oleh Pemerintahan Desa Taripa maka hal itu dirasa akan sangat
            membantu dalam meningkatkan potensi yang terdapat di Desa Taripa pada masa ke masa.
            Secara geografis Desa Taripa merupakan salah satu Desa di Kecamatan Angkona yang mempunyai luas wilayah mencapai
            6.576,03 Ha.Dengan jumlah penduduk Desa Taripa sebanyak 3.118 Jiwa. Desa Taripa merupakan salah satu Desa dari
            10 (sepuluh) Desa yang ada di kecamatan Angkona Kabupaten Luwu Timur, Desa Taripa berada pada ketinggian ± 30
            Mdl berada di titik kordinat Bujur 120.929.603 Bujur Timur Dan Kordinat Lintang -2.523681 Lintang selatan degan
            curah hujan ± 150 mm, rata-rata suhu udara 23º - 32º celcius. Bentuk wilayah pemukiman berombak hanya 1%. Desa
            Taripa terletak di sebelah Utara Kecamatan Angkona yang apabila ditempuh dengan memakai kendaraan menghabiskan
            waktu selama ± 60 menit (1 jam).
            b. Luas Wilayah
            Jumlah luas Wilayah Desa Taripa seluruhnya mencapai 6.576,03 Ha., dan terdiri dari tanah darat (Hutan,Perkebunan
            pemerintah,perkebunan masyarakat ,Pemukiman penduduk)dan tanah sawah dengan rincian sebagai berikut :
            No
            Tanah
            Jumlah (Ha)
            1.
            Kawasan Pelestarian Alam
            2.902,75 Ha
            2.
            Hutan Lindung
            105,01 Ha
            3.
            Hutan Produksi
            1.245,09 ha
            4.
            Hutan Produsi Terbatas
            668,18 Ha
            5.
            Wilayah Pemukiman
            125 Ha
            6.
            Wilayah Persawahan dan Perkebunan dan lainnya
            1.527 Ha
            Total Luas Desa
            6.576,03 Ha

            c. Sumber Daya Alam
            § Pertanian
            § Peternakan
            § Perkebunan
            § Lahan Tanah
            d. Orbitasi
            Orbitasi atau jarak dari pusat-pusat pemerintahan :
            § Jarak dari Pusat Pemerintahan Kecamatan : 35 km
            § Jarak dari Pusat Pemerintahan Kabupaten : 61 km
            § Jarak dari Pusat Pemerintahan Propinsi : 540 km
            e. Karakteristik Desa
            Desa Taripa merupakan kawasan pedesaan yang bersifat agraris, dengan mata pencaharian dari sebagian besar
            penduduknya adalah bercocok tanam terutama sektor pertanian dan perkebunan. Sedangkan Mata pencaharian lainnya
            adalah sektor industri kecil yang bergerak di bidang perdagangan dan pemanfaatan hasil olahan pertanian dan
            perkebunan.
        </p>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $(document).ready(function() {
                $('#myTable').DataTable();
            });

            $('#openModal').click(function() {
                $('#modal-univ').modal('show');
            });

        })
    </script>
@endsection
