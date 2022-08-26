<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Casts\Attribute;

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

    protected $appends = [
        'last_level_replie',
    ];

    /**
     * Returns the parent class if it exists
     */
    public function parent() : BelongsTo
    {
        return $this->belongsTo(self::class, 'parent_id');
    }

    /**
     * Returns the replies to a comment
     */
    public function replies() : HasMany
    {
        return $this->hasMany(self::class,'parent_id')->orderBy('created_at','DESC');
    }

    /**
     * Computed attibute wich returns if is the maximum level to reply a comment
     */
    protected function lastLevelReply() : Attribute
    {
        return new Attribute(
            get: fn () => ($this->depth >= self::MAX_LEVEL_COMMENTS) ? true:false,
        );
    }
}
