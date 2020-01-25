@extends('admin.layouts.master') 
    @section('content')
    <!-- content body -->
    <div class="content-body">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Jadwal Mata Kuliah</h4></div>
                            <!-- /# column -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col table-responsive" style="margin:auto;">
                                    <table class="table table-hover">
                                            <tr>
                                                <td>Nama</td>
                                                <td>: {{userMahasiswa()->nama_mahasiswa}}</td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>: {{userMahasiswa()->nim_mahasiswa}}</td>
                                            </tr>
                                            <tr class="border-bottom-1">
                                                <td>Konsentrasi</td>
                                                <td>: {{userMahasiswa()->konsentrasi_mahasiswa}}</td>
                                            </tr>
                                    </table>
                                </div>
                                <div class="col-3 img-profile" style="margin:auto;">
                                    <img src="{{asset('storage/profil_images/'.userMahasiswa()->foto_mahasiswa)}}" class="rounded" style="max-height: 170px; max-width: 130px;" alt="">
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align:middle;">No.</th>
                                            <th style="vertical-align:middle;">Kode Mata Kuliah</th>
                                            <th style="vertical-align:middle;">Nama Mata Kuliah</th>
                                            <th style="vertical-align:middle;">Kelas</th>
                                            <th style="vertical-align:middle;">Ruangan</th>
                                            <th style="vertical-align:middle;">Hari</th>
                                            <th style="vertical-align:middle;">Nama Dosen</th>
                                            <th style="vertical-align:middle;">Waktu</th>
                                            <th style="vertical-align:middle; text-align:center;">Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    <?php $filterta = \Session::get('tahunajaran'); ?>
                                    @foreach($matkul as $data)
                                        @if($data->mata_kuliah->tahun_ajaran == $filterta)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->kode_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->nama_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->kelas_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->ruangan_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->hari_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->dosen_mk}}</td>
                                            <td style="vertical-align:middle;">{{\Carbon\Carbon::parse($data->mata_kuliah->jam_mulai)->format('H:i')}} - {{\Carbon\Carbon::parse($data->mata_kuliah->jam_selesai)->format('H:i')}}</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/kehadiran/{{$data->id}}'">Lihat Kehadiran</i></button>
                                            </td>
                                        </tr>
                                        @endif
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
    <!-- #/ content body -->
    @endsection