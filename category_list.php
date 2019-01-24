<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
    foreach ($cat_data as $v) {
      ?>
      <a href="product_list.php?product_list=<?php echo $v->pcid; ?>"><?php echo $v->cat_name; ?></a><br><br>
    <?php
    }
    include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>