<?php
	session_start();
	
	include 'model.php';
	$md = new model();
	$user_cnt=$md->cnt($con,"user");
	date_default_timezone_set("Asia/Kolkata");
	class getData
	{

		function getAllUser()
		{
			$con1=new Connection();
    		$con=$con1->mkConnection();
    		foreach ($_SESSION["logged"] as $k) {
    			$cid=$k->uid;
    		}
			$q="SELECT * FROM user WHERE uid NOT IN ($cid)";
			$res=$con->query($q);
            if($res)
            {
	            return $row = mysqli_fetch_all($res,MYSQLI_ASSOC);
        	}
		}
		function getAllProducts()
		{
			$con1=new Connection();
    		$con=$con1->mkConnection();
    		$q="SELECT * FROM product";
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
		//echo $_REQUEST["signup"];exit;
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
			echo "success";
		}
	}
	//Sign in
	if(isset($_POST['login']))
	{
		//echo $_POST['email']." ".$_POST['pwd'];exit;
		$uid=$_POST['email'];
		$pwd=$_POST['pwd'];
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
				echo "success";
			}
			else
			{
				$errorMsg="*Please Enter Correct Email id or/and Password";
				echo $errorMsg;
			}
		}
	}
	//------------------Edit users details start----------------
	//fetch user data to update
	if(isset($_REQUEST["user_update"]))
	{
		$uid=$_REQUEST["user_update"];
		$where = array(
			"uid"=>$uid
		);
		$sel_user=$md->select_where($con,"user",$where);
		$sel_user_data = $sel_user[0];
	}
	//upadte user
	if(isset($_REQUEST["update_u"]))
	{
		$uid=$_REQUEST["uid"];
		$fnm=$_REQUEST["fnm"];
		$lnm=$_REQUEST["lnm"];
		$email=$_REQUEST["email"];
		$pwd=$_REQUEST["pwd"];
		$cpwd=$_REQUEST["cpwd"];

		$set=array(
			"first_name"=>$_REQUEST["fnm"],
			"last_name"=>$_REQUEST["lnm"],
			"email"=>$_REQUEST["email"],
			"pwd"=>$_REQUEST["pwd"]
		);

		$where = array(
			"uid"=>$uid
		);

		$md->updt($con,"user",$set,$where);
		header("location:user_list.php");

	}
	//edit current logged in user's profile
	if(isset($_REQUEST["profile_pic_upload"]))
	{
		$uid=$_REQUEST["uid"];
		$fnm=$_REQUEST["fnm"];
		$lnm=$_REQUEST["lnm"];
		$email=$_REQUEST["email"];
		$pwd=$_REQUEST["pwd"];
		$cpwd=$_REQUEST["cpwd"];
		$dp=$_FILES["dp"]["name"];
		//echo $dp;exit;
		$set = array(
	       	"first_name"=>$_REQUEST["fnm"],
			"last_name"=>$_REQUEST["lnm"],
			"email"=>$_REQUEST["email"],
			"address"=>$_REQUEST["add"],
			"pwd"=>$_REQUEST["pwd"]
	    );
	    $where = array(
	      	"uid"=>$uid
	    );
	    $md->updt($con,"user",$set,$where);
	    $res=$md->select_where($con,"user",$where);
		$_SESSION["logged"]=$res;
		if($dp !='')
		{
			$filename1=explode(".",$dp);
	        $ext= end($filename1);
	        $php_path= $_FILES["dp"]["tmp_name"];
	        $path= "user_images/$dp";
	        if($ext=='jpg' || $ext=='jpeg' || $ext=='png')
			{
	            move_uploaded_file($php_path,$path);
	            $set = array(
	            	"profile_pic"=>$dp
	            );
	            $where = array(
	            	"uid"=>$uid
	            );
	            $md->updt($con,"user",$set,$where);
	            $res=$md->select_where($con,"user",$where);
				$_SESSION["logged"]=$res;
	        }
			else
			{
				echo "<script>alert('invalid file..try again');</script>";
			}
		}
	}
	//Delete user
	if(isset($_REQUEST["user_delete"]))
	{
		$uid=$_REQUEST["user_delete"];
		$where = array(
			"uid"=>$uid
		);
		$md->dlt($con,"user",$where);
	}
	//------------------Edit users details end----------------

	//------------------Product Department start--------------
	if(isset($_REQUEST["add_product_db"]))
	{
		$pnm = $_REQUEST["pnm"];
		$price=$_REQUEST["price"];
		$pdisc = $_REQUEST["pdisc"];
		$pimg=$_FILES["pimg"]["name"];
		if($pnm!='' && $price!='' && $pdisc!='' && $pimg!=''){
		$filename1=explode(".",$pimg);
	    $ext= end($filename1);
	    $php_path= $_FILES["pimg"]["tmp_name"];
	    $path= "prod_images/$pimg";
	    if($ext=='jpg' || $ext=='jpeg' || $ext=='png')
		{
	        move_uploaded_file($php_path,$path);
	        $stu = array(
	           	"pname"=>$pnm,
	           	"pimg"=>$pimg,
	           	"prod_disc"=>$pdisc,
	           	"price"=>$price
	        );
	        $md->insert($con,$stu,"product");
	    }
		else
		{
			echo "<script>alert('invalid file..try again');</script>";
		}}
	}
	if (isset($_REQUEST["pid"]))
	{
		$pid=$_REQUEST["pid"];
		$where = array(
			"pid"=>$pid
		);
		$sel_prod=$md->select_where($con,"product",$where);
		$sel_prod_data = $sel_prod[0];
		foreach ($_SESSION["logged"] as $k)
		{
    		$cid=$k->uid;
    	}
    	$where = array(
    		"uid"=>$cid,
    		"pid"=>$pid,
    	);
    	$prod_comm=$md->select_where($con,"comments",$where);
	}
	//add comment
	if(isset($_REQUEST["add_comment"]))
	{
		$pid=$_REQUEST["pid"];
		$uid=$_REQUEST["uid"];
		$com=$_REQUEST["com"];
		if($com!=''){
		$dt=date("Y-m-d h:i:sa");
		$stu=array(
			"comm"=>$com,
			"uid"=>$uid,
			"pid"=>$pid,
			"com_date_time"=>$dt
		);
		//print_r($stu);exit();
		$md->insert($con,$stu,"comments");
		}
		header("location:comments_all.php?comments_view=$pid");
	}
	//view all comments
	if(isset($_REQUEST["comments_view"]))
	{
		$pid=$_REQUEST["comments_view"];
		$where=array(
			"pid"=>$pid
		);
		$pdata1=$md->select_where($con,"product",$where);
		$pdata=$pdata1[0];
		foreach ($_SESSION["logged"] as $k)
		{
    		$cid=$k->uid;
    	}
    	$str="comments.uid=user.uid";
		$com_data=$md->join_con_order($con,"user","comments",$str,$where,"com_date_time");
		$where=array(
			"pid"=>$pid,
			"uid"=>$cid
		);
		$wdata=$md->select_where($con,"wishlist",$where);
		//print_r($wdata);exit;
	}
	//------------------Product Department end----------------

	//------------------Wishlist Management start------------------
	//add product to wishlist
	if(isset($_REQUEST["add_to_wishlist"]))
	{
		$uid=$_REQUEST["uid"];
		$pid=$_REQUEST["pid"];

		$data = array(
			"uid"=>$uid,
			"pid"=>$pid
		);
		//print_r($data);exit;
		$md->insert($con,$data,"wishlist");
		echo "success";
	}
	//remove product from wishlist
	if(isset($_REQUEST["remove_from_wishlist"]))
	{
		$uid=$_REQUEST["uid"];
		$pid=$_REQUEST["pid"];

		$where = array(
			"uid"=>$uid,
			"pid"=>$pid
		);
		//print_r($data);exit;
		$md->dlt($con,"wishlist",$where);
		echo "success";
	}
	//go to wishlist page
	if(isset($_REQUEST["wishlist"]))
	{
		foreach ($_SESSION["logged"] as $k)
		{
    		$cid=$k->uid;
    	}
    	$where=array(
    		"uid"=>$cid
    	);
    	$wd=$md->join_con($con,"product","wishlist","product.pid=wishlist.pid",$where);
	}
	//------------------Wishlist Management end--------------------

	//------------------Cart Management Start----------------------
	if(isset($_REQUEST["buy_now"]))
	{
		$uid=$_REQUEST["uid"];
		$pid=$_REQUEST["pid"];
		$where=array(
    		"pid"=>$pid
    	);
    	$buy_prod=$md->select_where($con,"product",$where);
    	$data=array(
    		"uid"=>$uid,
    		"pid"=>$pid
    	);
    	$check_cart_data=$md->select_where($con,"cart",$data);
    	if($check_cart_data==''){
    	$md->insert($con,$data,"cart");
    	}
    	$where=array(
			"uid"=>$uid
		);
		$cart_data=$md->join_con($con,"product","cart","product.pid=cart.pid",$where);
		$_SESSION["cart_data"]=$cart_data;
		//print_r($where);exit;
	}
	if(isset($_REQUEST["cart"]))
	{
		header("location:cart.php");
		foreach ($_SESSION["logged"] as $k)
		{
    		$cid=$k->uid;
    	}
		$where=array(
			"uid"=>$cid
		);
		$cart_data=$md->join_con($con,"product","cart","product.pid=cart.pid",$where);
		$_SESSION["cart_data"]=$cart_data;
	}

	//------------------Cart Management Start----------------------
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
	//place order
	if(isset($_REQUEST["place_order"]))
	{
		header("location:place_order.php");
	}
	//delivery Address
	if(isset($_REQUEST["place_order_add"]))
	{
		$add=$_REQUEST["deladd"];
		foreach ($_SESSION["logged"] as $k)
		{
    		$cid=$k->uid;
    	}
		$where=array(
			"uid"=>$cid
		);
		$set=array(
			"delivery_address"=>$add
		);
		$md->updt($con,"user",$set,$where);
		$res=$md->select_where($con,"user",$where);
		$_SESSION["logged"]=$res;	
		header("location:payment2.php");
	}
	//Delete product from cart
	if(isset($_REQUEST["del_prod_from_cart"]))
	{
		$pid=$_REQUEST["pid"];
		foreach ($_SESSION["logged"] as $k)
		{
    		$cid=$k->uid;
    	}
		$where=array(
			"uid"=>$cid,
			"pid"=>$pid
		);
		$md->dlt($con,"cart",$where);
		$where = array(
			"uid"=>$cid
		);
		$cart_data=$md->join_con($con,"product","cart","product.pid=cart.pid",$where);
		$_SESSION["cart_data"]=$cart_data;
	}
	//final payment
	if(isset($_REQUEST["submit_to_paypal"]))
	{
		$enableSandbox = true;
		$dbConfig = [
		    'host' => 'localhost',
		    'username' => 'root',
		    'password' => '',
		    'name' => 'first'
		];
		$paypalConfig = [
	    	'email' => $_POST['payer_email'],
		    'return_url' => 'http://localhost/first2/payment-successful.php',
		    'cancel_url' => 'http://localhost/first2/payment-cancelled.php',
		    'notify_url' => 'payment.php'
		];
		$paypalUrl = $enableSandbox ? 'https://www.sandbox.paypal.com/cgi-bin/webscr' : 'https://www.paypal.com/cgi-bin/webscr';
		$itemName = $_POST['item_name'];
		$itemAmount =  $_POST["payment_amount"];
		require 'functions.php';
		
	    $data = [];
	    foreach ($_POST as $key => $value) {
	        $data[$key] = stripslashes($value);
	    }
	    $data['business'] = $paypalConfig['email'];
		$data['return'] = stripslashes($paypalConfig['return_url']);
	    $data['cancel_return'] = stripslashes($paypalConfig['cancel_url']);
	    $data['notify_url'] = stripslashes($paypalConfig['notify_url']);
		$data['item_name'] = $itemName;
	    $data['amount'] = $itemAmount;
	    $data['currency_code'] = 'GBP';
	    $queryString = http_build_query($data);
		header('location:' . $paypalUrl . '?' . $queryString);
	    $db = new mysqli($dbConfig['host'], $dbConfig['username'], $dbConfig['password'], $dbConfig['name']);
		$data = [
		    'item_name' => $_POST['item_number'],
		    'payment_amount' => $_POST['payment_amount'],
		    'add' => $_POST['add']
		];
	    addPayment($data);
	    foreach ($_SESSION["logged"] as $k)
		{
    		$cid=$k->uid;
    	}
	    $where=array(
	    	"uid"=>$cid
	    );
	    $md->dlt($con,"cart",$where);
	}
?>