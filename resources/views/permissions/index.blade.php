@extends('layouts.app')
@section('content')
    <div class="title">
        Permissions Pegawai
    </div>
    @can('create roles')
    <a href="{{ route('roles.create') }}"><button type="button" class="btn mb-2 btn-primary">Tambah Roles</button></a>
    @endcan
    <div class="card">
        <div class="card-body">
            <table class="table" id="myTable">
                <thead>
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Action</th>
                </thead>
                <tbody>
                    @foreach ($permissions as $permission)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $permission->name }}</td>
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
    {{-- <script>
        $(document).ready( function () {
            $('#myTable').DataTable({
                dom: 'lBfrtip',
                // orderable: [
                //     [2, "asc"]
                // ],
                buttons: ['excel', 'pdf', 'print'],
                lengthMenu: [
                    [ 10, 25, 50, 100, 1000, -1 ],
                    [ '10', '25', '50', '100', '1000', 'All' ]
                ],
                columnDefs: [
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": 2,
                    },
                    {
                        "searchable": false,
                        "orderable": false,
                        "targets": 0,
                    },
                ],

                language: {
                    "searchPlaceholder": "Cari",
                    "zeroRecords": "Tidak ditemukan data yang sesuai",
                    "emptyTable": "Tidak terdapat data di tabel"
                }
            });
        } );
    </script> --}}
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
