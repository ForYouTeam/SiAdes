@extends('Layout.Base')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-tabel" data-toggle="tab" href="#tabTabel" role="tab"
                            aria-controls="Tabel" aria-selected="true">
                            <h5>Tabel Penduduk</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-form" data-toggle="tab" href="#tabForm" role="tab"
                            aria-controls="Form" aria-selected="false">
                            <h5>Formulir</h5>
                        </a>
                    </li>
                </ul>
            </div>
            <div class="card-body">
                <div class="tab-content" id="myTabContent">
                    <div class="tab-pane fade show active p-3" id="tabTabel" role="tabpanel" aria-labelledby="tab-tabel">
                        <h4 class="card-title">Data Penduduk</h4>
                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>No KK</th>
                                        <th>Nama</th>
                                        <th>Jenis Kelamin</th>
                                        <th>Tanggal Lahir</th>
                                        <th>Agama</th>
                                        <th>Pekerjaan</th>
                                        <th>Alamat</th>
                                        <th>Suku</th>
                                        <th>Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($penduduk as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->kk }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->jk }}</td>
                                            <td>{{ $d->tglLahir }}</td>
                                            <td>{{ $d->agama }}</td>
                                            <td>{{ $d->pekerjaan }}</td>
                                            <td>{{ $d->alamat }}</td>
                                            <td>{{ $d->suku }}</td>
                                            <td>
                                                <button type="button" id="btnEdit" data-id="{{ $d->id }}"
                                                    data-bs-toggle="modal" data-bs-target="#modal-univ"
                                                    class="btn btn-info btn-rounded btn-icon">
                                                    <i class="mdi mdi-archive"></i>
                                                </button>
                                                <button type="button" id="btnDelete" data-id="{{ $d->id }}"
                                                    class="btn btn-danger btn-rounded btn-icon">
                                                    <i class="mdi mdi-delete"></i>
                                                </button>
                                            </td>
                                        </tr>
                                    @endforeach
                                </tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade p-3" id="tabForm" role="tabpanel" aria-labelledby="tab-form">
                        <div class="card-body">
                            <h4 class="card-title">Input Data Penduduk</h4>
                            <form class="forms-sample" id="formSimpan">
                                @csrf
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="kk" class="col-sm-3 col-form-label">No KK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="kk"
                                                name="kk" placeholder="No KK">
                                            <p class="text-danger miniAlert text-capitalize" id="alertKK"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="nik" class="col-sm-3 col-form-label">NIK</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="nik"
                                                name="nik" placeholder="NIK">
                                            <p class="text-danger miniAlert text-capitalize" id="alertNIK"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="nama" class="col-sm-3 col-form-label">Nama</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="nama"
                                                name="nama" placeholder="nama">
                                            <p class="text-danger miniAlert text-capitalize" id="alertNama"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="jk" class="col-sm-3 col-form-label">Jenis Kelamin</label>
                                        <div class="col-sm-9">
                                            <select class="form-control costume-outline" id="jk" name="jk">
                                                <option selected disabled>Pilih Jenis kelamin</option>
                                                <option value="Laki-Laki">Laki-Laki</option>
                                                <option value="Perempuan">Perempuan</option>
                                            </select>
                                            <p class="text-danger miniAlert text-capitalize" id="alertJk"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="tmpLahir" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="tmpLahir"
                                                name="tmpLahir" placeholder="Tempat Lahir">
                                            <p class="text-danger miniAlert text-capitalize" id="alerTmpLahir"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="tglLahir" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                        <div class="col-sm-9">
                                            <input type="date" class="form-control costume-outline" id="tglLahir"
                                                name="tglLahir" placeholder="Tanggal Lahir">
                                            <p class="text-danger miniAlert text-capitalize" id="alertTglLahir"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="agama" class="col-sm-3 col-form-label">Agama</label>
                                        <div class="col-sm-9">
                                            <select class="form-control costume-outline" id="agama" name="agama">
                                                <option selected disabled>Pilih Agama</option>
                                                <option value="Islam">Islam</option>
                                                <option value="Kristen">Kristen</option>
                                                <option value="Hindu">Hindu</option>
                                                <option value="Budha">Budha</option>
                                                <option value="Katolik">Katolik</option>
                                                <option value="Konghucu">Konghucu</option>
                                            </select>
                                            <p class="text-danger miniAlert text-capitalize" id="alertAgama"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="statKeluarga" class="col-sm-3 col-form-label">Status Keluarga</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="statKeluarga"
                                                name="statKeluarga" placeholder="Status Keluarga">
                                            <p class="text-danger miniAlert text-capitalize" id="alertStatKeluarga"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="pekerjaan" class="col-sm-3 col-form-label">Pekerjaan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="pekerjaan"
                                                name="pekerjaan" placeholder="Pekerjaan">
                                            <p class="text-danger miniAlert text-capitalize" id="alertPekerjaan"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="alamat" class="col-sm-3 col-form-label">Alamat</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="alamat"
                                                name="alamat" placeholder="Alamat">
                                            <p class="text-danger miniAlert text-capitalize" id="alertAlamat"></p>
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="form-group row col-6">
                                        <label for="suku" class="col-sm-3 col-form-label">Suku</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="suku"
                                                name="suku" placeholder="Suku">
                                            <p class="text-danger miniAlert text-capitalize" id="alertSuku"></p>
                                        </div>
                                    </div>
                                    <div class="form-group row col-6">
                                        <label for="ket" class="col-sm-3 col-form-label">Keterangan</label>
                                        <div class="col-sm-9">
                                            <input type="text" class="form-control costume-outline" id="ket"
                                                name="ket" placeholder="Keterangan">
                                            <p class="text-danger miniAlert text-capitalize" id="alertKet"></p>
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

            $('#btnSave').on('click', function() {
                let url = `{{ config('app.url') }}` + "/penduduk";
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
                            $('#alertKK').html(errorRes.data.kk);
                            $('#alertNIK').html(errorRes.data.nik);
                            $('#alertNama').html(errorRes.data.nama);
                            $('#alertJk').html(errorRes.data.jk);
                            $('#alertTmpLahir').html(errorRes.data.tmpLahir);
                            $('#alertTglLahir').html(errorRes.data.tglLahir);
                            $('#alertAgama').html(errorRes.data.agama);
                            $('#alertStatKeluarga').html(errorRes.data.statKeluarga);
                            $('#alertPekerjaan').html(errorRes.data.pekerjaan);
                            $('#alertAlamat').html(errorRes.data.alamat);
                            $('#alertSuku').html(errorRes.data.suku);
                            $('#alertHidup').html(errorRes.data.hdup);
                            $('#alertKet').html(errorRes.data.ket);
                        }
                    }
                });
            });

            $(document).on('click', '#btnEdit', function() {
                let dataId = $(this).data('id');
                let url = `{{ config('app.url') }}` + "/penduduk/" + dataId;
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
                                <label>No KK</label>
                                    <input type="hidden" class="form-control" id="pendudukId" value="` + data.id + `">
                                    <input type="text" class="form-control" id="kk" name="kk" value="` + data.kk + `">
                                </div>
                                <div class="form-group col-6">
                                <label>NIK</label>
                                    <input type="text" class="form-control" id="nik" name="nik" value="` + data.nik + `">
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Nama</label>
                                    <input type="text" class="form-control" id="nama" name="nama" value="` + data
                            .nama + `">
                                </div>
                                <div class="form-group col-6">
                                <label>Jenis Kelamin</label>
                                <select class="form-control" id="jkUpdate" name="jk">
                                    <option selected disabled>Pilih Jenis kelamin</option>
                                    <option value="Laki-Laki">Laki-Laki</option>
                                    <option value="Perempuan">Perempuan</option>
                                </select> 
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Tempat Lahir</label>
                                    <input type="text" class="form-control" id="tmpLahir" name="tmpLahir" value="` +
                            data
                            .tmpLahir + `">
                                </div>
                                <div class="form-group col-6">
                                <label>Tanggal Lahir</label>
                                    <input type="date" class="form-control" id="tglLahir" name="tglLahir" value="` +
                            data
                            .tglLahir + `">
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Umur</label>
                                    <input type="text" class="form-control" id="umur" name="umur" value="` + data
                            .umur +
                            `">
                                </div>
                                <div class="form-group col-6">
                                <label>Agama</label>
                                <select class="form-control" id="agamaUpdate" name="agama">
                                    <option selected disabled>Pilih Agama</option>
                                    <option value="Islam">Islam</option>
                                    <option value="Kristen">Kristen</option>
                                    <option value="Hindu">Hindu</option>
                                    <option value="Budha">Budha</option>
                                    <option value="Katolik">Katolik</option>
                                    <option value="Konghucu">Konghucu</option>
                                </select>
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Status Keluarga</label>
                                    <input type="text" class="form-control" id="statKeluarga" name="statKeluarga" value="` +
                            data.statKeluarga +
                            `">
                                </div>
                                <div class="form-group col-6">
                                    <label>Pekerjaan</label>
                                        <input type="text" class="form-control" id="pekerjaan" name="pekerjaan" value="` +
                            data.pekerjaan + `">
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Alamat</label>
                                    <input type="text" class="form-control" id="alamat" name="alamat" value="` + data
                            .alamat + `">
                                </div>
                                <div class="form-group col-6">
                                    <label>Suku</label>
                                        <input type="text" class="form-control" id="suku" name="suku" value="` + data
                            .suku + `">
                                </div>
                            </div>
                            <div class="row mr-2 ml-2">
                                <div class="form-group col-6">
                                <label>Hidup</label>
                                    <input type="text" class="form-control" id="hidup" name="hidup" value="` + data
                            .hidup + `">
                                </div>
                                <div class="form-group col-6">
                                    <label>Keterangan</label>
                                        <input type="text" class="form-control" id="ket" name="ket" value="` + data
                            .ket + `">
                                </div>
                            </div>
                        </div>
                    `);
                        $('#jkUpdate').val(data.jk);
                        $('#agamaUpdate').val(data.agama);
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
                let dataId = $('#pendudukId').val();
                let url = `{{ config('app.url') }}` + "/penduduk/" + dataId;
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
                let url = `{{ config('app.url') }}` + "/penduduk    /" + dataId;
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
        })
    </script>
@endsection
