@extends('layouts.app')
@section('content')
    <div class="title">
        Penyulang dan Pembangkit
    </div>
    @can('create beritaacara')
    <button class="btn mb-3 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Data</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Form Data Penyulang dan Pembangkit</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('penyulangdetail') }}" method="POST">
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
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <th>No.</th>
                        <th>Nomor Dokumen</th>
                        <th>Tanggal Terbit</th>
                        <th colspan="2">Action</th>
                    </thead>
                    <tbody>
                        @foreach ($penyulang as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nomor_dokumen }}</td>
                            <td>{{ $item->tanggal_terbit }}</td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('isipenyulang', $item->nomor_dokumen) }}" type="button" target="_blank" class="btn btn-primary"><i class="ti-pencil"></i> Isi</a></td>
                            <td><a class="btn btn-primary btn-sm" href="{{ route('penyulang-pembangkit.show', $item->nomor_dokumen) }}" type="button" target="_blank" class="btn btn-primary"><i class="ti-eye"></i> Lihat</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
