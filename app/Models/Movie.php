<?php

namespace App\Models;

use App\Models\AddedMovie;
use App\Models\Review;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use \Backpack\CRUD\app\Models\Traits\CrudTrait;
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'title',
        'description',
        'year',
        'image',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'id' => 'integer',
        'year' => 'date',
    ];

    public function reviews()
    {
        return $this->hasMany(\App\Models\Review::class);
    }

    public function addedBy(User $user)
    {
        return $this->addedMovies->contains('user_id', $user->id);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function addedMovies()
    {
        return $this->hasMany(AddedMovie::class);
    }
}
