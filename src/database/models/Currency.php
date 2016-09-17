<?php

namespace Tjoosten\Countries\Database\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Currency
 * @package Tjoosten\Countries\Database\Models
 */
class Currency extends Model
{
    /**
     * Declare the table
     *
     * @var array
     */
    protected $table = 'currencies';

    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['name'];

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