@extends('Layout.Base')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-tabel" data-toggle="tab" href="#tabTabel" role="tab"
                            aria-controls="Tabel" aria-selected="true">
                            <h5>Tabel Barang</h5>
                        </a>
                    </li>
                    @can('create-data')
                        <li class="nav-item">
                            <a class="nav-link" id="tab-form" data-toggle="tab" href="#tabForm" role="tab"
                                aria-controls="Form" aria-selected="false">
                                <h5>Formulir</h5>
                            </a>
                        </li>
                    @endcan
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="tabTabel" role="tabpanel" aria-labelledby="tab-tabel">
                        <h4 class="card-title">Data Barang</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Jenis Barang</th>
                                        <th>Nama Barang</th>
                                        <th>Jumlah Barang</th>
                                        <th>Satuan</th>
                                        <th>Tahun Perolehan</th>
                                        <th>Sumber Anggaran</th>
                                        <th>Harga Satuan</th>
                                        <th>Harga Total</th>
                                        @can('update-data', 'delete-data')
                                            <th style="width: 100px">Opsi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($barang as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->jenisBarang }}</td>
                                            <td>{{ $d->namaBarang }}</td>
                                            <td>{{ $d->jumlahBarang }}</td>
                                            <td>{{ $d->satuan }}</td>
                                            <td>Tahun {{ $d->tahunPerolehan }}</td>
                                            <td>{{ $d->sumberAnggaran }}</td>
                                            <td>Rp. @currency($d->hargaSatuan)</td>
                                            <td>Rp. @currency($d->hargatotal)</td>
                                            @can('update-data', 'delete-data')
                                                <td>
                                                    @can('update-data')
                                                        <button data-id="{{ $d->id }}"
                                                            class="btn btn-sm btn-rounded btn-primary" id="btnEdit"><i
                                                                class="mdi mdi-pencil"></i></button>
                                                    @endcan
                                                    @can('delete-data')
                                                        <button data-id="{{ $d->id }}" id="btnDelete" type="button"
                                                            class="btn btn-sm btn-rounded btn-danger ml-2">
                                                            <i class="mdi mdi-account-remove"></i>
                                                        </button>
                                                    @endcan
                                                </td>
                                            @endcan
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3" id="tabForm" role="tabpanel" aria-labelledby="tab-form">
                        <div class="card-body">
                            <h4 class="card-title">Input Data Barang</h4>
                            <form class="forms-sample" id="formSimpan">
                                @csrf
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="jenisBarang" class="col-sm-3 col-form-label">Jenis Barang</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="jenisBarang"
                                                name="jenisBarang" placeholder="Jenis Barang">
                                            <p class="text-danger miniAlert text-capitalize" id="alertJenisBarang"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="namaBarang" class="col-sm-3 col-form-label">Nama Barang</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="namaBarang"
                                                name="namaBarang" placeholder="Nama Barang">
                                            <p class="text-danger miniAlert text-capitalize" id="alertNamaBarang"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="jumlahBarang" class="col-sm-3 col-form-label">Jumlah Barang</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control costume-outline" id="jumlahBarang"
                                                name="jumlahBarang" placeholder="jumlahBarang">
                                            <p class="text-danger miniAlert text-capitalize" id="alertJumlahBarang"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="satuan" class="col-sm-3 col-form-label">Satuan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="satuan"
                                                name="satuan" placeholder="Satuan">
                                            <p class="text-danger miniAlert text-capitalize" id="alertSatuan"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="tahunPerolehan" class="col-sm-3 col-form-label">Tahun
                                            Perolehan</label>
                                        <div class="col-sm-9">
                                            <input type="year" class="form-control costume-outline"
                                                id="tahunPerolehan" name="tahunPerolehan" placeholder="Tahun Perolehan">
                                            <p class="text-danger miniAlert text-capitalize" id="alertTahunPerolehan"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="sumberAnggaran" class="col-sm-3 col-form-label">Sumber
                                            Anggaran</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline"
                                                id="sumberAnggaran" name="sumberAnggaran" placeholder="Sumber Anggaran">
                                            <p class="text-danger miniAlert text-capitalize" id="alerSumberAnggaran"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="hargaSatuan" class="col-sm-3 col-form-label">Harga Satuan</label>
                                        <div class="col-sm-9">
                                            <input type="number" class="form-control costume-outline" id="hargaSatuan"
                                                name="hargaSatuan" value="0" placeholder="Harga Satuan">
                                            <p class="text-danger miniAlert text-capitalize" id="alertHargaSatuan"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="hargatotal" class="col-sm-3 col-form-label">Harga Total</label>
                                        <div class="col-sm-9">
                                            <input type="hidden" class="form-control" id="hargaDB" name="hargatotal">
                                            <input type="text" class="form-control costume-outline" id="hargatotal"
                                                value="" placeholder="Harga Total" disabled>
                                            <p class="text-danger miniAlert text-capitalize" id="alertHargaTotal"></p>
                                        </div>
                                    </div>
                                </div>
                                <button type="button" id="btnSave" class="btn btn-primary mr-2">Submit</button>
                                <button class="btn btn-light">Cancel</button>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        $(document).ready(function() {
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
            $('#myTable').DataTable();

            $('#openModal').click(function() {
                $('#modal-univ').modal('show');
            });

            $('#jumlahBarang, #hargaSatuan', ).keyup(function() {
                let jumlah = $('#jumlahBarang').val();
                let harga = $('#hargaSatuan').val();
                let total = parseInt(jumlah) * parseInt(harga);
                let rupiah = total.toString().length <= 3 ? total : format(total);
                $('#hargatotal').val(rupiah);
                $('#hargaDB').val(total);
            });

            $('#btnSave').on('click', function() {
                let url = `{{ config('app.url') }}` + "/barang";
                let data = $('#formSimpan').serialize();

                let timerInterval
                Swal.fire({
                    title: 'Sedang Menyimpan',
                    html: 'Ini akan menutup sendiri',
                    timer: 2000,
                    timerProgressBar: false,
                    didOpen: () => {
                        Swal.showLoading()
                        const b = Swal.getHtmlContainer().querySelector('b')
                        timerInterval = setInterval(() => {
                            b.textContent = Swal.getTimerLeft()
                        }, 100)
                    },
                    willClose: () => {
                        clearInterval(timerInterval)
                    }
                })
                $.ajax({
                    url: url,
                    method: "POST",
                    data: data,
                    success: function(result) {
                        Swal.fire({
                            title: result.response.title,
                            text: result.response.message,
                            icon: result.response.icon,
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Oke'
                        }).then((result) => {
                            location.reload();
                        });
                    },
                    error: function(result) {
                        let data = result.responseJSON
                        let errorRes = data.errors
                        Swal.fire({
                            icon: data.response.icon,
                            title: data.response.title,
                            text: data.response.message,
                        });
                        if (errorRes.length >= 1) {
                            $('.miniAlert').html('');
                            $('#alertJenisBarang').html(errorRes.data.jenisBarang);
                            $('#alertNamaBarang').html(errorRes.data.namaBarang);
                            $('#alertJumlahBarang').html(errorRes.data.jumlahBarang);
                            $('#alertSatuan').html(errorRes.data.satuan);
                            $('#alertTahunPerolehan').html(errorRes.data.tahunPerolehan);
                            $('#alertSumberAnggaran').html(errorRes.data.sumberAnggaran);
                            $('#alertHargaSatuan').html(errorRes.data.hargaSatuan);
                            $('#alertHargaTotal').html(errorRes.data.hargatotal);
                        }
                    }
                });
            });

            $(document).on('click', '#btnEdit', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/barang/" + dataId;
                $.ajax({
                    url: url,
                    type: 'GET',
                    success: function(result) {
                        let data = result.data;
                        $('#modal-univ').modal('show');
                        $('.modal-title').html('Perubahan Data');
                        $('#form-univ').html('');
                        $('#form-univ').append(`
                        <div class="mr-4 ml-4 mt-3">
                            <div class="row mr-2 ml-2 mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Jenis Barang</label>
                                    <input type="hidden" class="form-control" id="barangId" value="` + data.id +
                            `">
                                    <input type="text" class="form-control" id="jenisBarang" name="jenisBarang" value="` +
                            data.jenisBarang +
                            `">
                                </div>
                                <div class="form-group col-6">
                                <label>Nama Barang</label>
                                    <input type="text" class="form-control" id="namaBarang" name="namaBarang" value="` +
                            data.namaBarang +
                            `">
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Jumlah Barang</label>
                                    <input type="number" class="form-control" id="jumlahBarang1" name="jumlahBarang" value="` +
                            data.jumlahBarang + `">
                                </div>
                                <div class="form-group col-6">
                                <label>Satuan</label>
                                    <input type="text" class="form-control" id="satuan" name="satuan" value="` + data
                            .satuan +
                            `">
                                </div>
                            </div>
                            <div class="row mr-2 ml-2 mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Tahun Perolehan</label>
                                    <input type="number" class="form-control" id="tahunPerolehan" name="tahunPerolehan" value="` +
                            data.tahunPerolehan +
                            `">
                                </div>
                                <div class="form-group col-6">
                                <label>Sumber Anggaran</label>
                                    <input type="text" class="form-control" id="sumberAnggaran" name="sumberAnggaran" value="` +
                            data
                            .sumberAnggaran +
                            `">
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Harga Satuan</label>
                                    <input type="number" class="form-control" id="hargaSatuan1" name="hargaSatuan" value="` +
                            data
                            .hargaSatuan +
                            `">
                                </div>
                                <div class="form-group col-6">
                                <label>Harga Total</label>
                                    <input type="hidden" class="form-control" id="hargaDB1" name="hargatotal" value="` +
                            data
                            .hargatotal + `">
                                    <input type="text" class="form-control" id="hargatotal1" value="` + data
                            .hargatotal + `" disabled>
                                </div>
                            </div>
                        </div>
                        `);
                        $('#jumlahBarang1, #hargaSatuan1', ).keyup(function() {
                            let jumlah = $('#jumlahBarang1').val();
                            let harga = $('#hargaSatuan1').val();
                            let total = parseInt(jumlah) * parseInt(harga);
                            let rupiah = total.toString().length <= 3 ? total : format(
                                total);
                            $('#hargatotal1').val(rupiah);
                            $('#hargaDB1').val(total);
                        });

                    },
                    error: function(result) {
                        let data = result.responseJSON
                        Swal.fire({
                            icon: data.response.icon,
                            title: data.response.title,
                            text: data.response.message,
                        });
                    }

                });
            });
            $('#btnUpdate').on('click', function() {
                let dataId = $('#barangId').val();
                let url = `{{ config('app.url') }}` + "/barang/" + dataId;
                let data = $('#form-univ').serialize();
                let modalClose = () => {
                    $('#modal-univ').modal('hide');
                }
                $.ajax({
                    url: url,
                    method: "patch",
                    data: data,
                    success: function(result) {
                        modalClose();
                        Swal.fire({
                            title: result.response.title,
                            text: result.response.message,
                            icon: result.response.icon,
                            cancelButtonColor: '#d33',
                            confirmButtonText: 'Oke'
                        }).then((result) => {
                            location.reload();
                        });
                    },
                    error: function(result) {
                        let data = result.responseJSON
                        modalClose();
                        Swal.fire({
                            icon: data.response.icon,
                            title: data.response.title,
                            text: data.response.message,
                        });
                    }
                });
            });

            $(document).on('click', '#btnDelete', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/barang/" + dataId;
                Swal.fire({
                    title: 'Anda Yakin?',
                    text: "Data ini mungkin terhubung ke tabel yang lain!",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#3085d6',
                    cancelButtonColor: '#d33',
                    cancelButtonText: 'Batal',
                    confirmButtonText: 'Hapus'
                }).then((res) => {
                    if (res.isConfirmed) {
                        $.ajax({
                            url: url,
                            type: 'delete',
                            success: function(result) {
                                let data = result.data;
                                Swal.fire({
                                    title: result.response.title,
                                    text: result.response.message,
                                    icon: result.response.icon,
                                    cancelButtonColor: '#d33',
                                    confirmButtonText: 'Oke'
                                }).then((result) => {
                                    location.reload();
                                });
                            },
                            error: function(result) {
                                let data = result.responseJSON
                                Swal.fire({
                                    icon: data.response.icon,
                                    title: data.response.title,
                                    text: data.response.message,
                                });
                            }
                        });
                    }
                })
            });

            const format = (num) => {
                let str = num.toString().replace("", ""),
                    parts = false,
                    output = [],
                    i = 1,
                    formatted = null;
                if (str.indexOf(".") > 0) {
                    parts = str.split(".");
                    str = parts[0];
                }
                str = str.split("").reverse();
                for (let j = 0, len = str.length; j < len; j++) {
                    if (str[j] != ",") {
                        output.push(str[j]);
                        if (i % 3 == 0 && j < (len - 1)) {
                            output.push(",");
                        }
                        i++;
                    }
                }
                formatted = output.reverse().join("");
                return ("" + formatted + ((parts) ? "." + parts[1].substr(0, 2) : ""));
            };
        })
    </script>
@endsection
