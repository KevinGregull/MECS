<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}
	
	// Create include to the requested File
	$mecs->content=content(getQ().".php");

	// Run Backendcomputing
	require_once($mecs->content);

	// Include Design
	require_once(style("index.php",true));

?>
