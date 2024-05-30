<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filial;
use App\Models\TrackCode;
use Illuminate\Support\Facades\File;

class HomeController extends Controller
{
    public function index()
    {
        $filials = Filial::all();
        
        $filePath = config_path('config_file.json');
        $settingData = [];
        if (File::exists($filePath)) {
            $jsonData = json_decode(File::get($filePath), true);
            $settingData['address'] = isset($jsonData['address']) ? $jsonData['address'] : '';
            $settingData['email'] = isset($jsonData['email']) ? $jsonData['email'] : '';
            $settingData['telegram'] = isset($jsonData['telegram']) ? $jsonData['telegram'] : '';
            $settingData['instagram'] = isset($jsonData['instagram']) ? $jsonData['instagram'] : '';
            $settingData['whatsapp'] = isset($jsonData['whatsapp']) ? $jsonData['whatsapp'] : '';
            $settingData['phone'] = isset($jsonData['phone']) ? $jsonData['phone'] : '';
            $settingData['per_kg'] = isset($jsonData['per_kg']) ? $jsonData['per_kg'] : '';
            $settingData['per_volume'] = isset($jsonData['per_volume']) ? $jsonData['per_volume'] : '';
            $settingData['twogis_link'] = isset($jsonData['twogis_link']) ? $jsonData['twogis_link'] : '';
            $settingData['iinbin'] = isset($jsonData['iinbin']) ? $jsonData['iinbin'] : '';
            $settingData['name_company'] = isset($jsonData['name_company']) ? $jsonData['name_company'] : '';
        } else {
            $settingData['address'] = '';
            $settingData['email'] = '';
            $settingData['telegram'] = '';
            $settingData['instagram'] = '';
            $settingData['whatsapp'] = '';
            $settingData['phone'] = '';
            $settingData['per_kg'] = '';
            $settingData['per_volume'] = '';
            $settingData['twogis_link'] = '';
            $settingData['iinbin'] = '';
            $settingData['name_company'] = '';
        }

        return view('web.home', ['filials' => $filials, 'settingData' => $settingData]);
    }

    public function checkTrackCode(Request $request)
    {
        $track = TrackCode::where('code', $request->code)->first();
        return response()->json([
            'status' => $track->status->name
        ]);
    }
}
