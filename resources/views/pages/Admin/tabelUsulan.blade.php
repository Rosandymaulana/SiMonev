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
        <div class="d-sm-flex align-items-center justify-content-between mb-4">
            <div class="">
                <h1 class="h3 mb-0 fw-bold">{{ 'Tabel Usulan' }}</h1>
                <div class="d-flex">
                    <p><a href="{{ url('/admin') }}">Dashboard</a></p>
                    <p class="ml-1">/ Tabel Usulan</p>
                </div>
            </div>
            <a href="#" class="d-none d-sm-inline-block btn btn-sm btn-primary shadow-sm"><i class="fas fa-download fa-sm text-white-50"></i> Buku Panduan</a>
        </div>

        <section class="dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto mb-4">
                        <div class="card-body">

                            <div class="mb-4">
                                <a href="{{ url('/admin/exportusulan') }}" class="btn btn-export">Export</a>
                                <a href="" class="btn btn-import m-1" data-bs-toggle="modal" data-bs-target="#exampleModal">Import</a>
                            </div>

                            <table class="table table-borderless datatable" id="myTable">
                                <thead>
                                    <tr>
                                        <th scope="col">ID Usulan</th>
                                        <th scope="col">NO</th>
                                        {{-- <th scope="col">Tgl Usulan</th> --}}
                                        {{-- <th scope="col">Fraksi</th> --}}
                                        {{-- <th scope="col">Pengusul</th> --}}
                                        <th scope="col">Usulan</th>
                                        {{-- <th scope="col">Masalah</th> --}}
                                        {{-- <th scope="col">Prioritas Usulan</th> --}}
                                        {{-- <th scope="col">Alamat</th> --}}
                                        <th scope="col">Kelurahan</th>
                                        {{-- <th scope="col">opd_tujuan_awal</th> --}}
                                        <th scope="col">opd_tujuan_akhir</th>
                                        {{-- <th scope="col">Status</th>
                                        <th scope="col">Volume</th>
                                        <th scope="col">Satuan</th>
                                        <th scope="col">Harga Satuan</th>
                                        <th scope="col">Nilai Usulan</th>
                                        <th scope="col">Nilai Akomodir</th> --}}
                                        <th scope="col">Realisasi</th>
                                        <th scope="col">Actions</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach ($usulan as $item)
                                    <tr>
                                        <td>{{ $item->usulan_id }}</td>
                                        <td>{{ $item->no }}</td>
                                        {{-- <td>{{ $item->tgl_usulan }}</td> --}}
                                        {{-- <td>{{ $item->fraksi }}</td> --}}
                                        {{-- <td>{{ $item->pengusul }}</td> --}}
                                        <td>{{ $item->usulan }}</td>
                                        {{-- <td>{{ $item->masalah }}</td> --}}
                                        {{-- <td>{{ $item->prioritas_usulan }}</td> --}}
                                        {{-- <td>{{ $item->alamat }}</td> --}}
                                        <td>{{ $item->kelurahan }}</td>
                                        {{-- <td>{{ $item->opd_tujuan_awal }}</td> --}}
                                        <td>{{ $item->opd_tujuan_akhir }}</td>
                                        <td></td>
                                        <td class="d-flex justify-content-evenly px-3">
                                            {{-- <a href="{{ url('admin/'. 'tabel-usulan/' .$item->id_usulan) }}"
                                            class="edit px-1" data-toggle="toggle">
                                            <img src="{{ asset('style/img/ic-edit.svg') }}" alt="">
                                            </a> --}}
                                            <a href="{{ url('admin/'. 'tabel-usulan/' .$item->id_usulan. '/edit') }}" class="edit px-1" data-toggle="toggle">
                                                <img src="{{ asset('style/img/ic-eye.svg') }}" alt="">
                                            </a>
                                        </td>

                                        {{-- <td>{{ $item->status }}</td> --}}
                                        {{-- <td>{{ $item->volume }}</td> --}}
                                        {{-- <td>{{ $item->id_satuan }}</td> --}}
                                        {{-- <td>{{ $item->harga_satuan }}</td> --}}
                                        {{-- <td>{{ $item->nilai_usulan }}</td> --}}
                                        {{-- <td>{{ $item->nilai_akomodir }}</td> --}}
                                        {{-- Problem Masih belum bisa menampikan nama satuan dan nama wilayah --}}
                                        {{--
                                        <td>{{ $item['id_usulan'] }}</td>
                                        <td>{{ $item['tgl_usulan'] }}</td>
                                        <td>{{ $item['fraksi'] }}</td>
                                        <td>{{ $item['pengusul'] }}</td>
                                        <td>{{ $item['usulan'] }}</td>
                                        <td>{{ $item['masalah'] }}</td>
                                        <td>{{ $item['prioritas_usulan'] }}</td>
                                        <td>{{ $item['alamat'] }}</td>
                                        <td>{{ $item['kelurahan'] }}</td>
                                        <td>{{ $item['opd_tujuan_awal'] }}</td>
                                        <td>{{ $item['opd_tujuan_akhir'] }}</td>
                                        <td>{{ $item['status'] }}</td>
                                        <td>{{ $item['volume'] }}</td>

                                        <td>{{ $item['nama_satuan'] }}</td>

                                        <td>{{ $item['harga_satuan'] }}</td>
                                        <td>{{ $item['nilai_usulan'] }}</td>
                                        <td>{{ $item['nilai_akomodir'] }}</td>
                                        --}}
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
</body>

</html>

@endsection