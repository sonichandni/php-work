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
        document.getElementById("er_msg_js").innerHTML = "*Please Enter First Name";
        document.getElementById("fnm").style.border = "1px solid red";
        return false;
      }
      else if (lnm=='') {
        document.getElementById("er_msg_js").innerHTML = "*Please Enter the Last Name";
        document.getElementById("lnm").style.border = "1px solid red";
        return false;
      }
      else if (email=='') {
        document.getElementById("er_msg_js").innerHTML = "*Please Enter Email";
        document.getElementById("email").style.border = "1px solid red";
        return false;
      }
      else if (pwd=='') {
        document.getElementById("er_msg_js").innerHTML = "*Please Enter Password";
        document.getElementById("pwd").style.border = "1px solid red";
        return false;
      }
      else if (cpwd=='') {
        document.getElementById("er_msg_js").innerHTML = "*Please Confirm Your Password";
        document.getElementById("cpwd").style.border = "1px solid red";
        return false;
      }
      else if (pwd!=cpwd) {
        document.getElementById("er_msg_js").innerHTML = "*Password and Confirm Password must match";
        return false;
      }
      else
      {
        return true;
      }
      
      
    }
  </script>
</head>
<body>
  <div class="errorM">
    <p id="er_msg_js" class="message"></p>
    <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
  </div>
  
  <div class="signin">  
    <lable>Sign Up</lable>
	</div>
  <form method="post" name="signup_form" id="signup_form">
  <div class="block">  
         <input type="text"  id="fnm" name="fnm" placeholder="First Name" <?php if(isset($errorCode) && $errorCode == 1){echo "class=errorMsg" ;} ?> value="<?php if(isset($fnm)) { echo $fnm; } ?>" autofocus />

         <input type="text"  id="lnm" name="lnm" placeholder="Last Name" <?php if(isset($errorCode) && $errorCode == 2){echo "class=errorMsg" ;} ?> value="<?php if(isset($lnm)) { echo $lnm; } ?>" />

         <input type="text"  id="email" name="email" placeholder="Email Id" pattern="\b[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]+\.[A-Za-z]{2,4}\b" title="example@gmail.com" <?php if(isset($errorCode) && $errorCode == 3){echo "class=errorMsg" ;} ?> value="<?php if(isset($email)) { echo $email; } ?>" />

         <input type="password"  id="pwd" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number" <?php if(isset($errorCode) && $errorCode == 4){echo "class=errorMsg" ;} ?> value="<?php if(isset($pwd)) { echo $pwd; } ?>" />

         <input type="password"  id="cpwd" name="cpwd" placeholder="Confirm Password" <?php if(isset($errorCode) && $errorCode == 5){echo "class=errorMsg" ;} ?> value="<?php if(isset($cpwd)) { echo $cpwd; } ?>" />

         <button type="submit" id="signup"name="signup" onclick="return valid()">Sign Up </button><br><br>
         <small>Already have an account?<a href="index.php">Sign In Here</a></small>
  </div>
  </form>

</body>
</html>