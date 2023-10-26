<?php

namespace App\Http\Controllers\Admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Kota;

class AdminKotaController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $kota = Kota::paginate(7);

        return view('Admin.DataKota.DataKota', compact('kota'));
    }

    public function create()
    {        
        return view('Admin.DataKota.CreateKota');
    }

    public function store(Request $request)
    {
            $request->validate([
                'nama'                  => 'required',
                'provinsi'              => 'required',
                'pulau'                 => 'required',
                'latitude'              => 'required',
                'longitude'             => 'required',
                'luarnegeri'            => 'required',
            ]);


            $kota = new Kota;

            $kota->namakota      = $request->nama;
            $kota->provinsi      = $request->provinsi;
            $kota->pulau         = $request->pulau;
            $kota->latitude      = $request->latitude;
            $kota->longitude     = $request->longitude;
            if($request->luarnegeri == 'luarnegeri')
            {
                $kota->luarnegeri = 'Iya';
            }
            else{
                $kota->luarnegeri = 'Tidak';
            }
            $kota->save();

            return redirect(route('datakota'))->with(['success' => 'Tambah Kota Berhasil']);
        
    }

    public function show($id)
    {
        $kota = Kota::findOrFail($id);

        return view('Admin.DataKota.UpdateKota', compact('kota') );
    }

    public function update($id, Request $request)
    {
        $request->validate([
            'nama'                  => 'required',
            'provinsi'              => 'required',
            'pulau'                 => 'required',
            'latitude'              => 'required',
            'longitude'             => 'required',
        ]);
        
        $kota = Kota::find($id);

        $kota->namakota      = $request->nama;
        $kota->provinsi      = $request->provinsi;
        $kota->latitude      = $request->latitude;
        $kota->pulau         = $request->pulau;
        $kota->longitude     = $request->longitude;
        $kota->save();

        return redirect(route('datakota'))->with(['success' => 'Ubah Kota Berhasil']);
    }

    public function delete($id)
    {
        $kota = Kota::find($id);
        $kota->delete();

        return redirect(route('datakota'))->with(['success' => 'Delete Kota Berhasil']);
    }

    public function searchkota(Request $request)
    {
        $searchkota = $request->get('searchkota');
        $kota = Kota::where('namakota', 'like', '%'.$searchkota.'%')
            ->orWhere('provinsi', '', '%'.$searchkota.'%')
            ->orWhere('pulau', '', '%'.$searchkota.'%')
            ->paginate(7);

        return view('Admin.DataKota.DataKota', compact('kota'));
    }
}