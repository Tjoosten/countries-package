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
     * Mass-assign fields. 
     *
     * @var array 
     */ 
    protected $fillable = ['name', 'tld'];
}