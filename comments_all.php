<?php
  include 'header.php';
?>

<div style="width: 950px; height: 450px;border: 4px solid black; margin-left: 20px;border-radius: 50px; padding: 20px;background: url('./user_images/s1.png');overflow: scroll;overflow-x: hidden; ">

	<input type="hidden" name="uid" id="uid" value="<?php echo $cid; ?>">
	<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">


	

	<div style="width: 80%">
		<div style="width: 20%;float: left;">
			<?php echo '<img src = "./prod_images/'.$pdata->pimg.'" class = "prod-img" >'; ?>
		</div>
		<div style="width: 50%;float: right;">
			<p><?php echo $pdata->prod_disc; ?></p>
		</div>
	</div>
	<div style="height: 350px;width: 40%;margin-top: 350px; overflow: scroll;overflow-x: hidden;">

		<?php foreach ($com_data as $k) {
		 ?>
		 <div style="border-radius: 20px;padding-left: 15px;"><p>
		<?php echo "<b>".$k->first_name." ".$k->last_name."</b><br><small>".$k->com_date_time."</small><br>".$k->comm; ?>
		</p></div><?php } ?>

	</div>
	<div style="margin-bottom: 10px;">
		<textarea name="com" id="com" rows="3" cols="60" placeholder="Comment Here..."></textarea><br>
		<center><button type="submit" id="add_comment" name="add_comment" style="width: 100px;font-size: 15px;">Comment </button></center>
	</div>
</div>
<?php
  include 'footer.php';
?>