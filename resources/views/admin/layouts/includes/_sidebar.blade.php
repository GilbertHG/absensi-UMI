        <!-- sidebar -->
        <div class="nk-sidebar">
            <div class="nk-nav-scroll">
                <div class="nav-text" style="text-align:center; margin-top:10px; border-bottom: 1px solid #f1f1f1; padding-bottom: 5px;">
                    <img src="{{asset('assets/images/unismuh.png')}}" height="100" width="100" alt="">
                    <div style="margin-top:10px;">
                        Aplikasi Monitoring Absensi Univeristas Muhammadiyah Makassar
                    </div>
                </div>
                <div class="col nav-text" style="text-align:center; margin-top:10px; border-bottom: 1px solid #f1f1f1; margin-bottom: 10px;">
                        <form method="post" action="/tahunajaran">
                        {{csrf_field()}}
                        <select onchange="this.form.submit()" name="tahunajaran" class="btn btn-sm btn-outline-primary"><i class="fa fa-angle-down m-l-5"></i>
                        <option class="dropdown-item" value="" style="background-color:white">Tahun Ajaran</option>
                        @foreach(dropdownta() as $dd)
                            @if(Session::get('tahunajaran') == $dd->tahun_ajaran)
                            <option class="dropdown-item" selected value="{{$dd->tahun_ajaran}}" style="background-color:white">{{$dd->tahun_ajaran}}</option>
                            @else
                            <option class="dropdown-item" value="{{$dd->tahun_ajaran}}" style="background-color:white">{{$dd->tahun_ajaran}}</option>
                            @endif
                        @endforeach
                        </select>
                        <input type="hidden" name="url" value="{{Request::segment(1)}}">
                        <noscript><input type="submit" value="Submit"></noscript>
                        </form>
                </div>
                <ul class="metismenu" id="menu">
                    <li><a href="/"><i class=" mdi mdi-view-dashboard"></i> <span class="nav-text">Dashboard</span></a>
                    </li>
                    <li><a class="has-arrow" href="#" aria-expanded="false"><i class="mdi mdi-table"></i> <span class="nav-text">Database</span></a>
                        <ul aria-expanded="false">
                            <li><a href="/db-dosen">Dosen</a>
                            </li>
                            <li><a href="/db-mahasiswa">Mahasiswa</a>
                            </li>
                        </ul>
                    </li>
                    <li><a href="/db-mk"><i class="mdi mdi-clipboard-text"></i> <span class="nav-text">Tambah Mata Kuliah</span></a>
                    </li>
                    <li><a href="/krs-mahasiswa"><i class="mdi mdi-square-edit-outline"></i> <span class="nav-text">KRS Mahasiswa</span></a>
                    </li>
                    <li><a href="/jadwal-ajar"><i class="mdi mdi-calendar-blank"></i> <span class="nav-text">Jadwal Mengajar</span></a>
                    </li>
                    <li><a href="/daftar-hadir"><i class="mdi mdi-checkbox-marked-circle-outline"></i> <span class="nav-text">Daftar Hadir Mahasiswa</span></a>
                    </li>
                    <li><a href="/saran-masuk"><i class="mdi mdi-message-processing"></i> <span class="nav-text">Saran Masuk</span></a>
                    </li>
                    <li><a href="#"><i class="mdi mdi-calendar-blank"></i> <span class="nav-text">Jadwal Mata Kuliah</span></a>
                    </li>
                    <li><a href="/saran"><i class="mdi mdi-message-reply"></i> <span class="nav-text">Saran</span></a>
                    </li>
                    <li><a href="#"><i class="mdi mdi-account-key"></i> <span class="nav-text">Ganti Password</span></a>
                    </li>
                </ul>
            </div>
            <!-- #/ nk nav scroll -->
        </div>
        <!-- #/ sidebar -->