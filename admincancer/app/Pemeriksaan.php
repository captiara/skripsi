<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Pemeriksaan extends Model
{
 /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'pemeriksaans';

/**    
    * The attributes that aren't mass assignable.
    *
    * @var array
    */
    protected $guarded = [];
}
