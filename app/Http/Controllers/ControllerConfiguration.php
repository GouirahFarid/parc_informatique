<?php

namespace App\Http\Controllers;

use App\models\Categorie;
use App\models\Department;
use App\models\Salle;
use App\models\SousCategorie;
use App\User;
use Illuminate\Http\Request;
use test\Mockery\ReturnTypeObjectTypeHint;
use Session;

class ControllerConfiguration extends Controller
{
     public  function getDepartments(){
         if(Session::has('user')){
         $departments=Department::all();
         $if="departments";
         return view('configuration',compact('departments','if'));
         }else{
             $error=false;
             return view('login',compact('error'));
         }

     }
    public  function getCategories(){
        if(Session::has('user')){
        $departments=Department::all();
        $if="categories";
        return view('configuration',compact('departments','if'));
        }else{
            $error=false;
            return view('login',compact('error'));
        }

    }
    public function getSalles(){
        if(Session::has('user')){
         $salles=Salle::paginate(10);
         $departments=Department::all();
         $if="salles";
         return view('configuration',compact('departments','salles','if'));
        }else{
            $error=false;
            return view('login',compact('error'));
        }
    }
    public function addSalle(){
        $departments=Department::all();
        $add="addSalle";
        return view('create' ,compact('add','departments'));
}
    public  function addSalles(Request $request){
        if(Session::has('user')){
        if($request->isMethod('post')){
            $this->validate($request,[
                'salle'=>'required|max:255|min:2|unique:salles'
            ]);
            $salle=new Salle();
            $salle->salle=$request->input('salle');
            $salle->save();
            return redirect('/salles');
        }
        }else{
            $error=false;
            return view('login',compact('error'));
        }
    }
    public  function deleteSalle($id){
         $salle=Salle::find($id);
         $salle->delete();
         return redirect('/salles');
    }
    public  function getSousCategories(){
        if(Session::has('user')){
        $departments=Department::all();
        $if="sousCategories";
        return view('configuration',compact('departments','if'));
        }else{
            $error=false;
            return view('login',compact('error'));
        }

    }
    public function addDepartment(){
        if(Session::has('user')){
        $departments=Department::all();
        $add="addDepartment";
        return view('create' ,compact('add','departments'));
        }else{
            $error=false;
            return view('login',compact('error'));
        }
    }
    public  function addDepartments(Request $request){
        if(Session::has('user')){
        if($request->isMethod('post')){
            $this->validate($request,[
                'departmentName'=>'required|max:255|min:2|unique:departments'
            ]);
            $department=new Department();
            $department->departmentName=$request->input('departmentName');
            $department->save();
            $departments=Department::all();
            $if="departments";
            return view('configuration',compact('departments','if'));
        }
        }else{
            $error=false;
            return view('login',compact('error'));
        }
    }
    public function deleteDepartment(Request $request, $id){
        if(Session::has('user')){
        $department=Department::find($id);
        $department->delete();
        return redirect('/departments');
        }else{
            $error=false;
            return view('login',compact('error'));
        }
   }
   public  function  deleteCategorie(Request $request,$id){
       if(Session::has('user')){
         $categorie=Categorie::find($id);
         $categorie->delete();
         return redirect('/categories');
       }else{
           $error=false;
           return view('login',compact('error'));
       }
   }
   public  function deleteSousCategorie(Request $request,$id){
       if(Session::has('user')){
         $sousCategorie=SousCategorie::find($id);
         $sousCategorie->delete();
         return redirect(('/sousCategories'));
       }else{
           $error=false;
           return view('login',compact('error'));
       }
   }
   public  function addCategorie($id){
       if(Session::has('user')){
         $departments=Department::all();
         $add="addCategorie";
         $dataerrors="";
         return view('create',compact('id','add','dataerrors','departments'));
       }else{
           $error=false;
           return view('login',compact('error'));
       }
   }
   public function addSousCategorie($id){
       if(Session::has('user')){
         $departments=Department::all();
         $add="addSousCategorie";
         $dataerrors="";
         return view('create' ,compact('id','add','dataerrors','departments'));
       }else{
           $error=false;
           return view('login',compact('error'));
       }
   }
   public  function addCategories(Request $request){
       if(Session::has('user')){
         if($request->isMethod('post')){
             $this->validate($request,[
                 'categorieName'=>'required|max:255|min:5|unique:categories'
             ]);
             $department=Department::find($request->input('idDep'));
             $depName=$department->departmentName;
             if($depName=="ADMINISTRATION"){
                 $depName="ADMIN";
             }
             $catName=$depName."-".strtoupper($request->input('categorieName'));
             $test=false;
             foreach ($department->categories as $categorie){
                 if($categorie->categorieName==$catName){
                     $test=true;
                 }
             }
             if(!$test){
                 $categorie=new Categorie();
                 $categorie->categorieName=$catName;
                 $categorie->department_id=$request->input('idDep');
                 $categorie->save();
                 return redirect('/categories');
             }else{
                 $dataerrors="deja existe";
                 $add="addCategorie";
                 $id=$request->input('idDep');
                 return view('create',compact('id','add','dataerrors'));
             }


         }
       }else{
           $error=false;
           return view('login',compact('error'));
       }
   }
   public  function addSousCategories(Request $request){
       if(Session::has('user')){
         if($request->isMethod('post')){
                 $this->validate($request,[
                     'sousCategorieName'=>'required|max:255|min:5'
                 ]);
             $categorie=Categorie::find($request->input('idCat'));
             $test=false;
             foreach ($categorie->sousCategories as $sousCategorie){
                 if($sousCategorie->sousCategorieName==$request->input('sousCategorieName') or $sousCategorie->categorie_id==$request->input('idCat')){
                     $test=true;
                 };
             }
             if(!$test){
                 $sousCat=new  SousCategorie();
                 $sousCat->sousCategorieName=$request->input('sousCategorieName');
                 $sousCat->categorie_id=$request->input('idCat');
                 $sousCat->save();
                 return redirect('/sousCategories');

             }else{
                 $dataerrors="deja existe";
                 $add="addCategorie";
                 $id=$request->input('idCat');
                 return view('create',compact('id','add','dataerrors'));
             }
         }
       }else{
           $error=false;
           return view('login',compact('error'));
       }

   }
   public  function getUsers(){
       if(Session::has('user')){
         $departments=Department::all();
         $users=User::all();
         $if='users';
         return view('configuration',compact('users','departments','if'));
       }else{
           $error=false;
           return view('login',compact('error'));
       }
   }

}
