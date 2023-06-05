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
                                <h5 class="card-title">Tabel Admin</h5>
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
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->name }}</td>
                                            <td>{{ $item->wilayah->nama_wilayah }}</td>
                                            <td>{{ $item->jabatan }}</td>
                                            <td>{{ $item->no_telp }}</td>
                                            <td>{{ $item->role->name }}</td>
                                            {{-- <td>{{ $item->role }}</td> --}}
                                            <td class="d-flex justify-content-evenly px-3">
                                                <a href="{{ url('/super-admin'.'/'.'admin'.'/'.$item->id_user . '/edit') }}"
                                                    class="edit px-1" data-toggle="toggle">
                                                    <button type="button" class="btn btn-sm btn-success">
                                                        edit
                                                    </button>
                                                </a>
                                                <form action="{{ url('super-admin'.'/'.'admin'.'/'.$item->id_user) }}"
                                                    method="post">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button onclick="return confirm('Confirm Delete')" type="submit"
                                                        class="btn btn-sm btn-danger btndelete">
                                                        delete
                                                    </button>
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