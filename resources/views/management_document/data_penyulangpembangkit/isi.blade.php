@extends('layouts.app')
@section('content')
    <div align="right" class="mb-3">
        <a href="{{route('stop.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table col-4 table-borderless table-responsive">
                <tr>
                    <th>Nomor Dokumen</th>
                    <th>:</th>
                    <td>{{ $penyulangdetail->nomor_dokumen }}</td>
                </tr>
                    <th>Tanggal Terbit</th>
                    <th>:</th>
                    <td>{{ $penyulangdetail->tanggal_terbit }}</td>
                <tr>
                    <th>Revisi</th>
                    <th>:</th>
                    <td>{{ $penyulangdetail->revisi }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body table-responsive">
                @if ($errors->any())
                <div class="alert alert-danger">
                    <ul>
                        @foreach ($errors->all() as $error)
                            <li>{{ $error }}</li>
                        @endforeach
                    </ul>
                </div>
                @endif
                <table class="table table-responsive table-bordered table-hover">
                    <tr>
                        <th style="text-align: center">Parameter</th>
                        <th style="text-align: center">Satuan</th>
                        <th style="text-align: center">10:00</th>
                        <th style="text-align: center">11:00</th>
                        <th style="text-align: center">12:00</th>
                        <th style="text-align: center">13:00</th>
                        <th style="text-align: center">14:00</th>
                        <th style="text-align: center">15:00</th>
                        <th style="text-align: center">16:00</th>
                        <th style="text-align: center">17:00</th>
                        <th style="text-align: center">18:00</th>
                        <th style="text-align: center">19:00</th>
                        <th style="text-align: center">20:00</th>
                        <th style="text-align: center">21:00</th>
                        <th style="text-align: center">22:00</th>
                    </tr>
                    <tbody>
                        @foreach ($penyulang as $item)
                        <tr>
                            <td>{{ $item->parameter }}</td>
                            <td>{{ $item->satuan }}</td>
                            <form action="{{ route('penyulangisi') }}" method="POST">
                                @csrf
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                            <td>
                                <input type="text" name="10[]" class="form-control @error('10.*') is-invalid @enderror" value="{{ old('10.0') }}">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                                @error('10.*')
                                    <div class="alert alert-danger mt-2">
                                        {{ $message }}
                                    </div>
                                @enderror
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                <button class="btn btn-primary" type="submit">Submit</button>
            </form>
            </div>
        </div>
    </div>
@endsection
