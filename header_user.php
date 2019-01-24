<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script type="text/javascript" src="./assets/js/ajax.js"></script>
  <script type="text/javascript" src="./assets/js/jquery.flexslider-min.js"></script>
  <script type='text/javascript'>
    function confirmDelete()
    {
       return confirm("Are you sure you want to delete this?");
    }
  </script>
  <script type="text/javascript">
    function printDiv(invoice) {
       var printContents = document.getElementById('invoice').innerHTML;
       var originalContents = document.body.innerHTML;

       document.body.innerHTML = printContents;

       window.print();

       document.body.innerHTML = originalContents;
    }
</script>
</head>
<body>
<form method="post" role="form"  enctype="multipart/form-data" >
  <div class="header">
    <b><?php foreach ($_SESSION["logged"] as $v) {
      echo "Hi, ".$v->first_name." ".$v->last_name;
    } ?></b>
    <a href="user_profile.php" class="user-header">My Profile</a>
    <a href="product_list.php" class="user-header">View Products</a>
    <a href="wishlist.php?wishlist=1" class="user-header">Wishlist</a>
    <a href="order_list.php?order_list=1" class="user-header">My Orders</a>
    <button type="submit" name="logout" id="logout" class="logout-btn"><i class="fa fa-power-off"></i></button>
    <button type="submit" name="cart" id="cart" class="logout-btn"><i class="fa fa-cart-plus"></i></button>
    <button type="submit" name="home_user" id="home_user" class="logout-btn"><i class="fa fa-home"></i></button>
  </div>
</form>
  
  <div class="center_area_user">