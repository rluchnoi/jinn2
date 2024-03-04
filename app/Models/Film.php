<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Film extends Model
{
    /**
     * The attributes that are mass assignable.
     */
    protected $fillable = [
        'name',
        'image',
    ];

    /**
     * Disable timestamps
     */
    public $timestamps = false;
}
