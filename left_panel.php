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
<div id="product"><a>Product</a></div>
<div id="p_menu" style="display: none;">
	<ul>
		<li><a href="product_add.php?pro_add_cat=1">Add Product</a></li>
		<li><a href="category_list.php?pro_add_cat=1">View Products</a></li>
	</ul>
</div>
<br>
<a href="wishlist.php?wishlist=1">Wishlist</a><br><br>
<a href="order_list.php?order_list=1">Orders</a><br><br>