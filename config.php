<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}

	// Settings for local Database Connection
	$mecs->settings->databaseserver="localhost";
	$mecs->settings->databaseuser="user";
	$mecs->settings->databasepassword="pwinbase64";
	$mecs->settings->databasedb="db";
	$mecs->settings->databasepre="prefix_";
	
	// Folders
	$mecs->settings->contentfolder="content/";
	$mecs->settings->stylefolder="styles/";
	$mecs->settings->templatefolder="templates/";
	
	// Defaults
	$mecs->settings->defaultcontent="index";
	$mecs->settings->defaultaction="default";
	$mecs->settings->defaultnotfound="404";
	$mecs->settings->defaultpermission="550";
	
	// Show all SQL Errors
	$mecs->settings->debug=true;
	
	// Secret Parameter for overwriting Debug Messages
	$mecs->settings->debugpw="secret";

?>