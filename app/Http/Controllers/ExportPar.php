<?php

namespace App\Http\Controllers;

use App\models\Department;
use App\models\Fournisseur;
use App\Models\Marche;
use App\models\Salle;
use Illuminate\Http\Request;

class ExportPar extends Controller
{
    public  function salle(){
        $var="salle";
        $departments=Department::all();
        $salles=Salle::all();
        return view('export',compact('var','departments','salles'));
    }
    public  function salles(Request $request){
        if($request->isMethod('post')) {
            $var = "salles";
            $departments = Department::all();
            $salles = Salle::find($request->input('salle'));
            return view('export', compact('var', 'departments', 'salles'));
        }
    }
    public  function fournisseur(){
        $var="fournisseur";
        $departments=Department::all();
        $fournisseurs=Fournisseur::all();
        return view('export',compact('var','departments','fournisseurs'));
    }
    public  function fournisseurs(Request $request){
        if($request->isMethod('post')){
            $var="fournisseurs";
            $departments=Department::all();
            $fournisseurs=Fournisseur::find($request->input('fournisseur'));
            return view('export', compact('var','departments','fournisseurs'));
        }
    }
    public  function marche(){
        $var="marche";
        $departments=Department::all();
        $marches=Marche::all();
        return view('export',compact('var','departments','marches'));
    }

    public  function marches(Request $request){
        if($request->isMethod('post')){
            $var="marches";
            $departments=Department::all();
            $marches=Marche::find($request->input('marche'));
            return view('export', compact('var','departments','marches'));
        }

    }

}
