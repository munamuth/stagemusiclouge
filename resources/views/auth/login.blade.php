<!DOCTYPE html>
<html>
<head>
    <title></title>
    <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
        <head>
        <meta charset="UTF-8">
        <meta name="description" content="Stage Music Lounge">
        <meta name="keywords" content="Bar, Music, Drink, Food, Restuarant">
        <meta name="author" content="Stage Music Lounge">
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/jquery-ui/jquery-ui.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
</head>
<body>

</body>
</html>
<div class="container" style="margin-top: 25vh">
    <div class="row justify-content-center">
        <div class="col-sm-5">
            <div class="card">
                <div class="card-header bg-info"><p class="text-light" style="margin-bottom: 0"><i class="fa fa-user"></i> Login</p></div>

                <div class="card-body">
                    <form class="form-horizontal" method="POST" action="{{ route('login') }}">
                        {{ csrf_field() }}

                        <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-4">
                                    <label>Username</label>
                                </div>
                                <div class="col-8">
                                    <input id="email" type="email" class="form-control form-control-sm" name="email" value="{{ old('email') }}" required autofocus placeholder="Username or Email">

                                    @if ($errors->has('email'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                            <div class="row">
                                <div class="col-4">
                                    <label>Password</label>
                                </div>
                                <div class="col-8">
                                    <input id="password" type="password" class="form-control form-control-sm" name="password" required placeholder="Passwor">

                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="row">
                                <div class="col-4">
                                    <label></label>
                                </div>
                                <div class="col-8">
                                    <button type="Reset" class="btn btn-primary btn-sm">Reset</button>
                                    <button type="submit" class="btn btn-success btn-sm">
                                        Login
                                    </button>
                                </div>
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
