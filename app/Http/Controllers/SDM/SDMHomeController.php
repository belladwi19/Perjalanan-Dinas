<?php

namespace App\Http\Controllers\SDM;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class SDMHomeController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */

    /**
     * Show the application dashboard.
     *
     * @return \Illuminate\Contracts\Support\Renderable
     */
    public function index()
    {
        return view('SDM.Dashboard.Dashboard');
    }
}
