<?php
  include 'header.php';
?>
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
          <?php 
            echo '<img src = "./prod_images/'.$v->pimg.'">';
          ?>
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
    <?php }
  ?>
</table>
<br>
<button type="submit" name="place_order" id="place_order" class="buy-now" style="margin-left: 120px;">Place Order</button>
<?php
  include 'footer.php';
?>