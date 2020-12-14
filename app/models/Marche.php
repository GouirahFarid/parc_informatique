<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Marche extends Model 
{

    protected $table = 'marches';
    public $timestamps = false;

    public function inventaires()
    {
        return $this->hasMany('App\models\Inventaire');
    }

}