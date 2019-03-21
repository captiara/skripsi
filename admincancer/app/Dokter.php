<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dokter extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'dokters';
    
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
