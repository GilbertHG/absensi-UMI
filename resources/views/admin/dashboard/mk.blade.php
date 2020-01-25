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
                    @error('dosen_mk')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('kelas_mk')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    @error('hari_mk')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
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
                                            <th>Ruangan</th>
                                            <th>waktu</th>
                                            <th>Dosen</th>
                                            <th style="vertical-align:middle; text-align:center;">Edit | Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($data_mataKuliah as $mataKuliah)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$mataKuliah->kode_mk}}</td>
                                            <td style="vertical-align:middle;">{{$mataKuliah->nama_mk}}</td>
                                            <td style="vertical-align:middle;">{{$mataKuliah->kelas_mk}}</td>
                                            <td style="vertical-align:middle;">{{$mataKuliah->hari_mk}}</td>
                                            <td style="vertical-align:middle;">{{$mataKuliah->ruangan_mk}}</td>
                                            <td style="vertical-align:middle;">{{\Carbon\Carbon::parse($mataKuliah->jam_mulai)->format('H:i')}} - {{\Carbon\Carbon::parse($mataKuliah->jam_selesai)->format('H:i')}}</td>
                                            <td style="vertical-align:middle;">{{$mataKuliah->dosen_mk}}</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal{{$mataKuliah->id}}"><i class="mdi mdi-lead-pencil"></i></button>
                                                <button type="button" class="btn btn-danger btn-sm" data-toggle="modal" data-target="#hapusModal{{$mataKuliah->id}}"><i class="mdi mdi-delete"></i></button>
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
                    <h5 class="modal-title">Tambah Data Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/db-mk/add">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" required name="kode_mk">
                        </div>
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" required name="nama_mk">
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Kelas</label>
                                    <select class="custom-select mb-2 mr-sm-2" name="kelas_mk">
                                        <option disabled selected>...</option>
                                        <option value="A">A</option>
                                        <option value="B">B</option>
                                        <option value="C">C</option>
                                        <option value="D">D</option>
                                        <option value="E">E</option>
                                        <option value="F">F</option>
                                        <option value="G">G</option>
                                        <option value="H">H</option>
                                        <option value="I">I</option>
                                        <option value="J">J</option>
                                        <option value="K">K</option>
                                        <option value="L">L</option>
                                        <option value="M">M</option>
                                        <option value="N">N</option>
                                        <option value="O">O</option>
                                        <option value="P">P</option>
                                        <option value="Q">Q</option>
                                        <option value="R">R</option>
                                        <option value="S">S</option>
                                        <option value="T">T</option>
                                        <option value="U">U</option>
                                        <option value="V">V</option>
                                        <option value="W">W</option>
                                        <option value="X">X</option>
                                        <option value="Y">Y</option>
                                        <option value="Z">Z</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Hari</label>
                                    <select class="custom-select mb-2 mr-sm-2" name="hari_mk">
                                        <option disabled selected>...</option>
                                        <option value="Senin">Senin</option>
                                        <option value="Selasa">Selasa</option>
                                        <option value="Rabu">Rabu</option>
                                        <option value="Kamis">Kamis</option>
                                        <option value="Jumat">Jumat</option>
                                        <option value="Sabtu">Sabtu</option>
                                        <option value="Minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Ruangan</label>
                                    <input type="text" name="ruangan_mk" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-8 col-sm-6">
                                <label>Waktu Mulai</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="00.00" name="jam_mulai"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 ml-auto">
                                <label>Waktu Berakhir</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="00.00" name="jam_selesai"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <label>Nama Dosen</label>
                                <select class="custom-select mb-2 mr-sm-2" name="dosen_mk">
                                    <option disabled selected>...</option>
                                    @foreach(dropdownds() as $ds)
                                    <option value="{{$ds->nama_dosen}}">{{$ds->nama_dosen}}</option>
                                    @endforeach
                                </select>
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
    @foreach($data_mataKuliah as $mataKuliah)
    <div class="modal fade" id="editModal{{$mataKuliah->id}}" style="margin-top: 50px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Edit Data Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/db-mk/edit/{{$mataKuliah->id}}">
                {{csrf_field()}}
                    <div class="modal-body">
                        <div class="form-group">
                            <label>Kode Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" name="kode_mk" required value="{{$mataKuliah->kode_mk}}">
                        </div>
                        <div class="form-group">
                            <label>Nama Mata Kuliah</label>
                            <input type="text" class="form-control mb-2 mr-sm-2" required name="nama_mk" value="{{$mataKuliah->nama_mk}}">
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Kelas</label>
                                    <select class="custom-select mb-2 mr-sm-2" name="kelas_mk">
                                        <option disabled selected>...</option>
                                        <option @if($mataKuliah->kelas_mk == 'A') selected @endif value="A">A</option>
                                        <option @if($mataKuliah->kelas_mk == 'B') selected @endif value="B">B</option>
                                        <option @if($mataKuliah->kelas_mk == 'C') selected @endif value="C">C</option>
                                        <option @if($mataKuliah->kelas_mk == 'D') selected @endif value="D">D</option>
                                        <option @if($mataKuliah->kelas_mk == 'E') selected @endif value="E">E</option>
                                        <option @if($mataKuliah->kelas_mk == 'F') selected @endif value="F">F</option>
                                        <option @if($mataKuliah->kelas_mk == 'G') selected @endif value="G">G</option>
                                        <option @if($mataKuliah->kelas_mk == 'H') selected @endif value="H">H</option>
                                        <option @if($mataKuliah->kelas_mk == 'I') selected @endif value="I">I</option>
                                        <option @if($mataKuliah->kelas_mk == 'J') selected @endif value="J">J</option>
                                        <option @if($mataKuliah->kelas_mk == 'K') selected @endif value="K">K</option>
                                        <option @if($mataKuliah->kelas_mk == 'L') selected @endif value="L">L</option>
                                        <option @if($mataKuliah->kelas_mk == 'M') selected @endif value="M">M</option>
                                        <option @if($mataKuliah->kelas_mk == 'N') selected @endif value="N">N</option>
                                        <option @if($mataKuliah->kelas_mk == 'O') selected @endif value="O">O</option>
                                        <option @if($mataKuliah->kelas_mk == 'P') selected @endif value="P">P</option>
                                        <option @if($mataKuliah->kelas_mk == 'Q') selected @endif value="Q">Q</option>
                                        <option @if($mataKuliah->kelas_mk == 'R') selected @endif value="R">R</option>
                                        <option @if($mataKuliah->kelas_mk == 'S') selected @endif value="S">S</option>
                                        <option @if($mataKuliah->kelas_mk == 'T') selected @endif value="T">T</option>
                                        <option @if($mataKuliah->kelas_mk == 'U') selected @endif value="U">U</option>
                                        <option @if($mataKuliah->kelas_mk == 'V') selected @endif value="V">V</option>
                                        <option @if($mataKuliah->kelas_mk == 'W') selected @endif value="W">W</option>
                                        <option @if($mataKuliah->kelas_mk == 'X') selected @endif value="X">X</option>
                                        <option @if($mataKuliah->kelas_mk == 'Y') selected @endif value="Y">Y</option>
                                        <option @if($mataKuliah->kelas_mk == 'Z') selected @endif value="Z">Z</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Hari</label>
                                    <select class="custom-select mb-2 mr-sm-2" name="hari_mk">
                                        <option disabled selected>...</option>
                                        <option @if($mataKuliah->hari_mk == 'Senin') selected @endif value="Senin">Senin</option>
                                        <option @if($mataKuliah->hari_mk == 'Selasa') selected @endif value="Selasa">Selasa</option>
                                        <option @if($mataKuliah->hari_mk == 'Rabu') selected @endif value="Rabu">Rabu</option>
                                        <option @if($mataKuliah->hari_mk == 'Kamis') selected @endif value="Kamis">Kamis</option>
                                        <option @if($mataKuliah->hari_mk == 'Jumat') selected @endif value="Jumat">Jumat</option>
                                        <option @if($mataKuliah->hari_mk == 'Sabtu') selected @endif value="Sabtu">Sabtu</option>
                                        <option @if($mataKuliah->hari_mk == 'Minggu') selected @endif value="Minggu">Minggu</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <div class="col-auto my-1">
                                    <label>Ruangan</label>
                                    <input value="{{$mataKuliah->ruangan_mk}}" type="text" name="ruangan_mk" class="form-control">
                                </div>
                            </div>
                        </div>
                        <div class="row">
                            <div class="form-group col-8 col-sm-6">
                                <label>Waktu Mulai</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($mataKuliah->jam_mulai)->format('H:i')}}" name="jam_mulai"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                            <div class="form-group col-md-6 ml-auto">
                                <label>Waktu Berakhir</label>
                                <div class="input-group clockpicker" data-placement="top" data-align="top" data-autoclose="true">
                                    <input type="text" class="form-control" value="{{\Carbon\Carbon::parse($mataKuliah->jam_selesai)->format('H:i')}}" name="jam_selesai"> <span class="input-group-append"><span class="input-group-text"><i class="fa fa-clock-o"></i></span></span>
                                </div>
                            </div>
                        </div>
                        <div class="form-group">
                            <div class="form-row align-items-center">
                                <label>Nama Dosen</label>
                                <select class="custom-select mb-2 mr-sm-2" name="dosen_mk">
                                    <option disabled selected>...</option>
                                    @foreach(dropdownds() as $ds)
                                    <option @if($mataKuliah->dosen_mk == $ds->nama_dosen) selected @endif value="{{$ds->nama_dosen}}">{{$ds->nama_dosen}}</option>
                                    @endforeach
                                </select>
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
    @foreach($data_mataKuliah as $mataKuliah)
    <div class="modal fade" id="hapusModal{{$mataKuliah->id}}" style="margin-top: 50px;">
        <div class="modal-dialog" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title">Hapus Mata Kuliah</h5>
                    <button type="button" class="close" data-dismiss="modal"><span>&times;</span>
                    </button>
                </div>
                <form method="post" action="/db-mk/delete/{{$mataKuliah->id}}">
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