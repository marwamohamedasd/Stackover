<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    use HasFactory;
    protected $fillable = ['user_id', 'commentable_id', 'commentable_type', 'content'];


    public function user()
    {
        return $this->belongsTo(User::class);
    }



    public function commentable()
    {
        return $this->morphTo('commentable','commentable_type	','commentable_id','id');
    }


    protected $guarded = [];



// public function replies()
// {
//     return $this->hasMany(Comment::class, 'parent_id');
// }

}
