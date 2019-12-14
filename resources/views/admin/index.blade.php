@extends('layouts.global')
@section('title')
    Admin Dashboard
@endsection
@section('content')

    @if(session('status'))
        <div class="alert alert-success">
            {{session('status')}}
        </div>
    @endif

    <form action="{{route('admin.index')}}">
        <div class="row">
            <div class="col-md-6">
                <input
                value="{{Request::get('q')}}"
                name="q"
                class="form-control col-md-10"
                type="text"
                placeholder="Cari berdasarkan nama"/>
            </div>
            <div class="col-md-6">
                <input {{Request::get('status') == 'VERIFIED' ? 'checked' : ''}}
                value="VERIFIED"
                name="status"
                type="radio"
                class="form-control"
                id="verified">
                <label for="verified">Verified</label>

                <input {{Request::get('status') != 'VERIFIED' ? 'checked' : ''}}
                value="MENUNGGU PEMBAYARAN"
                name="status"
                type="radio"
                class="form-control"
                id="menunggu-pembayaran">
                <label for="menunggu-pembayaran">Menunggu Pembayaran</label>

                <input
                type="submit"
                value="Filter Peserta"
                class="btn btn-primary">
            </div>
        </div>
    </form> <br>

    <table class="table table-bordered">
        <thead>
            <tr>
                <td><b>Nama</b></td>
                <td><b>Email</b></td>
                <td><b>No Peserta</b></td>
                <td><b>No HP</b></td>
                <td><b>Alamat</b></td>
                <td><b>Tanggal lahir</b></td>
                <td><b>Kelompok</b></td>
                <td><b>Asal Sekolah</b></td>
                <td><b>Status</b></td>
                <td><b>Aksi</b></td>
            </tr>
        </thead>
        <tbody>
            @forelse ($users as $user)
                @if ($user->role == "USER")
                   <tr>
                    <td>{{$user->nama}}</td>
                    <td>{{$user->email}}</td>
                    <td>{{$user->no_ujian}}</td>
                    <td>{{$user->no_hp}}</td>
                    <td>{{$user->alamat}}</td>
                    <td>{{$user->tgl_lahir}}</td>
                    <td>{{$user->kelompok}}</td>
                    <td>{{$user->asal_sekolah}}</td>
                    <td>
                        @if ($user->status == "VERIFIED")
                            <span class="badge badge-success">
                                {{$user->status}}
                            </span>
                        @else
                            <span class="badge badge-danger">
                                {{$user->status}}
                            </span>
                        @endif
                    </td>
                    <td><a class="btn btn-info text-white btn-sm" href="{{route('admin.edit',['id'=>$user->id])}}">Edit</a>
                    <form
                        onsubmit="return confirm('Hapus Peserta Ini?')"
                        class="d-inline"
                        action="{{route('admin.destroy', ['id' => $user->id ])}}"
                        method="POST">
                        @csrf
                        <input
                        type="hidden"
                        name="_method"
                        value="DELETE">
                        <input
                        type="submit"
                        value="Delete"
                        class="btn btn-danger btn-sm">
                        </form>

                        @if ($user->status != "VERIFIED")
                        <td>
                            <form
                            onsubmit="return confirm('Verifikasi Peserta Ini?')"
                            class="d-inline"
                            action="{{route('admin.verif', ['id' => $user->id ])}}"
                            method="POST">
                            @csrf
                            <input
                            type="hidden"
                            name="_method"
                            value="PUT">
                            <input
                            type="submit"
                            value="Verifikasi"
                            class="btn btn-success btn-sm">
                            </form>
                        </td>
                        @endif
                    </td>
                </tr>

                @endif

            @empty
                <b>DATA KOSONG</b>
            @endforelse
        </tbody>
        <tfoot>
            <tr>
                <td colspan=10>
                    {{$users->appends(Request::all())->links()}}
                </td>
            </tr>
        </tfoot>
    </table>
@endsection
