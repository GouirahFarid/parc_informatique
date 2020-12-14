@extends('template.app')
@section('css')
    <title>Create</title>
    <link href="{{ asset('css/create.css') }}" rel="stylesheet" type="text/css" >
    @endsection
@section('content')
    @if($add=="addSalle")
        <div class="container addCat">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="h2 text-center">Ajouter une nouvelle Salle</h2>
            <form action="/addSalle" method="post">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('salle')?'has-error':''}} formCat">
                    <label>Salle<span class="obligatoire">(*)</span></label>
                    <input name="salle" value="{{Request::old('salle')}}" class="form-control" placeholder="Nom">

                </div>
                <div class="text-center"><button class="btn btn-primary btnCat" type="submit">Ajouter</button></div>
            </form>
        </div>
    @endif
    @if($add=="addDepartment")
        <div class="container addCat">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            <h2 class="h2">Ajouter une nouvelle département</h2>
            <form action="/addDepartment" method="post">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('departmentName')?'has-error':''}} formCat">
                    <label>Département<span class="obligatoire">(*)</span></label>
                    <input name="departmentName" value="{{Request::old('departmentName')}}" class="form-control" placeholder="Nom">

                </div>
                <button class="btn btn-primary btnCat" type="submit">Ajouter</button>
            </form>
        </div>
    @endif
    @if($add=="addCategorie")

                <div class="container addCat">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                    @if($dataerrors!="")
                        <div class="alert alert-danger">
                            <ul>
                                <li>{{$dataerrors}}</li>
                            </ul>
                        </div>
                    @endif
                        <h2 class="h2">Ajouter une nouvelle categorie</h2>
                        <form action="/addCategorie" method="post">
                            {{csrf_field()}}
                            <div class="form-group {{$errors->has('categorieName')?'has-error':''}} formCat">
                                <label>Categorie<span class="obligatoire">(*)</span></label>
                                <input name="categorieName" value="{{Request::old('categorieName')}}" class="form-control" placeholder="Nom">

                            </div>
                            <input type="hidden" value="{{$id}}" name="idDep">
                            <button class="btn btn-primary btnCat" type="submit">Ajouter</button>
                        </form>
                </div>
    @endif
    @if($add=="addSousCategorie")
        <div class="container addSousCat">
            @if(count($errors)>0)
                <div class="alert alert-danger">
                    <ul>
                        @foreach($errors->all() as $error )
                            <li>{{$error}}</li>
                        @endforeach
                    </ul>
                </div>
            @endif
            @if($dataerrors!="")
                <div class="alert alert-danger">
                    <ul>
                        <li>{{$dataerrors}}</li>
                    </ul>
                </div>
            @endif
                <h2 class="h2">Ajouter une nouvelle sous categorie<span class="obligatoire">(*)</span></h2>
            <form action="/addSousCategorie" method="post">
                {{csrf_field()}}
                <div class="form-group {{$errors->has('sousCategorieName')?'has-error':''}} formCat">
                    <label>Sous categorie<span class="obligatoire">(*)</span></label>
                    <input name="sousCategorieName" value="{{Request::old('SousCategorieName')}}" class="form-control">
                </div>
                <input type="hidden" value="{{$id}}" name="idCat">
                <button class="btn btn-primary btnSousCat" type="submit">Ajouter</button>
            </form>
        </div>
    @endif
    @endsection
