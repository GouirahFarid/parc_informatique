<?php

namespace App\Http\Controllers;

use App\models\Categorie;
use App\models\Department;
use App\models\Fournisseur;
use App\models\Inventaire;
use App\Models\Marche;
use App\models\Salle;
use App\models\Souscategorie;
use Illuminate\Http\Request;
use Rap2hpoutre\FastExcel\FastExcel;
class ExportRapport extends Controller
{

    public  function exportAll(){
        $inventaires=Inventaire::all();
        return (new FastExcel($inventaires))->download('Departments.xlsx',function ($inventaires){
            return[
              "Department"=>$inventaires->souscategorie->categorie->department->departmentName,
              "Categorie"=>$inventaires->souscategorie->categorie->categorieName,
              "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
              "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                "N inventaire"=>$inventaires->numeroInventaire,
                "N Serie"=>$inventaires->numeroSerie ,
                "Designation"=>$inventaires->designation  ,
                "Prix"=>$inventaires->prix,
                "Date d'acquisition"=>date('Y-m-d', strtotime($inventaires->dateAcquisition )),
                "Salle"=>$inventaires->salle->salle,
                "Reference"=>$inventaires->reference->reference,
                "Fournisseur"=>$inventaires->fournisseur->fournisseur,
                "Marché"=>$inventaires->marche->marche

            ];
        });

    }
    public  function exportDepartment($id){
        $department=Department::find($id);
        $inventaires=Inventaire::join('souscategories','inventaires.souscategorie_id','=','souscategories.id')
            ->join('categories','souscategories.categorie_id','=','categories.id')
            ->join('departments','categories.department_id','=','departments.id')
            ->where('departments.id',$id)->get();
        if(!empty($inventaires)){
            return (new FastExcel($inventaires))->download($department->departmentName.'.xlsx',function ($inventaires){
                return[
                    "Department"=>$inventaires->souscategorie->categorie->department->departmentName,
                    "Categorie"=>$inventaires->souscategorie->categorie->categorieName,
                    "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                    "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                    "N inventaire"=>$inventaires->numeroInventaire,
                    "N Serie"=>$inventaires->numeroSerie ,
                    "Designation"=>$inventaires->designation ,
                    "Prix"=>$inventaires->prix,
                    "Date d'acquisition"=>date('Y-m-d', strtotime($inventaires->dateAcquisition )),
                    "Salle"=>$inventaires->salle->salle,
                    "Reference"=>$inventaires->reference->reference,
                    "Fournisseur"=>$inventaires->fournisseur->fournisseur,
                    "Marché"=>$inventaires->marche->marche

                ];
            });
        }else{
            return redirect('/inventaireDepartment/'.$id);
        }
    }
    public  function exportCategorie($id1,$id2){
        $categorie=Categorie::find($id1);
        $inventaires=Inventaire::join('souscategories','inventaires.souscategorie_id','=','souscategories.id')
            ->join('categories','souscategories.categorie_id','=','categories.id')
            ->where('categories.id',$id2)->get();
        if($inventaires->isNotEmpty()){
            return (new FastExcel($inventaires))->download($categorie->categorieName.'.xlsx',function ($inventaires){
                return[
                    "Department"=>$inventaires->souscategorie->categorie->department->departmentName,
                    "Categorie"=>$inventaires->souscategorie->categorie->categorieName,
                    "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                    "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                    "N inventaire"=>$inventaires->numeroInventaire,
                    "N Serie"=>$inventaires->numeroSerie ,
                    "Designation"=>$inventaires->designation  ,
                    "Prix"=>$inventaires->prix,
                    "Date d'acquisition"=>date('Y-m-d', strtotime($inventaires->dateAcquisition )),
                    "Salle"=>$inventaires->salle->salle,
                    "Reference"=>$inventaires->reference->reference,
                    "Fournisseur"=>$inventaires->fournisseur->fournisseur,
                    "Marché"=>$inventaires->marche->marche
                ];
            });
        }else{
           return redirect('inventaireCategorie/'.$id1.'/'.$id2);
        }
    }
    public  function exportSousCategorie($id1,$id2,$id3){
        $sousCategorie=Souscategorie::find($id3);
        $inventaires=Inventaire::join('souscategories','inventaires.souscategorie_id','=','souscategories.id')
            ->where('souscategories.id',$id3)->get();
        if($inventaires->isNotEmpty()){
            return (new FastExcel($inventaires))->download($sousCategorie->sousCategorieName.'.xlsx',function ($inventaires){
                return[
                    "Department"=>$inventaires->souscategorie->categorie->department->departmentName,
                    "Categorie"=>$inventaires->souscategorie->categorie->categorieName,
                    "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                    "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                    "N inventaire"=>$inventaires->numeroInventaire,
                    "N Serie"=>$inventaires->numeroSerie ,
                    "Designation"=>$inventaires->designation  ,
                    "Prix"=>$inventaires->prix,
                    "Date d'acquisition"=>date('Y-m-d', strtotime($inventaires->dateAcquisition )),
                    "Salle"=>$inventaires->salle->salle,
                    "Reference"=>$inventaires->reference->reference,
                    "Fournisseur"=>$inventaires->fournisseur->fournisseur,
                    "Marché"=>$inventaires->marche->marche

                ];
            });
        }else{
            return redirect('inventaireSouscategorie/'.$id1.'/'.$id2.'/'.$id3);
        }
    }
    public  function exportSalle($id){
        $salle=Salle::find($id);
        $inventaires=Salle::find($id)->inventaires;
        return (new FastExcel($inventaires))->download($salle->salle.'.xlsx',function ($inventaires){
            return[
                "Department"=>$inventaires->souscategorie->categorie->department->departmentName,
                "Categorie"=>$inventaires->souscategorie->categorie->categorieName,
                "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                "N inventaire"=>$inventaires->numeroInventaire,
                "N Serie"=>$inventaires->numeroSerie ,
                "Designation"=>$inventaires->designation ,
                "Prix"=>$inventaires->prix,
                "Date d'acquisition"=>date('Y-m-d', strtotime($inventaires->dateAcquisition )),
                "Reference"=>$inventaires->reference->reference,
                "Fournisseur"=>$inventaires->fournisseur->fournisseur,
                "Marché"=>$inventaires->marche->marche

            ];
        });
    }
    public  function exportFournisseur($id){
        $fournisseur=Fournisseur::find($id);
        $inventaires=Fournisseur::find($id)->inventaires;
        return (new FastExcel($inventaires))->download($fournisseur->fournisseur.'.xlsx',function ($inventaires){
            return[
                "Department"=>$inventaires->souscategorie->categorie->department->departmentName,
                "Categorie"=>$inventaires->souscategorie->categorie->categorieName,
                "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                "N inventaire"=>$inventaires->numeroInventaire,
                "N Serie"=>$inventaires->numeroSerie ,
                "Designation"=>$inventaires->designation ,
                "Prix"=>$inventaires->prix,
                "Date d'acquisition"=>date('Y-m-d', strtotime($inventaires->dateAcquisition )),
                "Salle"=>$inventaires->salle->salle,
                "Reference"=>$inventaires->reference->reference,
                "Marché"=>$inventaires->marche->marche

            ];
        });
    }
    public  function exportMarche($id){
        $marche=Marche::find($id);
        $inventaires=Marche::find($id)->inventaires;
        return (new FastExcel($inventaires))->download($marche->marche.'.xlsx',function ($inventaires){
            return[
                "Department"=>$inventaires->souscategorie->categorie->department->departmentName,
                "Categorie"=>$inventaires->souscategorie->categorie->categorieName,
                "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                "Sous-Categorie"=>$inventaires->souscategorie->sousCategorieName,
                "N inventaire"=>$inventaires->numeroInventaire,
                "N Serie"=>$inventaires->numeroSerie ,
                "Designation"=>$inventaires->designation  ,
                "Prix"=>$inventaires->prix,
                "Date d'acquisition"=>date('Y-m-d', strtotime($inventaires->dateAcquisition )),
                "Salle"=>$inventaires->salle->salle,
                "Reference"=>$inventaires->reference->reference,
                "Fournisseur"=>$inventaires->fournisseur->fournisseur

            ];
        });
    }
}
