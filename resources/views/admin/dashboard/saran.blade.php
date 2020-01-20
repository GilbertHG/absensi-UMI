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
                    @error('kepada')
                        <div class="alert alert-danger">{{ $message }}</div>
                    @enderror
                    <div class="card">
                        <div class="card-body">   
                            <h4 class="card-title mdi mdi-image-filter-none f-s-20"> Kirim Pesan</h4>
                                <form method="post" action="/saran/add">
                                {{csrf_field()}}
                                <div class="row">
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Perihal :</label>
                                            <input type="text" class="form-control mb-2 mr-sm-2" required name="judul">
                                        </div>
                                        <div class="form-group align-items-center">
                                            <label>Ditujukan Kepada :</label>
                                            <select class="custom-select mb-2 mr-sm-2" name="kepada">
                                                <option disabled value="" selected>...</option>
                                                @foreach(dropdownds() as $ds)
                                                <option value="{{$ds->nama_dosen}}">{{$ds->nama_dosen}}</option>
                                                @endforeach
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col">
                                        <div class="form-group">
                                            <label>Isi Pesan :</label>
                                            <textarea class="form-control mb-2 mr-sm-2" required style="height:130px;" name="isi"></textarea>
                                        </div>
                                    </div>
                                </div>
                                <input type="hidden" name="nama_pengirim" value="{{auth()->user()->name}}">  
                                <input type="hidden" name="nim" value="{{auth()->user()->username}}">                
                            <div style="text-align:center;">
                            <button type="submit" class="btn btn-primary">Kirim Pesan</button>
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