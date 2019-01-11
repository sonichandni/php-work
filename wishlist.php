<?php
	include 'header.php';
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
					<?php 
						echo '<img src = "./prod_images/'.$v->pimg.'">';
					?>
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
	?>
</table>
<?php
	include 'footer.php';
?>