
<!-- <section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->
<!-- /banner section -->

<!-- tracking section -->


    <section class="shipment-w3ls">
          <div class="container">
              <i class="fa fa-braille">
              </i>
              <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Change Password </h3>
         </div>
       <div class="container" style="height:70%;">
            <label style="color:red;"><?//=validation_errors()?></label>
             <div class="content-w3ls" style="height:100%;">

            <div class="content1-w3ls"></div>
          <center>
            <form  action="<?=base_url('login/changepassword')?>" method="POST">
                <div class="form-group">
                  <?php if(isset($_SESSION['mismatch'])){?>
                   <?=$_SESSION['mismatch']?>
                  <?php } ?>
                 <div style="position: relative;top:5px;color:#ff0000;"><?//=$mismatch?></div>
                 <div style="position: relative;top: 50px;color:#ff0000;"><?=$error_token?></div>
                 <?=form_error('verify_code')?>
                 <input type="text" name="verify_code" required  id="verify_code" autocomplete="on" placeholder=" Enter token" value="<?=set_value('verify_code')?>" class="form-control" style="width:30%;margin:30px;padding: 20px;">
                  </div>
                  <div class="form-group">
                  <input type="text" name="password" required id="password" autocomplete="on" placeholder=" Enter password "  value="<?=set_value('password')?>" class="form-control" style="width:30%;margin:30px;padding: 20px;">
                  </div>
                  <div class="form-group">
                 <input type="text" name="conf_password" required id="conf_password" placeholder=" confirm password " value="<?=set_value('conf_password')?>"  class="form-control" style="width:30%;margin:30px;padding: 20px;">
                 </div>
                <div class="form-group">
               <button type="submit" id="btn-change" class="btn btn-primary" style="width:30%;">Update</button>
            </div>
            </center>
          </form>
        </div>
    </div>

</section>





      <script type="text/javascript">
        // $('#btn-change').on('click', function(e) {
        //       e.preventDefault();
        //        var verify_code = $('#verify_code').val();
        //       var password = $('#password').val();
        //       var conf_password = $('#conf_password').val();
        //
        //       if(verify_code!="" && password!=""  && conf_password!=""){
        //
        //           $.ajax({
        //             url:  "<?php echo base_url(); ?>" + "login/changepassword",
        //             type: "POST",
        //             data: {
        //              type:1,
        //              verify_code:verify_code,
        //               password: password,
        //               conf_password: conf_password
        //             },
        //             cache: false,
        //             success: function(dataResult){
        //               var dataResult = JSON.parse(dataResult);
        //               if(dataResult.statusCode==200){
        //                  alert("password changed successfully");
        //               }
        //               else if(dataResult.statusCode==201){
        //                 // console.log(" wrong ");
        //                 //$("#error").show();
        //                 // $('#error').html('Invalid EmailId or Password !');
        //                Swal.fire('Error!','INCORRECT PLEASE CHECK YOUR DETAILS','error');
        //
        //               }
        //
        //             }
        //           });
        //
        //       }
        //       else{
        //           Swal.fire('Error!','PLEASE FILL THE ENTRY!','error');
        //       }
        //      });
        </script>
