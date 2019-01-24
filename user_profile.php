<?php
  include 'role.php';
  if(isset($_SESSION["logged"])){
  foreach($_SESSION["logged"] as $v)
  {?>
  <div class="dashbord-user-img">
    <?php
      echo '<img src = "./user_images/'.$v->profile_pic.'" style="width:200px;height:200px;">';
    ?>
  </div>
  <div class="dashbord-user-details">
    <form method="post" action="profile_update.php">
    <table>
      <tr><td class="user-list tr-user"></td></tr>
      <tr><td class="user-list tr-user"></td></tr>
      <tr><td class="user-list tr-user"></td></tr>
      <tr>
        <td class="user-list tr-user"><b>Name:</b>
          <?php echo $v->first_name." ".$v->last_name; ?>
         </td>
      </tr>
      <tr>
        <td class="user-list tr-user"><b>Email:</b>
          <?php echo $v->email; ?>
         </td>
      </tr>
      <tr>
        <td class="user-list tr-user"><b>Address:</b>
          <?php echo $v->address; ?>
         </td>
      </tr>
      <tr>
        <td class="user-list tr-user"><b>Account Created Date:</b>
          <?php echo $v->date_created; ?>
         </td>
      </tr>
       <tr>
        <td class="user-list tr-user">
          <button type="submit"><i class="fa fa-pencil"></i>Edit Profile</button>
         </td>
      </tr>
    </table>
  </form>
  </div>
  <?php
  }?>
  <?php
  include 'footer.php';
  }
  else
  {
    header("location:index.php");
  }
?>