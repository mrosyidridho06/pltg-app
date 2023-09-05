@extends('layouts.app')
@section('content')
    <div class="title">
        Data Pegawai
    </div>
    @can('create users')
    <a href="{{ route('register') }}"><button type="button" class="btn mb-2 btn-primary">Tambah Pegawai</button></a>
    @endcan
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <th>No.</th>
                    <th>Nama</th>
                    <th>Email</th>
                    <tbody>
                        @foreach ($users as $user)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $user->name }}</td>
                            <td>{{ $user->email }}</td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
