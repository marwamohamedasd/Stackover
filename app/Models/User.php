<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */


/*
    public function run()
    {
        User::factory()
            ->count(50)
            // ->hasPosts(1)
            ->create()

        ;

        $this->call([
            UserSeeder::class,
            // PostSeeder::class,
            // CommentSeeder::class,
        ]);
    }*/

    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];


    public function questions(){
        return $this->hasMany(Question::class);
    }

    public  function  answers()
    {
        return $this->hasMany(Answer::class);
    }

    public  function  votes()
    {
        return $this->hasMany(Vote::class);
    }

    public  function  comments()
    {
        return $this->hasMany(Comment::class);
    }





    public function setTitleAttribute($value){
        return $this->attributes['title']=$value;
        // return $this->attributes['slug']=str_slug($value);
    }

    public function tags()
    {
        return $this->morphToMany(Tag::class, 'users_tags');
    }
}
