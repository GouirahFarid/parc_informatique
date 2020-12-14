<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Fournisseur extends Model 
{

    protected $table = 'fournisseurs';
    public $timestamps = false;

    public function inventaires()
    {
        return $this->hasMany('App\models\Inventaire');
    }

}