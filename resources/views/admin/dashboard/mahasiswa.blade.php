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
                    @error('foto')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('nim_mahasiswa')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Data Mahasiswa</h4></div>
                                <div class="floatright">
                                    <div class="bootstrap-modal">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                                    </div>
                                </div>
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
                                            <td style="vertical-align:middle;"><img src="{{asset('storage/profil_images/'.$mahasiswa->foto_mahasiswa)}}" class="img-responsive" style="max-height: 130px; max-width: 95px;"></td>
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
    <!-- Modal Tambah-->
    <div class="modal fade" id="tambahModal" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Tambah Data Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/db-mahasiswa/add" enctype="multipart/form-data">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" required name="nama_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" required name="nim_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label>Konsentrasi</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" name="konsentrasi_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control-file mb-2 mr-sm-2" name="foto">
                                <div style="font-size: 10px">File hanya JPG, PNG dan JPEG dengan ukuran Maks. 2048 Kb</div>
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        @foreach($data_mahasiswa as $mahasiswa)
        <div class="modal fade" id="editModal{{$mahasiswa->id}}" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Mahasiswa</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" enctype="multipart/form-data" action="/db-mahasiswa/edit/{{$mahasiswa->id}}">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{$mahasiswa->nama_mahasiswa}}" class="form-control mb-2 mr-sm-2" required name="nama_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label>NIM</label>
                                <input type="text" value="{{$mahasiswa->nim_mahasiswa}}" class="form-control mb-2 mr-sm-2" required name="nim_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label>Konsentrasi</label>
                                <input type="text" value="{{$mahasiswa->konsentrasi_mahasiswa}}" class="form-control mb-2 mr-sm-2" name="konsentrasi_mahasiswa">
                            </div>
                            <div class="form-group">
                                <label>Foto</label>
                                <input type="file" class="form-control-file mb-2 mr-sm-2" name="foto">
                                <div style="font-size: 10px">File hanya JPG, PNG dan JPEG dengan ukuran Maks. 2048 Kb</div>
                                <img src="{{asset('storage/profil_images/'.$mahasiswa->foto_mahasiswa)}}" class="img-responsive" style="max-height:160px; max-width: 140px;"s>
                            </div>
                        </div>
                        <input type="hidden" name="foto_lama" value="{{$mahasiswa->foto_mahasiswa}}">
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="submit" class="btn btn-primary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Modal Hapus -->
        @foreach($data_mahasiswa as $mahasiswa)
        <div class="modal fade" id="hapusModal{{$mahasiswa->id}}" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/db-mahasiswa/delete/{{$mahasiswa->id}}">
                    {{csrf_field()}}
                        <div class="modal-body">
                            Anda yakin ingin menghapus data ini?
                        </div>
                        <input type="hidden" name="foto" value="{{$mahasiswa->foto_mahasiswa}}">
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