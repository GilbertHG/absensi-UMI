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
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Tambah KRS Mahasiswa</h4></div>
                            <!-- /# column -->
                        </div>
                        <div class="card-body">
                            <div class="row">
                                <div class="col table-responsive" style="margin:auto;">
                                    <table class="table table-hover">
                                            <tr>
                                                <td>Nama</td>
                                                <td>: {{$mahasiswa->nama_mahasiswa}}</td>
                                            </tr>
                                            <tr>
                                                <td>NIM</td>
                                                <td>: {{$mahasiswa->nim_mahasiswa}}</td>
                                            </tr>
                                            <tr class="border-bottom-1">
                                                <td>Konsentrasi</td>
                                                <td>: {{$mahasiswa->konsentrasi_mahasiswa}}</td>
                                            </tr>
                                    </table>
                                </div>
                                <div class="col-3 img-profile" style="margin:auto;">
                                    <img src="{{asset('storage/profil_images/'.$mahasiswa->foto_mahasiswa)}}" class="rounded" style="max-height: 170px; max-width: 130px;" alt="">
                                </div>
                                <!-- /# card -->
                            </div>
                            <!-- /# column -->
                            <div class="table-responsive">
                            <form method="post" action="/isi-krs-mahasiswa/add">
                            {{csrf_field()}}
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th style="vertical-align:middle;">No.</th>
                                            <th style="vertical-align:middle;">Kode Mata Kuliah</th>
                                            <th style="vertical-align:middle;">Nama Mata Kuliah</th>
                                            <th style="vertical-align:middle;">Kelas</th>
                                            <th style="vertical-align:middle;">Ruangan</th>
                                            <th style="vertical-align:middle;">Nama Dosen</th>
                                            <th style="vertical-align:middle;">Waktu</th>
                                            <th style="vertical-align:middle; text-align:center;">Pilih</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php $no = 1 ?>
                                        @foreach($matkul as $data)
                                        <tr>
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$data->kode_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->nama_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->kelas_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->ruangan_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->dosen_mk}}</td>
                                            <td style="vertical-align:middle;">{{\Carbon\Carbon::parse($data->jam_mulai)->format('H:i')}} - {{\Carbon\Carbon::parse($data->jam_selesai)->format('H:i')}}</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                                <input type="checkbox" name="mataKuliah[]" value="{{$data->id}}" aria-label="Checkbox for following text input">
                                                <input type="hidden" value="{{$mahasiswa->id}}" name="id_mahasiswa">
                                            </td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                            </div>
                            <div class="row float-right" style="margin-top:20px;">
                                <button type="button" onclick="window.location.href='/data-krs-mahasiswa/{{$mahasiswa->id}}'" class="col btn btn-outline-danger" style="margin-right:10px;">Batal</button>
                                <button type="submit" class="col btn btn-outline-primary" style="margin-right:40px;">Tambah</button>
                            </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <!-- #/ container -->
    </div>
    <!-- #/ content body -->
    @endsection