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
  <div class="errorM">
    <?php if (isset($errorMsg)) { echo "<p class='message'>" .$errorMsg. "</p>" ;} ?>
  </div>
  
  <div class="signin">  
    <lable>Sign Up</lable>
	</div>
  <form method="post" name="signup_form" id="signup_form">
  <div class="block">  
         <input type="text"  id="fnm" name="fnm" placeholder="First Name" <?php if(isset($errorCode) && $errorCode == 1){echo "class=errorMsg" ;} ?> value="<?php if(isset($fnm)) { echo $fnm; } ?>" autofocus />

         <input type="text"  id="lnm" name="lnm" placeholder="Last Name" <?php if(isset($errorCode) && $errorCode == 2){echo "class=errorMsg" ;} ?> value="<?php if(isset($lnm)) { echo $lnm; } ?>" />

         <input type="text"  id="email" name="email" placeholder="Email Id" <?php if(isset($errorCode) && $errorCode == 3){echo "class=errorMsg" ;} ?> value="<?php if(isset($email)) { echo $email; } ?>" />

         <input type="password"  id="pwd" name="pwd" placeholder="Password" <?php if(isset($errorCode) && $errorCode == 4){echo "class=errorMsg" ;} ?> value="<?php if(isset($pwd)) { echo $pwd; } ?>" />

         <input type="password"  id="cpwd" name="cpwd" placeholder="Confirm Password" <?php if(isset($errorCode) && $errorCode == 5){echo "class=errorMsg" ;} ?> value="<?php if(isset($cpwd)) { echo $cpwd; } ?>" />

         <button type="submit" id="signup"name="signup">Sign Up </button><br><br>
         <small>Already have an account?<a href="index.php">Sign In Here</a></small>
  </div>
  </form>

</body>
</html>