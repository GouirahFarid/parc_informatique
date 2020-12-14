<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Department extends Model 
{

    protected $table = 'departments';
    public $timestamps = false;

    public function categories()
    {
        return $this->hasMany('App\models\Categorie');
    }

}