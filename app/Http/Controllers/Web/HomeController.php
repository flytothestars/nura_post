<?php

namespace App\Http\Controllers\Web;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Filial;
use App\Models\TrackCode;
use Illuminate\Support\Facades\File;
use App\Models\Partner;

class HomeController extends Controller
{
    public function index()
    {
        $filials = Filial::all();
        $settingData = $this->getSettingData();
        //banner get extension
        $fileExtension_banner = $this->getBanner();
        //icon get extension
        $fileExtension_icon = $this->getIcon();

        return view('web.home', [
            'filials' => $filials,
            'settingData' => $settingData,
            'fileExtension_banner' => $fileExtension_banner,
            'fileExtension_icon' => $fileExtension_icon
        ]);
    }

    public function news()
    {
        $settingData = $this->getSettingData();
        return view('web.news', ['settingData' => $settingData]);
    }


    public function checkTrackCode(Request $request)
    {
        $track = TrackCode::where('code', $request->code)->first();
        return response()->json([
            'status' => $track->status->name
        ]);
    }

    public function partner()
    {
        $settingData = $this->getSettingData();
        //banner get extension
        $fileExtension_banner = $this->getBanner();
        //icon get extension
        $fileExtension_icon = $this->getIcon();
        return view('web.partner', [
            'settingData' => $settingData,
            'fileExtension_banner' => $fileExtension_banner,
            'fileExtension_icon' => $fileExtension_icon
        ]);
    }

    public function setPartner(Request $request)
    {
        Partner::create([
            'name' => $request->name,
            'phone' => $request->phone
        ]);
    }

    public function getSettingData()
    {
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
        return $settingData;
    }

    public function getIcon()
    {
        $directory = public_path('images');
        $basename_icon = 'nurapost_logo';
        $fileExtension_icon = '';
        $files_icon = File::files($directory);
        foreach ($files_icon as $file) {
            if (pathinfo($file, PATHINFO_FILENAME) === $basename_icon) {
                $fileExtension_icon = pathinfo($file, PATHINFO_EXTENSION);
                break;
            }
        }

        return $fileExtension_icon;
    }

    public function getBanner()
    {
        $directory = public_path('images');
        $basename_banner = 'welcome';
        $fileExtension_banner = '';
        $files_banner = File::files($directory);
        foreach ($files_banner as $file) {
            if (pathinfo($file, PATHINFO_FILENAME) === $basename_banner) {
                $fileExtension_banner = pathinfo($file, PATHINFO_EXTENSION);
                break;
            }
        }

        return $fileExtension_banner;
    }
}
