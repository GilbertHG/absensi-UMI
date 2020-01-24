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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Jadwal Mata Kuliah</h4></div>
                            <!-- /# column -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col table-responsive" style="margin:auto;">
                                    <table class="table table-hover">
                                            <tr>
                                                <td>Nama</td>
                                                <td>: herul</td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>: </td>
                                            </tr>
                                            <tr class="border-bottom-1">
                                                <td>Konsentrasi</td>
                                                <td>: </td>
                                            </tr>
                                    </table>
                                </div>
                                <div class="col-3 img-profile" style="margin:auto;">
                                    <img src="{{asset('assets/images/member/5.jpg')}}" class="rounded" style="max-height: 170px; max-width: 130px;" alt="">
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Kelas</th>
                                            <th>Hari</th>
                                            <th>Nama Dosen</th>
                                            <th>Waktu</th>
                                            <th style="vertical-align:middle; text-align:center;">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">1.</td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <button type="button" class="btn btn-primary btn-sm" onclick="window.location.href='/kehadiran'">Lihat Kehadiran</i></button>
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