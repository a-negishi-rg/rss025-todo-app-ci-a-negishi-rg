<?php

namespace App\Http\Controllers;

use App\Models\Task;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    // @return JsonResponse
    public function index(): JsonResponse
    {
        try {
            $tasks = Task::get();
            return response()->json($tasks);

        } catch (\Exception) {
            Log::error('データの取得に失敗しました。:');
        }
    }
}