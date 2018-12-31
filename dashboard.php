<?php
  include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
  <title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/style1.css">
</head>
<body>
<form method="post" role="form"  enctype="multipart/form-data" >
  <div class="header">
    <button type="submit" name="logout" id="logout" class="logout-btn"></button>
  </div>

  <div class="left-panel">
    <a href="user_list.php?ul='ul'">Users</a>
  </div>
  <div class="center_area">
    <div class="tot_user">
      <center><font style="font-size: 30px; color: black;">Total Users<br><?php echo $user_cnt; ?></font></center>
    </div>
  </div>
  <div class="footer">
    
  </div>
 
  
</form>
</body>
</html>