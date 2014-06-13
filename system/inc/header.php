<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="es"> <!--<![endif]-->
<head>

	<meta charset="utf-8">

	<title>Vancasti's Blog <?php if(isset($title)) echo ' / ' . $title; ?></title>
	
	

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- <meta title="description" content="">
	<meta title="author" content=""> -->

	<link href='http://fonts.googleapis.com/css?family=Open+Sans' rel='stylesheet' type='text/css'>
	<link href="//netdna.bootstrapcdn.com/font-awesome/4.0.3/css/font-awesome.css" rel="stylesheet">

	
	<?php
	   $app = AppContext::instance();
       
		foreach ($app->get('css_array') as $file => $value) {
			echo '<link rel="stylesheet" href="' . $app->get('css_path') . '/' .$value . '">';
		} 
	?>

	<!--[if lt IE 9]>
	<script src="http://html5shim.googlecode.com/svn/trunk/html5.js"></script>
	<![endif]-->

	<link rel="shortcut icon" href="<?php echo $app->get('images_path'); ?>/favicon.ico">
	<link rel="apple-touch-icon" href="<?php echo $app->get('images_path'); ?>/apple-touch-icon.png">
	<link rel="apple-touch-icon" sizes="72x72" href="<?php echo $app->get('images_path'); ?>/apple-touch-icon-72x72.png">
	<link rel="apple-touch-icon" sizes="114x114" href="<?php echo $app->get('images_path'); ?>/apple-touch-icon-114x114.png">

</head>
<body>

<header class="header">
    <div class="container">
        <div class="two-thirds column">
        	<div class="logo">
        		<h1><a href="/blogg">myBlog</a></h1>
        	</div>
	   </div>
       <nav class="one-third column">
            <!-- start navigation -->
            <input class="nav-menu" id="all" type="radio" name="filter" checked="checked"/>
            <label for="all">Home</label>
            
            <input class="nav-menu" id="illustrations" type="radio" name="filter"/>
            <label for="illustrations">Sobre mí</label>
            
            <input class="nav-menu" id="posters" type="radio" name="filter"/>
            <label for="posters">Contacto</label>
            <!-- end navigation -->
            </nav>
        </div>
	</div>
</header>
<div class="banner">
    <div class="container">
        <div class="four columns">
        </div>
    </div>
</div>