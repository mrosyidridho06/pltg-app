@extends('layouts.app')
@section('content')
    <div class="title">
        Permissions Pegawai
    </div>
    @can('create roles')
    <a href="{{ route('roles.create') }}"><button type="button" class="btn mb-2 btn-primary">Tambah Roles</button></a>
    @endcan
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <th>No.</th>
                    <th>Nama</th>
                    <tbody>
                        @foreach ($permissions as $permission)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $permission->name }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
