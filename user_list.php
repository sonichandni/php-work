<?php
  include 'header.php';
?>
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
    $ud=new getData();
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
<?php
  include 'footer.php';
?>