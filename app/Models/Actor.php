<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Actor extends Model
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
    const RESERVED_ID_9 = 9;
    const RESERVED_ID_10 = 10;
    const RESERVED_ID_11 = 11;
    const RESERVED_ID_12 = 12;
    const RESERVED_ID_13 = 13;
    const RESERVED_ID_14 = 14;
    const RESERVED_ID_15 = 15;
    const RESERVED_ID_16 = 16;

    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
    ];

    /**
     * Disable timestamps
     */
    public $timestamps = false;

    /**
     * Films relation
     */
    public function films(): BelongsToMany
    {
        return $this->belongsToMany(Film::class);
    }
}
