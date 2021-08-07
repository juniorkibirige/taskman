<?php

namespace App\Http\Controllers;

use App\OnBoarding;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class OnBoardingController extends Controller
{
    public function getOnBoardingStatus(Request $request): JsonResponse
    {
        $appId = $request['app_id'];
        $userId = $request['user_id'];
        $app = OnBoarding::query()
            ->where(['app_id' => $appId])
            ->where(['user_id' => $userId])
            ->firstOrFail();
        return response()->json(['status' => (boolean) $app['status']]);
    }

    public function setOnBoardingStatus(Request $request)
    {
        $appId = $request['app_id'];
        $userId = $request['user_id'];
        $status = $request['status'];
        OnBoarding::create([
                'status' => $status,
                'user_id' => $userId,
                'app_id' => $appId,
            ]);
    }
}
