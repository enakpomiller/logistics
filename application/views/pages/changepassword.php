
<!-- <section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->
<!-- /banner section -->

<!-- tracking section -->


<section class="shipment-w3ls" >
    <div class="container" >
        <i class="fa fa-braille">
        </i>
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Change Password </h3>
    </div>
    <div class="container" style="height:70%;">
          <label style="color:red;"><?=validation_errors()?></label>
        <div class="content-w3ls" style="height:65%;">
          <?php if($this->session->flashdata('otpsent')):?>
            <center><div class="alert alert-danger"><?=$this->session->flashdata('otpsent')?></div></center>
         <?php endif;?>

          <?php if($this->session->flashdata('msg_error')):?>
            <center><div class="alert alert-danger"><?=$this->session->flashdata('msg_error')?></div></center>
         <?php endif;?>
            <div class="content1-w3ls">
            </div>
          <center>
            <form action=""  class="form" method="POST">
                <div class="form-group">
                 <div style="position: relative;top:5px;color:#ff0000;"><?=$mismatch?></div>
                 <div style="position: relative;top: 50px;color:#ff0000;"><?=$error_token?></div>
                 <input type="" name="verify_code" id="verify_code" autocomplete="on" placeholder=" Enter token" value="<?=set_value('verify_code')?>" class="form-control" style="width:30%;margin:30px;padding: 20px;">
                  </div>
                  <div class="form-group">
                  <input type="" name="password" id="Password" autocomplete="on" placeholder=" Enter password "  value="<?=set_value('password')?>" class="form-control" style="width:30%;margin:30px;padding: 20px;">
                  </div>
                  <div class="form-group">
                 <input type="" name="conf_password" id="conf_password" placeholder=" confirm password " value="<?=set_value('conf_password')?>"  class="form-control" style="width:30%;margin:30px;padding: 20px;">
                 </div>
                <div class="form-group">
               <button type="submit" id="btn-login" class="btn btn-primary" style="width:30%;">Update</button>
            </div>
            </center>
        </div>
    </div>
     <?php echo form_close()?>
</section>



<!-- /tracking section -->
