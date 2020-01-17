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
                            <h4 class="card-title mdi mdi-image-filter-none f-s-20"> Data Mata Kuliah</h4>
                                <div style="margin-right:30px; margin-left:30px;">
                                    <div class="float-left">
                                        <button type="button" onclick="window.location.href='/tahun-ajaran'" class="btn btn-outline-dark float-lift">Tambah Tahun Ajaran</button>
                                    </div>
                                    <div class="bootstrap-modal">
                                            <!-- Button trigger modal -->
                                            <button type="button" class="btn btn-outline-primary float-right" data-toggle="modal" data-target="#tambahModal">Tambah Mata Kuliah</button>
                                    </div>
                                </div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama</th>
                                            <th>Kelas</th>
                                            <th>Hari</th>
                                            <th>waktu</th>
                                            <th>Dosen</th>
                                            <th style="vertical-align:middle; text-align:center;">Edit | Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">1.</td>
                                            <td style="vertical-align:middle;">Customer Support</td>
                                            <td style="vertical-align:middle;">New York</td>
                                            <td style="vertical-align:middle;">A</td>
                                            <td style="vertical-align:middle;">Senin</td>
                                            <td style="vertical-align:middle;">12.00-13.00</td>
                                            <td style="vertical-align:middle;">dosen</td>
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
                    <h5 class="modal-title">Tambah Data Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                        </div>
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Kelas</label>
                                    <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>...</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="4">D</option>
                                        <option value="5">E</option>
                                        <option value="6">F</option>
                                        <option value="7">G</option>
                                        <option value="8">H</option>
                                        <option value="9">I</option>
                                        <option value="10">J</option>
                                        <option value="11">K</option>
                                        <option value="12">L</option>
                                        <option value="13">M</option>
                                        <option value="14">N</option>
                                        <option value="15">O</option>
                                        <option value="16">P</option>
                                        <option value="17">Q</option>
                                        <option value="18">R</option>
                                        <option value="19">S</option>
                                        <option value="20">T</option>
                                        <option value="21">U</option>
                                        <option value="22">V</option>
                                        <option value="23">W</option>
                                        <option value="24">X</option>
                                        <option value="25">Y</option>
                                        <option value="26">Z</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Hari</label>
                                    <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>...</option>
                                        <option value="1">Senin</option>
                                        <option value="2">Selasa</option>
                                        <option value="3">Rabu</option>
                                        <option value="4">Kamis</option>
                                        <option value="5">Jumat</option>
                                        <option value="6">Sabtu</option>
                                        <option value="7">Minggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-8 col-sm-6">
                                <label>Waktu Mulai</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="00.00"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 ml-auto">
                                <label>Waktu Berakhir</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="00.00"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <label>Nama Dosen</label>
                                <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>...</option>
                                    <option value="1">Prof. Dr. </option>
                                </select>
                            </div>
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
                    <h5 class="modal-title">Edit Data Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form>
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                        </div>
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" id="inlineFormInputName2">
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Kelas</label>
                                    <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>...</option>
                                        <option value="1">A</option>
                                        <option value="2">B</option>
                                        <option value="3">C</option>
                                        <option value="4">D</option>
                                        <option value="5">E</option>
                                        <option value="6">F</option>
                                        <option value="7">G</option>
                                        <option value="8">H</option>
                                        <option value="9">I</option>
                                        <option value="10">J</option>
                                        <option value="11">K</option>
                                        <option value="12">L</option>
                                        <option value="13">M</option>
                                        <option value="14">N</option>
                                        <option value="15">O</option>
                                        <option value="16">P</option>
                                        <option value="17">Q</option>
                                        <option value="18">R</option>
                                        <option value="19">S</option>
                                        <option value="20">T</option>
                                        <option value="21">U</option>
                                        <option value="22">V</option>
                                        <option value="23">W</option>
                                        <option value="24">X</option>
                                        <option value="25">Y</option>
                                        <option value="26">Z</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Hari</label>
                                    <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                        <option selected>...</option>
                                        <option value="1">Senin</option>
                                        <option value="2">Selasa</option>
                                        <option value="3">Rabu</option>
                                        <option value="4">Kamis</option>
                                        <option value="5">Jumat</option>
                                        <option value="6">Sabtu</option>
                                        <option value="7">Minggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-8 col-sm-6">
                                <label>Waktu Mulai</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="00.00"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 ml-auto">
                                <label>Waktu Berakhir</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="00.00"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <label>Nama Dosen</label>
                                <select class="custom-select mb-2 mr-sm-2" id="inlineFormCustomSelect">
                                    <option selected>...</option>
                                    <option value="1">Prof. Dr. </option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-warning" data-dismiss="modal">Batal</button>
                        <button type="button" class="btn btn-secondary">Tambah Data</button>
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
                    <h5 class="modal-title">Hapus Mata Kuliah</h5>
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