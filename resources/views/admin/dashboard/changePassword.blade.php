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
                            <div class="alert alert-danger">{{ $message }}
            </div>
            @enderror --}}
                <div class="card">
                    <div class="card-body">
                        <div class="float-left">
                            <h4 class="card-title mdi mdi-image-filter-none f-s-20"> Ganti Password</h4>
                        </div>
                    </div>
                    <div class="card-body">

                            <div class="panel-body">
                                @if (session('error'))
                                <div class="alert alert-danger">
                                    {{ session('error') }}
                                </div>
                                @endif
                                @if (session('success'))
                                <div class="alert alert-success">
                                    {{ session('success') }}
                                </div>
                                @endif
                                <form class="form-horizontal" method="POST" action="{{ route('changePassword') }}">
                                    {{ csrf_field() }}
                                    <div class="row">
                                        <div class="col form-group{{ $errors->has('current-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="control-label">Password Lama</label>

                                            <div>
                                                <input id="current-password" type="password" class="form-control"
                                                    name="current-password" required>

                                                @if ($errors->has('current-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('current-password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col form-group{{ $errors->has('new-password') ? ' has-error' : '' }}">
                                            <label for="new-password" class="control-label">Password Baru</label>

                                            <div>
                                                <input id="new-password" type="password" class="form-control"
                                                    name="new-password" required>

                                                @if ($errors->has('new-password'))
                                                <span class="help-block">
                                                    <strong>{{ $errors->first('new-password') }}</strong>
                                                </span>
                                                @endif
                                            </div>
                                        </div>

                                        <div class="col form-group">
                                            <label for="new-password-confirm" class="control-label">Ulang Password Baru</label>

                                            <div>
                                                <input id="new-password-confirm" type="password" class="form-control"
                                                    name="new-password_confirmation" required>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="form-group float-right">
                                        <div class="col-md-6 col-md-offset-4">
                                            <button type="submit" class="btn btn-primary">
                                                Ubah Password
                                            </button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        
                    </div>
                </div>
            </div>
        </div>
<!-- #/ container -->
    </div>
@endsection
