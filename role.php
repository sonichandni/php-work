<?php
	include 'controler.php';
	foreach($_SESSION["logged"] as $v)
	{
		$role=$v->role;
	}
	if($role==1)
	{
		include 'header.php';
	}
	else
	{
		include 'header_user.php';
	}
?>