        <!-- sidebar -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <div class="nav-text" style="text-align:center; margin-top:10px; border-bottom: 1px solid #bd5056; padding-bottom: 5px;">
                    <img src="{{asset('assets/images/unismuh.png')}}" height="100" width="100" alt="">
                    <div class="clr-w" style="margin-top:10px;">
                        Aplikasi Monitoring Absensi dan Activity Control Fakultas Teknik Univeristas Muhammadiyah Makassar
                    </div>
                </div>
                <div class="col nav-text" style="text-align:center; margin-top:10px; margin-bottom: 10px; border-bottom: 1px solid #bd5056;">
                        <form style="margin-bottom: 10px;" method="post" action="/tahunajaran">
                        {{csrf_field()}}
                        <select onchange="this.form.submit()" name="tahunajaran" class="btn btn-sm btn-outline-light"><i class="fa fa-angle-down m-l-5"></i>
                            @if(Session::get('tahunajaran') == 'kosong')
                            <option class="dropdown-item" selected disabled value="" style="background-color:white">-----</option>
                            @endif
                        @foreach(dropdownta() as $dd)
                            @if(Session::get('tahunajaran') == $dd->tahun_ajaran)
                            <option class="dropdown-item" selected value="{{$dd->tahun_ajaran}}" style="background-color:white">{{$dd->tahun_ajaran}}</option>
                            @else
                            <option class="dropdown-item" value="{{$dd->tahun_ajaran}}" style="background-color:white">{{$dd->tahun_ajaran}}</option>
                            @endif
                        @endforeach
                        </select>
                        @if(request()->is('/'))
                        <input type="hidden" name="url" value="{{Request::segment(1)}}">
                        @else
                        <input type="hidden" name="url" value="{{Request::segment(1)}}/{{Request::segment(2)}}">
                        @endif
                        <noscript><input type="submit" value="Submit"></noscript>
                        </form>
                </div>
                <ul class="metismenu" id="menu">
                    <li><a href="/"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Dashboard</span></a>
                    </li>
                    @if(auth()->user()->role == 'Admin')
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-table"></i> <span class="nav-text">Database</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/db-dosen">Dosen</a>
                            </li>
                            <li><a href="/db-mahasiswa">Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
                    <li class="{{ (request()->is('tahun-ajaran*')) ? 'active' : '' }}"><a href="/db-mk"><i class="mdi mdi-clipboard-text"></i> <span class="nav-text">Tambah Mata Kuliah</span></a>
                    </li>
                    <li class="{{ (request()->is('data-krs-mahasiswa*')) || (request()->is('isi-krs-mahasiswa*'))  ? 'active' : '' }}"><a href="/krs-mahasiswa"><i class="mdi mdi-square-edit-outline"></i> <span class="nav-text">KRS Mahasiswa</span></a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'Dosen')
                    <li class="{{(request()->is('file-kuliah*')) ? 'active' : '' }}"><a href="/jadwal-ajar"><i class="mdi mdi-calendar-blank"></i> <span class="nav-text">Jadwal Mengajar</span></a>
                    </li>
                    <li class="{{(request()->is('daftar-hadir*')) || (request()->is('kehadiran*')) ? 'active' : '' }}"><a href="/daftar-hadir"><i class="mdi mdi-checkbox-marked-circle-outline"></i> <span class="nav-text">Daftar Hadir Mahasiswa</span></a>
                    </li>
                    <li><a href="/saran-masuk"><i class="mdi mdi-message-processing"></i> <span class="nav-text">Saran Masuk</span></a>
                    </li>
                    @endif
                    @if(auth()->user()->role == 'Mahasiswa')
                    <li class="{{(request()->is('kehadiran*')) || (request()->is('file-kuliah*')) ? 'active' : '' }}"><a href="/jadwal-mata-kuliah"><i class="mdi mdi-calendar-blank"></i> <span class="nav-text">Jadwal Mata Kuliah</span></a>
                    </li>
                    <li><a href="/saran"><i class="mdi mdi-message-reply"></i> <span class="nav-text">Saran</span></a>
                    </li>
                    @endif
                    <li><a href="/gantiPassword"><i class="mdi mdi-account-key"></i> <span class="nav-text">Ganti Password</span></a>
                    </li>
                </ul>
            </div>
            <!-- #/ nk nav scroll -->
        </div>
        <!-- #/ sidebar -->