<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Movie extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
        'gender_movie',
        'image',
        'image_type'
    ];

    public function users_renting()
    {
        return $this->belongsToMany(User::class, 'current_rent_movie_user_link', 'movie_id', 'user_id');
    }

    private function user_ratings()
    {
        return $this->belongsToMany(User::class, 'past_rent_movie_user_link', 'movie_id', 'user_id')->withPivot('rating');
    }

    public function rating()
    {
        // cast down to integer
        return $this->user_ratings()->avg('rating');
    }

    public function has_ratings()
    {
        return $this->user_ratings()->count() > 0;
    }

    public function count_ratings()
    {
        return $this->user_ratings()->count();
    }

    public function user_previous_rating($user_id)
    {
        return $this->user_ratings()->where('user_id', $user_id)->first()?->pivot?->rating;
    }
}

