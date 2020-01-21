@extends('admin.layouts.master') 
    @section('content')
    <!-- content body -->
    <div class="content-body">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    {{-- @if($message = Session::get('sukses'))
                        <div class="alert alert-success">{{$message}}</div>
                    @endif
                    @error('nip_nbm_dosen')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20">Daftar Hadir Mahasiswa</h4></div>
                            <div class="floatright">
                                    <div class="bootstrap-modal">
                                            <!-- Button trigger modal -->
                                            <a href="{{route('absen',['mk' => $matkul->mata_kuliah->id])}}" class="btn btn-outline-primary float-right">Isi Absen</a>
                                    </div>
                            <div class="table-responsive">
                                <p class="text-sm-left">Kode Mata Kuliah : {{$matkul->mata_kuliah->kode_mk}}    </p>
                                <p class="text-sm-left">Nama Mata Kuliah : {{$matkul->mata_kuliah->nama_mk}}    </p>
                                <p class="text-sm-left">Kelas :            {{$matkul->mata_kuliah->kelas_mk}}  </p>
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>NIM</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>Foto</th>
                                            <th>Persentase Kehadiran</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        @foreach($listpeserta as $data)
                                        <tr>
                                        <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                        <td style="vertical-align:middle;">{{$data->mahasiswa->nim_mahasiswa}}</td>
                                            <td style="vertical-align:middle;">{{$data->mahasiswa->nama_mahasiswa}}</td>
                                            <td style="vertical-align:middle;"><img src="{{asset('storage/profil_images/'.$data->mahasiswa->foto_mahasiswa)}}"></td>
                                            <td style="vertical-align:middle;">{{$data->persentase}}</td>
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