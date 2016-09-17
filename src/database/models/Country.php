<?php

namespace Tjoosten\Countries\Database\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Country
 * @package Tjoosten\Countries\Database\Models
 */
class Country extends Model
{
    /**
     * Table name assigment
     *
     * @var string
     */
    protected $table = 'countries';

    /**
     * Mass-assign fields. 
     *
     * @var array 
     */ 
    protected $fillable = ['name', 'tld', 'capital', 'alpha2code', 'alpha3code'];


    /**
     * Get the tld properties for a country with this relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tld()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\TopLevelDomains')
            ->withTimestamps();
    }

    /**
     * Get the country properties for a specific country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currency()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\Currency')
            ->withTimestamps();
    }

    /**
     * Get the timezone properties for a country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function timezone()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\Timezone')
            ->withTimestamps();
    }

    /**
     * Get the calling codes for a specific country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function callingCode()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\CallingCode')
            ->withTimestamps();
    }
}