<?php
	include 'role.php';
	if(isset($_SESSION["logged"])){
?>
<h2>Orders</h2>
<table>
	
	<?php
		if(isset($od))
		{
			foreach($od as $v)
			{
			?>
			<tr>
				<td><a href="comments_all.php?comments_view=<?php echo $v->pid; ?>">
					<!-- <?php 
						echo '<img src = "./prod_images/'.$v->pimg.'">';
					?> -->
					<div  class="flexslider">
			        <?php $pr = explode(",", $v->pimg); 
			        ?>
					<ul class="slides">
		          <?php
		          foreach($pr as $p){?>
		           <li>
		            <?php echo '<img src = "./prod_images/'.$p.'" style="width:100px;height:150px;" >';?>
		           </li>
		          <?php } ?>
		          </ul>
		      		</div>
				</a></td>
				<td><a href="comments_all.php?comments_view=<?php echo $v->pid; ?>">
					<?php
						echo $v->pname;
					?>
				</a></td>
				<td><b>
					<?php
						echo $v->payment_amount;
					?>
				</b></td>
				<td class="user_list-tbl">Delivered To:<br>
					<?php
						echo $v->first_name." ".$v->last_name."\n";
						echo $v->email;
					?>
				</td>
			</tr>
			<tr>
				<td colspan="4"><b>Order On:</b>
					<?php
						echo $v->createdtime;
					?>
				</td>
			</tr>
			<?php
			}
		}
		else
		{
			echo "You have not ordered anything";
		}
	?>
</table>
<?php
	include 'footer.php';
	}
	else
	{
	  header("location:index.php");
	}
?>