<?php
  include 'header.php';
  if(isset($_SESSION["logged"])){
?>
<table>
  <tr>
    <?php
    $pd=new getData();
    $pdata=$pd->getAllProducts();
    echo "&nbsp;Click on product to comment...";
    if(isset($pdata))
    {
      foreach ($pdata as $v) {
      ?>
      <td><center>
        <a href="comments_all.php?comments_view=<?php echo $v['pid']; ?>">
          <?php echo '<img src = "./prod_images/'.$v["pimg"].'" class = "prod-img" >'; ?>
        </a>
        
      </center></td>
    <?php } }?>
  </tr>
</table>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>