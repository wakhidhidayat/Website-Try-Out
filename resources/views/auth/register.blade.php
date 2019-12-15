@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">{{ __('Register') }}</div>

                <div class="card-body">
                    <form method="POST" action="{{ route('register') }}" enctype="multipart/form-data">
                        @csrf

                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control{{ $errors->first('nama') ? ' is-invalid' : '' }}" name="nama" value="{{ old('nama') }}" required autofocus>

                                <div class="invalid-feedback">
                                    {{$errors->first('nama')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="tgl_lahir" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control{{ $errors->first('tgl_lahir') ? ' is-invalid' : '' }}" name="tgl_lahir" value="{{ old('tgl_lahir') }}" required autofocus>

                                <div class="invalid-feedback">
                                    {{$errors->first('tgl_lahir')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="foto" class="col-md-4 col-form-label text-md-right">{{ __('Pas Foto') }}</label>

                            <div class="col-md-6">
                                <input id="foto" type="file" class="{{ $errors->first('foto') ? ' is-invalid' : '' }}" name="foto" value="{{ old('foto') }}" required autofocus>

                                <div class="invalid-feedback">
                                    {{$errors->first('foto')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="kelas" class="col-md-4 col-form-label text-md-right">{{ __('Kelas (Tahun lulus bagi alumni)') }}</label>

                            <div class="col-md-6">
                                <input id="kelas" type="text" class="form-control{{ $errors->first('kelas') ? ' is-invalid' : '' }}" name="kelas" value="{{ old('kelas') }}" maxlength="10" required autofocus>

                                <div class="invalid-feedback">
                                    {{$errors->first('kelas')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="no_hp" class="col-md-4 col-form-label text-md-right">{{ __('No Whatsapp') }}</label>

                            <div class="col-md-6">
                                <input id="no_hp" type="text" class="form-control{{ $errors->first('no_hp') ? ' is-invalid' : '' }}" name="no_hp" value="{{ old('no_hp') }}" required autofocus maxlength="20">

                                <div class="invalid-feedback">
                                    {{$errors->first('no_hp')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kelompok') }}</label>

                            <div class="col-md-6">
                                <select name="kelompok" id="name" class="form-control">
                                    <option value="SAINTEK">SAINTEK</option>
                                    <option value="SOSHUM">SOSHUM</option>
                                </select>

                                @if ($errors->has('kelompok'))
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $errors->first('kelompok') }}</strong>
                                    </span>
                                @endif
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="alamat" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="alamat" type="textarea" class="form-control{{ $errors->first('alamat') ? ' is-invalid' : '' }}" name="alamat" value="{{ old('alamat') }}" required autofocus>

                                <div class="invalid-feedback">
                                    {{$errors->first('alamat')}}
                                </div>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="asal_sekolah" class="col-md-4 col-form-label text-md-right">{{ __('Asal Sekolah') }}</label>

                            <div class="col-md-6">
                                <input id="asal_sekolah" type="text" class="form-control{{ $errors->first('asal_sekolah') ? ' is-invalid' : '' }}" name="asal_sekolah" value="{{ old('asal_sekolah') }}" required autofocus>

                                <div class="invalid-feedback">
                                    {{$errors->first('asal_sekolah')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control {{$errors->first('email') ? "is-invalid" : ""}}" name="email" value="{{ old('email') }}" required>

                                <div class="invalid-feedback">
                                    {{$errors->first('email')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password" class="col-md-4 col-form-label text-md-right">{{ __('Password') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control {{$errors->first('password') ? "is-invalid" : ""}}" name="password" required>

                                <div class="invalid-feedback">
                                    {{$errors->first('password')}}
                                </div>

                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="password-confirm" class="col-md-4 col-form-label text-md-right">{{ __('Confirm Password') }}</label>

                            <div class="col-md-6">
                                <input id="password-confirmation" type="password" class="form-control  {{$errors->first('password_confirmation') ? "is-invalid" : ""}}" name="password_confirmation" required>
                            </div>

                            <div class="invalid-feedback">
                                {{$errors->first('password_confirmation')}}
                            </div>

                        </div>

                        <div class="form-group row mb-0">
                            <div class="col-md-6 offset-md-4">
                                <button type="submit" class="btn btn-primary">
                                    {{ __('Register') }}
                                </button>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
