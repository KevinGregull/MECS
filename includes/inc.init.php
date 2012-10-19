<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}

	// Send Charset Headers
	header("Content-Type: text/html; charset=UTF-8");
	
	// Initialize global Variable
	$mecs=new stdClass();
	$mecs->timer=microtime(true);
	$mecs->queries=0;
	$mecs->rows=0;
	$mecs->db=new stdClass();
	$mecs->settings=new stdClass();
	$mecs->content="";
	
?>