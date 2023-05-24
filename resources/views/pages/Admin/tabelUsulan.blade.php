@extends('layouts.index')
@section('content')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>

</head>

<body>
    <main id="main" class="main">


        <div class="pagetitle">
            <h1>Tabel Usulan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tabel Usulan</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                        </div>
                        <form action="{{ url('/importusulan') }}" method="post" enctype="multipart/form-data">
                            <div class="modal-body">
                                {{ csrf_field() }}
                                <div class="form-group">
                                    <input type="file" name="file" required>
                                </div>

                            </div>
                            <div class="modal-footer">
                                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                                <button type="submit" class="btn btn-primary">Import</button>
                            </div>
                        </form>
                    </div>

                </div>
            </div>
        </div>

        <section class="dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">

                            <div class="mb-4">
                                <a href="{{ url('exportusulan') }}" class="btn btn-success">Export</a>
                                <a href="" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#exampleModal">Import</a>
                            </div>

                            <table class="table table-borderless datatable">
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
                                    @foreach ($usulan as $item)
                                    <tr>
                                        <th scope="row"><a href="#">{{ $item->kelurahan }}</a></th>
                                        <td class="text-primary">{{ $item->no }}</td>
                                        <td>{{ $item->sub_kegiatan }}</td>
                                        <td>{{ $item->usulan }}</td>
                                        <td>{{ $item->alamat }}</td>
                                        <td>{{ $item->opd_tujuan_akhir }}</td>
                                        <td>{{ $item->koefisien }}</td>
                                        <td>{{ $item->nilai_akomodir }}</td>
                                        <td>{{ $item->realisasi }}</td>
                                        <td>{{ $item->tgl_pelaksanaan }}</td>
                                        <td>{{ $item->keterangan }}</td>
                                        <td>
                                            <a href="{{ url('/tabel_usulan/' . $item->id . '/edit') }}"
                                                class="edit px-1" data-toggle="toggle">
                                                <button type="button" class="btn btn-sm btn-success">
                                                    <i class="bi bi-pencil-square">

                                                    </i>
                                                </button>
                                            </a>
                                        </td>
                                        {{-- @include('elements.modal.edit') --}}
                                    </tr>
                                    @endforeach
                                </tbody>
                            </table>

                        </div>

                    </div>
                </div>

            </div>
        </section>

    </main>

</body>

</html>

@endsection