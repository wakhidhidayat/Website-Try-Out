@extends('layouts.global')
@section('title')
    Admin Dashboard
@endsection
@section('content')
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
                    <td>{{$user->status}}</td>
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
                            class="btn btn-info btn-sm">
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
    </table>
@endsection
