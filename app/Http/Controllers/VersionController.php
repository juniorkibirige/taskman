<?php

namespace App\Http\Controllers;

use App\AppVersion;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function getVersion(Request $request)
    {
        $appId = $request['appId'];
        return AppVersion::findOrFail($appId)->version;
    }

    public function setVersion(Request $request)
    {
        $appId = $request['appId'];
        $version = $request['version'];
        $app = AppVersion::firstOrCreate(['app_id'=>$appId, 'version'=>$version]);
        $app->update([
                'version' => $version
            ]);
        return "Successfully Updated";
    }
}
