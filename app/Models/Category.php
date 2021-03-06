<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post2;

class Category extends Model
{
    use HasFactory;

    public function posts()
    {
        // hasOne hasMany belongsTo belongsToMany
        return $this->hasMany(Post2::class);  // ELOQUENT Model RELATIONSHIP
    }
}
