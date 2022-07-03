@extends('Layout.Base')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-tabel" data-toggle="tab" href="#tabTabel" role="tab"
                            aria-controls="Tabel" aria-selected="true">
                            <h5>Tabel History Cetakan</h5>
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

                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Penduduk</th>
                                        <th>Jenis Surat</th>
                                        <th>Tanda Tangan</th>
                                        @can('update-data', 'delete-data')
                                            <th style="width: 100px">Opsi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($data['data'] as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->pendudukRole->nama }}</td>
                                            <td>{{ $d->jenis_surat }}</td>
                                            <td>{{ $d->ttdRole->nama }}</td>
                                            @can('update-data', 'delete-data')
                                                <td>
                                                    @can('update-data')
                                                        <a href="{{ route('export.pdf', $d->id) }}"
                                                            class="btn btn-sm btn-rounded btn-primary" id="InfoId"
                                                            target="_blank"><i class="mdi mdi-cloud-download"></i></a>
                                                    @endcan
                                                    @can('delete-data')
                                                        <button data-id="{{ $d->id }}" id="btnHapus" type="button"
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
                        <div class="card-body" style="margin: 70px 100px 50px 100px;">
                            <h4 class="card-title" style="margin-bottom: 30px;">Cetak Surat</h4>
                            <hr>
                            <form id="formSimpan" class="forms-sample">
                                @csrf
                                <div class="row">
                                    <div class="col-sm-3">
                                        <div class="form-group">
                                            <label>Nomor Surat</label>
                                            <input name="no_surat" type="text"
                                                class="form-control costume-outline form-control-sm" style="height: 30px;"
                                                placeholder="Klik Disini">
                                            <p class="text-danger miniAlert text-capitalize" id="alert-no_surat"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="">Pilih Jenis Surat</label>
                                            <select name="jenis_surat" id="jenisSurat"
                                                class="form-control costume-outline form-control-sm">
                                                <option selected disabled>-Pilih-</option>
                                                <option value="Domisili">Domisili</option>
                                                <option value="Pengakuan Warga">Pengakuan Warga</option>
                                                <option value="Pengantar SKCK">Pengatar SKCK</option>
                                                <option value="Keterangan kurang Mampu">Keterangan Kurang Mampu</option>
                                                <option value="Surat Kematian">Surat Kematian</option>
                                            </select>
                                        </div>
                                        <p class="text-danger miniAlert text-capitalize" id="alert-jenis_surat"></p>
                                    </div>
                                    <div class="form-group col-md-6">
                                        <div class="form-group">
                                            <label for="">Pilih Data Penduduk</label>
                                            <select name="id_penduduk" disabled
                                                class="form-control costume-outline form-control-sm data-penduduk">
                                                <option selected disabled>-Pilih-</option>
                                            </select>
                                            <p class="text-danger miniAlert text-capitalize" id="alert-id_penduduk"></p>
                                        </div>
                                    </div>
                                </div>
                                <div id="formTambahan" class="form-group row" style="margin-top: -50px">

                                </div>
                                <div class="row" id="ttdRoom">

                                </div>
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
        let surat1 = `
            <div class="form-group col-md-6">
                <div class="form-group">
                    <label for="">Pilih Data Ayah</label>
                    <select name="nama_ayah" class="form-control costume-outline form-control-sm data-penduduk">
                        <option selected disabled>-Pilih-</option>
                    </select>
                    <p class="text-danger miniAlert text-capitalize" id="alert-nama_ayah"></p>
                </div>
            </div>
            <div class="form-group col-md-6">
                <div class="form-group">
                    <label for="">Pilih Data Ibu</label>
                    <select name="nama_ibu" class="form-control costume-outline form-control-sm data-penduduk">
                        <option selected disabled>-Pilih-</option>
                    </select>
                    <p class="text-danger miniAlert text-capitalize" id="alert-nama_ibu"></p>
                </div>
            </div>
        `;

        let domisili = `
            <div class="form-group col-md-12">
                <label>Alamat Sebelumnya</label>
                <input name="alamat_sebelumnya" type="text" class="form-control form-control-sm costume-outline" placeholder="Klik Disini">
                <p class="text-danger miniAlert text-capitalize" id="alert-alamat_sebelumnya"></p>
            </div>
            <div class="form-group col-md-12">
                <label for="">Keperluan</label>
                <textarea name="keperluan" class="form-control costume-outline" id="" rows="7"></textarea>
                <p class="text-danger miniAlert text-capitalize" id="alert-keperluan"></p>
            </div>
        `;

        let suratKematian = `
            <div class="form-group col-md-6 mt-4">
                <label>Tanggal Kematian</label>
                <input name="tgl_kematian" type="datetime-local" class="form-control form-control-sm costume-outline" placeholder="Klik Disini">
                <p class="text-danger miniAlert text-capitalize" id="alert-tgl_kematian"></p>
            </div>
            <div class="form-group col-md-6 mt-4">
                <label>Tempat Kematian</label>
                <input name="tempat_kematian" type="text" class="form-control form-control-sm costume-outline" placeholder="Klik Disini">
                <p class="text-danger miniAlert text-capitalize" id="alert-tempat_kematian"></p>
            </div>
            <div class="form-group col-md-6">
                <label>Yang Menentukan</label>
                <input name="menentukan" type="text" class="form-control form-control-sm costume-outline" placeholder="Klik Disini">
                <p class="text-danger miniAlert text-capitalize" id="alert-menentukan"></p>
            </div>
            <div class="form-group col-md-6">
                <label>Penyebab Kematian</label>
                <input name="sebab" type="text" class="form-control form-control-sm costume-outline" placeholder="Klik Disini">
                <p class="text-danger miniAlert text-capitalize" id="alert-sebab"></p>
            </div>
            <div class="form-group col-md-12">
                <label for="">Tempat Penguburan</label>
                <textarea name="tempat" class="form-control costume-outline" id="" rows="7"></textarea>
                <p class="text-danger miniAlert text-capitalize" id="alert-tempat"></p>
            </div>
        `;

        let ttd = `
            <div class="form-group col-md-12">
                <label for="">Yang Bertanda Tangan</label>
                <div class="row">
                    <div class="col-sm-10">
                        <select name="ttd" id="ttdSel" class="form-control costume-outline form-control-sm">
                            
                        </select>
                        <p class="text-danger miniAlert text-capitalize" id="alert-ttd"></p>
                    </div>
                    <div class="col-sm-2 float-left">
                        <button id="btnSave" type="button"
                            class="btn btn-sm btn-primary mt-1">Submit</button>
                    </div>
                </div>
            </div>
        `;

        const ortu = () => {
            let url = `{{ config('app.url') }}` + `/penduduk/all/data`;
            $.get(url, function(result) {
                $.each(result, function(i, value) {
                    $('.data-penduduk').append(`
                        <option value="${value.id}" >${value.nama}</option>
                    `);
                });
            })
            $('.data-penduduk').prop('disabled', false);
        }

        const ttdfunc = () => {
            let url2 = `{{ config('app.url') }}` + `/tanda_tangan/all/data`
            $('#ttdSel').html('<option selected disabled>-Pilih-</option>');
            $.get(url2, function(result) {
                $.each(result, function(i, value) {
                    $('#ttdSel').append(`
                        <option value="${value.id}" >${value.nama}</option>
                    `);
                });
            })
        }

        $(document).ready(function() {
            $('#myTable').DataTable();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('change', '#jenisSurat', function() {
            let data = $(this).val();
            $('#formTambahan').html('');
            $('.data-penduduk').html(`
                <option selected disabled>-Pilih-</option>
            `);
            $('#ttdRoom').html('');
            switch (data) {
                case 'Keterangan kurang Mampu':
                case 'Pengakuan Warga':
                    $('#formTambahan').append($(surat1)
                        .hide()
                        .fadeIn(300));
                    $('#ttdRoom').append($(ttd)
                        .hide()
                        .fadeIn(300));
                    break;
                case 'Surat Kematian':
                    $('#formTambahan').append($(suratKematian)
                        .hide()
                        .fadeIn(300));
                    $('#ttdRoom').append($(ttd)
                        .hide()
                        .fadeIn(300));
                    break;
                case 'Domisili':
                    $('#formTambahan').append($(domisili)
                        .hide()
                        .fadeIn(300));
                    $('#ttdRoom').append($(ttd)
                        .hide()
                        .fadeIn(300));
                    break;
                default:
                    $('#ttdRoom').append($(ttd)
                        .hide()
                        .fadeIn(300));
                    break;
            }

            ortu();
            ttdfunc();
        });

        $(document).on('click', '#btnSave', function() {
            let url = `{{ config('app.url') }}` + "/cetak";
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
                    }).then((res) => {
                        window.open(`{{ config('app.url') }}/exportPdf/` + result.data.id,
                            "_blank");
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
                        $('#alert-no_surat').html(errorRes.data.no_surat);
                        $('#alert-ttd').html(errorRes.data.ttd);
                        $('#alert-no_surat').html(errorRes.data.no_surat);
                        $('#alert-jenis_surat').html(errorRes.data.jenis_surat);
                        $('#alert-id_penduduk').html(errorRes.data.id_penduduk);
                        switch ($('#jenisSurat').val()) {
                            case 'Keterangan kurang Mampu':
                            case 'Pengakuan Warga':
                                $('#alert-nama_ayah').html(errorRes.data.nama_ayah);
                                $('#alert-nama_ibu').html(errorRes.data.nama_ibu);
                                break;
                            case 'Surat Kematian':
                                $('#alert-tgl_kematian').html(errorRes.data.tgl_kematian);
                                $('#alert-tempat_kematian').html(errorRes.data.tempat_kematian);
                                $('#alert-menentukan').html(errorRes.data.menentukan);
                                $('#alert-sebab').html(errorRes.data.sebab);
                                $('#alert-tempat').html(errorRes.data.tempat);
                                break;
                            case 'Domisili':
                                $('#alert-alamat_sebelumnya').html(errorRes.data.alamat_sebelumnya);
                                $('#alert-keperluan').html(errorRes.data.keperluan);
                                break
                            default:

                                break;
                        }
                    }
                }
            });
        });

        $(document).on('click', '#btnHapus', function() {
            let dataId = $(this).data('id');
            let url = `{{ config('app.url') }}` + "/cetak/" + dataId;
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
    </script>
@endsection
