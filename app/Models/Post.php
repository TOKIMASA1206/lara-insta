<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Model;


class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    public function user()
    {
        return $this->belongsTo(User::class)->withTrashed();
    }

    public function categoryPost(){
        return $this->hasMany(CategoryPost::class);
    }

    public function comments(){
        return $this->hasMany(Comment::class)->latest();
    }

    public function likes()
    {
        return $this->hasMany(Like::class);
    }
    public function isliked()
    {
        return $this->likes()->where('user_id', auth()->id())->exists();
    }


}
