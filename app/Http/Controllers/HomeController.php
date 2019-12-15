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
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        if(\Auth::user()->role == "ADMIN") {
            return redirect()->route('admin.index');
        } else {
            return view('home');
        }

    }

    public function print() {
        $print = PDF::loadView('print');
        return $print->download('Kartu Tanda Peserta-'.\Auth::user()->no_ujian.'.pdf');
    }
}
