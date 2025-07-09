<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    /**
     * RSS025_TRAINING_PJ-58 一覧画面表示
     * 
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'content',
        'person_in_charge'
    ];
}