<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Perjalanan;
use PDF;
use Illuminate\Support\Facades\View;
use Illuminate\Support\Facades\Response;

class AdminPerdinController extends Controller
{
    public function generatePDF($id)
    {
        $perjalanan = Perjalanan::with(['user'])->findOrFail($id);

        $pdf = PDF::loadView('Admin.DataPerdin.pdf', compact('perjalanan'));

        $headers = [
            'Content-Type' => 'application/pdf',
            'Content-Disposition' => 'inline; filename="detail_perjalanan_dinas.pdf"',
        ];

        return response()->stream(
            function () use ($pdf) {
                echo $pdf->stream();
            },
            200,
            $headers
        );
    }

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

    public function searchperdin(Request $request)
    {
        $searchperdin = $request->get('searchperdin');
        $perjalanan = Perjalanan::where('kotaasal', 'like', '%'.$searchperdin.'%')
            ->orWhere('kotatujuan', 'like', '%'.$searchperdin.'%')
            ->orWhere('Status', 'like', '%'.$searchperdin.'%')
            ->orWhere('durasi', 'like', '%'.$searchperdin.'%')
            ->orWhere('keterangan', 'like', '%'.$searchperdin.'%')
            ->orWhereHas('user', function ($query) use ($searchperdin) {
                $query->where('name', 'like', '%'.$searchperdin.'%');
            })
            ->paginate(7);

        return view('Admin.DataPerdin.DataPerdin', compact('perjalanan'));
    }
    
}