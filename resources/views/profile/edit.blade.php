@extends('layouts.app', ['title' => __('User Profile')])

@section('content')
    @include('users.partials.header', [
        'title' => __('Hello, ') . ''. auth()->user()->nama
    ])

    <div class="container-fluid mt--7">
        <div class="row">
            <div class="col-xl-4 order-xl-2 mb-5 mb-xl-0">
                <div class="card card-profile shadow">
                    <div class="text-center card-body pt-0 pt-md-4">
                        <div class="text-center">
                            @if (Auth::user()->status == "VERIFIED")
                            <p>{{ __('Peserta Terverifikasi') }}</p>
                            <hr class="my-4" />
                                {!! QrCode::size(250)->generate(Auth::user()->no_ujian); !!}
                                <div class="alert alert-success" role="alert">
                                {{ Auth::user()->status }}
                                </div>
                                <a href="{{ route('print') }}">
                                <button class="btn btn-icon btn-3 btn-primary" type="button">
                                    <span class="btn-inner--icon"><i class="ni ni-bag-17"></i></span>
                                    <span class="btn-inner--text">Cetak Kartu Peserta</span>
                                </button>
                                </a>
                            @else
                            <p>{{ __('Menunggu Pembayaran') }}</p>

                            <hr class="my-4" />
                                <div class="alert alert-danger" role="alert">
                                {{ Auth::user()->status }}
                                </div>
                            @endif
                            @if (Auth::user()->status != "VERIFIED")
                            @if (session('status'))
                                <div class="alert alert-success alert-dismissible fade show" role="alert">
                                    {{ session('status') }}
                                    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                        <span aria-hidden="true">&times;</span>
                                    </button>
                                </div>
                            @endif
                            <form action="" method="POST" enctype="multipart/form-data">
                                @csrf
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="bukti_bayar">{{ __('Upload Bukti Pembayaran') }}</label>
                                    <input type="file" name="bukti_bayar" id="bukti_bayar" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Bukti Pembayaran') }}">
                                </div>
                                <button type="submit" class="btn btn-primary">
                                        Upload
                                    </button>
                                </form>
                                <span> <br> Pembayaran dilakukan dengan transfer sebesar <b>Rp. 40.000</b>
                                <br>ke nomor rekening :
                                        <b>
                                        <br> BNI : 0887207347
                                        <br> </b>Atas Nama : <b>Apresia Dwiyunita</b>
                                        <br> Maksimal Pembayaran <b>18 Januari 2020 Pukul 23:59</b>
                                        <br> Upload Bukti Pembayaran untuk <b>Verifikasi </b></span> <br>
                                        <br> For further information, contact(choose one):
                                        <br>
                                            <b>Monika</b> <br>- monika.btari (ID LINE) <br>- 081297178065 (WA) <br>
                                            <b>Satrio</b> <br>- satriowicaksonoz (ID LINE) <br>- 081398083360 (WA)
                            @endif
                        </div>

                    </div>
                </div>
            </div>
            <div class="col-xl-8 order-xl-1">
                <div class="card shadow">
                    <div class="card-header bg-white border-0">
                        <div class="row align-items-center">
                            <h3 class="col-12 mb-0">{{ __('Profil') }}</h3>
                        </div>
                    </div>
                    <div class="card-body">
                        <form method="post" action="" autocomplete="off">
                            @csrf
                            @method('put')

                            <h6 class="heading-small text-muted mb-4">{{ __('Informasi Peserta') }}</h6>

                            <div class="pl-lg-4">
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Nomor Peserta') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->no_ujian) }}" disabled>

                                </div>

                                <div class="form-group{{ $errors->has('name') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-name">{{ __('Nama') }}</label>
                                    <input type="text" name="name" id="input-name" class="form-control form-control-alternative{{ $errors->has('name') ? ' is-invalid' : '' }}" placeholder="{{ __('Name') }}" value="{{ old('name', auth()->user()->nama) }}" disabled>


                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Email') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->email) }}" disabled>

                                </div>

                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Tanggal Lahir') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->tgl_lahir) }}" disabled>

                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Jenjang/Tahun Lulus') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->kelas) }}" disabled>

                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Asal Sekolah') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->asal_sekolah) }}" disabled>

                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Alamat') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->alamat) }}" disabled>

                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('No Whatsapp') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->no_hp) }}" disabled>

                                </div>
                                <div class="form-group{{ $errors->has('email') ? ' has-danger' : '' }}">
                                    <label class="form-control-label" for="input-email">{{ __('Kelompok') }}</label>
                                    <input type="email" name="email" id="input-email" class="form-control form-control-alternative{{ $errors->has('email') ? ' is-invalid' : '' }}" placeholder="{{ __('Email') }}" value="{{ old('email', auth()->user()->kelompok) }}" disabled>

                                </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>

        @include('layouts.footers.auth')
    </div>
@endsection
