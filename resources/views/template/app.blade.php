<!DOCTYPE html>
<html>
<head>

        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
        <!--<link href="{{ asset('css/bootstrap.min.css') }}" rel="stylesheet" type="text/css" >-->
        <link href="{{ asset('css/template.css') }}" rel="stylesheet" type="text/css" >
    @yield('css')
</head>
<body>
<nav class="navbar navbar-default navbar-fixed-top">
    <div class="container-fluid">

        <div class="navbar-header">
            <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#bs-example-navbar-collapse-1" aria-expanded="false">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand a" href="/"><span class="glyphicon glyphicon-home"></span><span class="a">ENSA-FES</span></a>
        </div>


        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li class="dropdown drop">
                    <a href="/inventaire" class="dropdown-toggle a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="a">Parc</span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/inventaire">All</a></li>
                        <li role="separator" class="divider"></li>
                        @forelse($departments as $department)
                            <li><a href="/inventaireDepartment/{{$department->id}}">{{$department->departmentName}}</a></li>
                            <li role="separator" class="divider"></li>
                            @empty
                            @endforelse
                    </ul>
                </li>
                <li class="dropdown drop">
                    <a href="#" class="dropdown-toggle a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="a">Rapport</span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/salle">Rapport(Salle)</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/fournisseur">Rapport(Fournisseur)</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/marche">Rapport(Marché)</a></li>
                    </ul>
                </li>
                @if(session()->has('user'))
                    @forelse(Session::get('user') as $user)
                        @if($user->admin==1)
                <li class="dropdown drop">
                    <a href="#" class="dropdown-toggle a" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false"><span class="a">Configuration</span><span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/departments">Département</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/categories">Catégorie</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/sousCategories">Sous catégorie</a></li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/salles">Salles</a> </li>
                        <li role="separator" class="divider"></li>
                        <li><a href="/users">Users</a> </li>
                    </ul>
                </li>
                        @endif
                    @empty
                        @endforelse
                    @endif
            </ul>
            <form class="navbar-form navbar-right" method="post" action="/searchAll">
                {{csrf_field()}}
                <div class="form-group">
                    <input type="text" class="form-control" placeholder="Search" name="searchFor">
                </div>
                <button type="submit" class="btn btn-primary"><span class="glyphicon glyphicon-search"></span></button>
            </form>
            @if(session()->has('user'))
            <ul class="nav navbar-nav navbar-right">
                <li class="dropdown drop">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown" role="button" aria-haspopup="true" aria-expanded="false">
                        <span class="a">
                             @forelse(Session::get('user') as $user)
                                {{$user->username}}
                            @empty
                            @endforelse
                        </span>
                        <span class="caret"></span></a>
                    <ul class="dropdown-menu">
                        <li><a href="/logout">Logout</a></li>
                        <li role="separator" class="divider"></li>
                    </ul>
                </li>
            </ul>
                @endif
        </div>
    </div>
</nav>
@yield('content')
<!--<script  src="{{ asset('js/bootstrap.min.js') }}" type="text/javascript"></script>
<script  src="{{asset('js/jquery-3.4.1.min.js')}}" type="text/javascript"></script>-->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>

@yield('js')
</body>
</html>