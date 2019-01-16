<?php
  include 'header.php';
?>
<label>Delivery Address:</label>
<textarea name="deladd" id="deladd" rows="3" cols="60" placeholder="Delivery Address" style="border: 1px solid black;"><?php foreach($_SESSION["logged"] as $s){if(isset($s->address)) { echo $s->address; }} ?></textarea>
<br><br>
<p id="delivery_add">+ Add new address</p>

<button id="place_order_add" name="place_order_add">Save and continue</button>
<?php
  include 'footer.php';
?>