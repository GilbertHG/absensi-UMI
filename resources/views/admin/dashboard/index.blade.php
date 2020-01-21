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
                    <div class="card-body" style="padding-bottom:60px;">
                        <div class="text-center">
                            <img src="../../assets/images/users/2.jpg" class="rounded-circle m-t-15 w-75px  text-center" alt="">
                            <h4 class="m-t-15 m-b-2">Paul Custard</h4>
                            <p class="text-muted">Mahasiswa</p>
                            <div class="row col-5" style="margin:auto;">
                                <div class="col-12 border-bottom-1 p-t-10 p-b-10"><span class="pull-left f-w-600">NIM :</span> <span class="pull-right">D121171501</span>
                                </div>
                                <div class="col-12 p-t-10 p-b-10"><span class="pull-left f-w-600">Konsetrasi :</span> <span class="pull-right">Iot</span>
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