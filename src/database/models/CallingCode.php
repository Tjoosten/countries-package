<?php

namespace Tjoosten\Countries\Database\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class CallingCode
 * @package Tjoosten\Countries\Database\Models
 */
class CallingCode extends Model
{
    /**
     * Declare the table
     *
     * @var array
     */
    protected $table = 'calling_codes';

    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['code'];

    /**
     * Define the country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function country()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\Country')
            ->withTimestamps();
    }
}