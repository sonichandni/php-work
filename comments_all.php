<?php
  include 'header.php';
?>
<table>
	<?php foreach ($com_data as $k) {
	 ?>
	<tr>
		<td><?php echo $k->first_name." ".$k->last_name."<br>".$k->comm; ?></td>
	</tr>
<?php } ?>
</table>
<?php
  include 'footer.php';
?>