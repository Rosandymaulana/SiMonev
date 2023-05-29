@extends('layouts.penyusul')
@section('penyusul')

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <main id="main" class="main">


        <div class="pagetitle">
            <h1>Edit usulan</h1>
            <nav>
                <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/tabel_usulan') }}">Tabel Usulan</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                    <li class="breadcrumb-item">{{ $usulanPenyusul->id_usulan }}</li>
                </ol>
            </nav>
        </div><!-- End Page Title -->

        <section class="dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <form class="form-horizontal"
                                action="{{ url('penyusul/tabel-usulan/' .$usulanPenyusul->id_usulan .'/update') }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @method('POST')
                                <div class="row mb-3">
                                    <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="kelurahan" class="form-control" id="kelurahan"
                                            value="{{ $usulanPenyusul->kelurahan }}" readonly disabled>
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="no" class="col-sm-2 col-form-label">No</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="no" class="form-control" id="no"
                                            value="{{ $usulanPenyusul->no }}" readonly disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="sub_kegiatan" class="col-sm-2 col-form-label">Sub
                                        Kegiatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="sub_kegiatan" class="form-control" id="sub_kegiatan"
                                            value="{{ $usulanPenyusul->sub_kegiatan }}" readonly disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="usulan" class="col-sm-2 col-form-label">Usulan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="usulan" class="form-control" id="usulan"
                                            value="{{ $usulanPenyusul->usulan }}" readonly disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="alamat" class="form-control" id="alamat"
                                            value="{{ $usulanPenyusul->alamat }}" readonly disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="opd_tujuan_akhir" class="col-sm-2 col-form-label">OPD Tujuan
                                        Akhir</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="opd_tujuan_akhir" class="form-control"
                                            id="opd_tujuan_akhir" value="{{ $usulanPenyusul->opd_tujuan_akhir }}"
                                            readonly disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="koefisien" class="col-sm-2 col-form-label">Koefisien</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="koefisien" class="form-control" id="koefisien"
                                            value="{{ $usulanPenyusul->koefisien }}" readonly disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="nilai_akomodir" class="col-sm-2 col-form-label">Nilai
                                        Akomodir</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="nilai_akomodir" class="form-control"
                                            id="nilai_akomodir" value="{{ $usulanPenyusul->nilai_akomodir }}" readonly
                                            disabled />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="realisasi" class="col-sm-2 col-form-label">Realisasi</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="realisasi" class="form-control" id="realisasi"
                                            value="{{ $usulanPenyusul->realisasi }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="tgl_pelaksanaan" class="col-sm-2 col-form-label">Tgl
                                        Pelaksanaan</label>
                                    <div class="col-sm-10">
                                        <input type="date" name="tgl_pelaksanaan" class="form-control"
                                            id="tgl_pelaksanaan" value="{{ $usulanPenyusul->tgl_pelaksanaan }}" />
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="keterangan" class="form-control" id="keterangan"
                                            value="{{ $usulanPenyusul->keterangan }}" />
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