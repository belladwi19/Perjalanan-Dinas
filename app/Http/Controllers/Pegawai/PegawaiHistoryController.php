<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Perjalanan;
use Illuminate\Support\Facades\Auth;

class PegawaiHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $perjalanan = Perjalanan::where('id_user', [Auth::id()])->where('Status', '!=', 'Pending')->paginate(7);

        return view('Pegawai.History.History', compact('perjalanan'));
    }
}
