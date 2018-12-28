<?php
	include 'connection.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
</head>
<body>
<b><center>
    <font phase="Times New Roman"color="white" size="20%">
   Login</b><br>
    </font>
    <center><br>
	<font phase="Times New Roman"color="white" size="5%">
    <div style="background-color: lightseagreen; height:8%; width:20%; margin-top:0%; margin-right:-10; align:left;padding: 1%;">  
    <b>Sign in</b>
	
    </font><br>  </center>

    <div style="background-color: white; height:30%; width:20%; margin-top:0%; margin-right:-10;  align:left; 
         padding: 1%">  
       <form method="post" role="form"  enctype="multipart/form-data" >
        
       <br> <input type="text"  id="unm" name="unm" placeholder="Enter Username" class="form-control" required autofocus><br>
       <input type="password"  id="pwd" name="pwd" placeholder="Enter password" class="form-control" required><br>
       <button type="submit" id="login" name="login" value="submit" class="btn btn-primary" style="width:50%">LogIn
       </button>
       </div>
    </div>  
    </form>

</body>
</html>