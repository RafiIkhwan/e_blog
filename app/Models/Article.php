<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'slug',
        'cover',
        'author',
        'content'
    ];

    public static function orderByDesc() {
        return static::query()->orderBy('created_at', 'desc')->get();
    }

    public static function findByAuthor($name) {
        return static::where('author', $name)->get();
    }

    public static function findBySlug($slug) {
        return static::where('slug', $slug)->first();
    }
}
