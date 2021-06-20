<?php

namespace App\Http\Controllers;

use App\AppVersion;
use Illuminate\Http\Request;

class VersionController extends Controller
{
    public function getVersion(Request $request)
    {
        $appId = $request['appId'];
        $app = AppVersion::findOrFail($appId);
        return json_encode(["app_id"=>$appId, "android" => $app->android, "ios"=>$app->ios]);
    }

    public function setVersion(Request $request)
    {
        $appId = $request['appId'];
        $version = $request['android'];
        $iosVersion = $request['ios'];
        $app = AppVersion::firstOrCreate(['app_id' => $appId, 'android' => $version, 'ios' => $iosVersion]);
        $app->update([
            'android' => $version,
            'ios' => $iosVersion,
        ]);
        return "Successfully Updated";
    }
}
