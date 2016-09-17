<?php

namespace Tjoosten\Countries\Database\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class TopLevelDomains
 * @package App
 */
class TopLevelDomains extends Model
{
    /**
     * Mass-assign fields.
     *
     * @var array
     */
    protected $fillable = ['tld'];

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
