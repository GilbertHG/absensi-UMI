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
                    <form method="POST" action="">
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20">Daftar Hadir Mahasiswa</h4></div>
                            <div class="floatright">
                                <select name="pertemuan" class="btn btn-sm btn-outline-primary float-right"><i class="fa fa-angle-down m-l-5"></i>
                                    <option class="dropdown-item" value="" style="background-color:white">Pertemuan</option>
                                    <option class="dropdown-item" value="1" style="background-color:white">1</option>
                                    <option class="dropdown-item" value="2" style="background-color:white">2</option>
                                    <option class="dropdown-item" value="3" style="background-color:white">3</option>
                                    <option class="dropdown-item" value="4" style="background-color:white">4</option>
                                    <option class="dropdown-item" value="5" style="background-color:white">5</option>
                                    <option class="dropdown-item" value="6" style="background-color:white">6</option>
                                    <option class="dropdown-item" value="7" style="background-color:white">7</option>
                                    <option class="dropdown-item" value="8" style="background-color:white">8</option>
                                    <option class="dropdown-item" value="9" style="background-color:white">9</option>
                                    <option class="dropdown-item" value="10" style="background-color:white">10</option>
                                    <option class="dropdown-item" value="11" style="background-color:white">11</option>
                                    <option class="dropdown-item" value="12" style="background-color:white">12</option>
                                    <option class="dropdown-item" value="13" style="background-color:white">13</option>
                                    <option class="dropdown-item" value="14" style="background-color:white">14</option>
                                    <option class="dropdown-item" value="15" style="background-color:white">15</option>
                                    <option class="dropdown-item" value="16" style="background-color:white">16</option>
                                </select>
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
                                            <th>Kehadiran</th>
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
                                            <td style="vertical-align:middle;">
                                                <select name="kehadiran" class="btn btn-sm btn-outline-primary float-right"><i class="fa fa-angle-down m-l-5"></i>
                                                    <option class="dropdown-item" value="" style="background-color:white">Status</option>
                                                    <option class="dropdown-item" value="Tidak Hadir" style="background-color:white">Tidak Hadir</option>
                                                    <option class="dropdown-item" value="Izin" style="background-color:white">Izin</option>
                                                    <option class="dropdown-item" value="Sakit" style="background-color:white">Sakit</option>
                                                </select>
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table><br>
                                <button type="submit" class="btn btn-secondary btn-sm">Masukkan Absen</button>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    @endsection