<?php
	include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style.css">
  <link rel="stylesheet" href="./assets/css/screen.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="./assets/js/jquery.js"></script>
  <script src="./assets/js/jquery.validate.js"></script>
  <script>
    $.validator.addMethod("pwcheck", function(value) {
    return /^[A-Za-z0-9\d=!\-@._*]*$/.test(value) // consists of only these
       && /[a-z]/.test(value) // has a lowercase letter
       && /\d/.test(value) // has a digit
      });
    $().ready(function(){
      $("#signupForm").validate({
        rules: {
          fnm: "required",
          lnm: "required",
          email: {
            required: true,
            email: true
          },
          pwd: {
            required: true,
            minlength: 8,
            pwcheck: true
          },
          cpwd: {
            required: true,
            equalTo: "#pwd"
          }
        },
        messages: {
          fnm: "Please Enter First name",
          lnm: "Please Enter Last name",
          email: "Please Enter email in Proper Format",
          pwd: "Please Enter Password in Proper Format",
          cpwd: "Please confirm your Password"
        }
      });
    });
  </script>
  <script>
    $(document).ready(function(){
    $("#signup").click(function(event){
      var fnm = $('#fnm').val();
      var lnm = $('#lnm').val();
      var email = $('#email').val();
      var pwd = $('#pwd').val();
      var cpwd = $('#cpwd').val();
      $.ajax({
        url: 'controler.php',
        type: 'POST',
        data: {signup : "signup",fnm : fnm, lnm : lnm, email : email, pwd :pwd, cpwd: cpwd},
        success: function(response)
        {
          if(response == "success")
          {
            window.location.href = "index.php";
          }
          else
          {
            $('#er_msg_js').html(response);
          }
        }
      });
    });
  });
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
  <form method="post" name="signupForm" id="signupForm">
  <div class="block">  
         <input type="text"  id="fnm" name="fnm" placeholder="First Name" <?php if(isset($errorCode) && $errorCode == 1){echo "class=errorMsg" ;} ?> value="<?php if(isset($fnm)) { echo $fnm; } ?>" autofocus />

         <input type="text"  id="lnm" name="lnm" placeholder="Last Name" <?php if(isset($errorCode) && $errorCode == 2){echo "class=errorMsg" ;} ?> value="<?php if(isset($lnm)) { echo $lnm; } ?>" />

         <input type="text"  id="email" name="email" placeholder="Email Id" pattern="\b[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]+\.[A-Za-z]{2,4}\b" title="example@gmail.com" <?php if(isset($errorCode) && $errorCode == 3){echo "class=errorMsg" ;} ?> value="<?php if(isset($email)) { echo $email; } ?>" />

         <input type="password"  id="pwd" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number" <?php if(isset($errorCode) && $errorCode == 4){echo "class=errorMsg" ;} ?> value="<?php if(isset($pwd)) { echo $pwd; } ?>" />

         <input type="password"  id="cpwd" name="cpwd" placeholder="Confirm Password" <?php if(isset($errorCode) && $errorCode == 5){echo "class=errorMsg" ;} ?> value="<?php if(isset($cpwd)) { echo $cpwd; } ?>" />

         <button type="button" id="signup"name="signup">Sign Up </button><br><br>
         <small>Already have an account?<a href="index.php">Sign In Here</a></small>
  </div>
  </form>

</body>
</html>