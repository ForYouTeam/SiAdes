@extends('Layout.Base')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-tabel" data-toggle="tab" href="#tabTabel" role="tab"
                            aria-controls="Tabel" aria-selected="true">
                            <h5>Tabel Akun</h5>
                        </a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="tab-form" data-toggle="tab" href="#tabForm" role="tab"
                            aria-controls="Form" aria-selected="false">
                            <h5>Form</h5>
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
                                        <th>Username</th>
                                        <th style="width: 100px">Opsi</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($akun as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->username }}</td>
                                            <td>
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
                            <h4 class="card-title">Input Data Akun</h4>
                            <form id="formSimpan" class="forms-sample">
                                @csrf
                                <div class="form-group row">
                                    <label class="col-sm-3 col-form-label" for="">Jenis User</label>
                                    <div class="col-sm-9">
                                        <select name="role" class="form-control form-control-sm" id="">
                                            <option value="admin">Admin</option>
                                            <option value="kades">Kepala Desa</option>
                                        </select>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Nama</label>
                                    <div class="col-sm-9">
                                        <input name="nama" type="text" class="form-control costume-outline"
                                            id="" placeholder="Klik disini">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-nama"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Usename</label>
                                    <div class="col-sm-9">
                                        <input name="username" type="text" class="form-control costume-outline"
                                            id="" placeholder="Klik disini">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-username"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Password</label>
                                    <div class="col-sm-9">
                                        <input name="password" type="text" class="form-control costume-outline"
                                            id="" placeholder="Klik disini">
                                        <p class="text-danger miniAlert text-capitalize" id="alert-password"></p>
                                    </div>
                                </div>
                                <div class="form-group row">
                                    <label for="" class="col-sm-3 col-form-label">Password Konfirmasi</label>
                                    <div class="col-sm-9">
                                        <input name="password_confirmation" type="text"
                                            class="form-control costume-outline" id="" placeholder="Klik disini">
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
            let url = `{{ config('app.url') }}` + "/akun";
            let data = $('#formSimpan').serialize();

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
                        $('#alert-nama').html(errorRes.data.nama);
                        $('#alert-username').html(errorRes.data.username);
                        $('#alert-password').html(errorRes.data.password);
                    }
                }
            });
        });

        $(document).on('click', '#btnHapus', function() {
            let id = $(this).data('id');
            let url = `{{ config('app.url') }}` + `/akun/${id}`;

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
