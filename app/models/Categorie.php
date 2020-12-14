<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Categorie extends Model 
{

    protected $table = 'categories';
    public $timestamps = false;

    public function department()
    {
        return $this->belongsTo('App\models\Department');
    }

    public function souscategories()
    {
        return $this->hasMany('App\models\Souscategorie');
    }

}