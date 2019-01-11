<?php
	include 'controler.php';
?>
<!DOCTYPE html>
<html>
<head>
	<title>Form</title>
  <link rel="stylesheet" type="text/css" href="./assets/css/style1.css">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script>
    $(document).ready(function(){
      $("#product").click(function(){
        $("#p_menu").slideToggle("slow");
      });
      $("#wishlist").click(function(){
        //alert(this);
        if(this.style.color == "lightgrey")
        {
          var uid = $('#uid').val();
          var pid = $('#pid').val();
          $.ajax({
            url: 'controler.php',
            type: 'POST',
            data: {add_to_wishlist:"add_to_wish_list",uid: uid,pid: pid},
            success: function(response)
            {
              //alert(response);
              if(response == "success")
              {
                wishlist.style.color = "red";
              }
            }
          });
        }
        else if(this.style.color = "red")
        {
          var uid = $('#uid').val();
          var pid = $('#pid').val();
          $.ajax({
            url: 'controler.php',
            type: 'POST',
            data: {remove_from_wishlist:"remove_from_wishlist",uid: uid,pid: pid},
            success: function(response)
            {
              //alert(response);
              if(response == "success")
              {
                wishlist.style.color = "lightgrey";
              }
            }
          });
        }
      });
    });
  </script>
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
    <?php include "left_panel.php" ?>
  </div>
  <div class="center_area">