<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Inventaire extends Model 
{

    protected $table = 'inventaires';
    public $timestamps = false;

    public function souscategorie()
    {
        return $this->belongsTo('App\models\Souscategorie');
    }

    public function reference()
    {
        return $this->belongsTo('App\models\Reference');
    }

    public function fournisseur()
    {
        return $this->belongsTo('App\models\Fournisseur');
    }

    public function salle()
    {
        return $this->belongsTo('App\models\Salle');
    }

    public function problemes()
    {
        return $this->hasMany('App\models\Probleme');
    }

    public function marche()
    {
        return $this->belongsTo('App\Models\Marche');
    }

}