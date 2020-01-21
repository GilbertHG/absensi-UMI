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
                    @error('nip_nbm_dosen')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Data Dosen</h4></div>
                            <div class="floatright">
                                    <div class="bootstrap-modal">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambahModal">Tambah</button>
                                    </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Nama Dosen</th>
                                            <th>NIP</th>
                                            <th>NBM</th>
                                            <th style="vertical-align:middle; text-align:center;">Edit | Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($data_dosen as $dosen)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$dosen->nama_dosen}}</td>
                                            @if($dosen->kode_dosen == 'NIP')
                                            <td style="vertical-align:middle;">{{$dosen->nip_nbm_dosen}}</td>
                                            <td style="vertical-align:middle;"></td>
                                            @endif
                                            @if($dosen->kode_dosen == 'NBM')
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;">{{$dosen->nip_nbm_dosen}}</td>
                                            @endif
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{$dosen->id}}"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal{{$dosen->id}}"><i class="mdi mdi-delete"></i></button>
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
                        <h5 class="modal-title">Tambah Data Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/db-dosen/add">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" required name="nama_dosen">
                            </div>
                            <label>NIP / NBM</label>
                            <div class="row">
                                <div class="form-group col-md-9 sm-6">
                                    <input type="text" class="form-control mb-2 mr-sm-2" required name="nip_nbm_dosen">
                                </div>
                                <div class="form-group col-md-3 ml-auto">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" required value="NIP" name="kode_dosen"> NIP</label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="NBM" name="kode_dosen"> NBM</label>
                                    </div>
                                </div>
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
        @foreach($data_dosen as $dosen)
        <div class="modal fade" id="editModal{{$dosen->id}}" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Data Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/db-dosen/edit/{{$dosen->id}}">
                    {{csrf_field()}}
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Nama</label>
                                <input type="text" value="{{$dosen->nama_dosen}}" required="" class="form-control mb-2 mr-sm-2" name="nama_dosen">
                            </div>
                            <label>NIP / NBM</label>
                            <div class="row">
                                <div class="form-group col-md-9 sm-6">
                                    <input type="text" value="{{$dosen->nip_nbm_dosen}}" class="form-control mb-2 mr-sm-2" required name="nip_nbm_dosen">
                                </div>
                                <div class="form-group col-md-3 ml-auto">
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="NIP" required name="kode_dosen" {{ $dosen->kode_dosen == 'NIP' ? 'checked' : '' }}> NIP</label>
                                    </div>
                                    <div class="radio">
                                        <label>
                                            <input type="radio" value="NBM" name="kode_dosen" {{ $dosen->kode_dosen == 'NBM' ? 'checked' : '' }}> NBM</label>
                                    </div>
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
        <!-- Modal Hapus -->
        @foreach($data_dosen as $dosen)
        <div class="modal fade" id="hapusModal{{$dosen->id}}" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Data Dosen</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/db-dosen/delete/{{$dosen->id}}">
                    {{csrf_field()}}
                        <div class="modal-body">
                            Anda yakin ingin menghapus data ini?
                        </div>
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