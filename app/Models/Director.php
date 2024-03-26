<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Director extends Model
{
    /**
     * Reserved seeders ids 
     */
    const RESERVED_ID_1 = 1;
    const RESERVED_ID_2 = 2;
    const RESERVED_ID_3 = 3;
    const RESERVED_ID_4 = 4;

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
    public function films(): HasMany
    {
        return $this->hasMany(Film::class);
    }
}
