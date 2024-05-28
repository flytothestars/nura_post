<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filial;

class HomeController extends Controller
{
    public function index()
    {
        $filials = Filial::all();


        return view('web.home', ['filials' => $filials]);
    }
}
