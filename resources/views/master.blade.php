<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <!-- <meta name="viewport" content="width=device-width, initial-scale=1"> -->
        <meta name='viewport' content='width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=0' />
        <!-- css -->
        <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/bootstrap/dist/css/bootstrap.min.css') }}">

        <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/font-awesome/css/font-awesome.min.css')}}">
        <link rel="stylesheet" type="text/css" href="{{ url('/node_modules/jquery-ui/jquery-ui.css') }}">
        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Raleway:100,600" rel="stylesheet" type="text/css">
        <style type="text/css">
            body{
                margin: 0;
                padding: 0;
            }
           .header{
                border-top: solid 5px #786;
                position: relative;
                width: 100%;
                height: 150px;
                background: #f59419;
                padding: 0px;
                top: 0px;
                left: 0px;
                border-bottom: solid 5px #e62b4d;
           }
           .header>.logo{
                max-width: 50%;
                padding-left: 5%;
                position: absolute;
                display: block;
                top:25%;
           }
           .header>logo>a{
            vertical-align:  middle;
           }
           .header>.logo>a>img{
                width: 200px; 
                vertical-align:  middle;
                float: left;
           }
           .header>.menu_area{
                width: 80%;
                float: right;
                position: relative;
           }
           ul.menu{
                position: absolute;
                width: auto;
                list-style: none;
                margin: 0;
                margin-left: 10px;
                margin-top: 89px;
                padding: 0;
                padding-top: 2px;
                padding-right: 15px;
                background: transparent;
                right: 100px;
           }
           ul.menu>li{
                float: left;
           }
           ul.menu>li>a{
                padding: 15px 5px 15px 5px;
                color: #fff;
                font-weight: bold;
                text-decoration: none;
                float: left;
                /*text-transform: uppercase;*/
           }
           ul.menu>li>a:hover{
                background: inherit;
                color: #000;
                /*border-bottom: solid 3px #123;*/
           }
           ul.sub_menu{
                display: none;
                width: 500px;
                position: absolute;
                margin-top: 52px;
                padding-left: 0px;
                list-style: none;
                background: #002680;
                opacity: 0.95;
                z-index: 16
           }
           ul.sub_menu>li>a{
                padding: 15px; 
                display: block;
                text-decoration: none;
                color: #fff;
           }
           ul.sub_menu>li>a:hover{
                background: #123;
           }
           .has_sub:hover ul.sub_menu{
                display: block;
           }
           .small_menu>button{
                position: absolute;
                top: 30px;
                right: 5px;
           }
           .footer{
                border-top: solid 5px #e62b4d;
                width: 100%;
                padding: 15px;
                background: #f16f50;
                z-index: 0;
           }
           .footer .panel{
                background: transparent;
           }
           .footer th, .footer td, .footer td>a{
                color: #fff;
                padding-right: 5px;
                padding-top: 10px;
                text-decoration: none;
           }
           #menu_back{
                display: none;
           }
           .container{
            min-height: 400px;
           }
           @media (min-width: 1000px){
                .small_menu>button{
                    display: none;
                }
           }
           @media( max-width: 999px ){
                .header{
                    height: 100px;
                }
                #menu_back{
                    display: block;
                }
                .header>.menu_area{
                    width: 60%;
                    position: absolute;
                    right: -60%;
                    display: none;
                    z-index: 16;
                }
                ul.menu{
                    margin-top: 0px;
                    background: #123;
                    right: 0;
                }
               ul.menu>li{
                    width: 100%;
                    float: left;
               }               
               ul.menu>li:first-child{
                    width: 100%;
                    float: left;
               }
               ul.menu>li>a{
                    width: 100%;
                    padding-left: 30px;
               }
               ul.menu>li>a:hover{
                    background: #123;
               }
               ul.sub_menu{
                    position: relative;
                    width: 100%;
               }
               ul.sub_menu>li{
                    border-top: solid 1px #fff;
               }
               ul.sub_menu>li>a{
                    padding-left: 35px;
                    position: relative;
               }
               .container{
                min-height: 215px;
              }
           }
           .focus{/*
              border-bottom: solid 3px #123;*/
           }
           .focus:hover{
              border-bottom: none;
           }
        </style>
        @yield('header')
    </head>
    <body>
        <div class="header">
            <div class="logo">
                <a href="/">
                    <img alt="Brand" src="{{ url('node_modules/logo/logo.png') }}" class="img-fluid">
                </a>
            </div>
            <div class="menu_area">
                <!-- <ul class="menu">
                    <li id="menu_back"><a href="#"><span class="fa fa-bars" style="float: right; padding-right: 5px;"></span></a></li>
                    <li id="home"><a href="/">Events</a></li>
                    <li id="about"><a href="/">About Us</a></li>
                    <li id="contact"><a href="/">Contact Us</a></li>
                </ul> -->
            </div>
            <div class="small_menu">
                <button type="button" class="btn btn-success no_radius" id="btn-menu"><span class="fa fa-bars"></span></button>
            </div>

        </div>
        <!-- END MENU VISIBLE <992PX -->
        <div class="container-fluid">
            <div class="row">
                @yield('body')
            </div>
        </div>
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="panel panel-defualt no_radius">
                            <div class="'panel-body">
                                <table>
                                    <tbody>
                                        <tr>
                                            <th><span class="glyphicon glyphicon-map-marker"></span></th><th>Address</th><td> #375, Preah Sisowath Quay, Phnom Penh</td>
                                        </tr>
                                        <tr>
                                            <th><span class="glyphicon glyphicon-phone"></span></th><th>Tel</th><td><a href="tel:+855 12 77 55 58">+855 17 991 303</a></td>
                                        </tr>
                                        <tr>
                                            <th><span class="glyphicon glyphicon-phone"></span></th><th></th><td><a href="tel:+855 12 77 55 58">+855 16 605 781</a></td>
                                        </tr>
                                        <tr>
                                            <th><span class="glyphicon glyphicon-envelope"></span></th><th>Email</th><td><a href="mailto:sales@grandtechsys.com">sales@stagemusiclounge.com</a></td>
                                        </tr>
                                    </tbody>                                    
                                </table>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5">
                        <div class="card no_radius" style="background: transparent; border: transparent;">
                            <div class="card-body text-center">
                                <div class="fb-page" data-href="https://www.facebook.com/Stagemusiclounge/" data-small-header="false" data-adapt-container-width="false" data-hide-cover="true" data-show-facepile="true"><blockquote cite="https://www.facebook.com/Stagemusiclounge/" class="fb-xfbml-parse-ignore"><a href="https://www.facebook.com/grandtechsys/">Stagemusiclounge</a></blockquote></div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>      
            <div class="cpright" style="padding: 15px; text-align: center; border-top: solid 5px #e62b4d;"> 
              <a href="/">wWw.StageMusicLounge.cOm</a> &copy; {{ date('Y') }}
            </div> 
            <div class="fb_page">
                     
            </div>

        <!-- START SCRIPT -->
        <script type="application/javascript" src="{{ url('/node_modules/jquery/dist/jquery.min.js')}}"></script>
        <script type="text/javascript" src="{{ url('/node_modules/jquery-ui/jquery-ui.js') }}"></script>
        <script type="application/javascript" src="{{ url('/node_modules/bootstrap/dist/js/bootstrap.min.js') }}"></script>
        
        <script type="text/javascript">
            $('.date').datepicker({ dateFormat: "dd-mm-yy"});
            $('#btn-menu').click( function(){
                $('.menu_area').show( );
                $('.menu_area').animate({right: '0%'})                
            });
            $('#menu_back').click( function(){

                $('.menu_area').animate({right: '-100%'}, function(){
                    $(this).hide();
                });
            });
        </script>
        <div id="fb-root"></div>
          <script>(function(d, s, id) {
            var js, fjs = d.getElementsByTagName(s)[0];
            if (d.getElementById(id)) return;
            js = d.createElement(s); js.id = id;
            js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.10";
            fjs.parentNode.insertBefore(js, fjs);
          }(document, 'script', 'facebook-jssdk'));
          </script>
        <!-- END SCRIPT -->
        @yield('script')

    </body>
</html>
