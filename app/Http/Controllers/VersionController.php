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
        return json_encode(["app_id" => $appId, "android" => $app->android, "ios" => $app->ios]);
    }

    public function setVersion(Request $request)
    {
        $appId = $request['appId'];
        $version = $request['android'];
        $iosVersion = $request['ios'];
        $app = AppVersion::query()->where(['app_id' => $appId])->get();
        if ($app->count() > 0)
            AppVersion::query()->where(['app_id' => $appId])->update([
                'android' => $version,
                'ios' => $iosVersion,
            ]);
        else {
            AppVersion::create([
                'app_id' => $appId,
                'android' => $version,
                'ios' => $iosVersion,
            ]);
        }
        return "Successfully Updated";
    }
}
