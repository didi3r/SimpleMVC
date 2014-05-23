<!DOCTYPE html>
<html> 
	<head> 
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <title><?php echo $html_title ?></title>
		<!-- CSS -->
		<link href="<?php echo BASE_URL ?>/public/css/reset.css" rel="stylesheet" type="text/css" />
		<link href="<?php echo BASE_URL ?>/public/css/style.css" rel="stylesheet" type="text/css" />
    <script src="http://jqueryjs.googlecode.com/files/jquery-1.3.2.min.js" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo BASE_URL ?>/public/js/loopedslider.js" type="text/javascript" charset="utf-8"></script>  
    <!--[if IE]>
		<script src="http://html5shiv.googlecode.com/svn/trunk/html5.js"></script>
		<![endif]-->
    <!-- Javascript -->
    <script type="text/javascript" charset="utf-8">  
    $(function(){  
        $('#showcase').loopedSlider({
						autoStart: 5000														
				});  
    });  
		</script>  
	</head>
<body>
<div id="wrapper">
	<header id="header" class="container">
  	<h1>Diseño y <br />Programación Web</h1>
    <nav id="menu">
    	<ul>
      	<li class="home"><span class="selected">Inicio</span></li>
        <li class="portfolio"><a href="<?php ViewHelper::createLinkUrl('portfolio') ?>">Portfolio</a></li>
        <li class="contact"><a href="<?php ViewHelper::createLinkUrl('contacto') ?>">Contacto</a></li>
      </ul>
    </nav>
  </header>