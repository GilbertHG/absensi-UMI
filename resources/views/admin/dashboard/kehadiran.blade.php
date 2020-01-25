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
                                            <th>No.</th>
                                            <th>Pertemuan</th>
                                            <th>Tanggal Kuliah</th>
                                            <th>Status</th>
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
    @endsection