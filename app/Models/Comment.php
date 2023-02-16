<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    // relation to user model
    public function author()
    {
        return $this->belongsTo(User::class, foreignKey: 'user_id');
    }

    // relation to Postdb model / posts table
    public function post()
    {
        return $this->belongsTo(PostDb::class);
    }
}
