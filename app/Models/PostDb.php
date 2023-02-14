<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class PostDb extends Model
{
    use HasFactory;

    // set model table target to posts
    protected $table = 'posts';


    // set fillable property to allow mass assignment
    protected $fillable = ['title', 'slug', 'excerpt', 'category_id', 'body'];


    // add relation to category model
    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    // relation to user model
    public function author()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id');
    }
}
