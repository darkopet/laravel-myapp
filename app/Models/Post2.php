<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post2 extends Model
{
    use HasFactory;
    
    protected $fillable = ['title', 'excerpt','body','user_id','category_id', 'slug'];
    // protected $guarded = ['id'];
    protected $with = ['category', 'author'];
    
    // public function getRouteKeyName()
    // {
    //     return 'slug'; 
    // }

    public function scopeFilter($query, array $filters)
    {
        $query->when($filters['search'] ?? false, fn($query, $search) =>
            $query->where(fn($query) =>
                $query->where('title', 'like', '%' . $search . '%')
            ->orWhere('body', 'like', '%' . $search . '%')
            )
        );

        $query->when($filters['category'] ?? false, fn($query, $category) =>
            $query->whereHas('category', fn ($query) =>
                $query->where('slug', $category)
            )
        );

        $query->when($filters['author'] ?? false, fn($query, $author) =>
            $query->whereHas('author', fn ($query) =>
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
        // hasOne hasMany belongsTo belongsToMany
        return $this->belongsTo(Category::class); //ELOQUENT Model RELATIONSHIP METHODS
    }

    public function author() // name of the RELATIONSHIP METHOD (public function) -> LARAVEL assume FK user_id
    {
        return $this->belongsTo(User::class, 'user_id'); // ELOQUENT Model RELATIONSHIP METHOD
    }
}
