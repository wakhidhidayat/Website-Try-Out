<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Gate;
use PDF;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */

    public function __construct() {
        $this->middleware(function($request, $next){
            if(Gate::allows('manage-users')) return $next($request);
            abort(403, 'Anda tidak memiliki hak akses');
        });
    }

    public function index(Request $request)
    {
        $users = \App\User::paginate(10);
        $status = $request->status;
        $keyword = $request->q;
        if($keyword) {
            if($status) {
                $users = \App\User::where('nama', 'LIKE', "%$keyword%")->where('status', $status)->paginate(10);
            } else {
                $users = \App\User::where('nama', 'LIKE', "%$keyword%")->paginate(10);
            }
        } elseif($status) {
            $users = \App\User::where('status', $status)->paginate(10);
        }

        return view('admin.index', ['users' => $users]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $user = \App\User::findOrFail($id);
        return view('admin.edit', ['user' => $user]);
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $user = \App\User::findOrFail($id);
        $user->nama = $request->nama;
        $user->alamat = $request->alamat;
        $user->status = $request->status;
        $user->no_hp = $request->no_hp;
        $user->kelompok = $request->kelompok;
        $user->asal_sekolah = $request->asal_sekolah;
        $user->kelas = $request->kelas;
        $user->save();

        return redirect()->route('admin.index')->with('status','Data berhasil diupdate');
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $user = \App\User::findOrFail($id);
        $user->delete();

        return redirect()->route('admin.index')->with('status','Data berhasil dihapus');
    }

    public function verif($id)
    {
        $user = \App\User::findOrFail($id);
        $user->status = "VERIFIED";
        \QrCode::size(250)->format('png')->generate($user->no_ujian, public_path($user->no_ujian.'.png'));
        $user->save();

        return redirect()->route('admin.index')->with('status','Peserta berhasil terverifikasi');
    }

    public function print($id)
    {
        $user = \App\User::findOrFail($id);
        $print = PDF::loadView('admin-print', ['user' => $user]);
        return $print->download('Kartu Tanda Peserta-'.$user->no_ujian.'.pdf');
    }
}
