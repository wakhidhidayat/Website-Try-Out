<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;	
use PDF;

class HomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('auth');
    }

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\View\View
     */
    public function index()
    {
        if(\Auth::user()->role == "ADMIN") {	
            return redirect()->route('admin.index');	
        } else {	
            return view('profile.edit');	
        }
    }
    public function print() {	
        $print = PDF::loadView('print');	
        return $print->download('Kartu Tanda Peserta-'.\Auth::user()->no_ujian.'.pdf');	
    }
    public function upload(Request $request)	
    {	
        $user = \Auth::user();	
        if($request->file('bukti_bayar')) {	
            $file = $request->file('bukti_bayar')->store('bukti_bayar','public');	
            $user->bukti_bayar = $file;	
        }	
        $user->save();	
        return redirect()->route('profile.edit');	
    }
}
