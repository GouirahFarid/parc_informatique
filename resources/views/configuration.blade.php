@extends('template.app')
@section('css')
    <title>configuration</title>
    <link rel="stylesheet" href="css/configuration.css">
    @endsection
@section('content')
    @if($if=="salles")
        <div class="container title-section">
            <p class="p"><span class=" glyphicon glyphicon-menu-right "></span> Salles</p>
        </div>
        <div class="container table-responsive">
            <table class="table">
                <tr class="table-head">
                    <th>#ID</th>
                    <th>SALLE</th>
                    <th>Modifier</th>
                    <th>SUPPRIMER</th>
                </tr>
                @forelse($salles as $salle)
                    <tr>
                        <td>{{$salle->id}}</td>
                        <td>{{$salle->salle}}</td>
                        </td><td><a href="/editSalle/{{$salle->id}}"><button class="btn btn-primary deleteDep">Modifier</button></a> </td>
                        </td><td><a href="/deleteSalle/{{$salle->id}}"><button class="btn btn-danger deleteDep">Supprimer</button></a> </td>
                    </tr>
                @empty
                @endforelse
                {{$salles->links()}}
            </table>
            <a href="/addSalle"><button class="btn btn-group-sm btn-primary ajouterDep">Ajouter une nouvelle salle</button></a>
        </div>
    @endif
    @if($if=="users")
        <div class="container title-section">
            <p class="p"><span class=" glyphicon glyphicon-menu-right "></span> users</p>
        </div>
        <div class="container table-responsive">
            <table class="table">
                <tr class="table-head">
                    <th>#ID</th>
                    <th>Username</th>
                    <th>E-mail</th>
                    <th>Type de compte</th>
                    <th>Modifier</th>
                    <th>Supprimer</th>
                </tr>
                @forelse($users as $user)
                    <tr>
                        <td>{{$user->id}}</td>
                        <td>{{$user->username}}</td>
                        <td>{{$user->email}}</td>
                        @if($user->admin==1)
                                <td>Admin</td>
                                @else
                                <td>Employé</td>
                                @endif
                        <td><a href="/updateUser/{{$user->id}}"><button class="btn btn-primary deleteDep">Modifier</button></a> </td>
                        <td><a href="/deleteUser/{{$user->id}}"><button class="btn btn-danger deleteDep">Supprimer</button></a> </td>
                    </tr>
                @empty
                @endforelse
            </table>
            <a href="/sign"><button class="btn btn-group-sm btn-primary ajouterDep">Ajouter une nouvelle salle</button></a>
        </div>
    @endif
    @if($if=="departments")
        <div class="container title-section">
            <p class="p"><span class=" glyphicon glyphicon-menu-right "></span> Départements</p>
        </div>
    <div class="container table-responsive">
        <table class="table">
            <tr class="table-head">
                <th>#ID</th>
                <th>DEPARTMENT</th>
                <th>Modifier</th>
                <th>SUPPRIMER</th>
            </tr>
            @forelse($departments as $department)
                <tr>
                    <td>{{$department->id}}</td>
                    <td>{{$department->departmentName}}</td>
                    </td><td><a href="/editDepartment/{{$department->id}}"><button class="btn btn-primary deleteDep">Modifier</button></a> </td>
                    </td><td><a href="/deleteDepartment/{{$department->id}}"><button class="btn btn-danger deleteDep">Supprimer</button></a> </td>
                </tr>
                @empty
            @endforelse
        </table>
        <a href="/addDepartment"><button class="btn btn-group-sm btn-primary ajouterDep">Ajouter une nouvelle département</button></a>
    </div>
    @endif
    @if($if=="categories")
        <div class="container title-section">
            <p class="p"><span class=" glyphicon glyphicon-menu-right "></span> Départements<span class=" glyphicon glyphicon-menu-right "></span>Catégories</p>
        </div>
        @forelse($departments as $department)
            <div class="container h">
                <h2 class="text-center">{{$department->departmentName}}</h2>
            </div>
                <div class="container table-responsive">

                    <table class="table">
                        <tr class="table-head ">
                            <th>#ID</th>
                            <th>CATEGORIE</th>
                            <th>DEPARTMENT</th>
                            <th>MODIFIER</th>
                            <th>SUPPRIMER</th>
                        </tr>
                        @forelse($department->categories as $categorie)
                        <tr>
                            <td>{{$categorie->id}}</td>
                            <td>{{$categorie->categorieName}}</td>
                            <td>{{$department->departmentName}}</td>
                            </td><td><a href="/editCategorie/{{$categorie->id}}"><button class="btn btn-primary">Modifier</button></a> </td>
                            </td><td><a href="/deleteCategorie/{{$categorie->id}}"><button class="btn btn-danger">Supprimer</button></a> </td>

                        </tr>
                        @empty
                        @endforelse
                    </table>
                    <a href="/addCategorie/{{$department->id}}"><button class="btn btn-group-sm btn-primary ">Ajouter une nouvelle catégorie</button></a>
                </div>
            @empty
            @endforelse
    @endif
    @if($if=="sousCategories")
        <div class="container title-section">
            <p class="p"><span class=" glyphicon glyphicon-menu-right "></span> Départements
                <span class=" glyphicon glyphicon-menu-right "></span>Catégories<span class=" glyphicon glyphicon-menu-right "></span>
                        Sous-catégorie
            </p>
        </div>
       @forelse($departments as $department)
            @forelse($department->categories as $categorie)
                <div class="container">
                    <h2 class="text-center">{{$categorie->categorieName}}</h2>
                </div>
                <div class="container table-responsive">
                    <table class="table">
                        <tr class="table-head ">
                            <th>#ID</th>
                            <th>SOUS CATEGORIE</th>
                            <th>CATEGORIE</th>
                            <th>DEPARTMENT</th>
                            <th>MODIFIER</th>
                            <th>SUPPRIMER</th>
                        </tr>
                        @forelse($categorie->souscategories as $sousCategorie)
                            <tr>
                                <td>{{$sousCategorie->id}}</td>
                                <td>{{$sousCategorie->sousCategorieName}}</td>
                                <td>{{$categorie->categorieName}}</td>
                                <td>{{$department->departmentName}}</td>
                                </td><td><a href="/editSousCategorie/{{$sousCategorie->id}}"><button class="btn btn-primary">modifier</button></a></td>
                                </td><td><a href="/deleteSousCategorie/{{$sousCategorie->id}}"><button class="btn btn-danger">Supprimer</button></a></td>
                            </tr>
                        @empty
                        @endforelse
                    </table>
                    <a href="/addSousCategorie/{{$categorie->id}}"><button class="btn btn-group-sm btn-primary ">Ajouter une nouvelle sous catégorie</button></a>
                </div>
                @empty
                @endforelse
           @empty
           @endforelse
    @endif
    @endsection