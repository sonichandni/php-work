<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
?>
<h1><font style="color: green;">Order Confirmed!</font></h1>
<form method="post">
<button class="logout-btn" type="button" onclick="printDiv()"><i class="fa fa-print"></i></button>
<button type="submit" name="sent_email" class="logout-btn" ><i class="fa fa-envelope"></i></button>
</form>
<div id="invoice">
<center><h1>Invoice</h1></center>
<hr>
<table>
  <tr>
    <td class="user_list-tbl"><b>Customer Name:</b></td>
    <td class="user_list-tbl">
      <?php 
        foreach ($_SESSION["logged"] as $k)
        {
          echo $v->first_name." ".$v->last_name;
        }
      ?>
    </td>
  </tr>
  <tr>
    <td class="user_list-tbl"><b>Order Date and Time</b></td>
    <td class="user_list-tbl"><?php echo $_SESSION["cur_cust_order_time"]; ?></td>
  </tr>
</table>
<hr>
<table>
  <thead>
    <th class="user_list-tbl">Product</th>
    <th class="user_list-tbl">Qty</th>
    <th class="user_list-tbl">Price</th>
    <th class="user_list-tbl">Total</th>
  </thead>
  <tbody>
  <?php
    if(isset($_SESSION["order_data"]))
    {
      $sum=0;
      foreach($_SESSION["order_data"] as $v)
      {
      ?>
      <tr>  
        <td class="user_list-tbl"><center>
          <?php
            echo $v->pname;
          ?>
        </center></td>
        <td class="user_list-tbl"><center>1</center></td>
        <td class="user_list-tbl"><center>
          <?php
            echo $v->price;
            $sum=$sum+$v->price;
          ?>
        </center></td>
        <td class="user_list-tbl">
          <center><?php
            echo $v->price;
          ?>
        </center></td>
      </tr>

      <?php
      }?>
      <tr>
        <td colspan="3"><center><b>Total Price</b></center></td>
        <td><center><b><?php echo $sum; ?></b></center></td>
      </tr>
    <?php }
  ?></center>
  </tbody>
</table><hr><br>
<label>&nbsp;<b>Delivery Address:</b></label>
<p><?php foreach($_SESSION["logged"] as $s){if(isset($s->delivery_address)) { echo $s->delivery_address; }} ?></p><hr>	
<br>
</div>
<?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>
