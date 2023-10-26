<?php

namespace App\Http\Controllers\SDM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Perjalanan;

class SDMHistoryController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $perjalanan = Perjalanan::where('Status', '!=', 'Pending')->paginate(7);

        return view('SDM.History.History', compact('perjalanan'));
    }
}
