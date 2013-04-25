<?php

//
// PHASE: BOOTSTRAP
//

	define('NEXUS_INSTALL_PATH', dirname(__FILE__));
	define('NEXUS_SITE_PATH', NEXUS_INSTALL_PATH . '/site');

	require(NEXUS_INSTALL_PATH.'/src/CNexus/bootstrap.php');

	$nx = CNexus::Instance();
	
	
	
	
	
//
// PHASE: FRONTCONTROLLER ROUTE
//
	$nx->FrontControllerRoute();

	
	
	
	
//
// PHASE: THEME ENGINE RENDER
//
    $nx->ThemeEngineRender();
	
	

	
?>