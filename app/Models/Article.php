<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'category_id', 'user_id', 'description', 'author'];

    public function categories() {
        return $this->belongsToMany(Category::class);
    }
}
