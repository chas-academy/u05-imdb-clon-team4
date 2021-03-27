<?php

namespace App\Models;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AddedMovie extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'movie_id'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function movie()
    {
        return $this->belongsTo(\App\Models\Movie::class);
    }

    public static function isAdded($userId, $movieId)
    {
        $isAdded = AddedMovie::where([
            ['user_id', $userId],
            ['movie_id', $movieId]])->first();

        return $isAdded;
    }

}
