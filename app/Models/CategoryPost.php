<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryPost extends Model
{
    use HasFactory;


    // model 名前を変える
    protected $table = "category_post";
    protected $fillable = ['category_id','post_id'];
    public $timestamps = false;

    // public function post()
    // {
    //     return $this->belongsTo(Post::class);
    // }

    public function category()
    {
        return $this->belongsTo(Category::class);
    }
    public function post()
    {
        return $this->belongsTo(Post::class);
    }
}
