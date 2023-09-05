@extends('layouts.app')
@section('content')
    <div class="title">
        Shift
    </div>
    @can('create roles')
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
    <div class="container">
        <div class="card">
            <div class="card-body">
                <table class="table">
                    <th>No.</th>
                    <th>Nama Shift</th>
                    <th>Shift Awal</th>
                    <th>Shift Akhir</th>
                    <tbody>
                        @foreach ($shifts as $shift)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $shift->nama_shift }}</td>
                            <td>{{ Carbon\Carbon::parse($shift->shift_awal)->translatedFormat('H:i') }}</td>
                            <td>{{ Carbon\Carbon::parse($shift->shift_akhir)->translatedFormat('H:i') }}</td>
                            <td></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
