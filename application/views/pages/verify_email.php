<!-- banner section -->
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
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Get token Via e-mail </h3>
    </div>
    <div class="container">
    <?php
     if($this->session->flashdata('wrongmail')):?>
     <?=$this->session->flashdata('wrongmail')?>
     <?php endif;?>
        <div class="content-w3ls">
            <div class="content1-w3ls">
            </div>
       <?php  //echo form_open('login/verify_email');?>
          <form   action="" method="POST">
            <div class="form-group">

                <center>
                <input type="email"  name="email" id="email" placeholder=" Enter email" class="form-control" style="width:30%;margin:30px;padding: 20px;">
                     <div class="col-lg-12">
                    <button type="submit"  id="btn-login" class="btn btn-primary" style="width:30%;">Send email</button>
     </center>
           <div>
     </div>
</iv>
 </div>
  </form>
</section>



<!-- /tracking section -->
        <script type="text/javascript">
              // Ajax post
              $(document).ready(function(){
              $("#btn-login").click(function(e){
                  e.preventDefault();
              var email = $("#email").val();
              // Returns error message when submitted without req fields.
              if(email=='')
              {
              Swal.fire('Error!','PLEASE FILL THE ENTRY!','error')
              }
              else
              {
              // AJAX Code To Submit Form.
              $.ajax({
              type: "POST",
              url:  "<?php echo base_url(); ?>" + "login/verify_email",
              data: {email: email},
              //cache: false,
              success: function(result){
                  if(result!=0){
                    alert(" A TOKEN HAS BEEN SENT TO YOUR EMAIL");
                   window.location = "<?=base_url('login/ChangePassword')?>";
                   }else{
                    Swal.fire('Error!','INCORRECT EMAIL!','error')
                   }
                }
              });
              }
              return false;
              });
              });
        </script>
