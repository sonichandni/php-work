<?php
  include 'header.php';
  if(isset($_SESSION["logged"])){
?>
<form method="post">
<table>
  <?php
    if(isset($_SESSION["cart_data"]))
    {
      $sum=0;
      $cnt=1;
      foreach($_SESSION["cart_data"] as $v)
      {
      ?>
      <tr>
        <td><a href="comments_all.php?comments_view=<?php echo $v->pid; ?>">
          <!-- <?php 
            echo '<img src = "./prod_images/'.$v->pimg.'">';
          ?> -->
          <div  class="flexslider">
          <?php $pr = explode(",", $v->pimg); 
          ?>
          <ul class="slides">
          <?php
          foreach($pr as $p){?>
           <li>
            <?php echo '<img src = "./prod_images/'.$p.'" class = "prod-img" >';?>
           </li>
          <?php } ?>
          </ul>
          </div>
        </a></td>
        <td><a href="comments_all.php?comments_view=<?php echo $v->pid; ?>">
          <?php
            echo $v->pname;
          ?>
        </a></td>
        <td><a href="comments_all.php?comments_view=<?php echo $v->pid; ?>">
          <?php
            echo $v->price;
            $sum=$sum+$v->price;
          ?>
        </a></td>
        <td style="padding: 2%;width: 100px;"><i class="fa fa-trash del_prod_one" style="font-size: 36px;color: #999999;" id="delete_from_cart<?php echo $cnt; $cnt++; ?>" pidval="<?php echo $v->pid?>"></i></td>
      </tr>

      <?php
      }?>
      <tr>
        <td colspan="2"><center><b>Total Price</b></center></td>
        <td><?php echo $sum; ?></td>
      </tr>
      <tr>
        <td colspan="4">
          <button type="submit" name="place_order" id="place_order" class="buy-now" style="margin-left: 120px;">Place Order</button>
        </td>
      </tr>
      <?php }
      else
      {
        echo "No product has been selected";
      }
       ?>
</table>
</form>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>