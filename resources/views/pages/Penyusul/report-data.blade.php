@extends('layouts.pengusul.index')
@section('penyusul')

<div class="card mb-5">
    <div class="card-header">Laporkan Data</div>
    <div class="card-body">
        {{-- <input type="hidden" name="usulan_id" value="{{ $id_usulan }}"> --}}
        {{--
        <label for="">ID_Usulan</label>
        <input type="number" name="id_usulan" id="id_usulan" class="form-control"> --}}
        <section class="dashboard">
            <div class="row">
                <div class="col-12">
                    <div class="card recent-sales overflow-auto">
                        <div class="card-body">
                            <div class="row mb-3">
                                <label for="kelurahan" class="col-sm-2 col-form-label">Kelurahan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="kelurahan" class="form-control" id="kelurahan"
                                        value="{{ Auth::user()->wilayah->nama_wilayah }}" readonly disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="id_usulan" class="col-sm-2 col-form-label">ID Usulan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="id_usulan" class="form-control" id="id_usulan"
                                        value="{{ $usulan->usulan_id }}" readonly disabled>
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="no" class="col-sm-2 col-form-label">No</label>
                                <div class="col-sm-10">
                                    <input type="number" name="no" class="form-control" id="no"
                                        value="{{ $usulan->no }}" readonly disabled />
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="tgl_usulan" class="col-sm-2 col-form-label">Tgl Usulan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="tgl_usulan" class="form-control" id="tgl_usulan"
                                        value="{{ $usulan->tgl_usulan }}" readonly disabled>
                                </div>
                            </div> --}}

                            {{-- <div class="row mb-3">
                                <label for="fraksi" class="col-sm-2 col-form-label">Fraksi</label>
                                <div class="col-sm-10">
                                    <input type="text" name="fraksi" class="form-control" id="fraksi"
                                        value="{{ $usulan->fraksi }}">
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="usulan" class="col-sm-2 col-form-label">Usulan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="usulan" class="form-control" id="usulan"
                                        value="{{ $usulan->usulan }}" readonly disabled>
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="masalah" class="col-sm-2 col-form-label">Masalah</label>
                                <div class="col-sm-10">
                                    <input type="text" name="masalah" class="form-control" id="masalah"
                                        value="{{ $usulan->masalah }}">
                                </div>
                            </div> --}}
                            {{-- <div class="row mb-3">
                                <label for="prioritas_usulan" class="col-sm-2 col-form-label">Prioritas
                                    Usulan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="prioritas_usulan" class="form-control"
                                        id="prioritas_usulan" value="{{ $usulan->prioritas_usulan }}">
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="alamat" class="col-sm-2 col-form-label">Alamat</label>
                                <div class="col-sm-10">
                                    <input type="text" name="alamat" class="form-control" id="alamat"
                                        value="{{ $usulan->alamat }}" readonly disabled>
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="opd_tujuan_awal" class="col-sm-2 col-form-label">OPD Tujuan
                                    Awal</label>
                                <div class="col-sm-10">
                                    <input type="text" name="opd_tujuan_awal" class="form-control" id="opd_tujuan_awal"
                                        value="{{ $usulan->opd_tujuan_awal }}">
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="opd_tujuan_akhir" class="col-sm-2 col-form-label">OPD Tujuan
                                    Akhir</label>
                                <div class="col-sm-10">
                                    <input type="text" name="opd_tujuan_akhir" class="form-control"
                                        id="opd_tujuan_akhir" value="{{ $usulan->opd_tujuan_akhir }}" readonly disabled>
                                </div>
                            </div>
                            {{-- <div class="row mb-3">
                                <label for="status" class="col-sm-2 col-form-label">Status</label>
                                <div class="col-sm-10">
                                    <input type="text" name="status" class="form-control" id="status"
                                        value="{{ $usulan->status }}" />
                                </div>
                            </div> --}}
                            <div class="row mb-3">
                                <label for="volume" class="col-sm-2 col-form-label">Volume</label>
                                <div class="col">
                                    <input type="text" name="volume" class="form-control" id="volume"
                                        value="{{ $usulan->volume }}" readonly disabled />
                                </div>
                                <label for="satuan"
                                    class="col-sm-2 col-form-label text-center sm:text-left">Satuan</label>
                                <div class="col">
                                    <input type="text" name="satuan" class="form-control" id="satuan"
                                        value="{{ $usulan->satuans->nama_satuan }}" readonly disabled />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nilai_usulan" class="col-sm-2 col-form-label">Nilai Usulan</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nilai_usulan" class="form-control" id="nilai_usulan"
                                        value="{{ $usulan->nilai_usulan }}" readonly disabled />
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="nilai_akomodir" class="col-sm-2 col-form-label">Nilai
                                    Akomodir</label>
                                <div class="col-sm-10">
                                    <input type="text" name="nilai_akomodir" class="form-control" id="nilai_akomodir"
                                        value="{{ $usulan->nilai_akomodir }}" readonly disabled />
                                </div>
                            </div>

                            {{-- Menampilkan Data yg di Approved --}}
                            <div class="row mb-3">
                                <label for="realisasi" class="col-sm-2 col-form-label">Realisasi</label>
                                <div class="col-sm-10">
                                    @if ($latestReports)
                                    <input type="number" name="realisasi" id="realisasi" class="form-control"
                                        value="{{ $latestReports->realisasi }}" readonly disabled>
                                    @else
                                    <input type="number" name="realisasi" id="realisasi" class="form-control"
                                        value="{{ 0 }}" readonly disabled>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="tgl_pelaksanaan" class="col-sm-2 col-form-label">Tgl_Pelaksanaan</label>
                                <div class="col-sm-10">
                                    @if ($latestReports)
                                    <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control"
                                        value="{{ $latestReports->tgl_pelaksanaan }}" readonly disabled>
                                    @else
                                    <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control"
                                        readonly disabled>
                                    @endif
                                </div>
                            </div>
                            <div class="row mb-3">
                                <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
                                <div class="col-sm-10">
                                    @if ($latestReports)
                                    <input type="text" name="keterangan" id="keterangan" class="form-control"
                                        value="{{ $latestReports->keterangan }}" readonly disabled>
                                    @else
                                    <input type="text" name="keterangan" id="keterangan" class="form-control"
                                        value="{{ 'Masih Belum Ada' }}" readonly disabled>
                                    @endif
                                </div>
                            </div>
                        </div>
                    </div>

                    {{-- Tabel Progress --}}
                    <div class="my-5">
                        <div class="row d-flex justify-content-evenly align-items-center mb-3">
                            <div class="col">
                                <h3>Riwayat Progress</h3>
                            </div>
                            <div class="col d-flex flex-row-reverse">
                                <!-- Trigger Modal Tambah -->
                                <button type="button" class="btn btn-primary" data-bs-toggle="modal"
                                    data-bs-target="#modalTambah">
                                    Tambah
                                </button>

                            </div>
                        </div>
                        <div class="card top-selling overflow-auto mb-4">
                            <div class="card-body pb-0">
                                <table class="table table-borderless" id="myTable">
                                    <thead class="table-dark" style="background: #4E73DF;">
                                        <tr>
                                            {{-- <th scope="col">ID Report</th>
                                            <th scope="col">ID Usulan</th> --}}
                                            <th scope="col">Waktu Pelaporan</th>
                                            <th scope="col">Realisasi</th>
                                            <th scope="col">Tgl Pelaksanaan</th>
                                            <th scope="col">Keterangan</th>
                                            <th scope="col">Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($dataReports as $item)
                                        <tr>
                                            {{-- <td>{{ $item->id_report }}</td>
                                            <td>{{ $item->id_usulan }}</td> --}}
                                            <td>{{ $item->waktu_pelaporan }}</td>
                                            <td>{{ $item->realisasi }}</td>
                                            <td>{{ $item->tgl_pelaksanaan }}</td>
                                            <td>{{ $item->keterangan }}</td>
                                            {{-- <td class="d-flex justify-content-evenly px-3">
                                                @if ($item->status == 'pending')
                                                <button type="button" class="btn" data-bs-toggle="modal"
                                                    data-bs-target="#modalEdit">
                                                    <img src="{{ asset('style/img/pengusul/ic-edit.svg') }}" alt="">
                                                </button>
                                                <form
                                                    action="{{ url('penyusul/'. 'status-usulan/' .$item->id_report) }}"
                                                    method="post">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <button onclick="return confirm('Confirm Delete')" type="button">
                                                        <img src="{{ asset('style/img/pengusul/ic-delete.svg') }}"
                                                            alt="">
                                                    </button>
                                                </form>
                                                @elseif($item->status == 'approved')
                                                <span>Telah Disetujui</span>
                                                @else
                                                <span class="text-muted">Pending</span>
                                                @endif
                                            </td> --}}
                                            <td class="d-flex justify-content-center">
                                                @if ($item->status == 'pending')
                                                <img class="mx-1" src="{{ asset('style/img/pengusul/ic-edit.svg') }}"
                                                    alt="" data-bs-toggle="modal" data-bs-target="#modalEdit"
                                                    style="cursor: pointer;">
                                                <form
                                                    action="{{ url('penyusul/'. 'status-usulan/' .$item->id_report) }}"
                                                    method="post" class="m-0">
                                                    {{ method_field('DELETE') }}
                                                    {{ csrf_field() }}
                                                    <img class="mx-1"
                                                        src="{{ asset('style/img/pengusul/ic-delete.svg') }}" alt=""
                                                        style="cursor: pointer;"
                                                        onclick="return confirm('Confirm Delete')">
                                                </form>
                                                @elseif($item->status == 'approved')
                                                {{-- <span>Telah Disetujui</span> --}}
                                                <button type="button" class="btn btn-primary"
                                                    style="background: #0D6EFD;" disabled>
                                                    Telah Disetujui
                                                </button>
                                                @else
                                                <button class="btn text-white" style="background: #54557A;" disabled>
                                                    Pending
                                                </button>
                                                @endif
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
        </section>


    </div>
</div>
<!-- Modal Tambah-->
<div class="modal fade" id="modalTambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <strong>
                    <h4 class="modal-title fs-5" id="exampleModalLabel">Tambah Progress</h4>
                </strong>
            </div>
            <form method="POST" action="{{ url('penyusul/'. 'tabel-usulan/' .$usulan->id_usulan. '/laporkan-data') }}">
                @csrf
                <div class="modal-body">
                    <div class="dropdown">
                        <label for="waktu_pelaporan" class="">Waktu Pelaporan</label>
                        <select name="waktu_pelaporan" class="form-control" id="waktu_pelaporan" required>
                            <option value="" disabled selected>Pilih Triwulan</option>
                            <option value="Triwulan 1">Triwulan 1</option>
                            <option value="Triwulan 2">Triwulan 2</option>
                            <option value="Triwulan 3">Triwulan 3</option>
                            <option value="Triwulan 4">Triwulan 4</option>
                        </select>
                    </div>

                    <label for="realisasi" class="">Realisasi</label>
                    <input type="number" name="realisasi" id="realisasi" class="form-control" max="100" required>

                    <label for="tgl_pelaksanaan" class="">Tgl_Pelaksanaan</label>
                    <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control" required>

                    <label for="keterangan" class="">Keterangan</label>
                    <input type="text" name="keterangan" id="keterangan" class="form-control" required>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="status" value="pending">
                        Save
                    </button>
                    <button type="submit" class="btn btn-outline-primary" name="status" value="submitted">
                        Submit
                    </button>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="modalEdit" tabindex="-1" aria-labelledby="ModalLabelEdit" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h4 class="modal-title fs-5" id="ModalLabelEdit">Ubah Perubahan</h4>
            </div>
            <form method="POST" action="{{ url('penyusul/'. 'tabel-usulan/' .$usulan->id_usulan. '/laporkan-data') }}">
                @csrf
                <div class="modal-body">
                    <div class="dropdown">
                        <label for="waktu_pelaporan" class="">Waktu Pelaporan</label>
                        <select name="waktu_pelaporan" class="form-control" id="waktu_pelaporan" required>
                            <option value="" disabled selected>Pilih Triwulan</option>
                            <option value="Triwulan 1">Triwulan 1</option>
                            <option value="Triwulan 2">Triwulan 2</option>
                            <option value="Triwulan 3">Triwulan 3</option>
                            <option value="Triwulan 4">Triwulan 4</option>
                        </select>
                    </div>

                    <div>
                        @if ($latestReports)
                        <label for="realisasi" class="">Realisasi</label>
                        <input type="number" name="realisasi" id="realisasi" class="form-control" max="100"
                            value="{{ $latestReports->realisasi }}" required>
                        @else
                        <input type="number" name="realisasi" id="realisasi" class="form-control" value="{{ 0 }}"
                            readonly disabled>
                        @endif
                    </div>

                    <div>
                        @if ($latestReports)
                        <label for="tgl_pelaksanaan" class="">Tgl Pelaksanaan</label>
                        <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control"
                            value="{{ $latestReports->tgl_pelaksanaan }}" required>
                        @else
                        <input type="date" name="tgl_pelaksanaan" id="tgl_pelaksanaan" class="form-control" disabled>
                        @endif
                    </div>

                    <div>
                        @if ($latestReports)
                        <label for="keterangan" class="">Keterangan</label>
                        <input type="text" name="keterangan" id="keterangan" class="form-control"
                            value="{{ $latestReports->keterangan }}" required>
                        @else
                        <input type="text" name="keterangan" id="keterangan" class="form-control"
                            value="{{ 'Masih Belum Ada' }}">
                        @endif
                    </div>

                </div>
                <div class="modal-footer">
                    <button type="submit" class="btn btn-primary" name="status" value="pending">Save</button>
                    <button type="submit" class="btn btn-outline-primary" name="status"
                        value="submitted">Submit</button>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection