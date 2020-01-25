 @extends('admin.layouts.master')  
        @section('content')
        <!-- content body -->
        <div class="content-body">
            <div class="container">
                <div class="card">
                    <div class="card-body">
                        <div class="float-left"><h4 class="card-title mdi mdi-human-greeting f-s-25"> Selamat Datang</h4></div>
                    </div>
                    <!-- profile -->
                    @if(auth()->user()->role == 'Mahasiswa')
                    <div class="card-body" style="padding-bottom:60px;">
                        <div class="text-center container-profile">
                            <img src="{{asset('storage/profil_images/'.userMahasiswa()->foto_mahasiswa)}}" class="rounded-circle m-t-15 w-75px" style="width:130px; height:130px; object-fit: cover;object-position: top;" alt="">
                            <h4 class="m-t-15 m-b-2">{{userMahasiswa()->nama_mahasiswa}}</h4>
                            <p class="text-muted">Mahasiswa</p>
                            <div class="row" style="margin:auto;">
                                <div class="col-12 border-bottom-1 p-t-10 p-b-10"><span class="pull-left f-w-600">NIM :</span> <span class="pull-right">{{userMahasiswa()->nim_mahasiswa}}</span>
                                </div>
                                <div class="col-12 p-t-10 p-b-10"><span class="pull-left f-w-600">Konsetrasi :</span> <span class="pull-right">{{userMahasiswa()->konsentrasi_mahasiswa}}</span>
                                </div>
                            </div>
                        </div>
                    </div>
                    @elseif(auth()->user()->role == 'Dosen')
                    <div class="card-body" style="padding-bottom:60px;">
                        <div class="text-center container-profile">
                            <img src="{{asset('assets/images/default.png')}}" class="rounded-circle m-t-15 w-75px" style="width:130px" alt="">
                            <h4 class="m-t-15 m-b-2">{{userDosen()->nama_dosen}}</h4>
                            <p class="text-muted" style="margin-bottom: 0px !important;">Dosen</p>
                            <p class="text-muted">
                                @if(userDosen()->kode_dosen == 'NIP')
                                NIP : {{userDosen()->nip_nbm_dosen}}
                                @else
                                NBM : {{userDosen()->nip_nbm_dosen}}
                                @endif
                            </p>
                        </div>
                    </div>
                    @elseif(auth()->user()->role == 'Admin')
                    <div class="card-body" style="padding-bottom:60px;">
                        <div class="text-center container-profile">
                            <img src="{{asset('assets/images/default.png')}}" class="rounded-circle m-t-15 w-75px" style="width:130px;" alt="">
                            <h4 class="m-t-15 m-b-2">{{auth()->user()->name}}</h4>
                            <p class="text-muted" style="margin-bottom: 0px !important;">Admin</p>
                            <p class="text-muted">Username : {{auth()->user()->username}}</p>
                        </div>
                    </div>
                    @endif
                </div>
            </div>
            <!-- #/ container -->
        </div>
        <!-- #/ content body -->
@endsection