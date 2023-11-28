@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Parameter Patrol Check</h1>
        <div align="right" class="pt-1">
            <a href="{{route('patrol-check.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card">
            <form action="{{ route('patrol-check.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="nomor" class="form-label">Nomor</label>
                                <input type="number" name="nomor" min="1" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label for="parameter" class="form-label">Parameter</label>
                                <input type="text" name="parameter" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Satuan</label>
                                <input type="text" name="satuan" class="form-control">
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
                    <th>No.</th>
                    <th>Parameter</th>
                    <th>Satuan</th>
                </thead>
                <tbody>
                    @foreach ($ptk as $item)
                    <tr>
                        <td>{{ $item->nomor }}</td>
                        <td>{{ $item->parameter }}</td>
                        <td>{{ $item->satuan }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
