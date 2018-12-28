<?php
	include 'conection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/style.css">
</head>
<body>
  <div class="signin">  
    <lable>Sign UP</lable>
	</div>
  <form method="post" role="form"  enctype="multipart/form-data" >
  <div class="block">  
         <input type="text"  id="nm" name="nm" placeholder="Enter Name" class="form-control" required>
         <input type="text"  id="nm" name="nm" placeholder="Enter Email Id" class="form-control" required>
         <input type="text"  id="unm" name="unm" placeholder="Enter Username" class="form-control" required autofocus>
         <input type="password"  id="pwd" name="pwd" placeholder="Enter password" class="form-control" required>
         <button type="submit" id="login" name="login" value="submit">Sign Up </button>
          
  </div>
   </form>
</body>
</html>