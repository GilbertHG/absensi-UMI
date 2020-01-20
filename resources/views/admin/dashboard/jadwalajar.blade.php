@extends('admin.layouts.master') 
    @section('content')
    <!-- content body -->
    <div class="content-body">
        <div class="container">
            <!-- row -->
            <div class="row">
                <div class="col-12">
                    {{-- @if($message = Session::get('sukses'))
                        <div class="alert alert-success">{{$message}}</div>
                    @endif --}}
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
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Kelas</th>
                                            <th>Hari</th>
                                            <th>Waktu</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($jadwalajar as $data)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$data->kode_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->nama_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->kelas_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->hari_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->jam_mulai}}</td>

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
    @endsection
