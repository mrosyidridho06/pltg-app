@extends('layouts.app')
@section('content')
    <div class="title">
        Logsheets HMI TM#2
    </div>
    @can('create beritaacara')
    <button class="btn mb-3 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Data</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Logsheet HMI TM#2</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('logsheet-hmitm2.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                                            <input type="date" name="tanggal_terbit" class="form-control" id="tanggal_terbit">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                            <input type="text" name="nomor_dokumen" class="form-control" id="nomor_dokumen">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="Jenis Logsheet" class="form-label">Jenis Logsheet</label>
                                            <select class="form-select mb-3" aria-label="Default select example" name="jenis_logsheet_id">
                                                <option selected>Pilih Jenis Logsheet</option>
                                                @foreach ($jl as $jenis_log)
                                                    <option value="{{ $jenis_log->id }}">{{ $jenis_log->jenis_logsheet }}</option>
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
                <table class="table table-responsive">
                    <thead>
                        <th>No.</th>
                        <th>Nomor Dokumen</th>
                        <th>Tanggal Terbit</th>
                        <th>Jenis Logsheet</th>
                        <th>Action</th>
                    </thead>
                    {{-- <tbody>
                        @foreach ($logsheets as $logsheet)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $logsheet->nomor_dokumen }}</td>
                            <td>{{ $logsheet->tanggal_terbit }}</td>
                            <td>{{ $logsheet->jenisLogsheet->jenis_logsheet }}</td>
                            <td><a class="button-sm" href="{{ route('logsheet.show', $logsheet->id) }}" type="button" target="_blank" class="btn btn-primary"><i class="ti-eye"></i> Print</a></td>
                        </tr>
                        @endforeach
                    </tbody> --}}
                </table>
            </div>
        </div>
@endsection
