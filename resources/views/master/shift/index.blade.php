@extends('layouts.app')
@section('content')
    <div class="title">
        Shift
    </div>
    @can('create master')
        <button class="btn mb-2 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Shift</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Shift</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('shift.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nama_shift" class="form-label">Nama Shift</label>
                                            <input type="text" name="nama_shift" class="form-control" id="nama_shift">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="shiftawal" class="form-label">Shift Awal</label>
                                            <input type="time" name="shift_awal" class="form-control" id="shiftawal">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="shiftakhir" class="form-label">Shift Akhir</label>
                                            <input type="time" name="shift_akhir" class="form-control" id="shiftakhir">
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
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <th>No.</th>
                    <th>Nama Shift</th>
                    <th>Shift Awal</th>
                    <th>Shift Akhir</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($shifts as $shift)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $shift->nama_shift }}</td>
                        <td>{{ Carbon\Carbon::parse($shift->shift_awal)->translatedFormat('H:i') }}</td>
                        <td>{{ Carbon\Carbon::parse($shift->shift_akhir)->translatedFormat('H:i') }}</td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button"
                                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ti-settings"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <a href="javascript:void(0)" id="btn-edit-shift" data-id="{{ $shift->id }}" class="btn btn-primary btn-sm dropdown-item-text">Edit</a>
                                    <a href="{{ route('shift.destroy', $shift->id) }}" data-confirm-delete="true" class="btn btn-danger btn-sm dropdown-item-text">Hapus</a>
                                </ul>
                            </div>
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div>
    </div>
@endsection
@push('js')
<script>
    const table = new DataTable('#myTable', {
        // ajax: "data.json",
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
<script>
    const modal = new bootstrap.Modal($('#modalEdit'))
    $('#myTable').on('click', '#btn-edit-shift', function(){

        let data = $(this).data();
        let id = data.id
        // let jenis = data.jenis

        $.ajax({
            method: 'get',
            url: `{{ url('master/shift/') }}/${id}/edit`,
            success: function(res){
                $('#modalEdit').find('.modal-dialog').html(res)
                modal.show()
                store()
            }
        })
        function store(){
            $(".formAction").on('submit', function(e){
                e.preventDefault();
                $.ajax({
                    method: 'POST',
                    url: `{{ url('master/shift/') }}/${id}`,
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){
                        modal.hide()
                    },
                    // error: function(res){

                    // }
                })
            })
        }

        // console.log(data);

    })

    var myModal = document.getElementById('modalEdit')
</script>
@endpush
