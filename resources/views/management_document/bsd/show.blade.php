@extends('layouts.app')
@section('content')
    <div align="right" class="mb-3">
        <a href="{{route('bsd.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table col-4 table-borderless table-responsive">
                <tr>
                    <th>Nomor Dokumen</th>
                    <th>:</th>
                    <td>{{ $bsd->nomor_dokumen }}</td>
                </tr>
                    <th>Tanggal Terbit</th>
                    <th>:</th>
                    <td>{{ $bsd->tanggal_terbit }}</td>
                <tr>
                    <th>Revisi</th>
                    <th>:</th>
                    <td>{{ $bsd->revisi }}</td>
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
                        <th rowspan="2" style="text-align: center">Nama Alat</th>
                        <th rowspan="2" style="text-align: center">Penunjukan Meter</th>
                        <th colspan="2" style="text-align: center">Kondisi</th>
                        <th rowspan="2" style="text-align: center">Keterangan</th>
                        {{-- <th rowspan="2" style="text-align: center">Action</th> --}}
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
                            <form action="{{ route('isibsd') }}" method="POST">
                                @csrf
                            <td>
                                @if ($bsdisi->count() == 0)
                                <input type="text" name="siap_operasi[]" class="form-control">
                                <input type="hidden" name="bsd_id[]" class="form-control" value="{{ $item->id }}">
                                @endif
                                @foreach ($bsdisi as $itembs)
                                <input type="text" name="siap_operasi" class="form-control" value="{{ $itembs->siap_operasi }}">
                                @endforeach
                            </td>
                            <td>
                                <input type="text" name="gangguan[]" class="form-control">
                                <input type="hidden" name="isi_id[]" class="form-control" value="{{ $bsd->id }}">
                            </td>
                            <td>
                                <input type="text" class="form-control" name="keterangan[]">
                            </td>
                            <td>
                            </td>
                            {{-- @foreach ($bsdisi as $itembsd)
                            <tr>
                                <td>
                                    <input type="text" name="siap_operasi" class="form-control" value="{{ $itembsd->siap_operasi }}">
                                </td>
                                <td>
                                    <input type="text" name="gangguan" class="form-control" value="{{ $itembsd->gangguan }}">
                                </td>
                                <td>
                                    <input type="text" class="form-control" value="{{ $itembsd->keterangan }}">
                                </td>
                            </tr>
                            @endforeach --}}
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
