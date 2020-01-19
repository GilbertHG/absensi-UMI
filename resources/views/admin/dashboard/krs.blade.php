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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Daftar Mahasiswa</h4></div>
                            <div class="floatright">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Mahasiswa</th>
                                            <th>NIM</th>
                                            <th>Konsentrasi</th>
                                            <th>Foto</th>
                                            <th style="vertical-align:middle; text-align:center;">Edit | Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($data_mahasiswa as $mahasiswa)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$mahasiswa->nama_mahasiswa}}</td>
                                            <td style="vertical-align:middle;">{{$mahasiswa->nim_mahasiswa}}</td>
                                            <td style="vertical-align:middle;">{{$mahasiswa->konsentrasi_mahasiswa}}</td>
                                            <td style="vertical-align:middle;"><img src="{{asset('storage/profil_images/'.$mahasiswa->foto_mahasiswa)}}" class="img-responsive" style="max-height: 160px; max-width: 140px;"></td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{$mahasiswa->id}}"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal{{$mahasiswa->id}}"><i class="mdi mdi-delete"></i></button>
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
    <!-- #/ content body -->
    @endsection