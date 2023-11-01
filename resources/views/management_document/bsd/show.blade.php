@extends('layouts.app')
@section('content')
    <div class="title">
        Black Start Diesel
    </div>
    <div class="card">
        <div class="card-body">
            <table>
                <tr>
                    <th>Nomor Dokumen</th>
                    <td>{{ $bsd->nomor_dokumen }}</td>
                </tr>
                <tr style="margin: 10%">
                    <th>Nomor Dokumen</th>
                    <td>{{ $bsd->nomor_dokumen }}</td>
                </tr>
                <tbody>
                    <tr>
                    </tr>
                </tbody>
            </table>
        </div>
    </div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover">
                    <tr>
                        <th rowspan="2" style="text-align: center">No.</th>
                        <th rowspan="2" style="text-align: center">Nama Alat</th>
                        <th rowspan="2" style="text-align: center">Penunjukan Meter</th>
                        <th colspan="2" style="text-align: center">Kondisi</th>
                        <th rowspan="2" style="text-align: center">Keterangan</th>
                        {{-- <th colspan="9" style="text-align: center">Jam</th> --}}
                    </tr>
                    <tr>
                        <th style="text-align: center">Siap Operasi</th>
                        <th style="text-align: center">Gangguan</th>
                    </tr>
                    <tbody>
                        @foreach ($based as $item)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $item->nama_alat }}</td>
                            <td>{{ $item->penunjukan_meter }}</td>
                            <form>
                            <td><input type="text" class="form-control" value="{{ $item->id }}"></td>
                            <td><input type="text" class="form-control" value="{{ $bsd->id }}"></td>
                            <td><input type="text" class="form-control"></td>
                            </form>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
