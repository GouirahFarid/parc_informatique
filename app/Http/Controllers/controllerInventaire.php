<?php

namespace App\Http\Controllers;

use App\models\Categorie;
use App\models\Department;
use App\models\Inventaire;
use App\models\SousCategorie;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class controllerInventaire extends Controller
{
    public  function inventaires()
    {
        $inv="categorieInvantaire";
        $type="all";
        $departments=DB::table('departments')->get();
        $inventaires=Inventaire::paginate(15);
        return view('inventaire',compact('departments','inventaires','inv' ,'type'));
    }
   public  function inventairesDepartment($id){

       $inv="categorieInvantaire";
       $type="department";
       $departments=Department::all();
       $department=Department::find($id);
       $categories=Department::find($id)->categories;
       return view('inventaire',compact('departments','department','categories','inv','type'));
   }
   public function inventaireCategorie($id1,$id2){
       $inv="categorieInvantaire";
       $type="categorie";
       $departments=Department::all();
       $department=Department::find($id1);
       $categorie=Categorie::find($id2);
       $categories=Department::find($id1)->categories;
        $sousCategories=Categorie::find($id2)->souscategories;
        return view('inventaire',compact('departments','department','categories','categorie','sousCategories','inv','type'));
   }
   public function inventaireSouscategorie($id1,$id2,$id3){
       $inv="categorieInvantaire";
       $type="sousCategorie";
       $departments=Department::all();
       $department=Department::find($id1);
       $categorie=Categorie::find($id2);
       $categories=Department::find($id1)->categories;
       $sousCategorie=SousCategorie::find($id3);
       $sousCategories=Categorie::find($id2)->souscategories;
       return view('inventaire',compact('departments','department','categorie','categories','sousCategorie','sousCategories','inv','type'));;
   }
}
