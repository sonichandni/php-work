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
    <lable>Sign In</lable>
	</div>
  <form method="post">
    <div class="block">  
         
           <input type="text"  id="email" name="email" placeholder="Username" <?php if(isset($errorCode) && $errorCode==1){ echo "class=errorMsg"; } ?> value="<?php if(isset($uid)) { echo $uid; } ?>" autofocus>
           <input type="password"  id="pwd" name="pwd" placeholder="Password" <?php if(isset($errorCode) && $errorCode==2){ echo "class=errorMsg"; } ?>>
           <button type="submit" id="signin" name="signin" value="submit">Sign In </button><br><br>
           <small>Not Registered Yet?<a href="signup.php">Sign Up Here</a></small>
    </div>
  </form>
</body>
</html>