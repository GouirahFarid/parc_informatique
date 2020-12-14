<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Souscategorie extends Model 
{

    protected $table = 'souscategories';
    public $timestamps = false;

    public function categorie()
    {
        return $this->belongsTo('App\models\Categorie');
    }

    public function inventaires()
    {
        return $this->hasMany('App\models\Inventaire');
    }

}