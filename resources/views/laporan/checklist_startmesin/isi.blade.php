@extends('layouts.app')
@section('content')
    <div align="right" class="mb-3">
        <a href="{{route('start.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table col-4 table-borderless table-responsive">
                <tr>
                    <th>Nomor Dokumen</th>
                    <th>:</th>
                    <td>{{ $startdetail->nomor_dokumen }}</td>
                </tr>
                    <th>Tanggal Terbit</th>
                    <th>:</th>
                    <td>{{ $startdetail->tanggal_terbit }}</td>
                <tr>
                    <th>Revisi</th>
                    <th>:</th>
                    <td>{{ $startdetail->revisi }}</td>
                </tr>
            </table>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body table-responsive">
                <table class="table table-responsive table-bordered table-hover">
                    <tr>
                        <th rowspan="2" style="text-align: center">No.</th>
                        <th rowspan="2" style="text-align: center">Parameter</th>
                        <th rowspan="2" style="text-align: center">Satuan</th>
                        <th colspan="2" style="text-align: center">Actual</th>
                        <th rowspan="2" style="text-align: center">Keterangan</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">OK</th>
                        <th style="text-align: center">NOT OK</th>
                    </tr>
                    <tbody>
                        @foreach ($start as $item)
                        <tr>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->area }}</td>
                            <td>{{ $item->target }}</td>
                            <form action="{{ route('startisi') }}" method="POST">
                                @csrf
                            @if($item->target == '-')
                            <td>
                                <input type="text" name="ok" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="not_ok" class="form-control" disabled value="-">
                            </td>
                            <td>
                                <input type="text" name="keterangan" class="form-control" disabled value="-">
                            </td>
                            @else
                            <td>
                                <input type="text" name="ok[]" class="form-control">
                                <input type="hidden" name="checklist_id[]" class="form-control" value="{{ $item->id }}">
                            </td>
                            <td>
                                <input type="text" name="not_ok[]" class="form-control">
                                <input type="hidden" name="detail_id[]" class="form-control" value="{{ $startdetail->id }}">
                            </td>
                            <td>
                                <input type="text" name="keterangan[]" class="form-control">
                            </td>
                            @endif
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
