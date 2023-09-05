@extends('layouts.app')
@section('content')
    <div class="title">
        Berita Acara
    </div>
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <th>No.</th>
                    <th>Nama</th>
                    <tbody>
                        @foreach ($beritaacaras as $beritaacara)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $beritaacara->name }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
