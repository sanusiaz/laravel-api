<?php

namespace App\Models;

use App\Models\Blogger;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;


    protected $fillable = [
        'slug',
        'blogger_id',
        'featured_image',
        'title',
        'body',
        'author'
    ];


    public function blogger() {
        return $this->belongsTo(Blogger::class);
    }
}
