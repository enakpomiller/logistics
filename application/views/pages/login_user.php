
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
        <i class="fa fa-braille" aria-hidden="true"></i>
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> User Login </h3>
    </div>
    <div class="container">

              <div class="content-w3ls">
                  <div class="content1-w3ls">
                    <center>
                      <h5>
                     <div style="color:#ffffff;font-family: sans-serif;font-weight: bold;"><?//= validation_errors()?></di>
                           <label> <?=form_error('email')?></label>
                           <label><?=form_error('password')?></label>
                      </h5>
                  </div>

         <center>
            <div id="error"></div>
            <div id="msg"></div>
             <form action="" method="POST">
               <div class="form-group">
                   <input type="email" name="email" id="email"  placeholder=" Enter email" class="form-control" style="width:30%;margin:30px;padding: 20px;" value="<?=set_value('email')?>">
                </div>
                  <div class="form-group">
                     <input type="text" name="password" id="password"  placeholder=" Enter password " class="form-control" style="width:30%;margin:30px;padding: 20px;" value="<?=set_value('password')?>">
              </div>
                <div class="form-group">
                  <button  class="btn btn-primary" style="width:30%;margin:0px;padding: 10px;" id="submit"> login </button>
            </div>
            <div class="form-group">
                <div class="form-check">
                  <label class="form-check-label" for="gridCheck">
                    <a href="<?=base_url('login/verify_email')?>"> Forget Password </a>
                  </label>
               </div>
            </div>
        </center>
      </div>
    </div>
  </form>
 </div>
</section>


<?php
// $people = array("Peter", "Joe", "Glenn", "Cleveland");
//
// if (in_array("Peter", $people))
//   {
//   echo "Match found";
//   }
// else
//   {
//   echo "Match not found";
//   }
?>


<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
   <script>

   $('#submit').on('click', function(e) {
         e.preventDefault();
         var email = $('#email').val();
         var password = $('#password').val();
         if(email!="" && password!="" ){
           $.ajax({
             url:  "<?php echo base_url(); ?>" + "login/login_user",
             type: "POST",
             data: {
               type:1,
               email: email,
               password: password
             },
             cache: false,
             success: function(dataResult){
               var dataResult = JSON.parse(dataResult);
               if(dataResult.statusCode==200){
                 window.location = "<?=base_url('users/product')?>";
               }
               else if(dataResult.statusCode==201){
                 $("#error").show();
                 // $('#error').html('Invalid EmailId or Password !');
                 Swal.fire('Error!','INCORRECT EMAIL OR PASSWORD!','error')

               }

             }
           });
         }
         else{
             Swal.fire('Error!','PLEASE FILL THE ENTRY!','error');
         }
        });

   </script>
