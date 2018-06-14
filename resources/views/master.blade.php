<!DOCTYPE html>
<html>
<head>
    <title>MY KH</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <style type="text/css">
        .image{
                width: 30%;
                float: left;
        }
        @media only screen and (max-width: 767px){
            .image{
                width: 100%;
            }
        }
    </style>
</head>
<body>
   
     <nav class="navbar navbar-expand-md bg-dark navbar-dark fixed-top">
        <a class="navbar-brand" href="/">MyKH</a>

  <!-- Toggler/collapsibe Button -->
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#collapsibleNavbar">
            <span class="navbar-toggler-icon"></span>
        </button>

  <!-- Navbar links -->
        <div class="collapse navbar-collapse" id="collapsibleNavbar">
            <ul class="navbar-nav">
                @foreach( App\tbl_menu::where('status', 1)->get() as $m)
                <li class="nav-item">
                    <a class="nav-link" href="/post/{{$m->url}}" link="{{$m->name}}">{{$m->name}}</a>
                </li>
                @endforeach
            </ul>
            <form class="form-navbar ml-auto">
                <div class="btn-group">
                    <input type="text" name="q" class="form-control form-control-sm" placeholder="Search...">
                    <button class="btn btn-light btn-sm">Search</button>
                </div>
            </form>
        </div>
    </nav>

    <div style="margin-top: 50px;"></div>
    <marquee>www.mykh.biz</marquee>
    
    <div class="container">
        <div class="row">
            <div class="col-xs-12 col-sm-3">
                <ul class="navbar-nav">
                @foreach( App\tbl_menu::where('status', 1)->get() as $m)
                <li class="nav-item">
                    <a class="nav-link" href="/post/{{$m->url}}" link="{{$m->name}}">{{$m->name}}</a>
                </li>
                @endforeach
            </ul>
            </div>
            <div class="col-xs-12 col-sm-7 bg-light">
                @yield('content')
                
            </div>
            <div class="col-xs-12 col-sm-2 text-center" style="padding: 0">
                <div class="fb-page" data-href="https://www.facebook.com/mykh.biz/" data-small-header="false" data-adapt-container-width="true" data-hide-cover="false" data-show-facepile="true"><blockquote cite="https://www.facebook.com/mykh.biz/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/mykh.biz/">MYKH</a></blockquote></div>
            </div>
        </div>
    </div>



    <p class="text-center">www.mykh.biz 2018</p>

    <div id="fb-root"></div>
<script>(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = 'https://connect.facebook.net/en_GB/sdk.js#xfbml=1&version=v2.12&appId=928194030589343&autoLogAppEvents=1';
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));</script>



    <script type="text/javascript" src="/jquery/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="/popper/popper.min.js"></script>
</body>
</html>