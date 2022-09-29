<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $fillable = [
        'user_id',
        'title',
        'image_url',
        'body',
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
    public function coments()
    {
        return $this->hasMany(Coment::class);
    }

    /**
     * Scope a query to only include latter posts.
     *
     * @param  \Illuminate\Database\Eloquent\Builder  $query
     * @return \Illuminate\Database\Eloquent\Builder
     */
    public function scopeLatter($query)
    {
        return $query->orderBy('created_at', 'desc');
    }
}
