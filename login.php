<?php
session_start();
$page = $_GET['page'];
if (empty($_SESSION[username]) AND empty($_SESSION[password]))
{
		switch($page)
		{
		//hazard ZONE
		case "hazard":
		header('location:include_login.php?log=hazard');
		break;
		
		//hazard ZONE
		case "event":
		header('location:include_login.php?log=event');
		break;
		
		//hazard ZONE
		case "notif":
		header('location:include_login.php?log=notif');
		break;
		
		// Default Page
		default:
		header('location:include_login.php?log=index');
		break;
		}
		
}
else
{
include "index.php";
}
?>