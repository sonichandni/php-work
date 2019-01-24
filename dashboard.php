<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
?>
  <div class="tot_user">
    <center><font style="font-size: 30px; color: black;">Total Users<br><?php echo $user_cnt; ?></font></center>
  </div>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>