@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Parameter Setelah Stop Mesin</h1>
        <div align="right" class="pt-1">
            <a href="{{route('stop.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card">
            <form action="{{ route('penyulang-pembangkit.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="area" class="form-label">Parameter</label>
                                <input type="text" name="parameter" class="form-control @error('parameter') is-invalid @enderror" value="{{ old('parameter') }}">
                                @error('parameter')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Satuan</label>
                                <input type="text" name="satuan" class="form-control @error('satuan') is-invalid @enderror" value="{{ old('satuan') }}">
                                @error('satuan')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer">
                    <button type="submit" class="btn btn-primary">Simpan</button>
                </div>
            </form>
    </div>
    <div class="card">
        <div class="card-body">
            <table class="table table-hover">
                <thead>
                    <th>Parameter</th>
                    <th>Satuan</th>
                </thead>
                <tbody>
                    @foreach ($penyulang as $item)
                    <tr>
                        <td>{{ $item->parameter }}</td>
                        <td>{{ $item->satuan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
