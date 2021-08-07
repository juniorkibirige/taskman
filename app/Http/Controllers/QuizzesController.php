<?php

namespace App\Http\Controllers;

use App\Quizes;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;

class QuizzesController extends Controller
{

    public function getQuiz(Request $request): JsonResponse
    {
        $appId = $request['app_id'];
        $quizId = $request['quiz_id'];
        $userId = $request['user_id'];
        $app = Quizes::query()
            ->where(['app_id' => $appId])
            ->where(['quiz_id' => $quizId])
            ->where(['user_id' => $userId])
            ->firstOrFail();
        return response()->json(['total' => $app['total'], 'solutions' => json_decode($app['quiz_solutions'])]);
    }

    public function setQuiz(Request $request): string
    {
        $appId = $request['app_id'];
        $quizId = $request['quiz_id'];
        $userId = $request['user_id'];
        $app = Quizes::query()
            ->where([
                'app_id' => $appId,
                'quiz_id' => $quizId,
                'user_id' => $userId
            ])
            ->get();
        if ($app->count() > 0) {
            Quizes::query()
                ->where(['app_id' => $appId, 'quiz_id' => $quizId, 'user_id' => $userId])
                ->update([
                    'quiz_solutions' => $request['solutions'],
                    'total' => $request['total'],
                ]);
            return "Successfully Updated";
        }
        else {
            Quizes::create([
                'quiz_id' => $quizId,
                'user_id' => $userId,
                'quiz_solutions' => json_encode($request['solutions']),
                'total' => $request['total'],
                'app_id' => $appId,
            ]);
            return "Successfully Saved";
        }
    }
}
