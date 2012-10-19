<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}

	// Connect to Database Server
	$database=mysql_connect($mecs->settings->databaseserver,$mecs->settings->databaseuser,base64_decode($mecs->settings->databasepassword));
	if (!$database)
	{
		die('<html><head><title></title>Database Error!</head><body><h1>Could not connect to Database Server</h1><p>'.mysql_error().'</p></body></html>');
	}

	// Select Database
	if (!mysql_select_db($mecs->settings->databasedb))
	{
		mysql_close();
		die('<html><head><title></title>Database Error!</head><body><h1>Could not select Database</h1></body></html>');
	}
	
	// Define Character encoding
	sqlquery(" SET NAMES utf8 ");
	sqlquery(" SET CHARACTER SET utf8 ");

	// Read Settings
	$query=sqlquery(" SELECT * FROM ".PRE."settings ");
	$mecs->db=sqlfetch($query);

?>