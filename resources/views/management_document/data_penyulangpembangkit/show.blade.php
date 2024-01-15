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
                    <td>{{ $stopdetail->nomor_dokumen }}</td>
                </tr>
                    <th>Tanggal Terbit</th>
                    <th>:</th>
                    <td>{{ $stopdetail->tanggal_terbit }}</td>
                <tr>
                    <th>Revisi</th>
                    <th>:</th>
                    <td>{{ $stopdetail->revisi }}</td>
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
                        <th rowspan="2" style="text-align: center">Area</th>
                        <th rowspan="2" style="text-align: center">Target</th>
                        <th colspan="2" style="text-align: center">Actual</th>
                        <th rowspan="2" style="text-align: center">Keterangan</th>
                    </tr>
                    <tr>
                        <th style="text-align: center">OK</th>
                        <th style="text-align: center">NOT OK</th>
                    </tr>
                    <tbody>
                        @foreach ($isidetail as $item)
                        <tr>
                            <td>
                                {{ $item->checklist->nomor }}
                            </td>
                            <td>
                                {{ $item->checklist->area }}
                            </td>
                            <td>
                                {{ $item->checklist->target }}
                            </td>
                            <td>{{ $item->ok }}</td>
                            <td>
                                {{ $item->not_ok }}
                            </td>
                            <td>
                                {{ $item->keterangan }}
                            </td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
