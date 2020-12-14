@extends('template.app')
@section('css')
    <link href="{{asset('css/style.css')}}"  rel="stylesheet" type="text/css">
    @endsection
@section('content')
    @if($type=="create")
    <div class="container addIn">
        @if(count($errors)>0)
            <div class="alert alert-danger">
                <ul>
                    @foreach($errors->all() as $error )
                        <li>{{$error}}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        <div class="row">
            <div class="col-xs-12 text-center">
                <h1>Ajouter Inventaire</h1>
            </div>
            <form action='/addInventaire' method='post'>
                {{csrf_field()}}
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-6">
                        <label>Numero Serie <span class="obligatoire">(*)</span>:</label>
                        <div class="form-group{{$errors->has('numeroSerie')?'has-error':''}}">
                            <input type="text" class="form-control classForm" value="{{Request::old('numeroSerie')}}" name="numeroSerie" required="required">
                        </div>
                    </div>
                    <div class="col-xs-6">
                        <label>Designation<span class="obligatoire">(*)</span>:</label>
                        <div class="form-group{{$errors->has('designation')?'has-error':''}}">
                            <input type="text" class="form-control classForm" value="{{Request::old('designation')}}" name="designation" required="required">
                        </div>
                    </div>
                </div>
            </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Reference<span class="obligatoire">(*)</span>:</label>
                            <div class="form-group{{$errors->has('reference')?'has-error':''}}">
                                <input type="text" class="form-control classForm" value="{{Request::old('reference')}}" name="reference" required="required">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label>Salle<span class="obligatoire">(*)</span>:</label>
                            <select name="selectSalle" class="form-control classForm">
                                @forelse($salles as $salle)
                                    <option value="{{$salle->id}}">{{$salle->salle}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <label>Prix<span class="obligatoire">(*)</span>:</label>
                            <div class="form-group{{$errors->has('prix')?'has-error':''}}">
                                <input type="text" class="form-control classForm" value="{{Request::old('prix')}}" name="prix" required="required">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <label>Date d'acquisition <span class="obligatoire">(*)</span>:</label>
                            <div class="form-group{{$errors->has('dateAcquisition')?'has-error':''}}">
                                <input type="date" class="form-control classForm" value="{{Request::old('dateAcquisition')}}" name="dateAcquisition" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <div class="col-xs-12">
                    <div class="row">
                        <div class="col-xs-6">
                            <div class="form-group{{$errors->has('marche')?'has-error':''}}">
                                <label>Numero du marché<span class="obligatoire">(*)</span>:</label>
                                <input type="text" class="form-control classForm" value="{{Request::old('marche')}}" name="marche" required="required">
                            </div>
                        </div>
                        <div class="col-xs-6">
                            <div class="form-group{{$errors->has('fournisseur')?'has-error':''}}">
                                <label>fournissuer<span class="obligatoire">(*)</span>:</label>
                                <input type="text" class="form-control classForm" value="{{Request::old('fournisseur')}}" name="fournisseur" required="required">
                            </div>
                        </div>
                    </div>
                </div>
                <input type="hidden" value="{{$id1}}" name="idDepartment">
                <input type="hidden" value="{{$id2}}" name="idCategorie">
                <input type="hidden" value="{{$id3}}" name="idSousCategorie">
                <div class="col-xs-12 text-center">
                    <button class="btn btn-primary btnSave" type="submit">Sauvegarde</button>
                </div>
            </form>
        </div>
    </div>
    @endif
    @forelse(Session::get('user') as $user)
    @if($type=='update')
        <div class="container updateIn">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1>Modifier Inventaire</h1>
                </div>
                <form action='/updateInventaire/{{$inventaire->id}}' method='post'>
                    {{csrf_field()}}
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Numero Serie <span class="obligatoire">(*)</span>:</label>
                                @if($user->admin==1)
                                    <div class="form-group{{$errors->has('numeroSerie')?'has-error':''}}">
                                        <input type="text" class="form-control classForm" value="{{Request::old('numeroSerie')}}{{$inventaire->numeroSerie}}" name="numeroSerie">
                                    </div>
                                    @else
                                    <div class="form-group{{$errors->has('numeroSerie')?'has-error':''}}">
                                        <input type="text" disabled="disabled" class="form-control classForm" value="{{Request::old('numeroSerie')}}{{$inventaire->numeroSerie}}" name="numeroSerie">
                                    </div>
                                    @endif
                            </div>
                            <div class="col-xs-6">
                                <label>Designation<span class="obligatoire">(*)</span>:</label>
                                @if($user->admin==1)
                                    <div class="form-group{{$errors->has('designation')?'has-error':''}}">
                                        <input type="text" class="form-control classForm" value="{{Request::old('designation')}} {{$inventaire->designation}}"  name="designation" required="required">
                                    </div>
                                @else
                                    <div class="form-group{{$errors->has('designation')?'has-error':''}}">
                                        <input type="text" disabled="disabled" class="form-control classForm" value="{{Request::old('designation')}} {{$inventaire->designation}}"  name="designation" required="required">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Reference<span class="obligatoire">(*)</span>:</label>
                                @if($user->admin==1)
                                    <div class="form-group{{$errors->has('reference')?'has-error':''}}">
                                        <input type="text" class="form-control classForm" value="{{Request::old('reference')}} {{$inventaire->reference->reference}}" name="reference" required="required">
                                    </div>
                                @else
                                    <div class="form-group{{$errors->has('reference')?'has-error':''}}">
                                        <input type="text" disabled="disabled" class="form-control classForm" value="{{Request::old('reference')}} {{$inventaire->reference->reference}}" name="reference" required="required">
                                    </div>
                                @endif
                            </div>
                            <div class="col-xs-6">
                                <label>Salle<span class="obligatoire">(*)</span>:</label>
                                @if($user->admin==1)
                                    <select name="selectSalle" class="form-control classForm">
                                        <option value="{{$inventaire->salle->id}}" selected="selected">{{$inventaire->salle->salle}}</option>
                                        @forelse($salles as $sal)
                                            <option value="{{$sal->id}}">{{$sal->salle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                @else
                                    <select name="selectSalle" disabled="disabled" class="form-control classForm">
                                        <option value="{{$inventaire->salle->id}}" selected="selected">{{$inventaire->salle->salle}}</option>
                                        @forelse($salles as $sal)
                                            <option value="{{$sal->id}}">{{$sal->salle}}</option>
                                        @empty
                                        @endforelse
                                    </select>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <label>Prix<span class="obligatoire">(*)</span>:</label>
                                @if($user->admin==1)
                                    <div class="form-group{{$errors->has('prix')?'has-error':''}}">
                                        <input type="text" class="form-control classForm" value="{{Request::old('prix')}}{{$inventaire->prix}}" name="prix" required="required">
                                    </div>
                                @else
                                    <div class="form-group{{$errors->has('prix')?'has-error':''}}">
                                        <input type="text" disabled="disabled" class="form-control classForm" value="{{Request::old('prix')}}{{$inventaire->prix}}" name="prix" required="required">
                                    </div>
                                @endif
                            </div>
                            <div class="col-xs-6">
                                <label>Date d'acquisition <span class="obligatoire">(*)</span>:</label>
                                @if($user->admin==1)
                                    <div class="form-group{{$errors->has('dateAcquisition')?'has-error':''}}">
                                        <input type="date" class="form-control classForm" value="{{Request::old('dateAcquisition')}}{{$inventaire->dateAcquisition}}"  name="dateAcquisition" required="required">
                                    </div>
                                @else
                                    <div class="form-group{{$errors->has('dateAcquisition')?'has-error':''}}">
                                        <input type="date" disabled="disabled" class="form-control classForm" value="{{Request::old('dateAcquisition')}}{{$inventaire->dateAcquisition}}"  name="dateAcquisition" required="required">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                @if($user->admin==1)
                                    <div class="form-group{{$errors->has('marche')?'has-error':''}}">
                                        <label>Numero du marché<span class="obligatoire">(*)</span>:</label>
                                        <input type="text" class="form-control classForm" value="{{Request::old('marche')}} {{$inventaire->marche->marche}}"  name="marche" required="required">
                                    </div>
                                @else
                                    <div class="form-group{{$errors->has('marche')?'has-error':''}}">
                                        <label>Numero du marché<span class="obligatoire">(*)</span>:</label>
                                        <input type="text" disabled="disabled" class="form-control classForm" value="{{Request::old('marche')}} {{$inventaire->marche->marche}}"  name="marche" required="required">
                                    </div>
                                @endif
                            </div>
                            <div class="col-xs-6">
                                @if($user->admin==1)
                                    <div class="form-group{{$errors->has('fournisseur')?'has-error':''}}">
                                        <label>fournissuer<span class="obligatoire">(*)</span>:</label>
                                        <input type="text" class="form-control classForm" value="{{Request::old('fournisseur')}} {{$inventaire->fournisseur->fournisseur}}" name="fournisseur" required="required">
                                    </div>
                                @else
                                    <div class="form-group{{$errors->has('fournisseur')?'has-error':''}}">
                                        <label>fournissuer<span class="obligatoire">(*)</span>:</label>
                                        <input type="text" disabled="disabled" class="form-control classForm" value="{{Request::old('fournisseur')}} {{$inventaire->fournisseur->fournisseur}}" name="fournisseur" required="required">
                                    </div>
                                @endif
                            </div>
                        </div>
                    </div>
                    @if($user->admin==1)
                        <div class="col-xs-12 text-center">
                            <input type="hidden" value="{{$inventaire->numeroInventaire}}" name="numInventaire">
                            <button class="btn btn-primary btnSave" type="submit">Sauvegarde</button>
                        </div>
                    @else
                    @endif
                </form>
                @if($user->admin==1)
                    <div class="col-xs-12 text-center">
                        <a href="/supprimerInventaire/{{$inventaire->souscategorie->categorie->department->id}}/{{$inventaire->souscategorie->categorie->id}}/{{$inventaire->souscategorie->id}}/{{$inventaire->id}}/"><button class="btn btn-danger">Supprimer</button></a>
                    </div>
                @else
                @endif
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-12 text-center">
                                <h2> Les problèmes</h2>
                            </div>
                            @if(count($problem)>0)
                            <div class="col-xs-12 table-responsive">
                                <table class="table">
                                    <tr>
                                        <th># ID</th>
                                        <th>Designation de problème</th>
                                        @if($user->admin==1)
                                            <th>Supprimer</th>
                                        @else
                                        @endif
                                    </tr>
                                    @forelse($problem as $pro)
                                        <tr>
                                            <td>{{$pro->id}}</td>
                                            <td>{{$pro->designationProbleme}}</td>
                                            @if($user->admin==1)
                                                <td class="text-center"><a href="/supprimerProbleme/{{$inventaire->id}}/{{$pro->id}}">
                                                        <button class="btn btn-danger">Supprimer</button> </a>
                                                </td>
                                            @else
                                            @endif
                                        </tr>
                                        @empty
                                    @endforelse
                                </table>
                            </div>
                                @else
                                <div class="col-xs-12 text-center">
                                    <div class="alert  alert-danger">Vide</div>
                                </div>
                            @endif
                            <div class="col-xs-12 formProbleme">
                                @if(count($errors)>0)
                                    <div class="alert alert-danger">
                                        <ul>
                                            @foreach($errors->all() as $error )
                                                <li>{{$error}}</li>
                                            @endforeach
                                        </ul>
                                    </div>
                                @endif
                                <form action="/ajouterProbleme" method="post">
                                    {{csrf_field()}}
                                    <div class="row">
                                        <div class="col-xs-12"></div>
                                        <div class="form-group{{$errors->has('probleme')?'has-error':''}}">
                                            <label>Designation de Probleme<span class="obligatoire">(*)</span>:</label>
                                            <input type="text" class="form-control classForm" value="{{Request::old('probleme')}}" name="probleme" required="required">
                                        </div>
                                    </div>
                                    <input type="hidden" value="1" name="trueProbleme">
                                    <input type="hidden" value="{{$inventaire->id}}" name="inventaireId">
                                    <div class="col-xs-12">
                                        <button class="btn btn-primary" type="submit">sauvegarder</button>
                                    </div>
                                </form>
                            </div>
                            <div class="col-xs-12 btnProbleme">
                                <button class="btn btn-primary btnProbleme">Ajouter probleme</button>
                            </div>
                        </div>
                    </div>
            </div>
        </div>
    @endif
    @empty
    @endforelse
    @endsection
@section('js')
    <script type="text/javascript">
        $(document).ready(function(){
            $('.btnProbleme').click( function () {
                $('.formProbleme').fadeIn(50);
                $(this).fadeOut(50);
            });
        });
    </script>
    @endsection