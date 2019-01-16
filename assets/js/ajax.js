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
      $("#delivery_add").click(function(){
        $("#deladd").val('');
      });
      
      $(".del_prod_one").click(function(){
         var pid = $(this).attr('pidval');
         $.ajax({
           url: 'controler.php',
            type: 'POST',
            data: {del_prod_from_cart:"del_prod_from_cart",pid: pid},
            success: function(response)
            {
              location.reload();
            }
          }); 
      });
      $("input:radio[name='pay_opt']").click(function(){
        var rval = $("input:radio[name='pay_opt']:checked").val();
            if(rval == 'debit_credit_card')
            {
              $("#div_card").show();
              $("#div_netb").hide();
              $("#div_cod").hide();
            }
            else if(rval == 'net_banking')
            {
              $("#div_netb").show();
              $("#div_card").hide();
              $("#div_cod").hide();
            }
            else if(rval == 'cash_on_delivery')
            {
              $("#div_cod").show();
              $("#div_card").hide();
              $("#div_netb").hide();
            }
      });
    });