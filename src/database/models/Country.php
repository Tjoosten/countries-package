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
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\TopLevelDomains');
    }

    /**
     * Get the country properties for a specific country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function currency()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\Currency');
    }

    /**
     * Get the timezone properties for a country.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function timezones()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\Timezone');
    }
}