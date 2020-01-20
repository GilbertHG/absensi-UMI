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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Pesan Masuk</h4></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Perihal</th>
                                            <th>Isi Pesan</th>
                                            <th>Nama / NIM Pengirim</th>
                                            <th style="vertical-align:middle; text-align:center;">Baca</th>
                                            <th style="vertical-align:middle; text-align:center;">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($data_saran as $saran)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$saran->judul}}</td>
                                            <td style="vertical-align:middle;">{{ Str::limit($saran->isi, 100, ' .....')}}</td>
                                            <td style="vertical-align:middle;">{{$saran->nama_pengirim}} / {{$saran->nim}}</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#readModal{{$saran->id}}"><i class="mdi mdi-email-open"></i> Baca</button>
                                            </td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal{{$saran->id}}"><i class="mdi mdi-delete"></i></button>
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
        <!-- Modal Read -->
        @foreach($data_saran as $saran)
        <div class="modal fade" id="readModal{{$saran->id}}" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Perihal</label>
                                <input type="text" value="{{$saran->judul}}" style="font-size:14px;" class="form-control mb-2 mr-sm-2" disabled name="">
                            </div>
                            <div class="form-group">
                                <label>Isi Pesan</label>
                                <textarea class="form-control mb-2 mr-sm-2" style="font-size:14px;height:250px;" disabled>{{$saran->isi}}</textarea>
                            </div>
                            <div class="form-group">
                                <label>Nama / Nim Pengirim</label>
                                <input type="text" style="font-size:14px;" value="{{$saran->nama_pengirim}} / {{$saran->nim}}" class="form-control mb-2 mr-sm-2" disabled name="">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        @endforeach
        <!-- Modal Hapus -->
        @foreach($data_saran as $saran)
        <div class="modal fade" id="hapusModal{{$saran->id}}" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Pesan</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form method="post" action="/saran-masuk/delete/{{$saran->id}}">
                    {{csrf_field()}}
                        <div class="modal-body">
                            Anda yakin ingin menghapus pesan ini?
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