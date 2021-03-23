<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Review extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'user_id',
        'movie_id',
        'title',
        'description',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'user_id' => 'integer',
        'movie_id' => 'integer',
    ];


    public function users()
    {
        return $this->belongsToMany(\App\Models\User::class);
    }

    public function movies()
    {
        return $this->belongsToMany(\App\Models\Movie::class);
    }

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class);
    }
}
