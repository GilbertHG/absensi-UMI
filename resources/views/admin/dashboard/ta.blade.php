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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Tahun Ajaran</h4></div>
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
                                            <th>Tahun Ajaran</th>
                                            <th style="vertical-align:middle; text-align:center;">Edit | Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">1.</td>
                                            <td style="vertical-align:middle;">Customer Support</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal"><i class="mdi mdi-delete"></i></button>
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
                        <h5 class="modal-title">Tambah Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-primary">Tambah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
        <!-- Modal Edit -->
        <div class="modal fade" id="editModal" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Edit Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            <div class="form-group">
                                <label>Tahun Ajaran</label>
                                <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                            </div>
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-secondary">Ubah Data</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
                <!-- Modal Hapus -->
        <div class="modal fade" id="hapusModal" style="margin-top: 50px;">
            <div class="modal-dialog" role="document">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title">Hapus Tahun Ajaran</h5>
                        <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                        </button>
                    </div>
                    <form>
                        <div class="modal-body">
                            Anda yakin ingin menghapus data ini?
                        </div>
                        <div class="modal-footer">
                            <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                            <button type="button" class="btn btn-danger">Hapus</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    @endsection