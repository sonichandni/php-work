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
      var uid=document.getElementById('email').value;
      var pwd=document.getElementById('pwd').value;
      if (uid=='') {
        document.getElementById("er_msg_js").innerHTML = "*Please Enter Email Id";
        document.getElementById("email").style.border = "1px solid red";
        return false;
      }
      else if (pwd=='') {
        document.getElementById("er_msg_js").innerHTML = "*Please Enter Password";
        document.getElementById("pwd").style.border = "1px solid red";
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
    <lable>Sign In</lable>
	</div>
  <form method="post">
    <div class="block">  
         
           <input type="text"  id="email" name="email" placeholder="Email Id" <?php if(isset($errorCode) && $errorCode==1){ echo "class=errorMsg"; } ?> value="<?php if(isset($uid)) { echo $uid; } ?>" autofocus>
           <input type="password"  id="pwd" name="pwd" placeholder="Password" <?php if(isset($errorCode) && $errorCode==2){ echo "class=errorMsg"; } ?>>
           <button type="submit" id="signin" name="signin" value="submit"  onclick="return valid()">Sign In </button><br><br>
           <small>Not Registered Yet?<a href="signup.php">Sign Up Here</a></small>
    </div>
  </form>
</body>
</html>