<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}
	
	// Load the actual config
	require_once("./config.php");
	
	// Make a define for Table Prefix for shorter Access
	define("PRE",$mecs->settings->databasepre);
	
?>