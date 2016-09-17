<?php

namespace Tjoosten\Countries\Database\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Timezone
 * @package Tjoosten\Countries\Database\Models
 */
class Timezone extends Model
{
    /**
     * Declare the table
     *
     * @var array
     */
    protected $table = 'timezones';

    /**
     * Mass-assign fields
     *
     * @var array
     */
    protected $fillable = ['name'];
}