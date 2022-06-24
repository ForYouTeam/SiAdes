@extends('Layout.Base')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-tabel" data-toggle="tab" href="#tabTabel" role="tab"
                            aria-controls="Tabel" aria-selected="true">
                            <h5>Tabel Staff</h5>
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

                        <div class="table-responsive">
                            <table id="myTable" class="table">
                                <thead>
                                    <tr>
                                        <th style="width: 10px">No.</th>
                                        <th>Nama</th>
                                        <th>Jabatan.</th>
                                        <th>Nomor Sk</th>
                                        <th style="width: 100px">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($staff['data'] as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->jabatan }}</td>
                                            <td>{{ $d->noSk }}</td>
                                            <td>
                                                <button data-id="{{ $d->id }}" id="btnEdit" type="button"
                                                    class="btn btn-sm btn-rounded btn-primary">
                                                    <i class="mdi mdi-lead-pencil"></i>
                                                </button>
                                                <button data-id="{{ $d->id }}" id="btnHapus" type="button"
                                                    class="btn btn-sm btn-rounded btn-danger ml-2">
                                                    <i class="mdi mdi-account-remove"></i>
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
                            <h4 class="card-title">Input Data Staff</h4>
                            <form id="formSimpan" class="forms-sample">
                                @csrf
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input name="nama" type="text" class="form-control costume-outline"
                                            id="" placeholder="Klik disini">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-nama"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Jabatan</label>
                                    <div class="col-sm-9">
                                        <input name="jabatan" type="text" class="form-control costume-outline"
                                            id="" placeholder="Klik disini">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-jabatan"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                                    <div class="col-sm-9">
                                        <input name="tmpLahir" type="text" class="form-control costume-outline"
                                            id="" placeholder="Klik disini">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-tmpLahir"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                                    <div class="col-sm-9">
                                        <input name="tglLahir" type="date" class="form-control costume-outline"
                                            id="">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-tglLahir"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="">Jenis Kelamin</label>
                                    <div class="col-sm-9">
                                        <select name="jk" class="form-control costume-outline form-control-sm"
                                            id="">
                                            <option selected disabled>Pilih</option>
                                            <option value="pria">Pria</option>
                                            <option value="wanita">Wanita</option>
                                        </select>
                                        <p class="text-danger miniAlert text-capitalize" id="alert-jk"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="">Pendidikan Terakhir</label>
                                    <div class="col-sm-9">
                                        <select name="pendidikan" class="form-control costume-outline form-control-sm"
                                            id="">
                                            <option selected disabled>Pilih</option>
                                            <option value="S3">Sarjana S3</option>
                                            <option value="S2">Sarjana S2</option>
                                            <option value="S1">Sarjana S1</option>
                                            <option value="smk/slta">SMK/Slta Sederajat</option>
                                        </select>
                                        <p class="text-danger miniAlert text-capitalize" id="alert-pendidikan"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Nomor Sk</label>
                                    <div class="col-sm-9">
                                        <input name="noSk" type="number" class="form-control costume-outline"
                                            id="" placeholder="Klik disini">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-noSk"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Textarea</label>
                                    <div class="col-sm-9">
                                        <textarea name="alamat" class="form-control costume-outline" id="" rows="4"></textarea>
                                        <p class="text-danger miniAlert text-capitalize" id="alert-alamat"></p>
                                    </div>
                                </div>
                                <button id="btnSave" type="button" class="btn btn-sm btn-primary mr-2">Submit</button>
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
            $('#myTable').DataTable();
            $.ajaxSetup({
                headers: {
                    'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                }
            });
        })

        $(document).on('click', '#btnSave', function() {
            let url = `{{ config('app.url') }}` + "/staff";
            let data = $('#formSimpan').serialize();

            $.ajax({
                url: url,
                method: "POST",
                data: data,
                success: function(result) {
                    console.log(result);
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
                    console.log(data);
                    let errorRes = data.errors
                    Swal.fire({
                        icon: data.response.icon,
                        title: data.response.title,
                        text: data.response.message,
                    });
                    if (errorRes.length >= 1) {
                        $('.miniAlert').html('');
                        $('#alert-nama').html(errorRes.data.nama);
                        $('#alert-jabatan').html(errorRes.data.jabatan);
                        $('#alert-tmpLahir').html(errorRes.data.tmpLahir);
                        $('#alert-tglLahir').html(errorRes.data.tglLahir);
                        $('#alert-jk').html(errorRes.data.jk);
                        $('#alert-pendidikan').html(errorRes.data.pendidikan);
                        $('#alert-noSk').html(errorRes.data.noSk);
                        $('#alert-alamat').html(errorRes.data.alamat);
                    }
                }
            });
        });

        $(document).on('click', '#btnEdit', function() {
            let id = $(this).data('id');
            let url = `{{ config('app.url') }}` + `/staff/${id}`;

            $.get(url, function(result) {
                let data = result.data;
                console.log(data);
                $('#modal-univ').modal('show');
                $('.modal-title').html('Perubahan Data');
                $('#form-univ').html('');
                $('#form-univ').append(`
                    <div class="card-body">
                        <div class="form-group row mr-2 ml-2">
                            <label for="" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="hidden" id="id_staff" value="${data.id}">
                                <input value="${data.nama}" name="nama" type="text" class="form-control costume-outline"
                                    id="" placeholder="Klik disini">
                            </div>
                        </div>
                        <div class="form-group row mr-2 ml-2">
                            <label for="" class="col-sm-3 col-form-label">Jabatan</label>
                            <div class="col-sm-9">
                                <input value="${data.jabatan}" name="jabatan" type="text" class="form-control costume-outline"
                                    id="" placeholder="Klik disini">
                            </div>
                        </div>
                        <div class="form-group row mr-2 ml-2">
                            <label for="" class="col-sm-3 col-form-label">Tempat Lahir</label>
                            <div class="col-sm-9">
                                <input value="${data.tmpLahir}" name="tmpLahir" type="text" class="form-control costume-outline"
                                    id="" placeholder="Klik disini">
                            </div>
                        </div>
                        <div class="form-group row mr-2 ml-2">
                            <label for="" class="col-sm-3 col-form-label">Tanggal Lahir</label>
                            <div class="col-sm-9">
                                <input value="${data.tglLahir}" name="tglLahir" type="date" class="form-control costume-outline"
                                    id="">
                            </div>
                        </div>
                        <div class="form-group row mr-2 ml-2">
                            <label class="col-sm-3 col-form-label" for="">Jenis Kelamin</label>
                            <div class="col-sm-9">
                                <select name="jk" class="form-control costume-outline form-control-sm"
                                    id="jk-input">
                                    <option selected disabled>Pilih</option>
                                    <option value="pria">Pria</option>
                                    <option value="wanita">Wanita</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mr-2 ml-2">
                            <label class="col-sm-3 col-form-label" for="">Pendidikan Terakhir</label>
                            <div class="col-sm-9">
                                <select name="pendidikan" class="form-control costume-outline form-control-sm"
                                    id="pendidikan-input">
                                    <option selected disabled>Pilih</option>
                                    <option value="S3">Sarjana S3</option>
                                    <option value="S2">Sarjana S2</option>
                                    <option value="S1">Sarjana S1</option>
                                    <option value="smk/slta">SMK/Slta Sederajat</option>
                                </select>
                            </div>
                        </div>
                        <div class="form-group row mr-2 ml-2">
                            <label for="" class="col-sm-3 col-form-label">Nomor Sk</label>
                            <div class="col-sm-9">
                                <input value="${data.noSk}" name="noSk" type="number" class="form-control costume-outline"
                                    id="" placeholder="Klik disini">
                            </div>
                        </div>
                        <div class="form-group row mr-2 ml-2">
                            <label for="" class="col-sm-3 col-form-label">Textarea</label>
                            <div class="col-sm-9">
                                <textarea name="alamat" class="form-control costume-outline" id="" rows="4">${data.alamat}</textarea>
                            </div>
                        </div>
                    </div>
                `);
                $('#jk-input').val(data.jk);
                $('#pendidikan-input').val(data.pendidikan);
            });
        });

        $(document).on('click', '#btnUpdate', function() {
            let id = $('#id_staff').val();
            let url = `{{ config('app.url') }}` + `/staff/${id}`;
            let data = $('#form-univ').serialize();

            $.ajax({
                url: url,
                method: "PATCH",
                data: data,
                success: function(result) {
                    console.log(result);
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
                    console.log(data);
                    let errorRes = data.errors
                    Swal.fire({
                        icon: data.response.icon,
                        title: data.response.title,
                        text: data.response.message,
                    });
                    if (errorRes.length >= 1) {
                        $('.miniAlert').html('');
                        $('#alert-nama').html(errorRes.data.nama);
                        $('#alert-jabatan').html(errorRes.data.jabatan);
                        $('#alert-tmpLahir').html(errorRes.data.tmpLahir);
                        $('#alert-tglLahir').html(errorRes.data.tglLahir);
                        $('#alert-jk').html(errorRes.data.jk);
                        $('#alert-pendidikan').html(errorRes.data.pendidikan);
                        $('#alert-noSk').html(errorRes.data.noSk);
                        $('#alert-alamat').html(errorRes.data.alamat);
                    }
                }
            });
        });

        $(document).on('click', '#btnHapus', function() {
            let id = $(this).data('id');
            let url = `{{ config('app.url') }}` + `/staff/${id}`;

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
        })
    </script>
@endsection
