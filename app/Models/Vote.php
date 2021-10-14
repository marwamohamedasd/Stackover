<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Vote extends Model
{
    use HasFactory;
    protected   $fillable=['user_id','score','votable_id','votable_type'];


public function  user()
{
    return $this->belongsTo(User::class);
}


    public function votable()
    {
        return $this->morphTo('votable', 'votable_type','votable_id','id');
    }


  /*  public function answers()
    {
        //return $this->belongsToMany(RelatedModel, pivot_table_name, foreign_key_of_current_model_in_pivot_table, foreign_key_of_other_model_in_pivot_table);
        return $this->belongsToMany(
            Answer::class,
            'votes_users',
            'votes_id',
            'answers_id');
    }*/


}
