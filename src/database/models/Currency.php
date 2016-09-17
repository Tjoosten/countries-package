<?php

namespace Tjoosten\Countries\Database\Models;

use Illuminate\Database\Eloquent\Model;

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
}