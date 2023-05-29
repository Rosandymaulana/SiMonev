@extends('layouts.penyusul')
@section('penyusul')
<!DOCTYPE html>
<html lang="en">

<head>
</head>

<body>
    <!-- Tabel Penyusul -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card top-selling overflow-auto mb-4">
                            <div class="card-body pb-0">
                                <h5 class="card-title">Tabel Penyusul</h5>
                                <table class="table table-borderless table-bordered py-3" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Kelurahan</th>
                                            <th scope="col">No</th>
                                            <th scope="col">Sub Kegiatan</th>
                                            <th scope="col">Usulan</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">OPD Tujuan Akhir</th>
                                            <th scope="col">Koefisien</th>
                                            <th scope="col">Nilai Akomodir</th>
                                            <th scope="col">Realisasi</th>
                                            <th scope="col">Tanggal Pelaksanaan</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usulanPenyusul as $item)
                                        <tr>
                                            <td>{{ $item->kelurahan }}</td>
                                            <td>{{ $item->no }}</td>
                                            <td>{{ $item->sub_kegiatan }}</td>
                                            <td>{{ $item->usulan }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->opd_tujuan_akhir }}</td>
                                            <td>{{ $item->koefisien }}</td>
                                            <td>{{ $item->nilai_akomodir }}</td>
                                            <td>{{ $item->realisasi }}</td>
                                            <td>{{ $item->tgl_pelaksanaan }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            <td class="d-flex justify-content-evenly px-3">
                                                <a href="{{ url('/penyusul/tabel-usulan/' . $item->id_usulan . '/edit') }}"
                                                    class="edit px-1" data-toggle="toggle">
                                                    <button type="button" class="btn btn-sm btn-success">
                                                        edit
                                                    </button>
                                                </a>
                                                {{-- <form action="{{ url('super-admin'.'/'.'penyusul'.'/') }}"
                                                    method="post">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button onclick="return confirm('Confirm Delete')" type="submit"
                                                        class="btn btn-sm btn-danger btndelete">
                                                        delete
                                                    </button>
                                                </form> --}}
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>

</html>
@endsection