<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Answer extends Model
{
    use HasFactory;
    protected $table = 'answer';

    protected $fillable=['user_id','content','question_id' ,'score','accepted'];





public  function  question()
{
    return $this->belongsTo(Question::class);

}

public  function user()
{

    return $this->belongsTo(User::class);

}


    public function Votes()
    {
        return $this->morphMany(Vote::class, 'votable', 'votable_type','votable_id','id');
    }


    public  function  comments()
    {
        return $this->morphMany(Comment::class ,'commentable','commentable_type	','commentable_id','id');
    }

    public function CheckVotes($user_id){
        return Vote::where('Votable_id', $this->id)->where('user_id', $user_id)->where('Votable_type', 'App\Models\Answer')->first();

    }

}
