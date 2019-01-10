<?php
  include 'header.php';
?>

<form method="post" name="user_up" id="user_up" enctype="multipart/form-data">
  <input type="text"  id="pnm" name="pnm" placeholder="Product Name" autofocus />
  <textarea name="pdisc" id="pdisc" placeholder="Product Discription"></textarea>
  <input type="file" class="form-control-file" id="pimg" name="pimg" aria-describedby="fileHelp">
  <center><button type="submit" id="add_product_db" name="add_product_db">Add Product </button><br><br></center>
</form>
<?php
  include 'footer.php';
?>