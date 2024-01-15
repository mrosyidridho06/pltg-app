@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Parameter Setelah Stop Mesin</h1>
        <div align="right" class="pt-1">
            <a href="{{route('stop.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card">
            <form action="{{ route('stop.store') }}" method="POST">
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
                                <label for="area" class="form-label">Area</label>
                                <input type="text" name="area" class="form-control">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="mb-3">
                                <label class="form-label">Target</label>
                                <input type="text" name="target" class="form-control">
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
                    <th>Area</th>
                    <th>Target</th>
                </thead>
                <tbody>
                    @foreach ($stop as $item)
                    <tr>
                        <td>{{ $item->nomor }}</td>
                        <td>{{ $item->area }}</td>
                        <td>{{ $item->target }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
