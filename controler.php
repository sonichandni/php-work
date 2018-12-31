<?php
	session_start();
	include 'model.php';
	$md = new model();
	$user_cnt=$md->cnt($con,"user");

	if (isset($_REQUEST["signup"]))
	{
		$dt=date("Y-m-d");
		$data=array(
			"first_name"=>$_REQUEST["fnm"],
			"last_name"=>$_REQUEST["lnm"],
			"uid"=>$_REQUEST["uid"],
			"email"=>$_REQUEST["email"],
			"pwd"=>$_REQUEST["pwd"],
			"date_created"=>$dt
		);
		$md->insert($con,$data,"user");
		header("location:index.php");
	}
	if(isset($_REQUEST["signin"]))
	{
		$uid=$_REQUEST["uid"];
		$pwd=$_REQUEST["pwd"];

		$where=array(
			"uid"=>$uid,
			"pwd"=>$pwd,
		);
		$res=$md->select($con,"user",$where);
		if(isset($res))
		{
			header("location:dashboard.php");
		}
	}
	if(isset($_REQUEST["logout"]))
	{
		session_destroy();
		header("location:index.php");
	}
	if(isset($_REQUEST["ul"]))
	{
		$udata=$md->select($con,"user");
		$_SESSION["udata"]=$udata;
	}
?>