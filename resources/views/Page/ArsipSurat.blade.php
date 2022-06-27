@extends('Layout.Base')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-tabel" data-toggle="tab" href="#tabTabel" role="tab"
                            aria-controls="Tabel" aria-selected="true">
                            <h5>Tabel Arsip Surat Masuk</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-tabel1" data-toggle="tab" href="#tabTabel1" role="tab"
                            aria-controls="Tabel1" aria-selected="false">
                            <h5>Tabel Arsip Surat Keluar</h5>
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
                                        <th>Tanggal Penerimaan</th>
                                        <th>Nomor Surat</th>
                                        <th>Tanggal Surat</th>
                                        <th>Pengirim</th>
                                        <th>Isi Singkat</th>
                                        <th>Keterangan</th>
                                        <th>File</th>
                                        @can('update-data', 'delete-data')
                                            <th style="width: 100px">Opsi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($arsip['masuk'] as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->tgl_penerimaan }}</td>
                                            <td>{{ $d->no_surat }}</td>
                                            <td>{{ $d->tgl_surat }}</td>
                                            <td>{{ $d->pengirim }}</td>
                                            <td>{{ $d->isi_singkat }}</td>
                                            <td>{{ $d->ket }}</td>
                                            @can('update-data', 'delete-data')
                                                <td>
                                                    @can('update-data')
                                                        <a href="{{ asset('storage/format_file/' . $d->format_file) }}"
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
                </div>
                <div class="tab-pane fade p-3" id="tabTabel1" role="tabpanel" aria-labelledby="tab-tabel1">

                    <div class="table-responsive">
                        <table id="myTable1" class="table">
                            <thead>
                                <tr>
                                    <th style="width: 10px">No.</th>
                                    <th>Tanggal Surat</th>
                                    <th>Nomor Surat</th>
                                    <th>Perihal</th>
                                    <th>Di Tujukan Kepada</th>
                                    <th>Keterangan</th>
                                    <th>File</th>
                                    <th style="width: 100px">Opsi</th>
                                </tr>
                            </thead>
                            <tbody>
                                @php
                                    $no = 1;
                                @endphp
                                @foreach ($arsip['keluar'] as $d)
                                    <tr>
                                        <td>{{ $no++ }}</td>
                                        <td>{{ $d->tgl_surat }}</td>
                                        <td>{{ $d->no_surat }}</td>
                                        <td>{{ $d->perihal }}</td>
                                        <td>{{ $d->ditujukan_kepada }}</td>
                                        <td>{{ $d->ket }}</td>
                                        <td>
                                            <a href="{{ asset('storage/format_file/' . $d->format_file) }}"
                                                class="btn btn-sm btn-rounded btn-primary" id="InfoId" target="_blank"><i
                                                    class="mdi mdi-cloud-download"></i></a>
                                        </td>
                                        <td>
                                            @hasrole('super-admin')
                                                <button data-id="{{ $d->id }}" id="btnHapus" type="button"
                                                    class="btn btn-sm btn-rounded btn-danger ml-2">
                                                    <i class="mdi mdi-account-remove"></i>
                                                </button>
                                            @endhasrole
                                        </td>
                                    </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
            <div class="tab-pane fade p-3" id="tabForm" role="tabpanel" aria-labelledby="tab-form">
                <div class="card-body">
                    <form id="formSimpan" class="forms-sample" enctype="multipart/form-data">
                        @csrf
                        <div class="form-group">
                            <label class="col-form-label" for="">Pilih Jenis Surat</label>
                            <select name="jenis_arsip" class="form-control costume-outline form-control-sm col-4"
                                id="jenis_arsip">
                                <option selected disabled>Pilih Jenis Surat</option>
                                <option value="surat masuk">Surat Masuk</option>
                                <option value="surat keluar">Surat Keluar</option>
                            </select>
                            <p class="text-danger miniAlert text-capitalize" id="alert-Jenis"></p>
                        </div>
                        <hr>
                        <div class="row">
                            <div class="form-group col-4">
                                <label for="no_surat">Nomor Surat</label>
                                <input type="text" class="form-control costume-outline" id="no_surat" name="no_surat"
                                    placeholder="Nomor Surat">
                                <p class="text-danger miniAlert text-capitalize" id="alert-NoSurat"></p>
                            </div>
                            <div class="form-group col-4">
                                <label for="tgl_surat">Tanggal Surat</label>
                                <input type="date" class="form-control costume-outline" id="tgl_surat"
                                    name="tgl_surat" placeholder="Tanggal Surat">
                                <p class="text-danger miniAlert text-capitalize" id="alert-TglSurat"></p>
                            </div>
                            <div class="form-group col-4">
                                <label>File upload</label>
                                <input type="file" class="form-control costume-outline" id="format_file"
                                    name="format_file">
                                <p class="text-danger miniAlert text-capitalize" id="alert-Format"></p>
                            </div>
                        </div>
                        <div id="form_tambahan">

                        </div>
                        <div class="row">
                            <div class="form-group col-12">
                                <label for="4et">Keterangan</label>
                                <textarea class="form-control costume-outline" id="ket" name="ket" rows="4"></textarea>
                                <p class="text-danger miniAlert text-capitalize" id="alert-Ket"></p>
                            </div>
                        </div>
                        <button id="btnSave" type="button" class="btn btn-sm btn-primary mr-2">Submit</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection
