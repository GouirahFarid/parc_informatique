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
        <div class="container signIn">
            <div class="row">
                @if($error==true)
                    <div class="col-xs-12 text-center">
                        <div class="alert alert-danger">Le mot de pass ou login ne corresppond à aucun compte.</div>
                    </div>
                    @endif
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
                <form method="post" action="/login">
                    @csrf
                    <div class="col-xs-12">
                        <div class="form-group{{$errors->has('email')?'has-error':''}}">
                            <label>Login<span class="obligatoire">(*)</span>:</label>
                            <input type="text" name="email" value="{{Request::old('email')}}"  class="form-control" required="required" placeholder="Login">
                        </div>
                    </div>
                    <div class="col-xs-12">
                        <div class="form-group{{$errors->has('password')?'has-error':''}}">
                            <label>Mot  de pass<span class="obligatoire">(*)</span>:</label>
                            <input type="password" name="password" value="{{Request::old('password')}}"  class="form-control" required="required" placeholder="password">
                        </div>
                    </div>
                <div class="col-xs-12 text-right">
                    <button type="submit" class="btn btn-primary">Login</button>
                </div>
                    <div class="col-xs-12 text-left">
                        <h4><span class="obligatoire">(*)</span>:Obligatoire </h4>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
</div>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.4.0/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
</body>
</html>