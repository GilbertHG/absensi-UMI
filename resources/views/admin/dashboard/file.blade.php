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
                            <div class="floatright">
                                <div class="bootstrap-modal">
                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambahModal" style="margin-right:40px;">Tambah</button>
                                </div>
                            </div>
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
                                            <th style="vertical-align:middle; text-align:center;">Download | Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                     
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle; text-align:center;"></td>
                                            <td style="vertical-align:middle; text-align:center;"></td>
                                            <td style="vertical-align:middle; text-align:center;"></td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-success btn-sm" data-toggle="modal" data-target="#editModal"><i class="mdi mdi-download"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#editModal"><i class="mdi mdi-delete"></i></button>
                                            </td>
                                            
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
                <form method="post" action="/db-dosen/add">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Judul:</label>
                            <input type="text" class="form-control input-default">
                        </div>
                        <div class="form-group">
                            <label>Deskrpisi:</label>
                            <textarea class="form-control h-150px" rows="6" id="comment"></textarea>
                        </div>
                        <div class="input-group mb-3">
                            <div class="custom-file">
                                <input type="file" class="custom-file-input">
                                <label class="custom-file-label">Choose file</label>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="submit" class="btn btn-primary">Tambah File</button>
                    </div>
                </form>
            </div>
        </div>
    </div>
    @endsection