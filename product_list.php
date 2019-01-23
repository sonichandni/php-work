<?php
  include 'header.php';
  if(isset($_SESSION["logged"])){
?>
<table>
  <tr>
    <?php
    $pd=new getData();
    $pdata=$pd->getAllProducts();
    //echo "&nbsp;Click on product to comment...";
    if(isset($pdata))
    {
      foreach ($pdata as $v) {
      ?>
      <td><div  class="flexslider"><center>
        <?php $pr = explode(",", $v["pimg"]); 
        ?>
        <a href="comments_all.php?comments_view=<?php echo $v['pid']; ?>">
          <ul class="slides">
          <?php
          foreach($pr as $p){?>
           <li>
            <?php echo '<img src = "./prod_images/'.$p.'" class = "prod-img" >';?>&nbsp;
           </li>
          <?php } ?>
          </ul>
        </a>
        
      </center></div></td>
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