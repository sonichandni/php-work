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
      var fnm=document.getElementById('fnm').value;
      var lnm=document.getElementById('lnm').value;
      var email=document.getElementById('email').value;
      var pwd=document.getElementById('pwd').value;
      var cpwd=document.getElementById('cpwd').value;

      if (fnm=='') {
        alert("Please enter the First Name");
        return false;
      }
      if (lnm=='') {
        alert("Please enter the Last Name");
        return false;
      }
      if (email=='') {
        alert("Please enter the Email");
        return false;
      }
      var reg = /^([A-Za-z0-9_\-\.])+\@([A-Za-z0-9_\-\.])+\.([A-Za-z]{2,4})$/;
      if (!email.match(email.value)) 
      {
          alert('Invalid Email Address');
         return false;
      }
      if (pwd=='') {
        alert("Please enter the Password");
        return false;
      }
      if (cpwd=='') {
        alert("Please enter the Confirm Password");
        return false;
      }
      if (pwd!=cpwd) {
        alert("Password and Confirm Password must match");
        return false;
      }
      if(!pwd.length>8)
      {
        alert('l');
        return false;
      }
      
    }
  </script>
</head>
<body>
  <div class="signin">  
    <lable>Sign UP</lable>
	</div>
  <form method="post" role="form"  enctype="multipart/form-data" >
  <div class="block">  
         <input type="text"  id="fnm" name="fnm" placeholder="First Name" class="form-control" autofocus />
         <input type="text"  id="lnm" name="lnm" placeholder="Last Name" class="form-control"/>
         <input type="text"  id="email" name="email" placeholder="Email Id" class="form-control"/>
         <input type="password"  id="pwd" name="pwd" placeholder="Password" class="form-control"/>
         <input type="password"  id="cpwd" name="cpwd" placeholder="Confirm Password" class="form-control"/>
         <button type="submit" id="signup" name="signup" onclick="return valid()">Sign Up </button><br><br>
         <small>Already have an account?<a href="index.php">Sign In Here</a></small>
  </div>
  </form>
</body>
</html>