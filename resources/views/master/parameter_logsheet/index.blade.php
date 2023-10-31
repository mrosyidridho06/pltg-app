@extends('layouts.app')
@section('content')
    <div class="title">
        Parameter Logsheet
    </div>
    @can('create beritaacara')
        <button class="btn mb-3 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Data</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Paramater Logsheet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('parameter-logsheet.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nama_parameter" class="form-label">Nama Paramter</label>
                                            <input type="text" name="nama_parameter" class="form-control" id="nama_parameter">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="Jenis Logsheet" class="form-label">Jenis Logsheet</label>
                                            <select class="form-select mb-3" aria-label="Default select example" name="jenis_logsheet_id">
                                                <option selected>Pilih Jenis Logsheet</option>
                                                @foreach ($jl as $jenis_log)
                                                    <option value="{{ $jenis_log->id }}">{{ $jenis_log->jenis_logsheet }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    <div class="card">
        @if ($errors->any())
        <div class="alert alert-warning alert-dismissible fade show" role="alert">
                @foreach ($errors->all() as $error)
                    <li>{{ $error }}</li>
                @endforeach
            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close">X</button>
        </div>
        @endif
        @if ($message = Session::has('success'))
            <div class="alert alert-warning">
                {{ $message }}
            </div>
        @endif
        <div class="card-body table-responsive">
            <table class="table table-responsive" id="myTable">
                <thead>
                    <th>No</th>
                    <th>Parameter</th>
                    <th>Detail Parameter</th>
                    <th>Jenis Logsheet</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($pr as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->nama_parameter }}</td>
                        <td>
                            @foreach ($item->detailparameter as $detail)
                            <li>{{ $detail->detail_parameter }}</li>
                            @endforeach
                        </td>
                        <td>{{ $item->jenisLogsheet->jenis_logsheet }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button"
                                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ti-settings"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="#">Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
@push('js')
<script>
    const table = new DataTable('#myTable', {
        columnDefs: [
            {
                searchable: false,
                orderable: false,
                targets: 0
            },
            {
                searchable: false,
                orderable: false,
                targets: 4
            }
        ],
        language: {
            "searchPlaceholder": "Cari",
            "zeroRecords": "Tidak ditemukan data yang sesuai",
            "emptyTable": "Tidak terdapat data di tabel"
        },
        order: [[1, 'asc']]
    });

    table
        .on('order.dt search.dt', function () {
            let i = 1;

            table
                .cells(null, 0, { search: 'applied', order: 'applied' })
                .every(function (cell) {
                    this.data(i++);
                });
        })
        .draw();
</script>
@endpush
