<?php

namespace App\Models;

use App\Models\Post;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Blogger extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'title',
        'address',
        'salary',
        'status',
        'blocked_date',
        'deleted_name'
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }
}
