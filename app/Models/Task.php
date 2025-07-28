<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * RSS025_TRAINING_PJ-58 一覧画面表示
     *
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'content',
        'person_in_charge',
    ];

    /**
     * RSS025_TRAINING_PJ-60 登録処理作成
     *
     * @param  array  $new_task
     * @return Task
     */
    public static function saveNewTask($new_task)
    {
        $new_task = Task::create(
            [
                'title' => $new_task->title,
                'content' => $new_task->content,
                'person_in_charge' => $new_task->person_in_charge,
            ]
        );

        return $new_task;
    }

    /**
     * RSS025_TRAINING_PJ-717 編集画面作成
     *
     * @param  array  $update_task
     * @return Task
     */
    public static function updateNewTask($id, $request)
    {
        $update_task = Task::query()
        ->where('id', $id)
        ->update(
            [
                'title' => $request->title,
                'content' => $request->content,
                'person_in_charge' => $request->person_in_charge,
            ]
        );

        return $update_task;
    }
}