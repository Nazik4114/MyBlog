<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    public function user (){
        return $this->belongsTo(User::class);
    }
    public function coments (){
        return $this->hasMany(Coment::class);
    }
    protected $guarded=[];
    protected $fillable = [
        'user_id',
        'title',
        'image_url',
        'body',
    ];
}
