@extends('layouts.app')
@section('content')
    <div class="title">
        Berita Acara
    </div>
    @can('create beritaacara')
        <button class="btn mb-3 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Data</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog modal-lg">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Berita Acara</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('berita-acara.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="Tanggal" class="form-label">Tanggal</label>
                                            <input type="text" name="tanggal" class="form-control" id="Tanggal" value="{{ Carbon\Carbon::parse(Date::now())->translatedFormat('Y-m-d') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="jam" class="form-label">Jam</label>
                                            <input type="time" name="jam" class="form-control" id="jam" value="{{ Carbon\Carbon::parse(Date::now())->translatedFormat('H:i') }}" readonly>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="mb-3">
                                            <label for="shift" class="form-label">Shift</label>
                                            <select class="form-select mb-3" aria-label="Default select example" name="shift_id">
                                                <option selected value="">Pilih Shift</option>
                                                @foreach ($shifts as $shift)
                                                    <option value="{{ $shift->id }}">{{ $shift->nama_shift }} ( {{ $shift->shift_awal }} - {{ $shift->shift_akhir }} )</option>
                                                @endforeach
                                            </select>
                                            {{-- <input type="text" name="shift" class="form-control" id="shift"> --}}
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="informasi" class="form-label">Informasi</label>
                                            <textarea name="informasi" class="form-control" id="informasi"></textarea>
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
            {{-- <table class="table dt-responsive display" id="tableBA">
                <th>No.</th>
                <th>Nama</th>
                <th>Informasi</th>
                <th>Shift</th>
                <th>Tanggal</th>
                <th>Jam</th>
                <tbody>
                    @foreach ($beritaacaras as $beritaacara)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $beritaacara->user->name }}</td>
                        <td>{{ $beritaacara->informasi }}</td>
                        <td>{{ $beritaacara->shift->nama_shift }} ( {{ $beritaacara->shift->shift_awal }} - {{ $beritaacara->shift->shift_akhir }} )</td>
                        <td>{{ Carbon\Carbon::parse($beritaacara->tanggal)->translatedFormat('l, d F Y') }}</td>
                        <td>{{ $beritaacara->jam }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table> --}}
            {{ $dataTable->table() }}
        </div>
    </div>
@endsection
@push('js')
    {{ $dataTable->scripts() }}
@endpush
