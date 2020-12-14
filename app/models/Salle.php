<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Salle extends Model 
{

    protected $table = 'salles';
    public $timestamps = false;

    public function inventaires()
    {
        return $this->hasMany('App\models\Inventaire');
    }

}