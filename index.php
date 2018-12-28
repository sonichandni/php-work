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
    <lable>Sign in</lable>
	</div>
  <form method="post" role="form"  enctype="multipart/form-data" >
  <div class="block">  
       
         <input type="text"  id="unm" name="unm" placeholder="Username" class="form-control" required autofocus>
         <input type="password"  id="pwd" name="pwd" placeholder="Password" class="form-control" required>
         <button type="submit" id="login" name="login" value="submit">Sign In </button><br>
         <small>Not Registered Yet?<a href="signup.php">Sign Up Here</a></small>
  </div>
   </form>
</body>
</html>