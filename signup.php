<?php
	include 'controler.php';
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
         <input type="text"  id="nm" name="nm" placeholder="Name" class="form-control" required autofocus>
         <input type="Email"  id="email" name="email" placeholder="Email Id" class="form-control" required>
         <input type="text"  id="uid" name="uid" placeholder="Username" class="form-control" required>
         <input type="password"  id="pwd" name="pwd" placeholder="Password" class="form-control" required>
         <button type="submit" id="signup" name="signup">Sign Up </button><br><br>
         <small>Already have an account?<a href="index.php">Sign In Here</a></small>
  </div>
  </form>
</body>
</html>