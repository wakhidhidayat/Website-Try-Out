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
                    <td><a class="btn btn-info text-white btn-sm" href="{{route('admin.edit',['id'=>$user->id])}}">Edit</a></td>
                </tr>
            @empty
                <b>DATA KOSONG</b>
            @endforelse
        </tbody>
    </table>
@endsection
