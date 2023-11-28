@extends('layouts.app')
@section('content')
    <div align="right" class="mb-3">
        <a href="{{route('patrol-check.index')}}" class="btn btn-warning btn-xs"><i class="fa fa-arrow-left"></i> Kembali</a>
    </div>

    <div class="card">
        <div class="card-body">
            <table class="table col-4 table-borderless table-responsive">
                <tr>
                    <th>Nomor Dokumen</th>
                    <th>:</th>
                    <td>{{ $patroldetail->nomor_dokumen }}</td>
                </tr>
                    <th>Tanggal Terbit</th>
                    <th>:</th>
                    <td>{{ $patroldetail->tanggal_terbit }}</td>
                <tr>
                    <th>Revisi</th>
                    <th>:</th>
                    <td>{{ $patroldetail->revisi }}</td>
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
                        <th colspan="6" style="text-align: center">Jam Patrol Check</th>
                        {{-- <th rowspan="2" style="text-align: center">Action</th> --}}
                    </tr>
                    <tr>
                        <th style="text-align: center">09.00</th>
                        <th style="text-align: center">14.00</th>
                        <th style="text-align: center">16.00</th>
                        <th style="text-align: center">21.00</th>
                        <th style="text-align: center">00.00</th>
                        <th style="text-align: center">06.00</th>

                    </tr>
                    <tbody>
                        @foreach ($patrol as $item)
                        <tr>
                            <td>{{ $item->nomor }}</td>
                            <td>{{ $item->parameter }}</td>
                            <td>{{ $item->satuan }}</td>
                            <form action="{{ route('patrolisi') }}" method="POST">
                                @csrf
                            @if($item->satuan == '-')
                            <td>
                                <input type="text" name="09.00" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="09.00" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="09.00" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="09.00" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="09.00" class="form-control" disabled>
                            </td>
                            <td>
                                <input type="text" name="09.00" class="form-control" disabled>
                            </td>
                            @else
                            <td>
                                <select class="form-control" name="09.00">
                                    <option value="0">YA</option>
                                    <option value="1">TIDAK</option>
                                </select>
                                <input type="text" name="09.00" class="form-control">
                                <input type="hidden" name="" class="form-control" value="{{ $item->id }}">
                            </td>
                            <td>
                                <input type="text" name="09.00[]" class="form-control">
                                <input type="hidden" name="bsd_id[]" class="form-control" value="{{ $item->id }}">
                            </td>
                            <td>
                                <input type="text" name="09.00[]" class="form-control">
                                <input type="hidden" name="bsd_id[]" class="form-control" value="{{ $item->id }}">
                            </td>
                            <td>
                                <input type="text" name="09.00[]" class="form-control">
                                <input type="hidden" name="bsd_id[]" class="form-control" value="{{ $item->id }}">
                            </td>
                            <td>
                                <input type="text" name="09.00[]" class="form-control">
                                <input type="hidden" name="bsd_id[]" class="form-control" value="{{ $item->id }}">
                            </td>
                            <td>
                                <input type="text" name="09.00[]" class="form-control">
                                <input type="hidden" name="bsd_id[]" class="form-control" value="{{ $item->id }}">
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
