<?php
  include 'header.php';
?>
<label>&nbsp;Product details:</label>
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
        <td style="padding: 2%;width: 100px;"><i class="fa fa-trash del_prod_one" style="font-size: 36px;color: #999999;" pidval="<?php echo $v->pid?>"></i></td>
      </tr>

      <?php
      }?>
      <tr>
        <td colspan="2"><center><b>Total Price</b></center></td>
        <td><?php echo $sum; ?></td>
      </tr>
    <?php }
  ?>
</table><hr><br>
<label>&nbsp;Delivery Address:</label>
<textarea name="deladd" id="deladd" rows="3" cols="60" placeholder="Delivery Address" ><?php foreach($_SESSION["logged"] as $s){if(isset($s->delivery_address)) { echo $s->delivery_address; }} ?></textarea><hr>	
<br>
<label>&nbsp;Payment Options:</label><br>
<input type="radio" name="pay_opt" id="pay_opt" class="pay-opt" value="debit_credit_card">Debit/Credit Card<br>
<div id="div_card" style="display: none;">
	<input type="number" name="dc" placeholder="Card Number">
	<input type="Number" name="ex_date" placeholder="Expiry date">
	<input type="Number" name="cvn" placeholder="CVV">
</div>
<input type="radio" name="pay_opt" id="pay_opt" class="pay-opt" value="net_banking">Net Banking<br>
<div id="div_netb" style="display: none;">
	<select>
		<option value="sbi">SBI</option>
		<option value="cbi">CBI</option>
		<option value="bob">BOB</option>
		<option value="boi">BOI</option>
	</select>
</div>
<input type="radio" name="pay_opt" id="pay_opt" class="pay-opt" value="cash_on_delivery">Cash on delivery<br>
<div id="div_cod" style="display: none;">
	<button>
		Confirm Order
	</button>
</div>
<?php
  include 'footer.php';
?>