<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
?>
<table>
  <tr>
    <?php
    if(isset($pdata))
    {
      foreach ($pdata as $v) {
      ?>
      <td><div  class="flexslider"><center>
        <?php $pr = explode(",", $v->pimg); 
        ?>
        <a href="comments_all.php?comments_view=<?php echo $v->pid; ?>">
          <ul class="slides">
          <?php
          foreach($pr as $p){?>
           <li>
            <?php echo '<img src = "./prod_images/'.$p.'" class = "prod-img" >';?>&nbsp;
           </li>
          <?php } ?>
          </ul>
        </a>        
      </center></div><center><b><?php echo $v->price;?> &#8377;</b></center></td>
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