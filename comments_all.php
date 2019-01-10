<?php
  include 'header.php';
?>
<div style="width: 950px; height: 450px;border: 4px solid black; margin-left: 20px;border-radius: 50px; padding: 20px;background: url('./user_images/s1.png');">
	<input type="hidden" name="uid" id="uid" value="<?php echo $cid; ?>">
	<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">
	<div style="margin-top: 360px;position: fixed;margin-bottom: 10px;">
		<textarea name="com" id="com" rows="3" cols="120"></textarea><br><br>
		<center><button type="submit" id="add_comment" name="add_comment" style="width: 100px;">Comment </button></center>
	</div>
	<div style="height: 350px; overflow: scroll;overflow-x: hidden;">
	<?php foreach ($com_data as $k) {
	 ?>
	 <div style="border-radius: 20px;padding-left: 15px;"><p>
	<?php echo $k->first_name." ".$k->last_name."<br>".$k->comm; ?>
	</p></div><?php } ?>
	</div>
</div>
<?php
  include 'footer.php';
?>