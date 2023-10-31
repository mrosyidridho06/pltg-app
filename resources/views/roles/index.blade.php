@extends('layouts.app')
@section('content')
    <div class="title">
        Roles Pegawai
    </div>
    @can('create roles')
    <button class="btn mb-2 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Data</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static"
            data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel"
            aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Role Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal"
                            aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('roles.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nama_role" class="form-label">Nama Role</label>
                                            <input type="text" name="name" class="form-control" id="nama_role">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="permissions" class="form-label">Permissions</label>
                                            <select name="permissions[]" id="permissions" class="js-example-basic-multiple form-select-sm" multiple="multiple">
                                                <option value="">Pilih Permission</option>
                                                @foreach ($permissions as $item)
                                                <option value="{{ $item->id }}">{{ $item->name }}</option>
                                                {{-- <input type="checkbox" name="permissions[]" id="" value="{{ $item->id }}"> {{ $item->name }} --}}
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
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Permissions</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($roles as $role)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $role->name }}</td>
                        <td>
                            @foreach ($role->permissions as $item)
                            {{ $item->name }}
                            @endforeach
                        </td>
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button"
                                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ti-settings"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" id="btn-edit" href="#" data-id="{{ $role->id }}">Edit</a></li>
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
    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

        </div>
    </div>
@endsection
@push('js')
<script>
    const modal = new bootstrap.Modal($('#modalEdit'))
    $('#myTable').on('click', '#btn-edit', function(){

        let data = $(this).data();
        let id = data.id
        // let jenis = data.jenis

        $.ajax({
            method: 'get',
            url: `{{ url('pegawai/roles/') }}/${id}/edit`,
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
                    url: `{{ url('pegawai/roles/') }}/${id}`,
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
                targets: 3
            }
        ],
        language: {
            "searchPlaceholder": "Cari",
            "zeroRecords": "Tidak ditemukan data yang sesuai",
            "emptyTable": "Tidak terdapat data di tabel"
        },
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
    $(document).ready(function() {
        $('.js-example-basic-multiple').select2();
    });
</script>
@endpush
