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
                    {{-- @error('nip_nbm_dosen')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror --}}
                    <div class="card">
                        <div class="card-body">
                            <div class="float-left"><h4 class="card-title mdi mdi-image-filter-none f-s-20"> Daftar Hadir Mahasiswa</h4></div>
                            <div class="floatright">
                            <div class="table-responsive">
                                <table class="table table-striped table-bordered zero-configuration">
                                    <thead>
                                        <tr>
                                            <th>No.</th>
                                            <th>Kode Mata Kuliah</th>
                                            <th>Nama Mata Kuliah</th>
                                            <th>Kelas</th>
                                            <th>Jumlah Mahasiswa</th>
                                            <th>Aksi</th>
                                            
                                        </tr>
                                    </thead>
                                    <tbody>
                                    <?php $no = 1 ?>
                                    @foreach($daftarhadir as $data)
                                        <tr>
                                            
                                            <td style="vertical-align:middle; text-align:center;">{{$no++}}</td>
                                            <td style="vertical-align:middle;">{{$data->kode_mk}}</td>
                                            <td style="vertical-align:middle;">{{$data->nama_mk}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{$data->kelas_mk}}</td>
                                            <td style="vertical-align:middle; text-align:center;">{{$data->mkmahasiswas->where('id_mk', '=', $data->id)->count()}}</td>
                                            <td style="vertical-align:middle; text-align:center;">
                                            <a href="{{route('persentase',['mk' => $data->id])}}" class="btn btn-secondary btn-sm">Lihat Kelas</a>
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
    @endsection
