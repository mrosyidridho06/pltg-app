@extends('layouts.app')
@section('content')
    <div class="title">
        Logsheets
    </div>
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive table-bordered table-hover">
                    <tr>
                        <th rowspan="2">No.</th>
                        <th rowspan="2">Parameter</th>
                        <th rowspan="2">Alarm</th>
                        <th rowspan="2">Satuan</th>
                        <th colspan="9" style="text-align: center">Jam</th>
                    </tr>
                    <tr>
                        <th>09.00</th>
                        <th>12.00</th>
                        <th>14.00</th>
                        <th>16.00</th>
                        <th>19.00</th>
                        <th>21.00</th>
                        <th>00.00</th>
                        <th>03.00</th>
                        <th>06.00</th>
                    </tr>
                    <tbody>
                        @foreach ($logsheet as $log)
                            <tr>
                                @foreach ($parameter as $param)
                                <td rowspan="9">{{ $loop->iteration }}</td>
                                <td colspan="12" style="background-color: #D3D3D3"><b>{{ $param->nama_parameter }}</b></td>
                                @foreach ($param->detailparameter as $par)
                                <tr>
                                    <td>{{ $par->detail_parameter }}</td>
                                    <td>{{ $par->alarm }}</td>
                                    <td>{{ $par->satuan }}</td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                    <td></td>
                                </tr>
                                @endforeach
                            </tr>
                            @endforeach
                        @endforeach
                    </tbody>
                </table>
            </div>
        </div>
    </div>
@endsection
