function deletecomment(e){
        var pcid = $(e).attr('cat_val');
         $("#filter-tble").load("controler.php",{
            low_to_high:"low_to_high",pcid: pcid
         });
}

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
                wishlist.style.color = "#0000ff";
              }
            }
          });
        }
        else if(this.style.color = "#0000ff")
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
      $('.flexslider').flexslider({
        animation: 'fade',
        controlsContainer: '.flexslider'
      });
      $("#com-add").click(function(){
         var com = $("#com").val();
         var uid = $('#uid').val();
         var pid = $('#pid').val();
         $('#com').val('');
         $("#comments-data").load("controler.php",{
            add_comment:"add_comment",pid: pid, uid: uid,com: com
         });
      });
      $(".del_com_one").on("click",function(){

         var pid = $(this).attr('pid_val');
         var uid = $(this).attr('uid_val');
         var dt_time = $(this).attr('time_val');
         var cid = $(this).attr('cid_val');
         $.ajax({
           url: 'controler.php',
            type: 'POST',
            data: {del_com_one:"del_com_one",pid: pid, uid: uid,dt_time: dt_time},
            success: function(response)
            {
              $("#"+cid).hide();
            }
          });

      });
      $(document).on("click","#low_to_high",function(){
        var pcid = $(this).attr('cat_val');
        $("#filter-tble").load("controler.php",{
            low_to_high:"low_to_high",pcid: pcid
         });
      });
      $(document).on("click","#high_to_low",function(){
        var pcid = $(this).attr('cat_val');
        $("#filter-tble").load("controler.php",{
            high_to_low:"high_to_low",pcid: pcid
         });
      });
       $(document).on("click","#newest_first",function(){
        var pcid = $(this).attr('cat_val');
        $("#filter-tble").load("controler.php",{
            newest_first:"newest_first",pcid: pcid
         });
      });


    });