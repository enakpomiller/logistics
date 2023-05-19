<!-- banner section -->
        <!-- <section class="inner-w3ls">
            <div class="container">
                <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
                <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
            </div>
        </section> -->
<!-- /banner section -->

<!-- tracking section -->
<div id="msg"></div>
          <section class="shipment-w3ls">


            <div class="container" style="margin-top:100px;">
                  <h1 class=" wthree w3-agileits agileits-w3layouts agile w3-agile" style="text-align:center;"> Get token Via e-mail </h1>
                  <div class="content-w3ls" style="width:60%;height:250px;">
                      <div class="content1-w3ls" style="background:sandybrown;"></div>

                <?php  //echo form_open('login/verify_email');?>
                  <form  action="" method="POST">
                      <div class="form-group">
                          <center>
                               <input type="email"  name="email" id="email" placeholder=" Enter email" class="form-control" style="width:50%;margin:30px;padding: 20px;">
                               <div class="col-lg-12">
                                <button type="submit" id="submit" class="btn btn-primary" style="width:50%;background:sandybrown;padding:10px;border:0px solid red;">Send email</button>
                             <div id="result"></div>
                          </center>
                </div>
           </div>
        </form>
    </div>
    </div>
     </section>






<!-- /tracking section -->
     <script type="text/javascript">
        $('#submit').on('click', function(e) {
          // $("#result").html("<p style='width:50%; text-align:center;' style='font-size:19px'><span  id='lgaspin' class='text-danger' ><i class='fa fa-spinner fa-spin'></i> loading...</span></p>");
              e.preventDefault();
              var email = $('#email').val();
              if(email!=""){
                $.ajax({
                  url:  "<?php echo base_url(); ?>" + "login/verify_email",
                  type: "POST",
                  data: {
                    type:1,
                    email: email
                  },
                  cache: false,
                  success: function(dataResult){
                    var dataResult =JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                        $("#result").html("<p style='width:50%; text-align:center;' style='font-size:19px'><span  id='lgaspin' class='text-danger' ><i class='fa fa-spinner fa-spin'></i> loading...</span></p>");
                        window.location = "<?=base_url('login/changepassword')?>";
                    }
                    else if(dataResult.statusCode==201){
                       //$("#error").show();
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




             // function search(){
             //   $("#result").html("<p style='width:100%; text-align:center;' style='font-size:19px'><span  id='lgaspin' class='text-danger' ><i class='fa fa-spinner fa-spin'></i> loading...</span></p>");
             //   var val = $("#email").val();
             //   $.ajax({
             //     type : 'POST',
             //     url : '<?php echo base_url() ?>' + 'login/verify_email',
             //     dataType: "html",
             //     data : "email=" + val,
             //     success : function(email){
             //       if(email){
             //         console.log(" correct "); die;
             //         window.location.href = "<?=base_url('login/changepassword')?>";
             //       }
             //       console.log(" wrong email");
             //       // $("#result").html(response);
             //
             //     }
             //   });
             //
             // }

             $("#email").keydown(function(e){
          			if(e.keyCode == '3'){
          				search();
          			}
          		});

        </script>







<script type="text/javascript">

      // Ajax post
      // $(document).ready(function(){
      // $("#submit").click(function(){
      // var email = $("#email").val();
      // // Returns error message when submitted without req fields.
      // if(email=='')
      // {
      // jQuery("div#err_msg").show();
      // alert('fill');
      // jQuery("div#msg").html("All fields are required");
      // }
      // else
      // {
      // // AJAX Code To Submit Form.
      // $.ajax({
      // type: "POST",
      // url:  "<?php echo base_url(); ?>" + "login/verify_email",
      // data: {email: email},
      // cache: false,
      // success: function(dataResult){
      //     var dataResult = JSON.parse(dataResult);
      //     if(dataResult==200){
      //       alert(' success');
      //         // On success redirect.
      //     }
      //     else
      //      alert(' wrong');
      //         // jQuery("div#err_msg").show();
      //         // jQuery("div#msg").html("Login Failed");
      // }
      // });
      // }
      // return false;
      // });
      // });
</script>
