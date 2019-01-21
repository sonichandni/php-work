<?php
  include 'header.php';
  if(isset($_SESSION["logged"])){
?>
<h2>Order Confirmed</h2>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>
