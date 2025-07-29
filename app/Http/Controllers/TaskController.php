<?php

namespace App\Http\Controllers;

use App\Http\Requests\TaskRequest;
use App\Models\Task;
use Exception;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use Illuminate\Database\Eloquent\ModelNotFoundException;

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
    public function save(TaskRequest $request)
    {
        try {
            DB::beginTransaction();
            $new_task = Task::saveNewTask($request);
            DB::commit();

            return response()->json($new_task, 200);
        } catch (Exception $e) {
            DB::rollback();
            Log::error('タスクの追加に失敗しました。:'.$e->getMessage());

            return response()->json($e, 500);
        }
    }

    /**
     * RSS025_TRAINING_PJ-271 詳細画面作成
     *
     * @param int $id
     * @return JsonResponse
     */
    public function show(int $id): JsonResponse
    {
        try {
            $task = Task::findOrFail($id);

            return response()->json($task, 200);
        } catch (ModelNotFoundException $e) {
            Log::warning('該当のタスクが見つかりません。:'.$e->getMessage());

            return response()->json($e, 404);
        } catch (Exception $e) {
            Log::error('タスク詳細の取得に失敗しました。:'.$e->getMessage());

            return response()->json($e, 500);
        }
    }

    /**
     * RSS025_TRAINING_PJ-717 編集画面作成
     *
     * @param int $id
     * @return JsonResponse
     */
    public function update($id, TaskRequest $request)
    {
        try {
            DB::beginTransaction();
            $update_task = Task::updateNewTask($id, $request);
            DB::commit();

            return response()->json($update_task, 200);
        } catch (Exception $e) {
            DB::rollback();
            Log::error('タスクの編集に失敗しました。:'.$e->getMessage());

            return response()->json($e, 500);
        }
    }

    /**
     * RSS025_TRAINING_PJ-718 削除処理作成
     *
     * @param int $id
     * @return JsonResponse
     */
    public function delete($id)
    {
        // throw new Exception ("error");
        try {
            DB::beginTransaction();
            $delete_task = Task::deleteTask($id);
            DB::commit();

            return response()->json($delete_task, 200);
        } catch (Exception $e) {
            DB::rollback();
            Log::error('タスクの削除に失敗しました。:'.$e->getMessage());

            return response()->json($e, 500);
        }
    }
}
