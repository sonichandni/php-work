<?php
  include 'header.php';
?>
<table class="user-list">
  <thead>
      <th class="user_list-tbl">User Name</th>
      <th class="user_list-tbl">Email</th>
      <th class="user_list-tbl">Date Created</th>
      <th class="user_list-tbl">Update</th>
      <th class="user_list-tbl">Delete</th>
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
        <td class="user_list-tbl"><?php echo $v['first_name']." ".$v['last_name']; ?></td>
        <td class="user_list-tbl"><?php echo $v['email']; ?></td>
        <td class="user_list-tbl"><?php echo $v['date_created']; ?></td>
        <td class="user_list-tbl"><center>
          <a href="user_update.php?user_update=<?php echo $v['uid']; ?>">
            <button type="button" class="btn-circle-success">
              <i class="fa fa-pencil"></i>
            </button>
          </a></center>
        </td>
        <td class="user_list-tbl"><center>
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