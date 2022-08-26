<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Comment extends Model
{
    use HasFactory;

    const MAX_LEVEL_COMMENTS = 3;

    protected $fillable = [
        'username',
        'comment',
        'parent_id',
        'depth',
    ];

    protected $with = [
        'replies',
    ];

    public function parent()
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    public function replies(): HasMany
    {
        return $this->hasMany(self::class,'parent_id');
    }

    public function depth()
    {
        return $this->depth >= self::MAX_LEVEL_COMMENTS - 1;
    }
}
