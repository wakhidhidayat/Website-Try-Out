@extends('layouts.global')
@section('title')
    Edit Peserta
@endsection
@section('content')
<div class="col-md-8">
    <form enctype="multipart/form-data" class="bg-white shadow-sm p-3" action="{{route('admin.update', ['id'=>$user->id])}}" method="POST">
        @csrf
        <input type="hidden" value="PUT" name="_method">

        <label for="nama">Nama</label>
        <input type="text" name="nama" value="{{$user->nama}}" class="form-control" placeholder="Nama Lengkap">
        <label for="alamat">Alamat</label>
        <input type="text" name="alamat" value="{{$user->alamat}}" class="form-control" placeholder="Alamat">
        <label for="no_hp">No Hp</label>
        <input type="text" name="no_hp" value="{{$user->no_hp}}" class="form-control" placeholder="Nomor Hp" maxlength="20">
        <label for="kelas">Jenjang/Tahun Lulus</label>
        <input type="text" name="kelas" value="{{$user->kelas}}" class="form-control" placeholder="Jenjang/Tahun Lulus" maxlength="20">
        <label for="kelompok">Kelompok</label>
        <select name="kelompok" class="form-control">
            <option value="SAINTEK" {{$user->kelompok == 'SAINTEK' ? 'selected' : ''}}>SAINTEK</option>
            <option value="SOSHUM" {{$user->kelompok == 'SOSHUM' ? 'selected' : ''}}>SOSHUM</option>
        </select>
        <label for="asal_sekolah">Asal Sekolah</label>
        <input type="text" name="asal_sekolah" value="{{$user->asal_sekolah}}" class="form-control" placeholder="Asal Sekolah">
        <label for="status">Status Peserta</label>
        <select name="status" class="form-control">
            <option value="MENUNGGU PEMBAYARAN" {{$user->status == 'MENUNGGU PEMBAYARAN' ? 'selected' : ''}}>Menunggu Pembayaran</option>
            <option value="VERIFIED" {{$user->status == 'VERIFIED' ? 'selected' : ''}}>Terverifikasi</option>
        </select>
        <br>
        <input type="submit" class="btn btn-primary" value="Update Data">
    </form>
</div>

@endsection
