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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> KRS Mahasiswa</h4></div>
                            <!-- /# column -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col-8 table-responsive" style="margin:auto;">
                                    <table class="table table-hover">
                                            <tr>
                                                <td>Nama</td>
                                                <td>: Bayu</td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>: 12345678</td>
                                            </tr>
                                            <tr class="border-bottom-1">
                                                <td>Konsentrasi</td>
                                                <td>: </td>
                                            </tr>
                                    </table>
                                </div>
                                <div class="col-2" style="margin:auto;">
                                    <img src="../../assets/images/users/2.jpg" class="rounded" style="height: 170px; width: 130px;" alt="">
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
                                            <th>Tahun Ajaran</th>
                                            <th>Nama Dosen</th>
                                            <th>Waktu</th>
                                            <th style="vertical-align:middle; text-align:center;">Hapus</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">1.</td>
                                            <td style="vertical-align:middle;">12313124</td>
                                            <td style="vertical-align:middle;">Customer Support</td>
                                            <td style="vertical-align:middle;">A</td>
                                            <td style="vertical-align:middle;">Awal 2019/2020</td>
                                            <td style="vertical-align:middle;">Customer Support</td>
                                            <td style="vertical-align:middle;">19.00-19.00</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <input type="checkbox" aria-label="Checkbox for following text input">
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row float-right" style="margin-top:20px;">
                                <button type="button" class="col btn btn-outline-danger" style="margin-right:10px;">Batal</button>
                                <button type="button" class="col btn btn-outline-primary" style="margin-right:40px;">Tambah</button>
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