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
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> KRS Mahasiswa</h4></div>
                            <div class="float-right"><button type="button" onclick="window.location.href='/krs-mahasiswa'" class="btn btn-outline-warning btn-sm" style="margin-right:40px;"><i class="mdi mdi-keyboard-backspace"></i></button></div>
                            <!-- /# column -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col table-responsive" style="margin:auto;">
                                    <table class="table table-hover">
                                            <tr>
                                                <td>Nama</td>
                                                <td>: {{$mahasiswa->nama_mahasiswa}}</td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>: {{$mahasiswa->nim_mahasiswa}}</td>
                                            </tr>
                                            <tr class="border-bottom-1">
                                                <td>Konsentrasi</td>
                                                <td>: {{$mahasiswa->konsentrasi_mahasiswa}} </td>
                                            </tr>
                                    </table>
                                </div>
                                <div class="col-3 img-profile" style="margin:auto;">
                                    <img src="{{asset('storage/profil_images/'.$mahasiswa->foto_mahasiswa)}}" class="rounded" style="max-height: 170px; max-width: 130px;" alt="">
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
                                            <th style="vertical-align:middle;">Tahun Ajaran</th>
                                            <th style="vertical-align:middle;">Nama Dosen</th>
                                            <th style="vertical-align:middle;">Waktu</th>
                                            <th style="vertical-align:middle; text-align:center;">Hapus</th>
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
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->tahun_ajaran}}</td>
                                            <td style="vertical-align:middle;">{{$data->mata_kuliah->dosen_mk}}</td>
                                            <td style="vertical-align:middle;">{{\Carbon\Carbon::parse($data->mata_kuliah->jam_mulai)->format('H:i')}} - {{\Carbon\Carbon::parse($data->mata_kuliah->jam_selesai)->format('H:i')}}</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-danger btn-sm"  data-toggle="modal" data-target="#hapusModal{{$data->id}}"><i class="mdi mdi-delete"></i></button>
                                            </td>
                                        </tr>
                                        @endif
                                    @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row float-right" style="margin-top:20px;">
                                <button type="button" onclick="window.location.href='/isi-krs-mahasiswa/{{$mahasiswa->id}}'" class="col btn btn-outline-primary" style="margin-right:40px;">Tambah</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!-- #/ content body -->
    <!-- Modal Hapus -->
        @foreach($matkul as $data)
        <div class="modal fade" id="hapusModal{{$data->id}}" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Mata Kuliah</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/data-krs-mahasiswa/delete/{{$data->id}}">
                    {{csrf_field()}}
                        <div class="modal-body">
                            Anda yakin ingin menghapus mata kuliah ini?
                        </div>
                        <input type="hidden" value="{{$mahasiswa->id}}" name="id_mahasiswa">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
    @endsection