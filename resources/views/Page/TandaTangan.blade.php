@extends('Layout.Base')
@section('content')
    <div class="col-lg-12 grid-margin stretch-card mt-2">
        <div class="card">
            <div class="card-header tab-card-header">
                <ul class="nav nav-tabs card-header-tabs" id="myTab" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="tab-tabel" data-toggle="tab" href="#tabTabel" role="tab"
                            aria-controls="Tabel" aria-selected="true">
                            <h5>Tabel Tanda Tangan</h5>
                        </a>
                    </li>
                    @can('create-data')
                        <li class="nav-item">
                            <a class="nav-link" id="tab-form" data-toggle="tab" href="#tabForm" role="tab"
                                aria-controls="Form" aria-selected="false">
                                <h5>Form</h5>
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
                                        <th>Nama</th>
                                        <th>Jabatan</th>
                                        @can('update-data', 'delete-data')
                                            <th style="width: 100px">Opsi</th>
                                        @endcan
                                    </tr>
                                </thead>
                                <tbody>
                                    @php
                                        $no = 1;
                                    @endphp
                                    @foreach ($ttd as $d)
                                        <tr>
                                            <td>{{ $no++ }}</td>
                                            <td>{{ $d->nama }}</td>
                                            <td>{{ $d->jabatan }}</td>
                                            @can('update-data', 'delete-data')
                                                <td>
                                                    @can('update-data')
                                                        <button data-id="{{ $d->id }}"
                                                            class="btn btn-sm btn-rounded btn-primary" id="btnEdit"><i
                                                                class="mdi mdi-pencil"></i></button>
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
                        <div class="card-body">
                            <h4 class="card-title">Input Data Tanda Tangan</h4>
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
            let url = `{{ config('app.url') }}` + "/tanda_tangan";
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
                        $('#alert-nama').html(errorRes.data.nama);
                        $('#alert-jabatan').html(errorRes.data.jabatan);
                    }
                }
            });
        });

        $(document).on('click', '#btnEdit', function() {
            let id = $(this).data('id');
            let url = `{{ config('app.url') }}` + `/tanda_tangan/${id}`;

            $.get(url, function(result) {
                let data = result.data;
                $('#modal-univ').modal('show');
                $('.modal-title').html('Perubahan Data');
                $('#form-univ').html('');
                $('#form-univ').append(`
                    <div class="card-body">
                        <div class="form-group row mr-2 ml-2">
                            <label for="" class="col-sm-3 col-form-label">Nama</label>
                            <div class="col-sm-9">
                                <input type="hidden" id="id_ttd" value="${data.id}">
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
                    </div>
                `);
            });
        });

        $(document).on('click', '#btnUpdate', function() {
            let id = $('#id_ttd').val();
            let url = `{{ config('app.url') }}` + `/tanda_tangan/${id}`;
            let data = $('#form-univ').serialize();
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
                method: "PATCH",
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
                        $('#alert-jabatan').html(errorRes.data.jabatan);
                    }
                }
            });
        });

        $(document).on('click', '#btnHapus', function() {
            let id = $(this).data('id');
            let url = `{{ config('app.url') }}` + `/tanda_tangan/${id}`;

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
