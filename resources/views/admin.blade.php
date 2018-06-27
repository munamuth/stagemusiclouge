<!DOCTYPE html>
<html>
<head>
    <title>{{ config('app.name')}}</title>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">
    <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/font-awesome/css/font-awesome.min.css')}}">
    <style type="text/css">
        body
        {
            min-width: 1024px;
            min-height: 100vh;
        }
        #left_menu
        {
            min-height: 80vh;
        }
        .card
        {
            border-radius: 0;
        }
        .card-header, .card-body
        {
            border-radius: 0;
            padding: 5px;
        }
        .card-body
        {
            padding: 5px;
        }
        .btn:hover{
            text-decoration: none;
        }
        ul
        {
            list-style: none;
        }
    </style>



</head>
<body>
   
     <nav class="navbar navbar-expand-md bg-light fixed-top" style="border-bottom: dotted 1px #123;">
        <a class="navbar-brand" href="#">StageMusicLouge</a>

        <form class="navbar-nav form-navbar ml-auto">
            <!-- <div class="btn-group btn-group-sm">
                <button type="button" class="btn btn-success" id="btnNew">New</button>
                <button type="button" class="btn btn-success" id="btnActive">Active</button>
                <button type="button" class="btn btn-success" id="btnInactive">Inactive</button>
                <button type="button" class="btn btn-success" id="btnDelete">Delete</button>
            </div> -->
        </form>
        <ul class="navbar-nav ml-auto">
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown">{{auth::user()->name}}</a>
                <div class="dropdown-menu">
                    <a href="{{ url('/admin/logout') }}" class="dropdown-item">Logout</a>
                </div>
            </li>
        </ul>
    </nav>

    <div style="margin-top: 50px;"></div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-3 bg-info" style="min-height: 80vh; padding: 0;">
                <div id="menu_accordion">
                    <!--DASHBOARD-->
                    <!-- <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#dashboard"><i class="fa fa-dashboard"></i> Dashboard</button>
                        </div>
                        <div id="dashboard" class="collapse" data-parent="#menu_accordion">
                            dashboard
                        </div>
                    </div> -->
                    <!--CONTENT SETTING-->
                    
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#content"><i class="fa fa-user"></i> Content Setting</button>
                        </div>
                        <div id="content" class="collapse" data-parent="#menu_accordion">
                            <ul>
                                <li><a href="{{ url('/admin/slider') }}"><i class="fa fa-book"></i> Sliders</a></li>
                                <li><a href="{{ url('/admin/menu') }}"><i class="fa fa-book"></i> Menu</a></li>
                                <!-- <li><a href="{{ url('/admin/menu-category') }}"><i class="fa fa-book"></i> Menu Category</a></li> -->
                                <li><a href="{{ url('/admin/gallery') }}"><i class="fa fa-book"></i> Gallary</a></li>
                                <!-- <li><a href="{{ url('/admin/about') }}"><i class="fa fa-book"></i> About</a></li> -->
                                <!-- <li><a href="{{ url('/admin/contact') }}"><i class="fa fa-book"></i> Contact</a></li> -->
                                <li><a href="{{ url('/admin/news-and-events') }}"><i class="fa fa-book"></i> News & Events</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--Account Setting-->
                    
                    
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#account"><i class="fa fa-users"></i> Account Setting</button>
                        </div>
                        <div id="account" class="collapse" data-parent="#menu_accordion">
                            <ul>
                                <li><a href="{{ url('/admin/account') }}"><i class="fa fa-user"></i> User</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!--style-->
                     
                    <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#style"><i class="fa fa-magic"></i> Style Setting</button>
                        </div>
                        <div id="style" class="collapse" data-parent="#menu_accordion">
                            <ul>
                                <li><a href="{{ url('/admin/style') }}"><i class="fa fa-magic"></i> Edit Style</a></li>
                                <li><a href="{{ url('/admin/logo') }}"><i class="fa fa-font-awesome"></i> Logo</a></li>
                            </ul>
                        </div>
                    </div>
                    
                    <!-- <div class="card">
                        <div class="card-header">
                            <button class="btn btn-link" data-toggle="collapse" data-target="#account"><i class="fa fa-users"></i> Logs</button>
                        </div>
                        <div id="account" class="collapse" data-parent="#menu_accordion">
                            log
                        </div>
                    </div> -->
                    
                </div>
            </div>
            <div class="col-9 bg-light">
                <div style="margin-top: 20px;"></div>
                <div class="alert alert-success alert-dismissable">
                  <button type="button" class="close" data-dismiss="alert">&times;</button>
                  <strong>{!!session('status')!!}</strong>
                </div>
                @yield("content")
            </div>
        </div>
        <p class="text-center">wWw.StageMusicLounge.cOm &copy; - <?php echo date('Y') ?></p>
    </div>



    <script type="application/javascript" src="{{ url('/node_modules/jquery/dist/jquery.min.js')}}"></script>
    <script type="application/javascript" src="{{ url('/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
    <script type="text/javascript">
        setTimeout(function(){ 
            al = $('.alert').find('strong').text();
            if( al == null || al == ""){
                $('.alert').hide();
            } else{
                setTimeout(function(){
                    $('.alert').hide();
                },3000)
            }
        }, 0)


    </script>
    @yield('script')
</body>
</html>