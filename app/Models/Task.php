<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    // @var array<int, string>
    protected $fillable = [
        'title',
        'content',
        'person_in_charge'
    ];
}