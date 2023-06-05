@extends('layouts.pengusul.index')
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
                                            <th scope="col">ID Usulan</th>
                                            <th scope="col">NO</th>
                                            <th scope="col">Tgl Usulan</th>
                                            <th scope="col">Fraksi</th>
                                            <th scope="col">Pengusul</th>
                                            <th scope="col">Usulan</th>
                                            <th scope="col">Masalah</th>
                                            <th scope="col">Prioritas Usulan</th>
                                            <th scope="col">Alamat</th>
                                            <th scope="col">Kelurahan</th>
                                            <th scope="col">opd_tujuan_awal</th>
                                            <th scope="col">opd_tujuan_akhir</th>
                                            <th scope="col">Status</th>
                                            <th scope="col">Volume</th>
                                            <th scope="col">Satuan</th>
                                            <th scope="col">Harga Satuan</th>
                                            <th scope="col">Nilai Usulan</th>
                                            <th scope="col">Nilai Akomodir</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usulanPenyusul as $item)
                                        <tr>
                                            <td>{{ $item->id_usulan }}</td>
                                            <td>{{ $item->no }}</td>
                                            <td>{{ $item->tgl_usulan }}</td>
                                            <td>{{ $item->fraksi }}</td>
                                            <td>{{ $item->pengusul }}</td>
                                            <td>{{ $item->usulan }}</td>
                                            <td>{{ $item->masalah }}</td>
                                            <td>{{ $item->prioritas_usulan }}</td>
                                            <td>{{ $item->alamat }}</td>
                                            <td>{{ $item->nama_wilayah }}</td>
                                            <td>{{ $item->opd_tujuan_awal }}</td>
                                            <td>{{ $item->opd_tujuan_akhir }}</td>
                                            <td>{{ $item->status }}</td>
                                            <td>{{ $item->volume }}</td>
                                            <td>{{ $item->id_satuan }}</td>
                                            <td>{{ $item->harga_satuan }}</td>
                                            <td>{{ $item->nilai_usulan }}</td>
                                            <td>{{ $item->nilai_akomodir }}</td>
                                            <td class="d-flex justify-content-evenly px-3">
                                                <a href="{{ url('penyusul/'. 'tabel-usulan/' .$item->id_usulan. '/laporkan-data') }}"
                                                    class="edit px-1" data-toggle="toggle">
                                                    <button type="button" class="btn btn-sm btn-success">
                                                        Laporkan Progress
                                                    </button>
                                                </a>
                                                {{-- <a
                                                    href="{{ url('/penyusul/tabel-usulan/' . $item->id_usulan . '/edit') }}"
                                                    class="edit px-1" data-toggle="toggle">
                                                    <button type="button" class="btn btn-sm btn-success">
                                                        Laporkan Progress
                                                    </button>
                                                </a> --}}
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