<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class questions_tags extends Model
{
    use HasFactory;
    protected $table = 'question_tags';
    protected $fillable = [
        'question_id','tag_id'
    ];
}
