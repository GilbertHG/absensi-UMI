@extends('admin.layouts.master')
@section('content')
<!-- content body -->
<div class="content-body">
    <div class="container">
        <!-- row -->
        <div class="row">
            <div class="col-12">
            @if($message = Session::get('sukses'))
                        <div class="alert alert-success">{{$message}}</div>
            @endif
            {{-- @error('nip_nbm_dosen') --}}
            {{-- <div class="alert alert-danger">{{ $message }}</div>
            @enderror --}}
            <div class="card">
                <div class="card-body">
                    <div class="float-left">
                        <h4 class="card-title mdi mdi-image-filter-none f-s-20"> Daftar Hadir Mahasiswa</h4>
                    </div>
                    <div class="row float-right">
                        <div style="margin:auto;">
                            <button type="button" onclick="window.location.href='/daftar-hadir'" class="btn btn-outline-warning btn-sm" style="margin-right:40px;"><i class="mdi mdi-keyboard-backspace"></i></button>
                        </div>
                        <div class="bootstrap-modal" style="margin-right:40px;">
                            <!-- Button trigger modal -->
                            @if($mataKuliah != NULL)
                            <a href="{{route('absen',['mk' => $matkul->id])}}"
                                class="btn btn-outline-primary float-right">Isi Absen</a>
                            @endif
                        </div>
                    </div>
                </div>
                <div class="card-body">
                        <div class="col-8 table-responsive" style="margin:auto;">
                            <table class="table table-hover">
                                <tr>
                                    <td>Kode Mata Kuliah</td>
                                    <td>: {{$matkul->kode_mk}}</td>
                                </tr>
                                <tr>
                                    <td>Nama Mata Kuliah</td>
                                    <td>: {{$matkul->nama_mk}}</td>
                                </tr>
                                <tr class="border-bottom-1">
                                    <td>Kelas</td>
                                    <td>: {{$matkul->kelas_mk}}</td>
                                </tr>
                            </table>
                        </div>
                        <div class="table-responsive">
                            <table class="table table-striped table-bordered zero-configuration">
                                <thead>
                                    <tr>
                                        <th>No.</th>
                                        <th>NIM</th>
                                        <th>Nama Mahasiswa</th>
                                        <th>Foto</th>
                                        <th>Persentase Kehadiran</th>
                                        <th>Keterangan</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($listpeserta as $data)
                                    <tr>
                                        <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                        <td style="vertical-align:middle;">{{$data->mahasiswa->nim_mahasiswa}}</td>
                                        <td style="vertical-align:middle;">{{$data->mahasiswa->nama_mahasiswa}}</td>
                                        <td style="vertical-align:middle;"><img
                                                src="{{asset('storage/profil_images/'.$data->mahasiswa->foto_mahasiswa)}}" style="max-height: 130px; max-width: 95px;">
                                        </td>
                                        <td style="vertical-align:middle; text-align:center;">{{$data->persentase}} %</td>
                                        <td style="vertical-align:middle; text-align:center;">
                                            <button type="button" onclick="window.location.href='/kehadiran/{{$data->id}}'" class="btn btn-primary btn-sm">Cek Kehadiran</button>
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
    <!-- #/ container -->
</div>
@endsection