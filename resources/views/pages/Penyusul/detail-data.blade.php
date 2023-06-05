@extends('layouts.pengusul.index')
@section('penyusul')

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <main id="main" class="main">


        <div class="pagetitle">
            <h1>Detail usulan</h1>
        </div><!-- End Page Title -->

        <section class="dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <h2>ID Usulan: {{ $dataUsulan->id_usulan }}</h2>
                            @foreach($report as $data)
                            <p>Tgl_Pelaksanaan: {{ $data->tgl_pelaksanaan }}</p>
                            <p>Realisasi: {{ $data->realisasi }}</p>
                            <p>Keterangan: {{ $data->keterangan }}</p> <br>
                            @endforeach
                        </div>
                    </div>
                </div>
            </div>
        </section>

    </main>
</body>

</html>

@endsection