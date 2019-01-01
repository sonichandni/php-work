<?php
	session_start();
	include 'model.php';
	$md = new model();
	$user_cnt=$md->cnt($con,"user");

	class user
	{

		function getAllUser()
		{
			$con1=new Connection();
    		$con=$con1->mkConnection();
			$q="select * from user";
            $res=$con->query($q);
            if($res)
            {
	            return $row = mysqli_fetch_all($res,MYSQLI_ASSOC);
        	}
		}
	}
	//Sign up
	if (isset($_REQUEST["signup"]))
	{
		$fnm=$_REQUEST["fnm"];
		$lnm=$_REQUEST["lnm"];
		$email=$_REQUEST["email"];
		$pwd=$_REQUEST["pwd"];
		$cpwd=$_REQUEST["cpwd"];

		if($fnm=='')
		{
			$errorMsg="*Please Enter First Name";
			$errorCode=1;
		}
		elseif($lnm=='')
		{
			$errorMsg="*Please Enter Last Name";
			$errorCode=2;
		}
		elseif ($email=='') {
			$errorMsg="*Plaese Enter Email";
			$errorCode=3;
		}
		elseif ($pwd=='') {
			$errorMsg="*Please Enter Password";
			$errorCode=4;
		}
		elseif ($cpwd=='') {
			$errorMsg="*Please Confirm Your Password";
			$errorCode=5;
		}
		elseif (!preg_match("/^[A-Za-z0-9_\-\.]+@[A-Za-z0-9]+\.[A-Za-z]{2,4}$/", $email))
		{
			$errorMsg="*Please enter email in correct formate. i.e.,example@gmail.com";
			$errorCode=3;
		}
		elseif (!preg_match("/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z])(?=.*[!@#$%^&*]).{8,}$/", $pwd)) {
			$errorMsg="*Password must contain atleast one symbol,one Capital letter, one numeric value and one lovercase letter and length of password must be atleast 8";
			$errorCode=4;
		}
		elseif ($pwd!=$cpwd) {
			$errorMsg="*Password and Confirm Password must match";
			$errorCode=5;
		}
		else
		{
			$dt=date("Y-m-d");
			$data=array(
				"first_name"=>$_REQUEST["fnm"],
				"last_name"=>$_REQUEST["lnm"],
				"email"=>$_REQUEST["email"],
				"pwd"=>$_REQUEST["pwd"],
				"date_created"=>$dt
			);
			$md->insert($con,$data,"user");
			header("location:index.php");
		}
	}
	//Sign in
	if(isset($_REQUEST["signin"]))
	{
		$uid=$_REQUEST["email"];
		$pwd=$_REQUEST["pwd"];
		if($uid=='')
		{
			$errorMsg="*Please Enter Email id";
			$errorCode=1;
		}	
		elseif ($pwd=='')
		{
			$errorMsg="*Please Enter Password";
			$errorCode=2;
		}
		else
		{
			$where=array(
				"email"=>$uid,
				"pwd"=>$pwd,
			);
			$res=$md->select_where($con,"user",$where);
			$_SESSION["logged"]=$res;
			//print_r($res);exit;
			if($res)
			{
				header("location:dashboard.php");
			}
			else
			{
				$errorMsg="*Please Enter Correct Email id or/and Password";
			}
		}
	}
	//Logout
	if(isset($_REQUEST["logout"]))
	{
		session_destroy();
		header("location:index.php");
	}
	//redirect to home page i.e., dashboard
	if(isset($_REQUEST["home"]))
	{
		header("location:dashboard.php");
	}
?>