@extends('template.app')
@section('css')
    <link href="{{asset('css/export.css')}}" rel="stylesheet" type="text/css">
    @endsection
@section('content')
    <div class="container export">
        @if($var=="salle")
            <div class="row">
                <div class="col-xs-12 text-center">
                    <h1>Rapport</h1>
                </div>
                <form action="/salles" method="post">
                    {{csrf_field()}}
                <div class="col-xs-12">
                    <label>Salles:</label>
                    <select name="salle" class="form-control">
                        @forelse($salles as $salle )
                            <option value="{{$salle->id}}">{{$salle->salle}}</option>
                        @empty
                        @endforelse
                    </select>
                </div>
                <div class="col-xs-12 text-center">
                    <button class="btn btn-primary bt" type="submit">Suivant</button>
                </div>
                </form>
                <div class="col-xs-12">
                    <a href="/"><button class="btn btn-default">Retour</button> </a>
                </div>
            </div>

        @endif
            @if($var=="fournisseur")
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h1>Rapport</h1>
                        </div>
                        <form action="/fournisseurs" method="post">
                            {{csrf_field()}}
                        <div class="col-xs-12">
                            <label>Fournisseurs:</label>
                            <select name="fournisseur" class="form-control">
                                @forelse($fournisseurs as  $fournisseur )
                                    <option value="{{$fournisseur->id}}">{{$fournisseur->fournisseur}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-primary bt" type="submit">Suivant</button>
                        </div>
                        </form>
                        <div class="col-xs-12">
                            <a href="/"><button class="btn btn-default">Retour</button> </a>
                        </div>
                    </div>

            @endif
            @if($var=="marche")
                    <div class="row">
                        <div class="col-xs-12 text-center">
                            <h1>Rapport</h1>
                        </div>
                        <form action="/marches" method="post">
                            {{csrf_field()}}
                        <div class="col-xs-12">
                            <label>Marché:</label>
                            <select name="marche" class="form-control">
                                @forelse($marches as  $marche )
                                    <option value="{{$marche->id}}">{{$marche->marche}}</option>
                                @empty
                                @endforelse
                            </select>
                        </div>
                        <div class="col-xs-12 text-center">
                            <button class="btn btn-primary bt" type="submit">Suivant</button>
                        </div>
                        </form>
                        <div class="col-xs-12">
                            <a href="/"><button class="btn btn-default">Retour</button> </a>
                        </div>
                    </div>

            @endif
            <div class="row">
                <div class="col-xs-12 text-center">
                    @if($var=="salles")
                        @if(count($salles->inventaires)>0)
                            <a href="/exportSalle/{{$salles->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span>Télécharger  </button></a>
                        @else
                            <div class="alert alert-danger">Vide</div>
                        @endif
                    @endif
                    @if($var=="fournisseurs")
                        @if(count($fournisseurs->inventaires)>0)
                            <a href="/exportFournisseur/{{$fournisseurs->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span>Télécharger </button></a>
                        @else
                            <div class="alert alert-danger">Vide</div>
                        @endif
                    @endif
                    @if($var=="marches")
                        @if(count($marches->inventaires)>0)
                            <a href="/exportMarche/{{$marches->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-download-alt"></span>Télécharger </button></a>
                        @else
                            <div class="alert alert-danger">Vide</div>
                        @endif
                    @endif
                </div>
                <div class="col-xs-12">
                    @if($var=="marches")
                    <a href="/marche"><button class="btn btn-default">Retour</button> </a>
                        @endif
                        @if($var=="fournisseurs")
                            <a href="/fournisseur"><button class="btn btn-default">Retour</button> </a>
                        @endif
                        @if($var=="salles")
                            <a href="/salle"><button class="btn btn-default">Retour</button> </a>
                        @endif
                </div>
            </div>
    </div>
    @endsection
