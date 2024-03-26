<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Film extends Model
{
    /**
     * Reserved seeders ids 
     */
    const RESERVED_ID_1 = 1;
    const RESERVED_ID_2 = 2;
    const RESERVED_ID_3 = 3;
    const RESERVED_ID_4 = 4;
    const RESERVED_ID_5 = 5;
    const RESERVED_ID_6 = 6;
    const RESERVED_ID_7 = 7;
    const RESERVED_ID_8 = 8;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'image',
        'video',
        'year'
    ];

    /**
     * The attributes that should be hidden for arrays.
     */
    protected $hidden = [
        'director_id'
    ];

    /**
     * Disable timestamps
     */
    public $timestamps = false;

    /**
     * Actors relation
     */
    public function actors(): BelongsToMany
    {
        return $this->belongsToMany(Actor::class);
    }

    /**
     * Director relation
     */
    public function director(): BelongsTo
    {
        return $this->belongsTo(Director::class);
    }
}
