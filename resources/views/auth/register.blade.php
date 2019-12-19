@extends('layouts.app', ['class' => 'bg-default'])

@section('content')
    @include('layouts.headers.guest')

    <div class="container mt--8 pb-5">
        <!-- Table -->
        <div class="row justify-content-center">
            <div class="col-lg-6 col-md-8">
                <div class="card bg-secondary shadow border-0">
                    <!-- <div class="card-header bg-transparent pb-5">
                        <div class="text-muted text-center mt-2 mb-4"><small>{{ __('Sign up with') }}</small></div>
                        <div class="text-center">
                            <a href="#" class="btn btn-neutral btn-icon mr-4">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/github.svg"></span>
                                <span class="btn-inner--text">{{ __('Github') }}</span>
                            </a>
                            <a href="#" class="btn btn-neutral btn-icon">
                                <span class="btn-inner--icon"><img src="{{ asset('argon') }}/img/icons/common/google.svg"></span>
                                <span class="btn-inner--text">{{ __('Google') }}</span>
                            </a>
                        </div>
                    </div> -->
                    <div class="card-body px-lg-5 py-lg-5">
                        <div class="text-center text-muted mb-4">
                            <small>{{ __('Daftar Peserta') }}</small>
                        </div>
                        <form role="form" method="POST" action="{{ route('register') }}">
                            @csrf
                            <!-- nama -->
                            <div class="form-group{{ $errors->has('nama') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('nama') ? ' is-invalid' : '' }}" placeholder="{{ __('Nama') }}" type="text" name="nama" value="{{ old('nama') }}" required autofocus>
                                </div>
                                @if ($errors->has('nama'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('nama') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- end nama -->
                            <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-email-83"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" type="email" name="email" value="{{ old('email') }}" required>
                                </div>
                                @if ($errors->has('email'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group{{ $errors->has('password') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" placeholder="{{ __('Password') }}" type="password" name="password" required>
                                </div>
                                @if ($errors->has('password'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <div class="form-group">
                                <div class="input-group input-group-alternative">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-lock-circle-open"></i></span>
                                    </div>
                                    <input class="form-control" placeholder="{{ __('Confirm Password') }}" type="password" name="password_confirmation" required>
                                </div>
                            </div>
                            <!-- tgl lahir -->
                            <div class="form-group{{ $errors->has('tgl_lahir') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-calendar-grid-58"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('tgl_lahir') ? ' is-invalid' : '' }}" placeholder="{{ __('Tanggal Lahir') }}" type="date" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autofocus>
                                </div>
                                @if ($errors->has('tgl_lahir'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('tgl_lahir') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- end -->
                            <!-- kelas -->
                            <div class="form-group{{ $errors->has('kelas') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-books"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('kelas') ? ' is-invalid' : '' }}" placeholder="{{ __('Kelas (Tahun lulus bagi alumni)') }}" type="text" name="kelas" value="{{ old('kelas') }}" required autofocus>
                                </div>
                                @if ($errors->has('kelas'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('kelas') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- end -->
                            <!-- no wa -->
                            <div class="form-group{{ $errors->has('no_hp') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-send"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('no_hp') ? ' is-invalid' : '' }}" placeholder="{{ __('Nomor Whatsapp') }}" type="text" name="no_hp" value="{{ old('no_hp') }}" required autofocus>
                                </div>
                                @if ($errors->has('no_hp'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('no_hp') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- end -->
                            <!-- kelompok -->
                            <div class="form-group{{ $errors->has('kelompok') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-book-bookmark"></i></span>
                                    </div>
                                    <select class="form-control{{ $errors->has('kelompok') ? ' is-invalid' : '' }}" placeholder="{{ __('Kelompok Ujian') }}" name="kelompok" value="{{ old('kelompok') }}" required autofocus>
                                    <option value="SAINTEK">SAINTEK</option>
                                    <option value="SOSHUM">SOSHUM</option>                                    
                                    </select>
                                </div>
                                @if ($errors->has('kelompok'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('kelompok') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- end -->
                            <!-- alamat -->
                            <div class="form-group{{ $errors->has('alamat') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-square-pin"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('alamat') ? ' is-invalid' : '' }}" placeholder="{{ __('Alamat') }}" type="text" name="alamat" value="{{ old('alamat') }}" required autofocus>
                                </div>
                                @if ($errors->has('alamat'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('alamat') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- end -->
                            <!-- asal -->
                            <div class="form-group{{ $errors->has('asal_sekolah') ? ' has-danger' : '' }}">
                                <div class="input-group input-group-alternative mb-3">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text"><i class="ni ni-hat-3"></i></span>
                                    </div>
                                    <input class="form-control{{ $errors->has('asal_sekolah') ? ' is-invalid' : '' }}" placeholder="{{ __('Asal Sekolah') }}" type="text" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required autofocus>
                                </div>
                                @if ($errors->has('asal_sekolah'))
                                    <span class="invalid-feedback" style="display: block;" role="alert">
                                        <strong>{{ $errors->first('asal_sekolah') }}</strong>
                                    </span>
                                @endif
                            </div>
                            <!-- end -->
                            <div class="row my-4">
                                <div class="col-12">
                                    <div class="custom-control custom-control-alternative custom-checkbox">
                                        <input class="custom-control-input" id="customCheckRegister" type="checkbox">
                                        <label class="custom-control-label" for="customCheckRegister">
                                            <span class="text-muted">{{ __('I agree with the') }} <a href="#!">{{ __('Privacy Policy') }}</a></span>
                                        </label>
                                    </div>
                                </div>
                            </div>
                            <div class="text-center">
                                <button type="submit" class="btn btn-primary mt-4">{{ __('Create account') }}</button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
@endsection
