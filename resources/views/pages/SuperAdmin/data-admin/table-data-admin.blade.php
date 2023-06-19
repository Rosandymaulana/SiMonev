@extends('layouts.super-admin.index')
@section('super-admin')

<!DOCTYPE html>
<html lang="en">

<head>

</head>

<body>
    <!-- Tabel Admin -->
    <section class="section dashboard">
        <div class="row">
            <div class="col-lg-12">
                <div class="row">
                    <div class="col-12">
                        <div class="card top-selling overflow-auto">
                            <div class="card-body pb-0">
                                <div class="d-sm-flex align-items-center justify-content-between mb-4">
                                    <div class="">
                                        <h1 class="h3 mb-0 fw-bold">{{ 'Data Admin' }}</h1>
                                        <div class="d-flex">
                                            <p><a href="{{ url('/super-admin') }}">Dashboard</a></p>
                                            <p class="ml-1">/ Data Admin</p>
                                        </div>
                                    </div>
                                </div>
                                <a href="{{ url('/super-admin/admin/create') }}">
                                    <button class="btn btn-success mb-4">Tambah Admin</button>
                                </a>
                                <table class="table table-borderless table-bordered py-3" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">Nama</th>
                                            <th scope="col">Wilayah</th>
                                            <th scope="col">Jabatan</th>
                                            <th scope="col">No Telp</th>
                                            <th scope="col">Role</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($users as $item)
                                        <tr>
                                            <td>{{ $item->username }}</td>
                                            <td>
                                                <a href="{{ url('mailto: '. $item->email) }}" class="text-red-300">{{
                                                    $item->email }}</a>
                                            </td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->wilayah->nama_wilayah }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>
                                                <a href="{{ url('https://wa.me/+62'. $item->no_telp) }}"
                                                    class="text-red-300">{{ $item->no_telp }}</a>
                                            </td>
                                            <td>{{ $item->role->name }}</td>
                                            <td class="d-flex justify-content-evenly px-3">
                                                <a href="{{ url('/super-admin'.'/'.'admin'.'/'.$item->id_user . '/edit') }}"
                                                    class="edit px-1" data-toggle="toggle">
                                                    <img class="mx-1"
                                                        src="{{ asset('style/img/super-admin/ic-edit.svg') }}" alt="">
                                                    {{-- <button type="button" class="btn btn-sm btn-success">
                                                        edit
                                                    </button> --}}
                                                </a>
                                                <form action="{{ url('super-admin'.'/'.'admin'.'/'.$item->id_user) }}"
                                                    method="post">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <img class="mx-1"
                                                        src="{{ asset('style/img/super-admin/ic-delete.svg') }}" alt=""
                                                        style="cursor: pointer;"
                                                        onclick="return confirm('Confirm Delete')">
                                                    {{-- <button onclick="return confirm('Confirm Delete')"
                                                        type="submit" class="btn btn-sm btn-danger btndelete">
                                                        delete
                                                    </button> --}}
                                                </form>
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
    <!-- Akhir Tabel Admin -->

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ENjdO4Dr2bkBIFxQpeoTz1HIcje39Wm4jDKdf19U8gI4ddQ3GYNS7NTKfAdVQSZe" crossorigin="anonymous">
    </script>
</body>

</html>
@endsection