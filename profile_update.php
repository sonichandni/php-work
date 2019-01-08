<?php
	include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form method="post" role="form"  enctype="multipart/form-data" >
  <div class="header">
    <b><?php foreach ($_SESSION["logged"] as $v) {
      echo "Hi, ".$v->first_name." ".$v->last_name;
    } ?></b>
    <button type="submit" name="logout" id="logout" class="logout-btn"><i class="fa fa-power-off"></i></button>
    <button type="submit" name="home" id="home" class="logout-btn"><i class="fa fa-home"></i></button>
  </div>

  <div class="left-panel">
    <?php include "left_panel.php" ?>
  </div>
  <div class="center_area">

    <?php
    foreach ($_SESSION["logged"] as $k)
    {
      echo '<img src="./user_images/'.$k->profile_pic.'"></img>'; 
    }
    ?>

    <form method="post" name="user_up" id="user_up" enctype="multipart/form-data">
        <input type="hidden"  id="uid" name="uid" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->uid)) { echo $s->uid; }} ?>" />
         <input type="text"  id="fnm" name="fnm" placeholder="First Name" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->first_name)) { echo $s->first_name; }} ?>" autofocus />

         <input type="text"  id="lnm" name="lnm" placeholder="Last Name" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->last_name)) { echo $s->last_name; }} ?>" />

         <input type="text"  id="email" name="email" placeholder="Email Id" pattern="\b[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]+\.[A-Za-z]{2,4}\b" title="example@gmail.com" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->email)) { echo $s->email; }} ?>" />

         <input type="password"  id="pwd" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->pwd)) { echo $s->pwd; }} ?>" />

         <input type="password"  id="cpwd" name="cpwd" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->pwd)) { echo $s->pwd; }}  ?>" />
        <input type="file" class="form-control-file" id="dp" name="dp" aria-describedby="fileHelp">
         <center><button type="submit" id="profile_pic_upload" name="profile_pic_upload">Update </button><br><br></center>
         
  
  </form>
  </div>
  <div class="footer">
    
  </div>
 
  
</form>
</body>
</html>