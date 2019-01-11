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
				<td>
					<?php 
						echo '<img src = "./prod_images/'.$v->pimg.'">';
					?>
				</td>
				<td>
					<?php
						echo $v->pname;
					?>
				</td>
			</tr>
			<?php
			}
		}
	?>
</table>
<?php
	include 'footer.php';
?>