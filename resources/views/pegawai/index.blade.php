@extends('layouts.app')
@section('content')
    <div class="title">
        Data Pegawai
    </div>
    @can('create users')
    {{-- <a href="{{ route('register') }}"><button type="button" class="btn mb-2 btn-primary">Tambah Pegawai</button></a> --}}
    <button class="btn mb-3 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Pegawai</button>
        <div class="modal fade myModal" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Pegawai</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('data.store') }}" method="POST" class="need-validation" novalidate>
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="name" class="form-label">Nama</label>
                                            <input id="name" type="text" class="form-control @error('name') is-invalid @enderror" name="name" value="{{ old('name') }}" required autocomplete="name" autofocus>
                                            @error('name')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="email" class="form-label">Email</label>
                                            <input type="email" name="email" class="form-control @error('email') is-invalid @enderror" id="email" value="{{ old('email') }}" required autocomplete="email" autofocus>
                                            @error('email')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password" class="form-label">Password</label>
                                            <input type="password" name="password" class="form-control @error('password') is-invalid @enderror" id="password" required autocomplete="new-password">
                                            @error('password')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </div>
                                    <div class="col-md-6">
                                        <div class="mb-3">
                                            <label for="password_confirmation" class="form-label">Confirmation Password</label>
                                            <input type="password" name="password_confirmation" class="form-control" id="password_confirmation" required autocomplete="new-password">
                                        </div>
                                    </div>
                                </div>
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="jenis_logsheet" class="form-label">Role</label>
                                            <select name="role" class="form-control">
                                                @foreach ($rolesregis as $role)
                                                <option value="{{ $role->id }}">{{ $role->name }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary" data-dismiss="modal">Simpan</button>
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
                    <th>No</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <th>Role</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($users as $user)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $user->name }}</td>
                        <td>{{ $user->email }}</td>
                        @foreach ($user->roles as $role)
                        <td>{{ $role->name }}</td>
                        @endforeach
                        <td>
                            <div class="btn-group" role="group">
                                <button id="btnGroupDrop1" type="button"
                                    class="btn btn-primary dropdown-toggle" data-bs-toggle="dropdown"
                                    aria-expanded="false">
                                    <i class="ti-settings"></i>
                                </button>
                                <ul class="dropdown-menu" aria-labelledby="btnGroupDrop1">
                                    <li><a class="dropdown-item" href="#" data-id={{ $user->id }} id="btn-edit">Edit</a></li>
                                    <li><a class="dropdown-item" href="#" data-id={{ $user->id }} id="btn-hapus">Hapus</a></li>
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
    <div class="modal fade" id="modalEdit" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">

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
<script>
    const modal = new bootstrap.Modal($('#modalEdit'))
    $('#myTable').on('click', '#btn-edit', function(){

        let data = $(this).data();
        let id = data.id
        let jenis = data.jenis

        $.ajax({
            method: 'get',
            url: `{{ url('pegawai/data/') }}/${id}/edit`,
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
                    url: `{{ url('pegawai/data/') }}/${id}`,
                    headers:{
                        'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
                    },
                    success: function(res){
                        modal.hide()
                    }
                })
            })
        }

        // console.log(data);

    })

    var myModal = document.getElementById('modalEdit')
</script>
@endpush
