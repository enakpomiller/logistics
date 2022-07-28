



<div class="container" style="margin-top:100px;margin-bottom:100px;height:1000px;" align="center">
 <div id="error"></div>
  <div class="row" style="margin:70px;">
      <h1> Change Password </h1> &nbsp;
      <?=$msg_error?>
      <?=$msg_success?>
    <form action=""  method="POST">
     <div id="error"></div>
    <div class="form-group">
     <label style="color:red;"> <?=form_error('email')?></label>
     <input type="text" name="email" id="email" placeholder="Enter email" value="<?=set_value('email')?>" class="form-control" style="width:40%;">
    </div>
   <div class="form-group">
     <label style="color:red;"> <?=form_error('password')?></label>
     <input type="password" name="password"  id="password" placeholder="Enter New  Password" value="<?=set_value('password')?>" class="form-control" style="width:40%;">
   </div>
   <div class="form-group">
    <label style="color:red;"> <?=form_error('passconf')?></label>
     <input type="password" name="passconf" id="passconf" placeholder="Confirm Password" class="form-control" style="width:40%;">
   </div>

   <div class="form-group">
     <button class="btn btn-primary" id="submit" style="width:40%;"> Change </button>
   </div>
</div>
</form>
</div>



<!-- sweet alert -->
   <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>

   // $('#submit').on('click', function(e) {
   //       e.preventDefault();
   //       var email = $('#email').val();
   //       var password = $('#password').val();
   //       var passconf = $('#passconf').val();
   //       if(email!="" && password!="" && passconf!=""){
   //         $.ajax({
   //           // url:  "<?php echo base_url(); ?>" + "admin/change_pass",
   //           url:"<?//=base_url('admin/change_pass')?>",
   //           type: "POST",
   //           data: {
   //             type:'json',
   //             email: email,
   //             password: password,
   //             passconf:passconf
   //           },
   //            cache: false,
   //           success: function(dataResult){
   //             var dataResult = JSON.parse(dataResult);
   //             if(dataResult.statusCode===200){
   //               alert(' changed success');
   //               // window.location = "<?=base_url('users/product')?>";
   //             }
   //             else   {
   //               console.log("error");
   //               $("#error").show();
   //                $('#error').html('Invalid EmailId or Password !');
   //               //Swal.fire('Error!','INCORRECT EMAIL OR PASSWORD!','error');
   //
   //             }
   //
   //           }
   //         });
   //       }
   //       else{
   //           Swal.fire('Error!','PLEASE FILL THE ENTRY!','error');
   //       }
   //      });

   </script>




   <script>

  $('#submit').on('click', function() {

       $.ajax({
         type: "POST",
         url: "<?php echo base_url('admin/change_pass'); ?>",
         dataType :'json',
         data: { email : email,
                password: password,
                passconf : passconf
               },
         success: function(response)
         {
           if (response.success === true){
             alert("success");
           } else {
             alert('failed');
           }
         },
         error: function(){
           alert("Error");
         },
       });


     });


   </script>
