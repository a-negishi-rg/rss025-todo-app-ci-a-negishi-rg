<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * RSS025_TRAINING_PJ-58 一覧画面表示
     * RSS025_TRAINING_PJ-60 登録処理作成
     * 
     * @var array<string>
     */
    protected $fillable = [
        'title',
        'content',
        'person_in_charge'
    ];

    public static function saveNewTask ($newTask) {
        $newTask = Task::create(
            [
                'title' => $newTask->title,
                'content' => $newTask->content,
                'person_in_charge' => $newTask->person_in_charge
            ]
        );
        return $newTask;
    }
}