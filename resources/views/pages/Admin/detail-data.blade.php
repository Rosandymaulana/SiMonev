@extends('layouts.admin.index')
@section('admin')

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
                    <li class="breadcrumb-item"><a href="{{ url('/admin') }}">Dashboard</a></li>
                    <li class="breadcrumb-item active">Tabel Usulan</li>
                </ol>
            </nav>
        </div>
        <!-- End Page Title -->

        <!-- Modal -->
        <div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
            <div class="modal-dialog">
                <div class="modal-content">

                    <div class="modal-content">
                        <div class="modal-header">
                            <h5 class="modal-title" id="exampleModalLabel">Import Data</h5>
                        </div>
                        <form action="{{ url('/admin/importusulan') }}" method="post" enctype="multipart/form-data">
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
                            <form class="form-horizontal" action="{{ url('admin/tabel-usulan/' .$usulan->id_usulan ) }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="id_usulan" class="col-sm-2 col-form-label">ID Usulan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="id_usulan" class="form-control" id="id_usulan"
                                            value="{{ $usulan->id_usulan }}" readonly disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="no" class="col-sm-2 col-form-label">No</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="no" class="form-control" id="no"
                                            value="{{ $usulan->no }}" readonly disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tgl_usulan" class="col-sm-2 col-form-label">Tgl Usulan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="tgl_usulan" class="form-control" id="tgl_usulan"
                                            value="{{ $usulan->tgl_usulan }}" readonly disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="fraksi" class="col-sm-2 col-form-label">Fraksi</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="fraksi" class="form-control" id="fraksi"
                                            value="{{ $usulan->fraksi }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="usulan" class="col-sm-2 col-form-label">Usulan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="usulan" class="form-control" id="usulan"
                                            value="{{ $usulan->usulan }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="masalah" class="col-sm-2 col-form-label">Masalah</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="masalah" class="form-control" id="masalah"
                                            value="{{ $usulan->masalah }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="prioritas_usulan" class="col-sm-2 col-form-label">Prioritas
                                        Usulan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="prioritas_usulan" class="form-control"
                                            id="prioritas_usulan" value="{{ $usulan->prioritas_usulan }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" id="alamat"
                                            value="{{ $usulan->alamat }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kelurahan" class="form-control" id="kelurahan"
                                            value="{{ $usulan->kelurahan }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="opd_tujuan_awal" class="col-sm-2 col-form-label">OP Tujuan Awal</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="opd_tujuan_awal" class="form-control"
                                            id="opd_tujuan_awal" value="{{ $usulan->opd_tujuan_awal }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="opd_tujuan_akhir" class="col-sm-2 col-form-label">OP Tujuan
                                        Akhir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="opd_tujuan_akhir" class="form-control"
                                            id="opd_tujuan_akhir" value="{{ $usulan->opd_tujuan_akhir }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" id="alamat"
                                            value="{{ $usulan->alamat }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="status" class="col-sm-2 col-form-label">Status</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="status" class="form-control" id="status"
                                            value="{{ $usulan->status }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="volume" class="col-sm-2 col-form-label">Volume</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="volume" class="form-control" id="volume"
                                            value="{{ $usulan->volume }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="satuan" class="col-sm-2 col-form-label">Satuan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="satuan" class="form-control" id="satuan"
                                            value="{{ $usulan->id_satuan }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nilai_usulan" class="col-sm-2 col-form-label">Nilai Usulan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nilai_usulan" class="form-control" id="nilai_usulan"
                                            value="{{ $usulan->nilai_usulan }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nilai_akomodir" class="col-sm-2 col-form-label">Nilai Akomodir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="nilai_akomodir" class="form-control"
                                            id="nilai_akomodir" value="{{ $usulan->nilai_akomodir }}" />
                                    </div>
                                </div>

                                <input type="submit" value="update" class="btn btn-success">
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </main>

</body>

</html>

@endsection