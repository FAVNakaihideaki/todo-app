<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Todo extends Model
{
    use HasFactory;

    // create()で使うためにfillableを設定
    protected $fillable = [
        'title',
        'completed',
    ];
}

