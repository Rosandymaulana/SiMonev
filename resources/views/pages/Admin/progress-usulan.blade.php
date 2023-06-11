@extends('layouts.admin.index')
@section('admin')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
</head>

<body>
    <section class="dashboard">
        @if (session('error'))
        {{-- <div class="alert alert-danger">
            {{ session('error') }}
        </div> --}}
        <div class="alert alert-danger" role="alert">
            {{ session('error') }}
        </div>
        @endif
        <div class="row">
            <div class="col-12">
                <div class="card recent-sales overflow-auto mb-4">
                    <div class="card-body">

                        <table class="table table-borderless datatable" id="myTable">
                            <thead>
                                <tr>
                                    <th scope="col">ID Report</th>
                                    <th scope="col">ID Usulan</th>
                                    <th scope="col">Realisasi</th>
                                    <th scope="col">Tgl Pelaksanaan</th>
                                    <th scope="col">Keterangan</th>
                                    <th scope="col">Status</th>
                                    <th scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($reports as $item)
                                <tr>
                                    <td>{{ $item->id_report }}</td>
                                    <td>{{ $item->id_usulan }}</td>
                                    <td>{{ $item->realisasi }}</td>
                                    <td>{{ $item->tgl_pelaksanaan }}</td>
                                    <td>{{ $item->keterangan }}</td>
                                    <td>{{ $item->status }}</td>
                                    <td class="d-flex justify-content-evenly px-3">
                                        <!-- Tombol untuk menyetujui report -->
                                        <form action="{{ route('report.approve', ['id' => $item->id_report]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit">Setujui</button>
                                        </form>
                                        <!-- Tombol untuk menolak report -->
                                        {{-- <form action="{{ route('report.reject', ['id' => $item->id_report]) }}"
                                            method="POST">
                                            @csrf
                                            <button type="submit">Pending</button>
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
    </section>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous">
    </script>
</body>

</html>

@endsection