<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;


class Post extends Model
{
    use HasFactory;

    protected $with = ['category', 'author'];

    public function scopeFilter($query, array $filters)
    {

        $query->when(
            $filters['search'] ?? false,
            fn ($query, $search) =>

            $query->where(fn ($query) =>
            $query->where('title', 'like', '%' . $search . '%')
                ->OrWhere('body', 'like', '%' . $search . '%'))
        );

        $query->when(
            $filters['category'] ?? false,
            fn ($query, $category) =>
            $query->whereHas(
                'category',
                fn ($query) =>
                $query->where('slug', $category)
            )
        );
        $query->when(
            $filters['author'] ?? false,
            fn ($query, $author) =>
            $query->whereHas(
                'author',
                fn ($query) =>
                $query->where('username', $author)
            )
        );
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function category()
    {
        return $this->BelongsTo(Category::class);
    }
    public function author()
    {
        return $this->BelongsTo(User::class, 'user_id');
    }
}
