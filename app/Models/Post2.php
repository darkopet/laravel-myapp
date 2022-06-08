<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Category;

class Post2 extends Model
{
    use HasFactory;
    // protected $fillable = ['title', 'excerpt','body'];
    // protected $guarded = ['id'];
    protected $guarded = [];

    protected $with = ['category', 'author'];
    
    
    // public function getRouteKeyName()
    // {
    //     return 'slug'; 
    // }

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
