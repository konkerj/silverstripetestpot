<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>
	<meta charset="utf-8" />
	
	<!-- Page Title -->
	<title>One Ring Rentals - $Title</title>
	$MetaTags(false)
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1" />

	<% base_tag %>
	<!-- IE6-8 support of HTML5 elements -->
	<!--[if lt IE 9]>
	  <script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script> 
	<![endif]-->
	
	<!-- Google Web Font -->
	<link href="http://fonts.googleapis.com/css?family=Raleway:300,500,900%7COpen+Sans:400,700,400italic" rel="stylesheet" type="text/css" />
</head>
<body>
	<!-- BEGIN WRAPPER -->
	<div id="wrapper">
	
		<!-- BEGIN HEADER -->
		<header id="header">
			<% include TopBar %>
			
			<% include MainNav %>
		</header>
		<!-- END HEADER -->
                
                <div class="parallax colored-bg pattern-bg" data-stellar-background-ratio="0.5">
                        <div class="container">
                                <div class="row">
                                        <div class="col-sm-12">
                                                <h1 class="page-title">$Title</h1>

                                                <ul class="breadcrumb">
                                                        $Breadcrumbs				
                                                </ul>
                                        </div>
                                </div>
                        </div>
                </div>
                <!-- END PAGE TITLE/BREADCRUMB -->
		
		$Layout
		

				
		<% include Footer %>
	
	</div>
	<!-- END WRAPPER -->
</body>
</html>