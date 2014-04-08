<!DOCTYPE html>
<!--[if lt IE 7 ]><html class="ie ie6" lang="en"> <![endif]-->
<!--[if IE 7 ]><html class="ie ie7" lang="en"> <![endif]-->
<!--[if IE 8 ]><html class="ie ie8" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html lang="en"> <!--<![endif]-->
<head>

	<meta charset="utf-8">

	<title>Vancasti's Blog</title>

	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">
	
	<!-- <meta title="description" content="">
	<meta title="author" content=""> -->

	<link href='http://fonts.googleapis.com/css?family=Alfa+Slab+One' rel='stylesheet' type='text/css'>
	
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
	<div class="logo">
		<h1>BloGG</h1>
	</div>
</header>