@extends('layouts.app')
@section('content')
    <div class="title">
        Tambah Alat Black Start Diesel
    </div>
    <div class="card">
            <form action="{{ route('bsd.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nama_alat" class="form-label">Nama Alat</label>
                                <input type="text" name="nama_alat" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="penunjukkan_meter" class="form-label">Penunjukkan Meter</label>
                                <input type="text" name="penunjukan_meter" class="form-control">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    <button type="button" class="btn btn-secondary">Close</button>
                </div>
            </form>
    </div>
@endsection
