<?php

	// Prevent direct Access
	if (!defined("index"))
	{
		die("This File is not for Standalone Usage!");
	}

	// Check if a Number is even
	function even($number)
	{
		if($number%2==0)
		{
			return true;
		}
		else
		{
			return false;
		}
	}

	// Shorter mysq_num_rows
	function sqlcount($query)
	{
		return @mysql_num_rows($query);
	}

	// Shorter mysql_fetch_object
	function sqlfetch($query)
	{
		global $mecs;
		$mecs->rows++;	
		return @mysql_fetch_object($query);
	}

	// Shorter mysql_insert_id
	function sqlid()
	{
		return @mysql_insert_id();
	}

	// SQL Injenction save mysql_query with Error handling
	function sqlquery()
	{
		global $mecs;
		$mecs->queries++;
		
		// Build the Query
		$query="";
		for($i=0;$i<func_num_args();$i++)
		{
			if(even($i))
			{
				$query.=func_get_arg($i);
			}
			else
			{
				$query.=mysql_real_escape_string(func_get_arg($i));
			}
		}
		
		// Run the Query
		$output=mysql_query($query);
		if($output!==false)
		{
			return $output;
		}
		else
		{
			if ($mecs->settings->debug || (isset($_GET['debug']) && $_GET['debug']==$mecs->settings->debug))
			{
				$error=debug_backtrace();
				$errorfile=$error[0]['file'];
				$errorline=$error[0]['line'];
				$errorquery=$query;
				$errorerror=mysql_error();
				echo '<div style="width:100%;background-color:#ffaaaa;padding:10px;">Database error in file '.$errorfile.' on line '.$errorline.':<br>Failed query: '.$errorquery.'<br>Error: '.$errorerror.'</div>';
			}
		}
	}
	
?>