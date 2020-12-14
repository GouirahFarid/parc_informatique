<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Reference extends Model 
{

    protected $table = 'references';
    public $timestamps = false;

    public function inventaires()
    {
        return $this->hasMany('App\models\Inventaire');
    }

}