<?php

	// Defaults
	$__pagetitle__ = isset($__pagetitle__) ? $__pagetitle__.' - PHPMVC' : 'PHPMVC';
	$__pagedescription__ = isset($__pagedescription__) ? $__pagedescription__ : '';






?><!DOCTYPE html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7"> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8"> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9"> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js"> <!--<![endif]-->
    <head>
        <meta charset="utf-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
        <title><?php echo $__pagetitle__; ?></title>
        <meta name="description" content="<?php echo $__pagedescription__; ?>">
        <meta name="viewport" content="width=device-width">

        <!-- Place favicon.ico and apple-touch-icon.png in the root directory -->

        <link rel="stylesheet" href="css/normalize.css">
        <link rel="stylesheet" href="css/main.css">
		<link rel="stylesheet" href="css/stylesheet.css">
        <script src="js/vendor/modernizr-2.6.2.min.js"></script>
    </head>
    <body>
        <!--[if lt IE 7]>
            <p class="chromeframe">You are using an <strong>outdated</strong> browser. Please <a href="http://browsehappy.com/">upgrade your browser</a> or <a href="http://www.google.com/chromeframe/?redirect=true">activate Google Chrome Frame</a> to improve your experience.</p>
        <![endif]-->
		
		<div id="page">

			<header>
				<div id="logo">
					MAWI13
				</div>
				
				<div id="menu">
					<a href="hem.php">Om mig</a> &nbsp;
					<a href="redovisning.php">Redovisning</a> &nbsp;
					<a href="source.php">Källkod</a>
				</div>
			</header>
			
			<div id="pagecontent">
