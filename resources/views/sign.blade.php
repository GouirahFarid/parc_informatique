<!Doctype html>
<html>
<head>
    <title>Login</title>
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
    <link href="{{asset('css/login.css')}}" rel="stylesheet">
</head>
<body>
<div class="container-fluid">
<div class="row">
    <div class="col-xs-12 slogo text-center">
        <h1>ENSA-FEZ PARC</h1>
    </div>
    <div class="col-xs-12 login">
        <!----------------------------------------------------------------->
        @if($var=='updateUser')
        <div class="container signIn">
            <div class="row">
                <div class="col-xs-12">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form method="post" action="/updateUser">
                    @csrf
                    <div class="col-xs-12">
                        <div class="form-group{{$errors->has('username')?'has-error':''}}">
                            <label>Username<span class="label">(*)</span>:</label>
                            <input type="text" name="username" value="{{$user->username}}"  class="form-control" required="required" placeholder="Username" >
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group{{$errors->has('email')?'has-error':''}}">
                            <label>Email<span class="label">(*)</span>:</label>
                            <input type="email" name="email" value="{{$user->email}}"  class="form-control" required="required" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group{{$errors->has('password')?'has-error':''}}">
                                    <label>Mot de pass<span class="label">(*)</span>:</label>
                                    <input type="password"  name="password"  class="form-control" placeholder="password">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group{{$errors->has('password2')?'has-error':''}}">
                                    <label>Confirmation<span class="label">(*)</span> :</label>
                                    <input type="password" name="password2"  class="form-control"  placeholder="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            @if($user->admin==1)
                            <input type="checkbox" value="admin" name="admin" checked="checked">
                            @else
                                <input type="checkbox" value="admin" name="admin" >
                                @endif
                            <label>Admin</label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <a href="/users"><button class="btn btn-default">Retour</button></a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <input type="hidden" name="userId" value="{{$user->id}}">
                                <button type="submit" class="btn btn-primary">Sauvegarde</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
        <!-------------------------------------------------------------------->
        @if($var=='sign')
        <div class="container signIn">
            <div class="row">
                <div class="col-xs-12">
                    @if(count($errors)>0)
                        <div class="alert alert-danger">
                            <ul>
                                @foreach($errors->all() as $error )
                                    <li>{{$error}}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif
                </div>
                <form method="post" action="/sign">
                    @csrf
                    <div class="col-xs-12">
                        <div class="form-group{{$errors->has('username')?'has-error':''}}">
                            <label>Username<span class="label">(*)</span>:</label>
                            <input type="text" name="username" value="{{Request::old('username')}}"  class="form-control" required="required" placeholder="Username" >
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group{{$errors->has('email')?'has-error':''}}">
                            <label>Email<span class="label">(*)</span>:</label>
                            <input type="text" name="email" value="{{Request::old('email')}}"  class="form-control" required="required" placeholder="E-mail">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6">
                                <div class="form-group{{$errors->has('password')?'has-error':''}}">
                                    <label>Mot de pass<span class="label">(*)</span>:</label>
                                    <input type="password" value="{{Request::old('password')}}" name="password"  class="form-control" required="required" placeholder="password">
                                </div>
                            </div>
                            <div class="col-xs-6">
                                <div class="form-group{{$errors->has('password2')?'has-error':''}}">
                                    <label>Confirmation<span class="label">(*)</span> :</label>
                                    <input type="password" name="password2" value="{{Request::old('password2')}}"  class="form-control" required="required" placeholder="password">
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group">
                            <input type="checkbox" value="admin" name="admin">
                            <label>Admin</label>
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="row">
                            <div class="col-xs-6 text-left">
                                <a href="/users"><button class="btn btn-default">Retour</button></a>
                            </div>
                            <div class="col-xs-6 text-right">
                                <button type="submit" class="btn btn-primary">Ajouter</button>
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
        @endif
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>