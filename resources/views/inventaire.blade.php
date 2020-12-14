@extends('template.app')
@section('css')
    <link rel="stylesheet" type="text/css" href="{{asset('css/inventaire.css')}}">
    @endsection
@section('content')
    @if($inv=="categorieInvantaire")
    <div class="container-fluid inventaire">
        <div class="row">
            <div class="col-xs-12">
                <div class="row">
                    <div class="col-xs-2">
                        <!-------------------------------------------------------------------------------->
                        @if($type=="all")
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @forelse($departments as $department)
                                        <li><a href="/inventaireDepartment/{{$department->id}}">{{$department->departmentName}}</a></li>
                                        <li role="separator" class="divider"></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                            @endif
                            @if($type=="department")
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{$department->departmentName}}<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        @forelse($departments as $dep)
                                            <li><a href="/inventaireDepartment/{{$dep->id}}">{{$dep->departmentName}}</a></li>
                                            <li role="separator" class="divider"></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @endif
                            @if($type=="categorie")
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{$department->departmentName}}<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        @forelse($departments as $dep)
                                            <li><a href="/inventaireDepartment/{{$dep->id}}">{{$dep->departmentName}}</a></li>
                                            <li role="separator" class="divider"></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @endif
                        @if($type=="sousCategorie")
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{$department->departmentName}}<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @forelse($departments as $dep)
                                        <li><a href="/inventaireDepartment/{{$dep->id}}">{{$dep->departmentName}}</a></li>
                                        <li role="separator" class="divider"></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                    @endif
                    <!-------------------------------------------------------------------------------->
                    </div>
                    <div class="col-xs-3">
                        <!-------------------------------------------------------------------------------->
                        @if($type=="department")
                        <div class="dropdown">
                            <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All<span class="caret"></span></button>
                            <ul class="dropdown-menu">
                                @forelse($categories as $cat)
                                    <li><a href="/inventaireCategorie/{{$department->id}}/{{$cat->id}}">{{$cat->categorieName}}</a></li>
                                    <li role="separator" class="divider"></li>
                                @empty
                                @endforelse
                            </ul>
                        </div>
                            @endif
                            @if($type=="categorie")
                                <div class="dropdown">
                                    <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{$categorie->categorieName}}<span class="caret"></span></button>
                                    <ul class="dropdown-menu">
                                        @forelse($categories as $cat)
                                            <li><a href="/inventaireCategorie/{{$department->id}}/{{$cat->id}}">{{$cat->categorieName}}</a></li>
                                            <li role="separator" class="divider"></li>
                                        @empty
                                        @endforelse
                                    </ul>
                                </div>
                            @endif
                        @if($type=="sousCategorie")
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{$categorie->categorieName}}<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @forelse($categories as $cat)
                                        <li><a href="/inventaireCategorie/{{$department->id}}/{{$cat->id}}">{{$cat->categorieName}}</a></li>
                                        <li role="separator" class="divider"></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                    @endif
                    <!-------------------------------------------------------------------------------->
                    </div>
                    <div class="col-xs-3">
                        <!-------------------------------------------------------------------------------->
                        @if($type=="categorie")
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">All<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @forelse($sousCategories as $sous)
                                        <li><a href="/inventaireSouscategorie/{{$department->id}}/{{$categorie->id}}/{{$sous->id}}">{{$sous->sousCategorieName}}</a></li>
                                        <li role="separator" class="divider"></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                            @endif
                        @if($type=="sousCategorie")
                            <div class="dropdown">
                                <button class="btn btn-default dropdown-toggle" type="button" data-toggle="dropdown">{{$sousCategorie->sousCategorieName}}<span class="caret"></span></button>
                                <ul class="dropdown-menu">
                                    @forelse($sousCategories as $sous)
                                        <li><a href="/inventaireSouscategorie/{{$department->id}}/{{$categorie->id}}/{{$sous->id}}">{{$sous->sousCategorieName}}</a></li>
                                        <li role="separator" class="divider"></li>
                                    @empty
                                    @endforelse
                                </ul>
                            </div>
                    @endif
                    <!-------------------------------------------------------------------------------->
                    </div>
                    <!---------------------------------------------------------------------------------->
                        <div class="col-xs-3">
                            <div class="row">
                                @if($type=="department")
                                <form action="/searchDepartment" method="post">
                                    {{csrf_field()}}
                                    <div class="col-xs-5">
                                        <div class="form-group{{$errors->has('searchFor')?'has-error':''}}">
                                            <input type="text" class="form-control" value="{{Request::old('searchFor')}}" name="searchFor" placeholder="Search">
                                        </div>
                                    </div>
                                    <input type="hidden" name="searchId" value="{{$department->id}}">
                                    <div class="col-xs-2"><button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                    </div>
                                </form>
                                @endif
                                @if($type=="categorie")
                                        <form action="/searchCategorie" method="post">
                                            {{csrf_field()}}
                                            <div class="col-xs-5">
                                                <div class="form-group{{$errors->has('searchFor')?'has-error':''}}">
                                                    <input type="text" class="form-control" value="{{Request::old('searchFor')}}" name="searchFor" placeholder="Search">
                                                </div>
                                            </div>
                                            <input type="hidden" name="searchId" value="{{$categorie->id}}">
                                            <div class="col-xs-2"><button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                            </div>
                                        </form>
                                    @endif
                                    @if($type=="sousCategorie")
                                        <form action="/searchSousCategorie" method="post">
                                            {{csrf_field()}}
                                            <div class="col-xs-5">
                                                <div class="form-group{{$errors->has('searchFor')?'has-error':''}}">
                                                    <input type="text" class="form-control" value="{{Request::old('searchFor')}}" name="searchFor" placeholder="Search">
                                                </div>
                                            </div>
                                            <input type="hidden" name="searchId" value="{{$sousCategorie->id}}">
                                            <div class="col-xs-2"><button class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
                                            </div>
                                        </form>
                                    @endif
                            </div>
                        </div>

                    <!---------------------------------------------------------------------------------->
                    <div class="col-xs-1">
                        @if($type=="all")
                            <a href="/exportAll"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Rapport</button> </a>
                        @endif
                        @if($type=="department")
                                <a href="/exportDepartment/{{$department->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Rapport</button> </a>
                        @endif
                        @if($type=="categorie")
                                <a href="/exportCategorie/{{$department->id}}/{{$categorie->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Rapport</button> </a>
                        @endif
                        @if($type=="sousCategorie")
                                <a href="/exportSousCategorie/{{$department->id}}/{{$categorie->id}}/{{$sousCategorie->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-print"></span>Rapport</button> </a>
                        @endif
                    </div>
                </div>
            </div>
            <div class="col-xs-12 table-responsive">
                <table class="table">
                    <tr class="th">
                        <th>#N INVENTAIRE</th>
                        <th>#N  SERIE</th>
                        <th>DESIGNATION</th>
                        <th>PRIX</th>
                        <th>DATE D'ACQUISITION</th>
                        <th>SALLE</th>
                        <th>Probleme</th>
                        <th>Configuration</th>
                    </tr>
                    @if($type=="all")
                        @forelse($inventaires as $inventaire)
                               <tr>
                                   <td>{{$inventaire->numeroInventaire}}</td>
                                   <td>{{$inventaire->numeroSerie }}</td>
                                   <td>{{$inventaire->designation }}</td>
                                   <td>{{$inventaire->prix}}</td>
                                   <td>{{ date('Y-m-d', strtotime($inventaire->dateAcquisition )) }}</td>
                                   <td>{{$inventaire->salle->salle}}</td>
                                   @php($test=false)
                                   @forelse($inventaire->problemes as $probleme)
                                       @if($probleme->probleme==1)
                                           @php($test=true)
                                       @endif
                                       @empty
                                       @endforelse
                                       @if($test==true)
                                           <td><span class=" glyphicon glyphicon-remove"></span> </td>
                                           @else
                                           <td><span class="glyphicon glyphicon-ok"></span></td>
                                        @endif
                                   <td><a href="/updateInventaire/{{$inventaire->id}}"><button class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> </button></a></td>
                               </tr>
                           </a>
                            @empty
                            @endforelse
                    {{$inventaires->links()}}
                    @endif
                    @if($type=="department")
                        @forelse($department->categories as $categoire)
                            @forelse($categoire->souscategories as $sous)
                                @forelse($sous->inventaires as $inventaire)
                                        <tr>
                                            <td>{{$inventaire->numeroInventaire}}</td>
                                            <td>{{$inventaire->numeroSerie }}</td>
                                            <td>{{$inventaire->designation }}</td>
                                            <td>{{$inventaire->prix}}</td>
                                            <td>{{ date('Y-m-d', strtotime($inventaire->dateAcquisition )) }}</td>
                                            <td>{{$inventaire->salle->salle}}</td>
                                            @php($test=false)
                                            @forelse($inventaire->problemes as $probleme)
                                                @if($probleme->probleme==1)
                                                    @php($test=true)
                                                @endif
                                            @empty
                                            @endforelse
                                            @if($test==true)
                                                <td><span class=" glyphicon glyphicon-remove"></span> </td>
                                            @else
                                                <td><span class="glyphicon glyphicon-ok"></span></td>
                                            @endif
                                            <td><a href="/updateInventaire/{{$inventaire->id}}">
                                                    <button class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> </button></a>
                                            </td>
                                        </tr>
                                    @empty
                                    @endforelse
                                @empty
                                @endforelse
                            @empty
                            @endforelse
                        @endif
                    @if($type=="categorie")
                        @forelse($categorie->souscategories as $sous)
                            @forelse($sous->inventaires as $inventaire)
                                    <tr>
                                        <td>{{$inventaire->numeroInventaire}}</td>
                                        <td>{{$inventaire->numeroSerie }}</td>
                                        <td>{{$inventaire->designation }}</td>
                                        <td>{{$inventaire->prix}}</td>
                                        <td>{{ date('Y-m-d', strtotime($inventaire->dateAcquisition )) }}</td>
                                        <td>{{$inventaire->salle->salle}}</td>
                                        @php($test=false)
                                        @forelse($inventaire->problemes as $probleme)
                                            @if($probleme->probleme==1)
                                                @php($test=true)
                                            @endif
                                        @empty
                                        @endforelse
                                        @if($test==true)
                                            <td><span class=" glyphicon glyphicon-remove"></span> </td>
                                        @else
                                            <td><span class="glyphicon glyphicon-ok"></span></td>
                                        @endif
                                        <td><a href="/updateInventaire/{{$inventaire->id}}">
                                                <button class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> </button></a>
                                        </td>
                                    </tr>
                                @empty
                                @endforelse
                            @empty
                            @endforelse
                    @endif
                    @if($type=="sousCategorie")
                        @forelse($sousCategorie->inventaires as $inventaire)
                            <tr>
                                <td>{{$inventaire->numeroInventaire}}</td>
                                <td>{{$inventaire->numeroSerie }}</td>
                                <td>{{$inventaire->designation }}</td>
                                <td>{{$inventaire->prix}}</td>
                                <td>{{ date('Y-m-d', strtotime($inventaire->dateAcquisition )) }}</td>
                                <td>{{$inventaire->salle->salle}}</td>
                                @php($test=false)
                                @forelse($inventaire->problemes as $probleme)
                                    @if($probleme->probleme==1)
                                        @php($test=true)
                                    @endif
                                @empty
                                @endforelse
                                @if($test==true)
                                    <td><span class=" glyphicon glyphicon-remove"></span> </td>
                                @else
                                    <td><span class="glyphicon glyphicon-ok"></span></td>
                                @endif
                                <td><a href="/updateInventaire/{{$inventaire->id}}">
                                        <button class="btn btn-primary"><span class="glyphicon glyphicon-cog"></span> </button></a>
                                </td>
                            </tr>
                        @empty
                        @endforelse
                        @endif
                </table>
            </div>
            @if(session()->has('user'))
                @forelse(Session::get('user') as $user)
                    @if($user->admin==1)
            @if($type=="sousCategorie")
                <div class="col-xs-12 text-right">
                    <a href="/addInventaire/{{$department->id}}/{{$categorie->id}}/{{$sousCategorie->id}}"><button class="btn btn-primary">Ajouter inventaire</button></a>
                </div>
            @endif
                    @endif
                @empty
                @endforelse
            @endif
        </div>
    </div>
    @endif
    @endsection
@section('js')
    <script src='{{asset('js/inventaire.js')}}'></script>
    @endsection