<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Post2;


class Comment extends Model
{
    use HasFactory;

    protected $fillable = ['title', 'excerpt','body','user_id','category_id', 'slug'];

    public function post()
    {
        return $this->belongsTo(Post2::class);
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
