@extends('layouts.app')

@section('content')
<div class="container">
    <div class="row justify-content-center">
        <div class="col-md-8">
            <div class="card">
                <div class="card-header">Dashboard</div>

                <div class="card-body">
                    @if (session('status'))
                        <div class="alert alert-success" role="alert">
                            {{ session('status') }}
                        </div>
                    @endif
                    <form>
                        @csrf
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('No Pendaftaran') }}</label>
                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ Auth::user()->no_ujian }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="nama" class="col-md-4 col-form-label text-md-right">{{ __('Nama') }}</label>

                            <div class="col-md-6">
                                <input id="nama" type="text" class="form-control" name="nama" value="{{ Auth::user()->nama }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Tanggal Lahir') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="date" class="form-control" name="tgl_lahir" value=" {{ Auth::user()->tgl_lahir }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('No Hp') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="no_hp" value=" {{ Auth::user()->no_hp }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Kelompok') }}</label>
                            <div class="col-md-6">
                                <select name="kelompok" id="name" class="form-control" disabled>
                                    <option value=" {{ Auth::user()->kelompok }}"> {{ Auth::user()->kelompok }}</option>
                                </select>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Alamat') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="textarea" class="form-control" name="alamat" value=" {{ Auth::user()->alamat }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="name" class="col-md-4 col-form-label text-md-right">{{ __('Asal Sekolah') }}</label>

                            <div class="col-md-6">
                                <input id="name" type="text" class="form-control" name="asal_sekolah" value=" {{ Auth::user()->asal_sekolah }}" disabled>
                            </div>
                        </div>

                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('E-Mail Address') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control" name="email" value=" {{ Auth::user()->email }}" disabled>
                            </div>
                        </div>
                        <div class="form-group row">
                            <label for="email" class="col-md-4 col-form-label text-md-right">{{ __('Status Peserta') }}</label>
                            <div class="col-md-6">
                                <div class="alert alert-danger" role="alert">
                                {{ Auth::user()->status }}
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
