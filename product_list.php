<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
?>
<b>Sort By</b> 
<p id="low_to_high" cat_val="<?php echo $pcid; ?>">Price -- Low to High</p>
<p id="high_to_low" cat_val="<?php echo $pcid; ?>">Price -- High to Low</p>
<p id="newest_first" cat_val="<?php echo $pcid; ?>">Newest First</p>
<table>
  <tr id="filter-tble">
    <?php
    if(isset($pdata))
    {
      foreach ($pdata as $v) {
      ?>
      <td><center>
        <?php $pr = explode(",", $v->pimg); 
        ?>
        <a href="comments_all.php?comments_view=<?php echo $v->pid; ?>">
            <?php echo '<img src = "http://localhost/first//prod_images/'.$pr[0].'" class = "prod-img" >';?>&nbsp;
        </a>        
      </center></div><center><b><?php echo $v->pname."<br>".$v->price;?> &#8377;</b></center></td>
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