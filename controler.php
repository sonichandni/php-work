<?php
	session_start();
	include 'model.php';
	$md = new model();

	if (isset($_REQUEST["signup"]))
	{
		$data=array(
			"uid"=>$_REQUEST["uid"],
			"email"=>$_REQUEST["email"],
			"uname"=>$_REQUEST["nm"],
			"pwd"=>$_REQUEST["pwd"]
		);
		$md->insert($con,$data,"user");
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
?>