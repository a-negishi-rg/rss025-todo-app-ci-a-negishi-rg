<?php

namespace App\Http\Controllers;

use Exception;
use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

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
}