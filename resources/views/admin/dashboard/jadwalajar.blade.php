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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Jadwal Mengajar</h4></div>
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Kelas</th>
                                            <th>Ruangan</th>
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
                                            <td style="vertical-align:middle;text-align:center;">{{$data->kelas_mk}}</td>
                                            <td style="vertical-align:middle;text-align:center;">{{$data->ruangan_mk}}</td>
                                            <td style="vertical-align:middle;text-align:center;">{{$data->hari_mk}}</td>
                                            <td style="vertical-align:middle;text-align:center;">{{\Carbon\Carbon::parse($data->jam_mulai)->format('H:i')}} - {{\Carbon\Carbon::parse($data->jam_selesai)->format('H:i')}}</td>

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
