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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Jadwal Mata Kuliah</h4></div>
                            @if(auth()->user()->role == 'Mahasiswa')
                            <div class="float-right"><button type="button" onclick="window.location.href='/jadwal-mata-kuliah'" class="btn btn-outline-warning btn-sm" style="margin-right:40px;"><i class="mdi mdi-keyboard-backspace"></i></button></div>
                            @elseif(auth()->user()->role == 'Dosen')
                            <div class="float-right"><button type="button" onclick="window.location.href='{{route('persentase',['mk' => $matkul->id])}}'" class="btn btn-outline-warning btn-sm" style="margin-right:40px;"><i class="mdi mdi-keyboard-backspace"></i></button></div>
                            @endif
                            <!-- /# column -->
                        </div>
                        <div class="card-body">
                            @if(auth()->user()->role == 'Mahasiswa')
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
                            @elseif(auth()->user()->role == 'Dosen')
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
                            </div>
                            @endif
                            <!-- /# card -->
                            <!-- /# column -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align:middle; text-align:center;">No.</th>
                                            <th style="vertical-align:middle; text-align:center;">Pertemuan</th>
                                            <th style="vertical-align:middle; text-align:center;">Tanggal Kuliah</th>
                                            <th style="vertical-align:middle; text-align:center;">Status</th>
                                            @if(auth()->user()->role == 'Dosen')
                                            <th style="vertical-align:middle; text-align:center;">Ubah</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                     @foreach($absen as $data)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{$data->pertemuan}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{\Carbon\Carbon::parse($data->tanggal_kuliah)->format('d-m-Y')}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{$data->status}}</td>
                                            @if(auth()->user()->role == 'Dosen')
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{$data->id}}"><i class="mdi mdi-lead-pencil"></i></button>
                                            </td>
                                            @endif
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
    <!-- #/ content body -->

    <!-- Modal Edit -->
    @foreach($absen as $data)
    <div class="modal fade" id="editModal{{$data->id}}" style="margin-top: 50px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Ubah Status Kehadiran</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/kehadiran/edit/{{$data->id}}">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-3 my-1">
                                    <label>Pertemuan</label>
                                    <input type="text" class="form-control mb-2 mr-sm-2" style="height:10px;text-align:center;" disabled value="{{$data->pertemuan}}">
                                </div>
                                <div class="col-auto my-1">
                                    <label>Status</label>
                                    <select class="custom-select mb-2 mr-sm-2" name="status">
                                        <option value="1" @if($data->status == 'Hadir') selected @endif>Hadir</option>
                                        <option value="2" @if($data->status == 'Tidak Hadir') selected @endif>Tidak Hadir</option>
                                        <option value="3" @if($data->status == 'Izin') selected @endif>Izin</option>
                                        <option value="4" @if($data->status == 'Sakit') selected @endif>Sakit</option>
                                    </select>
                                </div>
                                <input type="hidden" name="id_mkDiambil" value="{{Request::segment(2)}}">
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-secondary">Ubah Data</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    @endsection