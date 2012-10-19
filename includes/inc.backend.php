<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}
	
	// Return an absolute URL
	function root($url="",$slash=true)
	{
		if ($slash)
		{
			return "http://".index."/".$url;
		}
		else
		{
			return "http://".index.$url;
		}
	}
	
	// Return the URL to the requested Content
	function content($url)
	{
		global $mecs;
		return "./".$mecs->settings->contentfolder.$url;
	}
	
	// Return the URL to the requested Design
	function style($url,$relative=false)
	{
		global $mecs;
		if ($relative)
		{
			return "./".$mecs->settings->stylefolder.$mecs->db->style."/".$url;
		}
		else
		{
			return root($mecs->settings->stylefolder.$mecs->db->style."/".$url);
		}
	}
	
	// Return the URL to the requested Template
	function template($url,$relative=true)
	{
		global $mecs;	
		require_once(style($mecs->settings->templatefolder.$url,$relative));
	}

	// Return the current URL
	function url()
	{
		return root($_SERVER['REQUEST_URI'],false);
	}

	// Return the currently requested Query (The Content)
	if (isset($_GET['q']))
	{
		// Secure against bad requests
		if (preg_match("/[^A-z0-9]/",$_GET['q']))
		{
			$mecs->q=$mecs->settings->defaultpermission;
		}
		else
		{
			// Check if the File exists
			if (file_exists(content($_GET['q'].".php")))
			{
				$mecs->q=$_GET['q'];
			}
			else
			{
				$mecs->q=$mecs->settings->defaultnotfound;
			}
		}
	}
	else
	{
		$mecs->q=$mecs->settings->defaultcontent;
	}	
	function getQ()
	{
		global $mecs;
		return $mecs->q;
	}
	
	// Return the extended Query (The Subcontent)
	if (isset($_GET['qe']))
	{
		$mecs->qe=$_GET['qe'];
	}
	else
	{
		$mecs->qe=$mecs->settings->defaultcontent;
	}	
	function getQE()
	{
		global $mecs;
		return $mecs->qe;
	}
	
	// Return the Action
	if (isset($_GET['action']))
	{
		$mecs->action=$_GET['action'];
	}
	else
	{
		$mecs->action=$mecs->settings->defaultaction;
	}	
	function getAction()
	{
		global $mecs;
		return $mecs->action;
	}
	
	// Return the ID
	if (isset($_GET['id']))
	{
		$mecs->id=$_GET['id'];
	}
	else
	{
		$mecs->id=0;
	}	
	function getID()
	{
		global $mecs;
		return $mecs->id;
	}
	
	// Return the Page
	if (isset($_GET['page']))
	{
		$mecs->page=$_GET['page'];
	}
	else
	{
		$mecs->page=0;
	}	
	function getPage()
	{
		global $mecs;
		return $mecs->page;
	}

?>