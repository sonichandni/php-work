<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
?>
<form name="product_det" id="product_det" method="POST">
<div class="main-screen">
	<input type="hidden" name="uid" id="uid" value="<?php echo $cid; ?>">
	<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>">
	<div style="width: 24%;float: left;">
		<div  class="flexslider">
			<i class="fa fa-heart" id="wishlist" <?php 
				if(isset($wdata))
				{
					echo "style='color:#0000ff;'";
				}
				else
				{
					echo "style='color:lightgrey;'";
				}
		 		?>" >
		 	</i>
		    <?php $pr = explode(",", $pdata->pimg); 
		    ?>
			<ul class="slides">
	        <?php
	     	 foreach($pr as $p){?>
		        <li>
		            <?php echo '<img src = "./prod_images/'.$p.'" class = "prod-img" >';?>
		        </li>
	         <?php } ?>
	        </ul>
      	</div>
	</div>
	<div style="margin-left: 30%;">
			<p><?php echo $pdata->prod_disc; ?>
				<br><p><b>Price:</b><?php echo $pdata->price; ?></p>
				<center><button type="submit" name="buy_now" id="buy_now" class="buy-now">Buy Now</button></center>
			</p>
	</div>
	<div>
		<div style="width:90%;">
			<textarea name="com" id="com" rows="1" cols="60" placeholder="Comment Here..." style="border: 1px solid grey;"></textarea>
		</div>
		<div style="margin-top: -55px;margin-right:40px;">
			<i class="fa fa-send-o fa-3x" id="com-add"></i>
		</div>
	</div>
	<div class="pr-comments" id="comments-data">
		<?php
		if(isset($com_data))
		{
			foreach($_SESSION["logged"] as $v)
			{
				$uid=$v->uid;
			}
			 foreach ($com_data as $k) {
			 ?>
				  <p id="<?php echo $k->cid; ?>">
					<?php echo "<b>".$k->first_name." ".$k->last_name."</b><br><small>".$k->com_date_time."</small><br>".$k->comm; 
						if($k->uid == $uid){
					?>
					<i class="fa fa-trash del_com_one" pid_val="<?php echo $k->pid; ?>" uid_val="<?php echo $k->uid; ?>" time_val="<?php echo $k->com_date_time; ?>" cid_val="<?php echo $k->cid; ?>"></i>
					<?php } ?>
				</p>
			 <?php 
			 }
		}
		else
		{
			echo "No Comments yet..."; 
		}
		?>
	</div>
</div>
</form>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>