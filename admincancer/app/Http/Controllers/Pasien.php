<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pasien extends Model
{
     /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pasiens';
    
    /**
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
