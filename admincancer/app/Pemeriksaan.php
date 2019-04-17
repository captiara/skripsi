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

    public function dokters()
    {
        return $this->belongsTo('App\Dokter','dokters_id');
    }

    public function pasiens()
    {
        return $this->belongsTo('App\Pasien','pasiens_id');
    }

    public function category()
    {
        return $this->belongsTo('App\Category','category_id');
    }

    
}
