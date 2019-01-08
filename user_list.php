<?php
	include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style1.css">
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
    <a href="user_list.php">Users</a>
  </div>
  <div class="center_area">
    <table>
      <thead>
        <th>User Name</th>
        <th>Email</th>
        <th>Date Created</th>
        <th>Update</th>
        <th>Delete</th>
      </thead>
      <tbody>
      <?php
      $ud=new user();
      $udata=$ud->getAllUser();
        if(isset($udata))
        {
          foreach ($udata as $v) {
            ?>
            <tr>
              <td><?php echo $v['first_name']." ".$v['last_name']; ?></td>
              <td><?php echo $v['email']; ?></td>
              <td><?php echo $v['date_created']; ?></td>
              <td><center>
                <a href="user_update.php?user_update=<?php echo $v['uid']; ?>">
                  <button type="button" class="btn-circle-success">
                    <i class="fa fa-pencil"></i>
                  </button>
                </a></center>
              </td>
              <td><center>
                <a href="user_list.php?user_delete=<?php echo $v['uid']; ?>">
                  <button type="button" class="btn-circle-danger">
                    <i class="fa fa-trash"></i>
                  </button>
                </a></center></td>
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