<!DOCTYPE html>
<html>
<head>
	<title>Admin account</title>
	<meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="/bootstrap/css/bootstrap.min.css">
    <link rel="stylesheet" type="text/css" href="/font-awesome/css/font-awesome.min.css">

    <script type="text/javascript" src="/jquery/jquery-3.2.1.slim.min.js"></script>
    <script type="text/javascript" src="/jquery/jquery-1.11.3.min.js"></script> 
    <script type="text/javascript" src="/popper/popper.min.js"></script>   
    <script type="text/javascript" src="/bootstrap/js/bootstrap.min.js"></script>
    <style type="text/css">
    	body{
    		background: #678;
    	}

    	ul{
    		list-style: none;
    		margin: 0;
    		padding: 0;
    	}
    	div.header{
    		width: 100%;
    		display: inline-flex;
    		background: #789;
    	}
    	div.header .header_left{
    		min-width: 250px;
    		display: flex;
    		box-shadow: 1px 0px 1px #ffffffaa;
    	}
    	div.header .header_left span{
    		padding: 15px;
    		color: #fff;
    		font-weight: bold;
    	}
    	.header_right{
    		display: inline-flex;
    		padding: 15px;
    		color: #fff;
    	}
    	.header_right_left{
    		float: left;
    	}
    	.header_right_right{
    		float: right;
    	}
    	div.body{
    		display: flex;
    	}
    	div.body .left{
    		display: block;
    		float: left;
    		min-height: 654px;
    		min-width: 250px;
    		background: #f3edf7d9;
    		box-shadow: 1px 0px 1px #ffffffaa;
    	}
    	ul.menu{
    	}
    	ul.menu li{
    		display: grid;
    		width: 100%;
    		box-shadow: 0px 1px 1px #ffffffaa;
    	}
    	ul.menu li a{
    		padding: 10px;
    	}
    	.sub{
    		display: none;
    		background: #900002f2;
    	}/*
    	li.hasub:focus-within .sub{
    		display: block;
    	}*/
    	ul.sub li a{    		
    		padding-left: 25px;
    	}

    </style>
</head>
<body>
	<div class="header">
		<div class="header_left">
			<span>MYKH</span>
		</div>
		<div class="header_right">
			<div class="header_right_left">
				<span class="fa fa-align-justify"></span>
			</div>
			<div class="header_right_right">
				<span class="fa fa-align-justify"></span>
			</div>
		</div>		
	</div>
	<div class="body">
		<div class="left">
			<ul class="menu">
				<li><a href="#"><i class="fa fa-th-large"></i> Dashboard</a></li>
				<li class="hasub"><a href="#"><i class="fa fa-desktop"></i> Managements</a>
					<ul class="sub">
						<li><a href="#"><i class="fa fa-twitter"></i> Income</a></li>
						<li><a href="#"><i class="fa fa-twitter"></i> Expense</a></li>
						<li><a href="#"><i class="fa fa-twitter"></i> Reports</a></li>
					</ul>
				</li>
				<li class="hasub"><a href="#"><i class="fa fa-user"></i> Users Management</a>
					<ul class="sub">
						<li><a href="#"><i class="fa fa-twitter"></i> Administrators</a></li>
						<li><a href="#"><i class="fa fa-twitter"></i> User</a></li>
					</ul>
				</li>
			</ul>
		</div>
	</div>
	<div class="footer">
		<div class="container-fluid">
			<div class="row">
				<div class="col-sm-4 text-center">
					<div class="footer_content">
						<a href="#"><i class="fa fa-facebook"></i></a>
						<a href="#"><i class="fa fa-instagram"></i></a>
						<a href="#"><i class="fa fa-twitter"></i></a>
					</div>					
				</div>
				<div class="col-sm-4 text-center">
					<div class="footer_content">
						<P>wWw.mykh.biz @ 2018</P>
					</div>
				</div>
				<div class="col-sm-4 text-center">
					<div class="footer_content">
						<a href="#">Term Of Services</a> 
						<a href="#">Policy Privacy</a>
					</div>
				</div>
			</div>
		</div>
	</div>


	<script type="text/javascript">
		$(".hasub").click( function(){
			$(this).find('.sub').slideToggle();
		})
	</script>
</body>
</html>