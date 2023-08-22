<?php

namespace App\Models;

use Illuminate\Support\Str;
use App\Http\Controllers\Helper;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Storage;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory , HasUuids;

    protected $fillable = [
        'title',
        'description',
        'image',
        'slug',
        'content',
        // 'published_at',
        // 'has_publish'
    ];


    public function getSlug() {
        return Str::slug($this->title);
    }

    public function imageUrl() {
        return Storage::disk('public')->url($this->image);
    }

    public function dateFormatFr()
    {
        return Helper::dateFormatFr($this->created_at);
    }

    public function scopeRecentPosts($query, $limit = 3)
    {
        return $query->orderBy('created_at', 'desc')->where('has_publish', "=", 1)->take($limit);
    }

}
