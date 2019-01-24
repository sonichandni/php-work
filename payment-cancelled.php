<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
?>
<h2>Payment Cancelled</h2>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>
