@extends('layouts.pengusul.index')
@section('penyusul')

<div class="card">
    <div class="card-header">Laporkan Data</div>
    <div class="card-body">
        <form method="POST" action="{{ url('penyusul/'. 'tabel-usulan/' .$usulan->id_usulan. '/laporkan-data') }}">
            @csrf
            {{-- <input type="hidden" name="usulan_id" value="{{ $id_usulan }}"> --}}
            {{--
            <label for="">ID_Usulan</label>
            <input type="number" name="id_usulan" id="id_usulan" class="form-control"> --}}
            <label for="">Realisasi</label>
            <input type="number" name="realisasi" id="realisasi" class="form-control">
            <label for="">Tgl_Pelaksanaan</label>
            <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control">
            <label for="">Keterangan</label>
            <input type="text" name="keterangan" id="keterangan" class="form-control">
            <input type="submit" class="btn btn-primary" value="save">
        </form>
    </div>
</div>
@endsection