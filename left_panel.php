<?php
foreach($_SESSION["logged"] as $v)
{
	echo '<img src = "./user_images/'.$v->profile_pic.'">';
	echo $v->email;
}
?>
<hr>
<br><a href="user_list.php">Users</a><br><br>
<a href="profile_update.php">My Profile</a><br><br>
<a href="product.php">Products</a>