@section('script')
    <script>
        let arsipMasuk = `
        <div class="row">
            <div class="form-group col-6">
                <label for="tgl_penerimaan">Tanggal Penerimaan</label>
                <input type="date" class="form-control costume-outline" id="tgl_penerimaan" name="tgl_penerimaan"
                    placeholder="Tanggal Surat">
                    <p class="text-danger miniAlert text-capitalize" id="alert-TglPenerimaan"></p>
            </div>
            <div class="form-group col-6">
                <label for="tgl_surat">Pengirim</label>
                <input type="text" class="form-control costume-outline" id="pengirim" name="pengirim"
                    placeholder="Tanggal Surat">
                    <p class="text-danger miniAlert text-capitalize" id="alert-Pengirim"></p>
            </div>
        </div>
        <div class="row">
            <div class="form-group col-12">
                <label for="4et">Isi Singkat</label>
                <textarea class="form-control costume-outline" id="isi_singkat" name="isi_singkat" rows="4"></textarea>
                <p class="text-danger miniAlert text-capitalize" id="alert-IsiSingkat"></p>
            </div>
        </div>
    `;
        let arsipKeluar = `
        <div class="row">
            <div class="form-group col-12">
                <label for="ditujukan_kepada">Di Tujukan Kepada</label>
                <input type="text" class="form-control costume-outline" id="ditujukan_kepada" name="ditujukan_kepada"
                    placeholder="Di Tujukan Kepada">
                    <p class="text-danger miniAlert text-capitalize" id="alert-Tujukan"></p>
            </div>
            </div>
        </div>
            <div class="row">
                <div class="form-group col-12">
                <label for="4et">Perihal</label>
                <textarea class="form-control costume-outline" id="perihal" name="perihal" rows="4"></textarea>
                <p class="text-danger miniAlert text-capitalize" id="alert-Perihal"></p>
            </div>
        </div>
    `;
        $(document).ready(function() {
            $('#myTable').DataTable();
            $('#myTable1').DataTable();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        });

        $(document).on('click', '#btnSave', function() {
            let url = `{{ config('app.url') }}` + "/arsip_surat";
            let data = new FormData($('#formSimpan')[0]);
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
                cache: false,
                contentType: false,
                processData: false,
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
                        $('#alert-Jenis').html(errorRes.data.jenis_arsip);
                        $('#alert-TglSurat').html(errorRes.data.tgl_surat);
                        $('#alert-TglPenerimaan').html(errorRes.data.tgl_penerimaan);
                        $('#alert-NoSurat').html(errorRes.data.no_surat);
                        $('#alert-Perihal').html(errorRes.data.perihal);
                        $('#alert-Pengirim').html(errorRes.data.pengirim);
                        $('#alert-Tujukan').html(errorRes.data.ditujukan_kepada);
                        $('#alert-IsiSingkat').html(errorRes.data.isi_singkat);
                        $('#alert-Ket').html(errorRes.data.ket);
                        $('#alert-Format').html(errorRes.data.format_file);
                    }
                }
            });
        });

        $(document).on('click', '#btnHapus', function() {
            let dataId = $(this).data('id');
            let url = `{{ config('app.url') }}` + "/arsip_surat/" + dataId;
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

        $(document).on('change', '#jenis_arsip', function() {
            let jenis = $(this).val();
            $('#form_tambahan').html('');
            if (jenis == 'surat masuk') {
                $('#form_tambahan').append($(arsipMasuk).hide().fadeIn(300));
            } else {
                $('#form_tambahan').append($(arsipKeluar).hide().fadeIn(300));
            }
        })
    </script>
@endsection
