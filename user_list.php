<?php
	include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
</head>
<body>
<form method="post" role="form"  enctype="multipart/form-data" >
  <div class="header">
    <b><?php foreach ($_SESSION["logged"] as $v) {
      echo "Hi, ".$v->first_name." ".$v->last_name;
    } ?></b>
    <button type="submit" name="logout" id="logout" class="logout-btn"><i class="fa fa-power-off"></i></button>
    <button type="submit" name="home" id="home" class="logout-btn"><i class="fa fa-home"></i></button>
  </div>

  <div class="left-panel">
    <a href="user_list.php?ul='ul'">Users</a>
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