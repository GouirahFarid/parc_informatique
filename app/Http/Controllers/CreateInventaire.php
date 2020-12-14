<?php

namespace App\Http\Controllers;

use App\models\Categorie;
use App\models\Department;
use App\models\Fournisseur;
use App\models\Inventaire;
use App\Models\Marche;
use App\models\Probleme;
use App\models\Reference;
use App\models\Salle;
use Excel;
use Illuminate\Http\Request;

//use Maatwebsite\Excel\Excel;

class CreateInventaire extends Controller
{
    public  function createInventaire($id1,$id2,$id3){
        $departments=Department::all();
        $type="create";
        $salles=Salle::all();
        return view('createInventaire',compact('id1','id2','id3','salles','type','departments'));
    }
    public  function updateInventaire($id){
        $departments=Department::all();
        $type="update";
        $inventaire=Inventaire::find($id);
        $salles=Salle::all();
        $problem=Probleme::join('inventaires','problemes.inventaire_id','=','inventaires.id')
            ->where('inventaires.id',$id)
            ->where('problemes.probleme',1)->get(['problemes.id','problemes.designationProbleme']);
        return view('createInventaire',compact('departments','type','inventaire','salles','problem'));
    }
    public function createInventaires(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'numeroSerie'=>'required|max:255|min:5',
                'designation'=>'required|max:255[min:5',
                'dateAcquisition'=>'required',
                'prix'=>'required|numeric',
                'reference'=>'required|max:255',
                'marche'=>'required|max:255',
                'fournisseur'=>'required|max:255'
            ]);
            $numeroSerie=$request->input('numeroSerie');
            $designation=$request->input('designation');
            $dateAcquisition=date('Y-m-d',strtotime($request->input('dateAcquisition')));
            $prix=$request->input('prix');
            /*---------------------Reference---------------*/
            $idReference=1;
            $reference=Reference::where('reference',$request->input('reference'))->first();
            if(!empty($reference)){
                $idReference=$reference->id;
            }else{
                $reference=new Reference();
                $reference->reference=$request->input('reference');
                $reference->save();
                $reference=Reference::where('reference',$request->input('reference'))->first();
                $idReference=$reference->id;
            }
            /*---------------------Reference---------------*/

            /*------------------------Marche------------------*/
            $idMarche=1;
            $marche=Marche::where('marche',$request->input('marche'))->first();
            if(!empty($marche)){
                $idMarche=$marche->id;
            }else{
                $marche=new  Marche();
                $marche->marche=$request->input('marche');
                $marche->saveOrFail();
                $marche=Marche::where('marche',$request->input('marche'))->first();
                $idMarche=$marche->id;
            }

            /*------------------------Marche------------------*/

            /*----------------------Fournisseur-----------------*/
            $idFournisseur=1;
            $fournisseur=Fournisseur::where('fournisseur',$request->input('fournisseur'))->first();
            if(!empty($fournisseur)){
                    $idFournisseur=$fournisseur->id;
            }else{
                $fournisseur=new Fournisseur();
                $fournisseur->fournisseur=$request->input('fournisseur');
                $fournisseur->saveOrFail();
                $fournisseur=Fournisseur::where('fournisseur',$request->input('fournisseur'))->first();
                $idFournisseur=$fournisseur->id;

            }
            /*----------------------Fournisseur-----------------*/

            /*----------------Salle------------------*/
            $idSalle=$request->input('selectSalle');
            /*----------------Salle------------------*/

            /*--------------------------------numero Inventaire------------------*/
            $cat=Categorie::find($request->input('idCategorie'))->get();
            foreach ($cat as $categorie){
                $catExplode=explode("-",$categorie->categorieName);
            }
            $sifix="M".substr($catExplode[1],0,1);
            if($catExplode[1]=="IMMOBILIER"){
                $sifix="MIM";
            }
            $year=substr(date('Y',strtotime($request->input('dateAcquisition'))),-2);
            $lastInvantaire=Inventaire::all()->last();
            $last=explode('/',$lastInvantaire->numeroInventaire);
            /*--------------------------------numero Inventaire------------------*/
            $inventaire=new Inventaire();
            $inventaire->numeroInventaire=1+(int)$last[0].'/'.$year.'/'.$sifix;
            $inventaire->numeroSerie=$numeroSerie;
            $inventaire->designation=$designation;
            $inventaire->prix=$prix;
            $inventaire->dateAcquisition=$request->input('dateAcquisition');
            $inventaire->souscategorie_id=$request->input('idSousCategorie');
            $inventaire->salle_id=$idSalle;
            $inventaire->reference_id=$idReference;
            $inventaire->fournisseur_id=$idFournisseur;
            $inventaire->marche_id=$idMarche;
            $inventaire->saveOrFail();
             return redirect('/inventaireSouscategorie/'.$request->input('idDepartment').'/'.$request->input('idCategorie').'/'.$request->input('idSousCategorie').'');
        }
    }
    public  function updateInventaires(Request $request,$id){
        if($request->isMethod('post')){
            $this->validate($request,[
                'numeroSerie'=>'max:255',
                'designation'=>'required|max:255[min:5',
                'dateAcquisition'=>'required',
                'prix'=>'required|numeric',
                'reference'=>'required|max:255',
                'marche'=>'required|max:255',
                'fournisseur'=>'required|max:255'
            ]);
            $numeroSerie=$request->input('numeroSerie');
            if($numeroSerie==""){
                $numeroSerie="************";
            }
            $designation=$request->input('designation');
            $dateAcquisition=date('Y-m-d',strtotime($request->input('dateAcquisition')));
            $prix=$request->input('prix');
            /*---------------------Reference---------------*/
            $idReference=1;
            $reference=Reference::where('reference',$request->input('reference'))->first();
            if(!empty($reference)){
                $idReference=$reference->id;
            }else{
                $reference=new Reference();
                $reference->reference=$request->input('reference');
                $reference->save();
                $reference=Reference::where('reference',$request->input('reference'))->first();
                $idReference=$reference->id;
            }
            /*---------------------Reference---------------*/

            /*------------------------Marche------------------*/
            $idMarche=1;
            $marche=Marche::where('marche',$request->input('marche'))->first();
            if(!empty($marche)){
                $idMarche=$marche->id;
            }else{
                $marche=new  Marche();
                $marche->marche=$request->input('marche');
                $marche->saveOrFail();
                $marche=Marche::where('marche',$request->input('marche'))->first();
                $idMarche=$marche->id;
            }

            /*------------------------Marche------------------*/

            /*----------------------Fournisseur-----------------*/
            $idFournisseur=1;
            $fournisseur=Fournisseur::where('fournisseur',$request->input('fournisseur'))->first();
            if(!empty($fournisseur)){
                $idFournisseur=$fournisseur->id;
            }else{
                $fournisseur=new Fournisseur();
                $fournisseur->fournisseur=$request->input('fournisseur');
                $fournisseur->saveOrFail();
                $fournisseur=Fournisseur::where('fournisseur',$request->input('fournisseur'))->first();
                $idFournisseur=$fournisseur->id;

            }
            /*----------------------Fournisseur-----------------*/
            /*----------------Salle------------------*/
            $idSalle=$request->input('selectSalle');
            /*----------------Salle------------------*/
            /*------------------numeroInventaire---------------------*/
            $year=substr(date('Y',strtotime($request->input('dateAcquisition'))),-2);
            $numInventaire=explode('/',$request->input('numInventaire'));
            /*------------------numeroInventaire---------------------*/
            $inventaire=Inventaire::find($id);
            $inventaire->numeroInventaire=$numInventaire[0].'/'.$year.'/'.$numInventaire[2];
            $inventaire->numeroSerie=$numeroSerie;
            $inventaire->designation=$designation;
            $inventaire->prix=$prix;
            $inventaire->dateAcquisition=$request->input('dateAcquisition');
            $inventaire->salle_id=$idSalle;
            $inventaire->reference_id=$idReference;
            $inventaire->fournisseur_id=$idFournisseur;
            $inventaire->marche_id=$idMarche;
            $inventaire->save();
            return redirect('/inventaireSouscategorie/'.$inventaire->souscategorie->categorie->department->id.'/'.$inventaire->souscategorie->categorie->id.'/'.$inventaire->souscategorie->id);

        }
    }
    public  function ajouterProbleme(Request $request){
        if($request->isMethod('post')){
            $this->validate($request,[
                'probleme'=>'required|max:255'
            ]);
            $probleme=new Probleme();
            $probleme->probleme=$request->input('trueProbleme');
            $probleme->designationProbleme=$request->input('probleme');
            $probleme->inventaire_id=$request->input('inventaireId');
            $probleme->saveOrFail();
            return redirect('/updateInventaire/'.$request->input('inventaireId'));
        }
    }
    public  function supprimerProbleme($id1,$id2){
        $probeleme=Probleme::find($id2);
        $probeleme->probleme=0;
        $probeleme->save();
        return redirect('/updateInventaire/'.$id1);
    }
    public function supprimerInventaire($id1,$id2,$id3,$id4){
        $inventaire=Inventaire::find($id4);
        $inventaire->delete();
        return redirect('inventaireSouscategorie/'.$id1.'/'.$id2.'/'.$id3);
    }

}
