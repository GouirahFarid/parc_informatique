<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Probleme extends Model 
{

    protected $table = 'problemes';
    public $timestamps = false;

    public function inventaire()
    {
        return $this->belongsTo('App\models\Inventaire');
    }

}