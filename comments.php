<?php
  include 'header.php';
?>
<input type="hidden" name="uid" id="uid" value="<?php echo $cid; ?>">
<input type="hidden" name="pid" id="pid" value="<?php echo $pid; ?>"><br>
<center><textarea name="com" id="com" rows="5" cols="100"></textarea></center><br>
<center><button type="submit" id="add_comment" name="add_comment">Update </button><br><br></center>
<?php
  include 'footer.php';
?>