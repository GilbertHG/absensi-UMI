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
                            <div class="float-right"><button type="button" onclick="window.location.href='/jadwal-ajar'" class="btn btn-outline-warning btn-sm" style="margin-right:40px;"><i class="mdi mdi-keyboard-backspace"></i></button></div>
                            @endif
                            <!-- /# column -->
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
                            @if(auth()->user()->role == 'Dosen')
                            <div class="floatright">
                                <div class="bootstrap-modal">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambahModal" style="margin-right:40px;">Tambah</button>
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
                                            <th style="vertical-align:middle; text-align:center;">Judul File</th>
                                            <th style="vertical-align:middle; text-align:center;">Deskripsi File</th>
                                            <th style="vertical-align:middle; text-align:center;">Tanggal Upload</th>
                                            @if(auth()->user()->role == 'Dosen')
                                            <th style="vertical-align:middle; text-align:center;">Edit | Hapus</th>
                                            @elseif(auth()->user()->role == 'Mahasiswa')
                                            <th style="vertical-align:middle; text-align:center;">Download</th>
                                            @endif
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($file as $data)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{$data->judul_file}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{ Str::limit($data->deskripsi_file, 100, ' .....')}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{\Carbon\Carbon::parse($data->tanggal_upload)->format('d-m-Y')}}</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                            @if(auth()->user()->role == 'Dosen')
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{$data->id}}"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#deleteModal{{$data->id}}"><i class="mdi mdi-delete"></i></button>
                                            @elseif(auth()->user()->role == 'Mahasiswa')
                                                <button type="button" onclick="window.location.href='/file-kuliah/download/{{$data->id}}'" class="btn btn-success btn-sm"><i class="mdi mdi-download"></i></button>
                                            @endif
                                            </td>
                                    @endforeach
                                        </tr>
                                    
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
                    <h5 class="modal-title">Tambah File</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/file-kuliah/add" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul:</label>
                            <input type="text" name="judul_file" required class="form-control input-default">
                        </div>
                        <div class="form-group">
                            <label>Deskrpisi:</label>
                            <textarea class="form-control h-150px" required name="deskripsi_file" rows="6" id="comment"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" required name="file" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                        <input type="hidden" name="id_mk" value="{{$matkul->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    <!-- Modal Edit-->
    @foreach($file as $data)
    <div class="modal fade" id="editModal{{$data->id}}" style="margin-top: 50px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit File</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/file-kuliah/edit/{{$data->id}}" enctype="multipart/form-data">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul:</label>
                            <input type="text" name="judul_file" required value="{{$data->judul_file}}" class="form-control input-default">
                        </div>
                        <div class="form-group">
                            <label>Deskrpisi:</label>
                            <textarea class="form-control h-150px" required name="deskripsi_file" rows="6" id="comment">{{$data->deskripsi_file}}</textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" name="file" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                                <input type="hidden" name="file_lama" value="{{$data->file}}">
                            </div>
                        </div>
                        <div style="font-size: 12px">{{$data->file}}</div>
                        <input type="hidden" name="id_mk" value="{{$matkul->id}}">
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Edit File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endforeach
    <!-- Modal Hapus -->
    @foreach($file as $data)
    <div class="modal fade" id="deleteModal{{$data->id}}" style="margin-top: 50px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus File</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/file-kuliah/delete/{{$data->id}}">
                {{csrf_field()}}
                    <div class="modal-body">
                        Anda yakin ingin menghapus file ini?
                    </div>
                    <input type="hidden" name="file" value="{{$data->file}}">
                    <input type="hidden" name="id_mk" value="{{$matkul->id}}">
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