<?php
  include 'header.php';
?>
<table>
  <?php
    if(isset($_SESSION["cart_data"]))
    {
      $sum=0;
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