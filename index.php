<?php
	include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/style.css">
  <script type="text/javascript">
    function valid(){
      var uid=document.getElementById('uid').value;
      var pwd=document.getElementById('pwd').value;

      if (uid=='') {
        alert("Please enter the Username");
        return false;
      }
      if (pwd=='') {
        alert("Please enter the Password");
        return false;
      }
    }
  </script>
</head>
<body>
  <div class="signin">  
    <lable>Sign In</lable>
	</div>
  <form method="post" role="form"  enctype="multipart/form-data" >
  <div class="block">  
       
         <input type="text"  id="email" name="email" placeholder="Username" class="form-control" autofocus>
         <input type="password"  id="pwd" name="pwd" placeholder="Password" class="form-control">
         <button type="submit" id="signin" name="signin" value="submit" onclick="return valid()">Sign In </button><br><br>
         <small>Not Registered Yet?<a href="signup.php">Sign Up Here</a></small>
  </div>
   </form>
</body>
</html>