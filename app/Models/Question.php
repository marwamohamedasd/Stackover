<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Question extends Model
{
    use HasFactory;
    protected $table = 'question';

    protected  $fillable =['title','description' ,'views','score','status','user_id','created_at','updated_at'];

    public function user(){
        return $this->belongsTo(User::class);
    }


    public function answers(){
        return $this->HasMany(Answer::class);
    }


    public function answers_count(){

        return Answer::where('question_id',$this->id)->count();

    }

    public  function  comments()
    {
        return $this->morphMany(Comment::class ,'commentable','commentable_type	','commentable_id','id');
    }


    public function Votes()
    {
        return $this->morphMany(Vote::class, 'votable', 'votable_type','votable_id','id');
    }

    public function CheckVotes($user_id){
        return Vote::where('Votable_id', $this->id) ->where('Votable_type', 'App\Models\Question')->where('user_id', $user_id)->first();

    }

    public function tags() {
        return $this->belongsToMany(Tag::class,'question_tags');
    }


}
