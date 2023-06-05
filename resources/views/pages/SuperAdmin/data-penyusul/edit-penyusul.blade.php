@extends('layouts.super-admin.index')
@section('super-admin')

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title></title>
</head>

<body>
    <main id="main" class="main">


        <div class="pagetitle">
            <h1>Edit Penyusul</h1>
            <nav>
                {{-- <ol class="breadcrumb">
                    <li class="breadcrumb-item"><a href="{{ url('/') }}">Dashboard</a></li>
                    <li class="breadcrumb-item"><a href="{{ url('/tabel_usulan') }}">Tabel Usulan</a></li>
                    <li class="breadcrumb-item active">Edit</li>
                    <li class="breadcrumb-item">{{ $usulanPenyusul->id_usulan }}</li>
                </ol> --}}
            </nav>
        </div><!-- End Page Title -->

        <section class="dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <form class="form-horizontal" action="{{ url('super-admin/penyusul/'. $user->id_user) }}"
                                method="post" enctype="multipart/form-data">
                                {{ csrf_field() }}

                                @method('PUT')
                                <div class="row mb-3">
                                    <label for="username" class="col-sm-2 col-form-label">Username</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="username" class="form-control" id="username"
                                            value="{{ $user->username }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        @foreach($role as $data)
                                        <input type="text" name="role" class="form-control" id="role"
                                            value="{{ $data->name }}" readonly disabled>
                                        @endforeach
                                    </div>
                                </div>

                                {{-- <div class="row mb-3">
                                    <label for="role" class="col-sm-2 col-form-label">Role</label>
                                    <div class="col-sm-10">
                                        @foreach($role as $data)

                                        <input type="text" name="role" class="form-control" id="role"
                                            value="{{ $data->name }}" readonly>

                                        @endforeach
                                    </div>
                                </div> --}}

                                <div class="row mb-3">
                                    <label for="email" class="col-sm-2 col-form-label">Email</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="email" class="form-control" id="email"
                                            value="{{ $user->email }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="password" class="col-sm-2 col-form-label">Password</label>
                                    <div class="col-sm-10">
                                        <input type="password" name="password" class="form-control" id="password"
                                            value="{{ $user->password }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="name" class="col-sm-2 col-form-label">Nama</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="name" class="form-control" id="nama"
                                            value="{{ $user->name }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="jabatan" class="col-sm-2 col-form-label">Jabatan</label>
                                    <div class="col-sm-10">
                                        <input type="text" name="jabatan" class="form-control" id="jabatan"
                                            value="{{ $user->jabatan }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="no_telp" class="col-sm-2 col-form-label">No Telp</label>
                                    <div class="col-sm-10">
                                        <input type="number" name="no_telp" class="form-control" id="no_telp"
                                            value="{{ $user->no_telp }}">
                                    </div>
                                </div>

                                <div class="row mb-3">
                                    <label for="wilayah" class="col-sm-2 col-form-label">Wilayah</label>
                                    <div class="col-sm-10">
                                        <select name="wilayah" class="form-control" id="wilayah">
                                            @foreach($wilayah as $data)
                                            <option value="{{ $data->id_wilayah }}">{{ $data->nama_wilayah }}</option>
                                            @endforeach
                                        </select>
                                        @if($errors->has('wilayah'))
                                        <div class="text-danger">
                                            {{ $errors->first('wilayah')}}
                                        </div>
                                        @endif
                                    </div>
                                </div>

                                <input type="submit" value="Update Data" class="btn btn-success">
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