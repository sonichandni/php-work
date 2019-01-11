<?php
  include 'header.php';
?>
<form name="product_det" id="product_det" method="POST">
<div style="width: 950px; height: 450px;border: 4px solid black; margin-left: 20px;border-radius: 50px; padding: 20px;background: url('./user_images/s1.png');overflow: scroll; ">

	<input type="hidden" name="uid" id="uid" value="<?php echo $cid; ?>">
	<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">
	<div style="width: 80%">

		<div style="width: 20%;float: left;">
			<?php echo '<img src = "./prod_images/'.$pdata->pimg.'" class = "prod-img" >'; ?>
		</div>
		
		<i class="fa fa-heart" id="wishlist" <?php 
				if(isset($wdata))
				{
					echo "style='color:red;'";
				}
				else
				{
					echo "style='color:lightgrey;'";
				}
		 ?>" ></i>
		 
		<div style="width: 50%;float: right;">
			<p><?php echo $pdata->prod_disc; ?>
				<br><p><b>Price:</b><?php echo $pdata->price; ?></p>
				<center><button type="submit" name="buy_now" id="buy_now" class="buy-now">Buy Now</button></center>
			</p>
		</div>
	</div>
	<div>
		<textarea name="com" id="com" rows="1" cols="60" placeholder="Comment Here..." style="opacity: 0.5;color: black;border: 2px solid black;"></textarea><br>
		<center><button type="submit" id="add_comment" name="add_comment" style="width: 100px;font-size: 15px;">Comment </button></center>
	</div>
	<div style="height: 350px;width: 40%;overflow: scroll;">

		<?php
		 if(isset($com_data)){
		 foreach ($com_data as $k) {
		 ?>
		 <div style="border-radius: 20px;padding-left: 15px;"><p>
		<?php echo "<b>".$k->first_name." ".$k->last_name."</b><br><small>".$k->com_date_time."</small><br>".$k->comm; ?>
		</p></div><?php }}
		else { echo "No Comments yet..."; }?>

	</div>
	
</div>
</form>
<?php
  include 'footer.php';
?>