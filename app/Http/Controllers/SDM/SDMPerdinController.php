<?php

namespace App\Http\Controllers\SDM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Perjalanan;

class SDMPerdinController extends Controller
{
    public function index()
    {
        $perjalanan = Perjalanan::latest()->where('Status', '=', 'Pending')->paginate(7);

        return view('SDM.Approval.Approval', compact('perjalanan'));
    }

    public function show($id)
    {
        $perjalanan = Perjalanan::with(['user'])->findOrFail($id);

        return view('SDM.Approval.ShowApproval', compact('perjalanan') );
    }

    public function reject($id)
    {
        $perjalanan = Perjalanan::find($id);

        $perjalanan->status     = 'Reject';
        $perjalanan->save();

        return view('SDM.Dashboard.Dashboard');
    }
    public function acc($id)
    {
        $perjalanan = Perjalanan::find($id);

        $perjalanan->status     = 'Approve';
        $perjalanan->save();

        return view('SDM.Dashboard.Dashboard');
    }
}
