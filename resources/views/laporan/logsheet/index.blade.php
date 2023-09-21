@extends('layouts.app')
@section('content')
    <div class="title">
        Logsheets
    </div>
    @can('create beritaacara')
    <button class="btn mb-3 btn-primary" data-bs-toggle="modal" data-bs-target="#staticBackdrop" type="button">Tambah Logsheet</button>
        <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" id="staticBackdropLabel">Tambah Logsheet</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form action="{{ route('logsheet.store') }}" method="POST">
                            @csrf
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="tanggal_terbit" class="form-label">Tanggal Terbit</label>
                                            <input type="date" name="tanggal_terbit" class="form-control" id="tanggal_terbit">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="nomor_dokumen" class="form-label">Nomor Dokumen</label>
                                            <input type="text" name="nomor_dokumen" class="form-control" id="nomor_dokumen">
                                        </div>
                                    </div>
                                    <div class="col-md-12">
                                        <div class="mb-3">
                                            <label for="Jenis Logsheet" class="form-label">Jenis Logsheet</label>
                                            <select class="form-select mb-3" aria-label="Default select example" name="jenis_logsheet_id">
                                                <option selected>Pilih Jenis Logsheet</option>
                                                @foreach ($jl as $jenis_log)
                                                    <option value="{{ $jenis_log->id }}">{{ $jenis_log->jenis_logsheet }}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="modal-footer">
                                <button type="submit" class="btn btn-primary">Simpan</button>
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endcan
    <div class="content-wrapper">
        <div class="card">
            <div class="card-body">
                <table class="table table-responsive">
                    <thead>
                        <th>No.</th>
                        <th>Nomor Dokumen</th>
                        <th>Tanggal Terbit</th>
                        <th>Jenis Logsheet</th>
                        <th>Action</th>
                    </thead>
                    <tbody>
                        @foreach ($logsheets as $logsheet)
                        <tr>
                            <td>{{ $loop->iteration }}</td>
                            <td>{{ $logsheet->nomor_dokumen }}</td>
                            <td>{{ $logsheet->tanggal_terbit }}</td>
                            <td>{{ $logsheet->jenisLogsheet->jenis_logsheet }}</td>
                            <td><a class="button-sm" href="{{ route('logsheet.show', $logsheet->id) }}" type="button" target="_blank" class="btn btn-primary"><i class="ti-eye"></i> Print</a></td>
                        </tr>
                        @endforeach
                    </tbody>
                </table>
                {{-- <table class="table table-responsive table-bordered table-hover">
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
                        <tr>
                            <td rowspan="12">1</td>
                            <td colspan="12" style="background-color: #D3D3D3"><b>Generator</b></td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td rowspan="12">2</td>
                            <td colspan="12" style="background-color: #D3D3D3"><b>Generator</b></td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                        <tr>
                            <td>Megawatt</td>
                            <td></td>
                            <td>MW</td>
                            <td>10</td>
                            <td>11</td>
                            <td>12</td>
                            <td>13</td>
                            <td>14</td>
                            <td>15</td>
                            <td>16</td>
                            <td>17</td>
                            <td>18</td>
                        </tr>
                    </tbody>
                </table> --}}
            </div>
        </div>
    </div>
@endsection
