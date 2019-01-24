<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
?>

<form method="post" name="user_up" id="user_up" enctype="multipart/form-data">
  <select name="cat">
    <option value="">Select Product Category</option>
    <?php
      foreach ($cat_data as $v)
      {
        ?>
        <option value="<?php echo $v->pcid; ?>"><?php echo $v->cat_name; ?></option>
      <?php
      }
    
    ?>
  </select>
  <input type="text"  id="pnm" name="pnm" placeholder="Product Name" autofocus />
  <input type="text" name="price" id="price" placeholder="Product Price">
  <textarea name="pdisc" id="pdisc" placeholder="Product Discription"></textarea>
  <input type="file" class="form-control-file" id="pimg" name="pimg[]" aria-describedby="fileHelp" multiple>
  <center><button type="submit" id="add_product_db" name="add_product_db">Add Product </button><br><br></center>
</form>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>