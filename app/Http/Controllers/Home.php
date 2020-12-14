<?php

namespace App\Http\Controllers;

use App\models\Department;
use App\models\Inventaire;
use Illuminate\Http\Request;
use Session;

class Home extends Controller
{
    public  function home(){
        if(Session::has('user')){
            $inventaires=Inventaire::join('problemes','problemes.inventaire_id','=','inventaires.id')
                ->where('problemes.probleme',1)->get(['inventaires.id','inventaires.numeroSerie','inventaires.numeroInventaire','inventaires.designation', 'inventaires.prix','inventaires.dateAcquisition']);
            $departments=Department::all();
            return view('home',compact('departments','inventaires'));
        }else{
            $error=false;
            return view('login',compact('error'));
        }

    }
}
