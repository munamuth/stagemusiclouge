<!doctype html>
<html lang="{{ app()->getLocale() }}">
    <head>
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
        <link href="https://fonts.googleapis.com/css?family=Lato" rel="stylesheet">
        <?php $style =App\style::where('id', 1)->first() ?>
        <style type="text/css">
            *{
              font-family: 'Lato';
            }
            body{
                margin: 0;
                padding: 0;
            }
           .header{
                border-top: solid 5px {{$style->header_border_top}};
                position: relative;
                width: 100%;
                height: 150px;
                background: {{$style->header_background}};
                padding: 0px;
                top: 0px;
                left: 0px;
                border-bottom: solid 5px {{$style->header_border_bottom}};
           }
           .header>.logo{
                max-width: 50%;
                padding-left: 5%;
                position: absolute;
                display: block;
                top: 5%;
           }
           .header>logo>a{
            vertical-align:  middle;
           }
           .header>.logo>a>img{
                width: 350px; 
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
                padding: 0;
                padding-top: 2px;
                top: 90px;
                background: transparent;
                right: 15px;
           }
           ul.menu>li{
                float: left;
           }
           ul.menu>li>a{
                padding: 15px 5px 15px 5px;
                color: {{$style->header_text}};
                font-weight: bold;
                text-decoration: none;
                font-family: 'Lato', sans-serif;
                font-size: 20px;
                float: left;
                /*text-transform: uppercase;*/
           }
           ul.menu>li>a:hover{
                background: inherit;
                color: {{$style->header_text_hover}};
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
           .small_menu>button{
                position: absolute;
                top: 30px;
                right: 5px;
           }
           .footer{
                border-top: solid 5px {{$style->footer_border_top}};
                width: 100%;
                padding: 15px;
                background: {{ $style->footer_background}};
                z-index: 0;
           }
           .footer .panel{
                background: transparent;
           }
           .footer a{
                color: {{$style->footer_text}};
                padding-right: 5px;
                padding-top: 10px;
                text-decoration: none;
           }
           .social_network a .fa{
              font-size: 40px;
           }
           #menu_back{
                display: none;
           }
           .container{
            min-height: auto;
           }
           @media (min-width: 1367px){
            ul.menu{
              top: 80px;
            }
            ul.menu>li>a{
              font-size: 25px;
              padding-left: 15px;
              padding-right: 15px;

            }
           }
           @media (min-width: 1000px){
                .small_menu>button{
                    display: none;
                }
           }
           @media( max-width: 999px ){
                .header{
                    position: relative;
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
                    float: right;              
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
              .slider-img{
                  min-height: 300px;
              }
              .social_network{
                margin-top: 15px;
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
    <body style="max-width: 1366px; margin: auto;">
        <div class="header">
            <div class="logo">
                <a href="/">
                    <img alt="Brand" src="{{ url('node_modules/logo/'. $style->logo) }}" class="img-fluid">
                </a>
            </div>
            <div class="menu_area">
              <ul class="menu">
                <li id="menu_back"><a href="#"><span class="fa fa-close" style="float: right; padding-right: 5px;"></span></a></li>                
                <li id="home"><a href="{{ url('/') }}"><i class="fa fa-home"  style="font-size: 30px;"></i></a></li>
                <li id="home"><a href="{{ url('/news-and-events') }}">News and Events</a></li>
                <li id="home"><a href="{{ url('/menu') }}">Menu</a></li>
                <li id="home"><a href="{{ url('/gallery') }}">Gallery</a></li>
                <!-- <li id="about"><a href="{{ url('/about-us') }}">About Us</a></li> -->
                <li id="contact"><a href="{{ url('/contact-us') }}">Contact Us</a></li>
              </ul>
            </div>
            <div class="small_menu">
                <button type="button" class="btn btn-success no_radius" id="btn-menu"><span class="fa fa-bars"></span></button>
            </div>

        </div>
        <!-- END MENU VISIBLE <992PX -->
        
        @yield('body')
        <div class="footer">
            <div class="container">
                <div class="row">
                    <div class="col-12 col-sm-7">
                        <div class="row">
                          <div class="col-2">Address</div>
                          <div class="col-10">#375, Preah Sisowath Quay, Phnom Penh</div>


                          <div class="col-2">Tel</div>
                          <div class="col-10"><a href="tel:+855 17 991 303">+855 17 991 303</a></div>
                          <div class="col-2"></div>
                          <div class="col-10"><a href="tel:+855 16 605 781">+855 16 605 781</a></div>
                          <div class="col-2">Email</div>
                          <div class="col-10"><a href="mailto:sales@stagemusiclounge.com">sales@stagemusiclounge.com</a></div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-5 text-center">
                       <div class="social_network text-centert">
                          <a href="https://www.fb.com/stagemusiclounge" target="blank"><span style="color: #4267b2" class="fa fa-facebook-square"></span></a>
                          <a href="https://www.fb.com/stagemusiclounge"><span style="color: red" class="fa fa-instagram"></span></a>
                          <a href="https://www.fb.com/stagemusiclounge"><span style="color: #1da1f2;" class="fa fa-twitter-square"></span></a>
                       </div>
                    </div>
                  </div>
            </div>
          </div>      
            <div class="cpright" style="background: {{$style->bottom_background}};padding: 15px; text-align: center; border-top: solid 5px {{$style->footer_border_bottom}}; color: {{$style->bottom_text}}"> 
              <a href="/" style="color: {{$style->bottom_text}}">wWw.StageMusicLounge.cOm</a> &copy; {{ date('Y') }}
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
