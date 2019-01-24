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
  /*$.validator.setDefaults({
    submitHandler: function() {
      alert("submitted!");
    }
  });*/
  $().ready(function(){
    $("#signinForm").validate({
      rules : {
      email:"required",
      pwd : "required"
      },
      messages: {
      email: "Please enter Email id",
      pwd: "Please enter Password"
      }
    });
  });
</script>
<script>
  $(document).ready(function(){
    $("#signin").click(function(event){
      //alert("hi");
      var email = $('#email').val();
      //alert(email);
      var pwd = $('#pwd').val();
      $.ajax({
        url: 'controler.php',
        type: 'POST',
        data: {login : "hi",email : email,pwd :pwd},
        success: function(response)
        {
          //alert(response);
          if(response == 1) 
          {
            //alert(response);
            window.location.href = "dashboard.php";
          }
          else if(response == 2)
          {
            window.location.href = "dashboard_user.php";
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
    <lable>Sign In</lable>
	</div>
  <form name="signinForm" id="signinForm" method="post">
    <div class="block">  
         
           <input type="text"  id="email" name="email" placeholder="Email Id" <?php if(isset($errorCode) && $errorCode==1){ echo "class=errorMsg"; } ?> value="<?php if(isset($uid)) { echo $uid; } ?>" autofocus>
           <input type="password"  id="pwd" name="pwd" placeholder="Password" <?php if(isset($errorCode) && $errorCode==2){ echo "class=errorMsg"; } ?>>
           <button type="button" id="signin" name="signin" value="submit">Sign In </button><br><br>
           <small>Not Registered Yet?<a href="signup.php">Sign Up Here</a></small>
    </div>
  </form>
</body>
</html>