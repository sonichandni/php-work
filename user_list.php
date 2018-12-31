<?php
	include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/style1.css">
</head>
<body>
<form method="post" role="form"  enctype="multipart/form-data" >
  <div class="header">
    <button type="submit" name="logout" id="logout" class="logout-btn"></button>
  </div>

  <div class="left-panel">
    <a href="user_list.php">Users</a>
  </div>
  <div class="center_area">
    <table>
      <thead>
        <th>User Name</th>
        <th>Email</th>
        <th>Date Created</th>
      </thead>
      <tbody>
      <?php
        if(isset($_SESSION["udata"]))
        {
          foreach ($_SESSION["udata"] as $v) {
            ?>
            <tr>
              <td><?php echo $v->first_name." ".$v->last_name; ?></td>
              <td><?php echo $v->email; ?></td>
              <td><?php echo $v->date_created; ?></td>
            </tr>
            <?php
          }
        }
      ?>
    </tbody>
    </table>
  </div>
  <div class="footer">
    
  </div>
 
  
</form>
</body>
</html>