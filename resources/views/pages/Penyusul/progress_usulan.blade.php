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
                                            <th scope="col">Usulan</th>
                                            <th scope="col">Kelurahan</th>
                                            <th scope="col">opd_tujuan_akhir</th>
                                            <th scope="col">Realisasi</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($usulanPenyusul as $item)
                                        <tr>
                                            <td>{{ $item->id_usulan }}</td>
                                            <td>{{ $item->no }}</td>
                                            <td>{{ $item->usulan }}</td>
                                            <td>{{ $item->kelurahan }}</td>
                                            <td>{{ $item->opd_tujuan_akhir }}</td>
                                            <td>
                                                @if ($latestReports && $latestReports->id_usulan == $item->id_usulan)
                                                {{-- Tampilkan informasi dari $latestReports --}}
                                                {{ $latestReports->realisasi }}
                                                @endif
                                            </td>
                                            <td class="d-flex justify-content-evenly px-3">
                                                <a href="{{ url('penyusul/'. 'tabel-usulan/' .$item->id_usulan. '/laporkan-data') }}"
                                                    class="edit px-1" data-toggle="toggle">
                                                    <button type="button" class="btn btn-sm btn-success">
                                                        Laporkan Progress
                                                    </button>
                                                </a>
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