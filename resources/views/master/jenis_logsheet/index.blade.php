@extends('layouts.app')
@section('content')
    <div class="title">
        Jenis Logsheet
    </div>
    @can('create beritaacara')
        <button class="btn mb-3 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Data</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Jenis Logsheet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('jenis-logsheet.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="jenis_logsheet" class="form-label">Nama</label>
                                            <input type="text" name="jenis_logsheet" class="form-control" id="jenis_logsheet">
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
        <div class="card-body">
            <table class="table dt-responsive display" id="myTable">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($jenisLogsheet as $jl)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $jl->jenis_logsheet }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button"
                                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ti-settings"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="#">Edit</a></li>
                                    <li><a class="dropdown-item" href="{{ route('jenis-logsheet.destroy', $jl->id) }}" data-confirm-delete="true">Hapus</a></li>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            {{-- {{ $dataTable->table() }} --}}
        </div>
    </div>
@endsection
@push('js')
{{-- {!! $dataTable->scripts() !!} --}}
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
                targets: 2
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
