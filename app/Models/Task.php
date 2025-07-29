<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Task extends Model
{
    use SoftDeletes;

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
     * @param array $request
     * @param int $id
     * @return Task
     */
    public static function updateTask($id, $request)
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

    /**
     * RSS025_TRAINING_PJ-718 削除処理作成
     *
     * @param int $id
     * @return Task
     */
    public static function deleteTask($id)
    {
        $delete_task = Task::query()
        ->where('id', $id)
        ->delete();

        return $delete_task;
    }
}