<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filial;
use App\Models\TrackCode;

class HomeController extends Controller
{
    public function index()
    {
        $filials = Filial::all();


        return view('web.home', ['filials' => $filials]);
    }

    public function checkTrackCode(Request $request)
    {
        $track = TrackCode::where('code', $request->code)->first();
        return response()->json([
            'status' => $track->status->name
        ]);
    }
}
