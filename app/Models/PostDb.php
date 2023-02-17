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
    protected $fillable = ['title', 'slug', 'excerpt', 'category_id', 'body', 'user_id'];


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

    // relation to comments model
    public function comments()
    {
        return $this->hasMany(Comment::class, foreignKey: 'post_id');
    }

    public function scopeFilter($query, array $filters)
    { //  newQuery()->filter();

        // execute the query when there is filters with key search
        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) => $query->where(
                fn ($query) =>
                $query
                    ->where('title', 'ilike', '%' . $search . '%')
                    ->orWhere('body', 'ilike', '%' . $search . '%')
            )

        );

        // execute the query when there is filters with key category
        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas('category', fn ($query) => $query->where('slug', $category))
        );

        // execute the query when there is filters with key author
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas('author', fn ($query) => $query->where('username', $author))
        );
        // long way
        //  $query
        //     ->whereExists(
        //         fn ($query) =>
        //         $query
        //             ->from('categories')
        //             ->whereColumn('categories.id', 'posts.category_id')
        //             ->where('categories.slug', $category)
        //     )
    }
}
