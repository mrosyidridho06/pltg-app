@extends('layouts.app')
@section('content')
    <div class="d-sm-flex align-items-center justify-content-between mb-4">
        <h1 class="h4 mb-0 text-gray-800">Parameter Fire Pump</h1>
        <div align="right" class="pt-1">
            <a href="{{route('firepump.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
        </div>
    </div>
    <div class="card">
            <form action="{{ route('firepump.store') }}" method="POST">
                @csrf
                <div class="card-body">
                    <div class="row">
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
                    <th>Parameter</th>
                </thead>
                <tbody>
                    @foreach ($fire as $item)
                    <tr>
                        <td>{{ $loop->iteration }}</td>
                        <td>{{ $item->parameter }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
