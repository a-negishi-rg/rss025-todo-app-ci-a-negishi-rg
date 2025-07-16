<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class TaskController extends Controller
{
    /**
     * RSS025_TRAINING_PJ-58 一覧画面表示
     * 
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try {
            $tasks = Task::get();
            return response()->json($tasks);
        } catch (Exception $e) {
            Log::error($e->getMessage());
            return response()->json($e);
        }
    }

    /**
     * RSS025_TRAINING_PJ-60 登録処理作成
     * 
     * @return JsonResponse
     */
    public function save(Request $request)
    {
        DB::beginTransaction();
        try {
            $new_task = Task::saveNewTask($request);
            DB::commit();
            return response()->json($new_task, 200);
        } catch (Exception $e) {
            DB::rollback();
            Log::error("タスクの追加に失敗しました。:" . $e->getMessage());
            return response()->json($e, 500);
        }
    }
}