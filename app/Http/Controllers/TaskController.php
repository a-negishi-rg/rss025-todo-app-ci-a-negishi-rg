<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use Illuminate\Http\JsonResponse;
use App\Models\Task;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

class TaskController extends Controller
{
    /**
     * RSS_TRAINING_PJ-50 レイスユーザー一覧
     *
     * @return JsonResponse
     */
    public function index(): JsonResponse
    {
        try{$tasks = Task::get();
            Log::debug($tasks);
            return response() -> json($tasks);
        }catch(error){

        }
    }
}
