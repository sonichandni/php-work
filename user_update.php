<?php
	include 'header.php';
?>
<form method="post" name="user_up" id="user_up">
  <input type="hidden"  id="uid" name="uid" value="<?php if(isset($sel_user_data->uid)) { echo $sel_user_data->uid; }?>" />
  <input type="text"  id="fnm" name="fnm" placeholder="First Name" value="<?php if(isset($sel_user_data->first_name)) { echo $sel_user_data->first_name; } ?>" autofocus />

  <input type="text"  id="lnm" name="lnm" placeholder="Last Name" value="<?php if(isset($sel_user_data->last_name)) { echo $sel_user_data->last_name; } ?>" />

  <input type="text"  id="email" name="email" placeholder="Email Id" pattern="\b[A-Za-z0-9_\-\.]+@[A-Za-z0-9_\-\.]+\.[A-Za-z]{2,4}\b" title="example@gmail.com" value="<?php if(isset($sel_user_data->email)) { echo $sel_user_data->email; } ?>" />

  <input type="password"  id="pwd" name="pwd" placeholder="Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number" value="<?php if(isset($sel_user_data->pwd)) { echo $sel_user_data->pwd; } ?>" />

  <input type="password"  id="cpwd" name="cpwd" placeholder="Confirm Password" pattern="(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}" title="Password must contain minimum one symbol, one capital letter and one number"  value="<?php if(isset($sel_user_data->pwd)) { echo $sel_user_data->pwd; }  ?>" />

  <center><button type="submit" id="update_u" name="update_u">Update </button><br><br></center>
</form>
<?php
  include 'footer.php';
?>