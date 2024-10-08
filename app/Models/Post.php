<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'posts';
    protected $guarded = [];

    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'id');
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'post_tags', 'post_id', 'tag_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function likes()
    {
        return $this->belongsToMany(User::class, 'likes', 'post_id', 'user_id')->withPivot('is_like');
    }

    public function getLikesCountAttribute()
    {
        return $this->likes()->where('is_like', true)->count();
    }

    public function getDislikesCountAttribute()
    {
        return $this->likes()->where('is_like', false)->count();
    }

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }

    public function userHasLiked()
    {
        $like = $this->likes()->where('user_id', auth()->id())->first();
        return $like ? $like->pivot->is_like : null;
    }

    public function comments()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
}
