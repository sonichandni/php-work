<?php
	include 'header.php';
	if(isset($_SESSION["logged"])){
?>
<table>
	<?php
		if(isset($wd))
		{
			foreach($wd as $v)
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
		            <?php echo '<img src = "./prod_images/'.$p.'" class = "prod-img" >';?>
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
			</tr>
			<?php
			}
		}
		else
		{
			echo "No Products are added to wishlist";
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