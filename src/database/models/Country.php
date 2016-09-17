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
    protected $fillable = ['name', 'tld'];


    /**
     * Get the tld properties for a country with this relation.
     *
     * @return \Illuminate\Database\Eloquent\Relations\BelongsToMany
     */
    public function tld()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\TopLevelDomains');
    }

    public function currency()
    {
        return $this->belongsToMany('Tjoosten\Countries\Database\Models\Currency');
    }
}