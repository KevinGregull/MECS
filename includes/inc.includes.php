<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}
	
	// Include and initialize importand Variables
	require_once("inc.init.php");
	
	// Load the Configuration
	require_once("inc.config.php");
	
	// Load save SQL Functions
	require_once("inc.sql.php");
	
	// Connect to Database
	require_once("inc.sqlconnect.php");
	
	// Load URL Functions
	require_once("inc.backend.php");
	
	// Load SEO Functions
	require_once("inc.seo.php");
	
	// Handle Login and other Cookie requirements
	require_once("inc.cookie.php");
	
?>