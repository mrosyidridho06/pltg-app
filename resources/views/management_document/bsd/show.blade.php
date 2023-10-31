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
                </tr>
                <tbody>
                    <tr>
                        <td>{{ $bsd->nomor_dokumen }}</td>
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

                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
