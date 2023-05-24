@extends('layouts.super-admin')
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
                                <table class="table table-borderless table-bordered py-3" id="myTable">
                                    <thead>
                                        <tr>
                                            <th scope="col">Username</th>
                                            <th scope="col">Email</th>
                                            <th scope="col">No Telp</th>
                                            <th scope="col">Foto</th>
                                            <th scope="col">Actions</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($admin as $item)
                                        <tr>
                                            <td>{{ $item->username }}</td>
                                            <td>{{ $item->email }}</td>
                                            <td>{{ $item->no_telp }}</td>
                                            <td>
                                                <img class="img-fluid mx-auto" style="max-width: 100%"
                                                    src="{{asset('storage/'.$item->foto)}}" alt="">
                                            </td>
                                            <td class="d-flex justify-content-evenly px-3">
                                                {{-- <a href="{{ url('/data_barang/' . $item->id_admin) }}" title="View"
                                                    data-toggle="modal" data-target="#showModal{{ $item->id_admin }}">
                                                    <button type="button" class="btn btn-sm btn-primary">
                                                        view
                                                    </button>
                                                </a> --}}
                                                <a href="{{ url('/data_barang/' . $item->id_admin . '/edit') }}"
                                                    class="edit px-1" data-toggle="toggle">
                                                    <button type="button" class="btn btn-sm btn-success">
                                                        edit
                                                    </button>
                                                </a>
                                                <form action="{{ url('super-admin'.'/'.'admin'.'/'.$item->id_admin) }}"
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