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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Tabel KRS Mahasiswa</h4></div>
                            <div class="floatright">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>NIM</th>
                                            <th>Konsentrasi</th>
                                            <th>Total Mata Kuliah</th>
                                            <th>Foto</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    <?php $filterta = \Session::get('tahunajaran'); ?>
                                    @foreach($data_mahasiswa as $mahasiswa)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;"><a href="/data-krs-mahasiswa/{{$mahasiswa->id}}">{{$mahasiswa->nama_mahasiswa}}</a></td>
                                            <td style="vertical-align:middle;">{{$mahasiswa->nim_mahasiswa}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{$mahasiswa->konsentrasi_mahasiswa}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{$data_matkul_ambil->where('id_mahasiswa', $mahasiswa->id)->count()}}</td>
                                            <td style="vertical-align:middle;"><img src="{{asset('storage/profil_images/'.$mahasiswa->foto_mahasiswa)}}" class="img-responsive" style="max-height: 130px; max-width: 95px;"></td>
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