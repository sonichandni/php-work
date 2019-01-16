<?php
  include 'header.php';
  //print_r($_SESSION["logged"]);exit;
  foreach ($_SESSION["logged"] as $k)
  {
    echo '<img src="./user_images/'.$k->profile_pic.'">'; 
  }
?>

<form method="post" name="user_up" id="user_up" enctype="multipart/form-data">
  <input type="hidden"  id="uid" name="uid" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->uid)) { echo $s->uid; }} ?>" />
  <input type="text"  id="fnm" name="fnm" placeholder="First Name" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->first_name)) { echo $s->first_name; }} ?>" autofocus />

  <input type="text"  id="lnm" name="lnm" placeholder="Last Name" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->last_name)) { echo $s->last_name; }} ?>" />

  <input type="text"  id="email" name="email" placeholder="Email Id" pattern="\b[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]+\.[A-Za-z]{2,4}\b" title="example@gmail.com" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->email)) { echo $s->email; }} ?>" />

  <textarea type="text"  id="add" name="add" placeholder="Address"><?php foreach($_SESSION["logged"] as $s){if(isset($s->address)) { echo $s->address; }} ?></textarea>

  <input type="password"  id="pwd" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->pwd)) { echo $s->pwd; }} ?>" />

  <input type="password"  id="cpwd" name="cpwd" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number" value="<?php foreach($_SESSION["logged"] as $s){if(isset($s->pwd)) { echo $s->pwd; }}  ?>" />
  <input type="file" class="form-control-file" id="dp" name="dp" aria-describedby="fileHelp">
  <center><button type="submit" id="profile_pic_upload" name="profile_pic_upload">Update </button><br><br></center>
</form>
<?php
  include 'footer.php';
?>