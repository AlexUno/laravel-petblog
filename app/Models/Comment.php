<?php

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Comment extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'comments';
    protected $guarded = [];

    public function getDateAsCarbonAttribute()
    {
        return Carbon::parse($this->created_at);
    }

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id', 'id');
    }

    public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id', 'id');
    }

    public static function userCommentsWithReplies($userId)
    {
        return self::where('user_id', $userId)
            ->with([
                'replies' => function($query) {
                    $query->where('is_read', false);
                }
            ])
            ->get();
    }

    public function post()
    {
        return $this->belongsTo(Post::class, 'post_id', 'id');
    }
}
