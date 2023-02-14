<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'slug'];


    // add relation to postdb model / posts table
    public function posts()
    {
        return $this->hasMany(PostDb::class);
    }
}
