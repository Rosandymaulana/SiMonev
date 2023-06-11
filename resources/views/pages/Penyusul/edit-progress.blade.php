@extends('layouts.pengusul.index')
@section('penyusul')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>

<body>
    <section class="dashboard">
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto">
                    <div class="card-body">
                        <form class="form-horizontal"
                            action="{{ url('penyusul/status-usulan/' .$dataReports->id_report ) }}" method="post"
                            enctype="multipart/form-data">
                            {{ csrf_field() }}

                            @method('PUT')
                            <div class="row mb-3">
                                <label for="id_report" class="col-sm-2 col-form-label">ID Report</label>
                                <div class="col-sm-10">
                                    <input type="text" name="id_report" class="form-control" id="id_report"
                                        value="{{ $dataReports->id_report }}" readonly disabled>
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="id_usulan" class="col-sm-2 col-form-label">ID Usulan</label>
                                <div class="col-sm-10">
                                    <input type="number" name="id_usulan" class="form-control" id="id_usulan"
                                        value="{{ $dataReports->id_usulan }}" readonly disabled />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="realisasi" class="col-sm-2 col-form-label">Realisasi</label>
                                <div class="col-sm-10">
                                    <input type="number" name="realisasi" class="form-control" id="realisasi"
                                        value="{{ $dataReports->realisasi }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="tgl_pelaksanaan" class="col-sm-2 col-form-label">Tgl Pelaksanaan</label>
                                <div class="col-sm-10">
                                    <input type="date" name="tgl_pelaksanaan" class="form-control" id="tgl_pelaksanaan"
                                        value="{{ $dataReports->tgl_pelaksanaan }}" />
                                </div>
                            </div>

                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="keterangan" class="form-control" id="keterangan"
                                        value="{{ $dataReports->keterangan }}" />
                                </div>
                            </div>

                            <input type="submit" value="update" class="btn btn-success">
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </section>
</body>


</html>

@endsection