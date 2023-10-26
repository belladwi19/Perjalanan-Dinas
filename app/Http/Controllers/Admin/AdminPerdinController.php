<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Perjalanan;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class AdminPerdinController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $perjalanan = Perjalanan::with(['user'])->paginate(7);

        return view('Admin.DataPerdin.DataPerdin', compact('perjalanan'));
    }

    public function detail($id)
    {
        $perjalanan = Perjalanan::with(['user'])->findOrFail($id);

        return view('Admin.DataPerdin.DetailPerdin', compact('perjalanan') );
    }
}