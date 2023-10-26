<?php

namespace App\Http\Controllers\Pegawai;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;

use App\Models\Kota;
use App\Models\Perjalanan;

class PegawaiPerdinController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $perjalanan = Perjalanan::where('id_user', [Auth::id()])->where('Status', '=', 'Pending')->paginate(7);

        return view('Pegawai.Pengajuan.DataPengajuan', compact('perjalanan'));
    }

    public function create()
    {
        $kota = Kota::all();

        return view('Pegawai.Pengajuan.Pengajuan', compact('kota'));
    }

    public function store(Request $request)
    {
            $request->validate([
                'kotaasal'               => 'required',
                'kotatujuan'             => 'required',
                'tanggalberangkat'       => 'required',
                'tanggalpulang'          => 'required',
                'keterangan'             => 'required',
            ]);

            $negaraasal = Kota::where('id', $request->kotaasal)->value('luarnegeri');
            $negaratujuan = Kota::where('id', $request->kotatujuan)->value('luarnegeri');

            $start = Carbon::parse($request->tanggalberangkat);
            $end = Carbon::parse( $request->tanggalpulang);

            $pulauasal = Kota::where('id', $request->kotaasal)->value('pulau');
            $pulautujuan = Kota::where('id', $request->kotatujuan)->value('pulau');

            $asal = Kota::where('id', $request->kotaasal)->value('namakota');
            $tujuan = Kota::where('id', $request->kotatujuan)->value('namakota');

            $provasal = Kota::where('id', $request->kotaasal)->value('provinsi');
            $provtujuan = Kota::where('id', $request->kotatujuan)->value('provinsi');

            $lat1 = Kota::where('id', $request->kotaasal)->value('latitude');
            $long1 = Kota::where('id', $request->kotaasal)->value('longitude');

            $lat2 = Kota::where('id', $request->kotatujuan)->value('latitude');
            $long2 = Kota::where('id', $request->kotatujuan)->value('longitude');

            $perjalanan = new Perjalanan;

            $theta = $long1 - $long2;
            $miles = (sin(deg2rad($lat1)) * sin(deg2rad($lat2))) + (cos(deg2rad($lat1)) * cos(deg2rad($lat2)) * cos(deg2rad($theta)));
            $miles = acos($miles);
            $miles = rad2deg($miles);
            $miles = $miles * 60 * 1.1515;
            $feet = $miles * 5280;
            $yards = $feet / 3;
            $kilometers = $miles * 1.609344;

            $perjalanan->kotaasal           = $asal;
            $perjalanan->kotatujuan         = $tujuan;
            $perjalanan->tanggalberangkat   = $request->tanggalberangkat;
            $perjalanan->tanggalpulang      = $request->tanggalpulang;
            $perjalanan->keterangan         = $request->keterangan;
            $perjalanan->durasi             = $start->diffInDays($end);

            $perjalanan->jarak              = $kilometers;
            
            if($negaraasal == 'Tidak' && $negaratujuan == "Tidak"){
                if($perjalanan->jarak <= 60)
                {
                    $perjalanan->uangsaku           = 0;
                }
                elseif($perjalanan->jarak > 60 && $provasal==$provtujuan)
                {
                    $perjalanan->uangsaku           = $perjalanan->durasi*200000;
                }
                elseif($perjalanan->jarak > 60 && $provasal!=$provtujuan && $pulauasal==$pulautujuan)
                {
                    $perjalanan->uangsaku           = $perjalanan->durasi*250000;
                }
                elseif($perjalanan->jarak > 60 && $provasal!=$provtujuan && $pulauasal!=$pulautujuan)
                {
                    $perjalanan->uangsaku           = $perjalanan->durasi*300000;
                }
                
            }
            else{
                $perjalanan->uangsaku           = $perjalanan->durasi*761050;
            }
            
            $perjalanan->id_user         = Auth::id();
            
            $perjalanan->save();

            return redirect(route('pengajuan'));
        
    }
}
