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
                                <div class="col-8 table-responsive" style="margin:auto;">
                                    <table class="table table-hover">
                                            <tr>
                                                <td>Kode Mata Kuliah</td>
                                                <td>: 213132</td>
                                            </tr>
                                            <tr>
                                                <td>Nama Mata Kuliah</td>
                                                <td>: kecerdasan buatan</td>
                                            </tr>
                                            <tr class="border-bottom-1">
                                                <td>Kelas</td>
                                                <td>: A</td>
                                            </tr>
                                    </table>
                                </div>
                                <!-- /# card -->
                            <!-- /# column -->
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Pertemuan</th>
                                            <th>Tanggal</th>
                                            <th>Keterangan</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">1.</td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;"></td>
                                            <td style="vertical-align:middle;">Hadir</td>
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