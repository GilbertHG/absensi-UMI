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
                            <!-- /# card -->
                            <!-- /# column -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align:middle; text-align:center;">No.</th>
                                            <th style="vertical-align:middle; text-align:center;">Pertemuan</th>
                                            <th style="vertical-align:middle; text-align:center;">Tanggal Kuliah</th>
                                            <th style="vertical-align:middle; text-align:center;">Status</th>
                                            @if(auth()->user()->role == 'Dosen')
                                            <th style="vertical-align:middle; text-align:center;">Ubah</th>
                                            @endif
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
                                                <button type="button" class="btn btn-secondary btn-sm" data-toggle="modal" data-target="#editModal"><i class="mdi mdi-lead-pencil"></i></button>
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
    @endsection