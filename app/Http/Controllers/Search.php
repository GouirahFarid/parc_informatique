<?php

namespace App\Http\Controllers;

use App\models\Department;
use App\models\Inventaire;
use Illuminate\Http\Request;

class Search extends Controller
{
    public function searchAll(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'searchFor'=>'required'
            ]);
            $departments=Department::all();
            $results=Inventaire::where('inventaires.numeroInventaire','like','%'.$request->input('searchFor').'%')->get();
           /* if(count($results)==1){
                foreach ($results as $result){
                    return redirect('/updateInventaire/'.$result->id);
                }

            }*/
            return view('search',compact('results','departments'));
        }
    }
    public  function searchDepartment(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'searchFor'=>'required'
            ]);
            $departments=Department::all();
            $results=Inventaire::join('souscategories','inventaires.souscategorie_id','=','souscategories.id')
                ->join('categories','souscategories.categorie_id','=','categories.id')
                ->join('departments','categories.department_id','=','departments.id')
                ->where('inventaires.numeroInventaire','like','%'.$request->input('searchFor').'%')
                ->where('departments.id',$request->input('searchId'))->get();
            /*if(count($results)==1){
                foreach ($results as $result){
                    return redirect('/updateInventaire/'.$result->id);
                }

            }*/
            return view('search',compact('results','departments'));
        }
    }
    public  function searchCategorie(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'searchFor'=>'required'
            ]);
            $departments=Department::all();
            $results=Inventaire::join('souscategories','inventaires.souscategorie_id','=','souscategories.id')
                ->join('categories','souscategories.categorie_id','=','categories.id')
                ->where('inventaires.numeroInventaire','like','%'.$request->input('searchFor').'%')
                ->where('categories.id',$request->input('searchId'))->get();
            /*if(count($results)==1){
                foreach ($results as $result){
                    return redirect('/updateInventaire/'.$result->id);
                }

            }**/
            return view('search',compact('results','departments'));
        }

    }
    public  function searchSousCategorie(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'searchFor'=>'required'
            ]);
            $departments=Department::all();
            $results=Inventaire::join('souscategories','inventaires.souscategorie_id','=','souscategories.id')
                ->where('inventaires.numeroInventaire','like','%'.$request->input('searchFor').'%')
                ->where('souscategories.id',$request->input('searchId'))->get();
            /*if(count($results)==1){
                foreach ($results as $result){
                    return redirect('/updateInventaire/'.$result->id);
                }

            }*/
            return view('search',compact('results','departments'));
        }

    }
}
