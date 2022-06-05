
<style>
#bg{
padding-top: 30px;padding-bottom: 20px;
margin-top: 20px;
border-radius:10px;
width:70%;

}
</style>



<!-- <section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->
<!-- /banner section -->

<div id="success"></div>
<!-- tracking section -->
<section class="shipment-w3ls">
    <div class="container">
        <i class="fa fa-braille" aria-hidden="true"></i>
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Create Account </h3>
    </div>      <center>
               <?php if($this->session->flashdata('update_pass')):?>
                <div class="alert alert-warning" style="width:40%;"><?=$this->session->flashdata('update_pass')?></div>
                    <?php endif;?>
                       <?php if($this->session->flashdata('email_sent')):?>
                <div class="alert alert-infor" style="width:40%;"><?=$this->session->flashdata('email_sent')?></div>
                    <?php endif;?>
                  </center>

    <div class="container">
        <div class="content-w3ls" style="overflow:initial;height: 70%;">
            <div class="content1-w3ls">
                <h2>  </h2>
            </div>
            <!-- start user account -->
                   <div id="img">
                     <div class="container" id="bg">
                     <?php //echo form_open_multipart('users/signup');?>
                        <form method="post" id="form"  enctype="multipart/form-data" class="subscribeForm">
                         <div class="form-row">
                         <div class="form-group col-md-6">
                          <div style="color: red;"> <?=form_error('name')?></div>
                          <input type="text" name="name"  placeholder="Enter Name" class="form-control" id="name" value="<?=set_value('name')?>" style="padding: 20px;">
                      </div>
                    <div class="form-group col-md-6">
                            <div style="color: red;"> <?=form_error('email')?></div>
                          <input type="email"  id="email" name="email" placeholder="Enter email" class="form-control" id="input" value="<?=set_value('email')?>" style="padding: 20px;">
                        </div>
                      </div>
                      <div class="form-group">
                           <div style="color: red;"> <?=form_error('password')?></div>
                        <input type="text" name="password" placeholder="Enter Password" class="form-control" id="password" value="<?=set_value('password')?>" style="width:95%;position: relative;left: 15px;padding: 20px;">
                      </div>
                      <div class="form-group">
                          <div style="color: red;"> <?=form_error('conf_password')?> </div>
                        <input type="text" id="conf_password" name="conf_password" placeholder="Repeat Password" class="form-control" id="conf_password" value="<?=set_value('conf_password')?>" style="width:95%;position: relative;left: 15px;padding: 20px;">
                      </div>
                      <div class="form-row">
                        <div class="form-group col-md-6">
                          <div style="color: red;"> <?=form_error('userfile')?> </div>
                          <input type="file"  id="userfile" name="userfile"  class="form-control" id="userfile">
                        </div>
                        <div class="form-group col-md-4">
                         <div> <?=form_error('country')?></div>
                          <select   name="country" id="country"   style="padding: 10px;color:black;" value="<?=set_value('country')?>">
                                <option> Select Country </option>
                                  <?php  foreach($countries as $country):?>
                                  <option value="<?=$country->country?>">
                                  <?php  echo $country->country;?>
                                    </option>
                                   <?php endforeach ;?>
                                </select>
                            </div>
                        <div class="form-group col-md-2">
                         <div style="color: red;"> <?=form_error('date')?> </div>
                          <input type="date" id="date" name="date"  style="padding: 5px;position:relative;right:70px;">
                        </div>
                      </div>
                      <button type="submit" id="butsave" onclick="move()" style="color:#ffffff;position: relative;left: 15px;width: 46%;" class="btn btn-primary" id="butsave">Sign in</button>
                    </form>
              </div>
          </div>

            <!-- end -->

        </div>
    </div>
     <?php echo form_close()?>
</section>

<!--
<script type="text/javascript">

      // // Ajax post
      $(document).ready(function(){
      $("#form").submit(function(){
      var name = $("#name").val();
      var email = $("#email").val();
      var password = $("#password").val();
      var conf_password = $("#conf_password").val();
      var userfile = $("#userfile").val();
      var country = $("#country").val();
      var date = $("#date").val();
      // Returns error message when submitted without req fields.
      if(name =='' || email=='' || password=='' || conf_password =='' || userfile=='' || country=='' || date=='')
      {
      Swal.fire('Error!','PLEASE FILL ALL ENTRIES!','error')

      }
      else
      {
      // AJAX Code To Submit Form.
      $("#form").attr("disabled", "disabled");
    			$.ajax({
    				url: "<?php echo base_url("users/signup");?>",
    				type: "POST",
    				data: {
    					type: POST,
    					name: name,
    					email: email,
    					password: password,
    					userfile: userfile,
              country: country,
              date : date
    				},
    				// cache: true,
    				success: function(dataResult){
    					var dataResult = JSON.parse(dataResult);
    					if(dataResult.statusCode==200){
                alert('success');
    						$("#form").removeAttr("disabled");
    						$('#fupForm').find('input:text').val('');
    						$("#success").show();
    						$('#success').html('Data added successfully !');

    					}
    					else{
    					   Swal.fire('Error!','PLEASE FILL ALL ENTRIES!','error')
    					}

    				}
    			});
      }
      return false;
      });
      });


</script> -->


<script type="text/javascript">
      // Ajax post
      $(document).ready(function(){
        $("#form").submit(function(){
        var name = $("#name").val();
        var email = $("#email").val();
        var password = $("#password").val();
        var conf_password = $("#conf_password").val();
        var userfile = $("#userfile").val();
        var country = $("#country").val();
        var date = $("#date").val();
      // Returns error message when submitted without req fields.
      if(name =='' || email=='' || password=='' || conf_password =='' || userfile=='' || country=='' || date=='')
      {
      // jQuery("div#err_msg").show();
      // jQuery("div#msg").html("All fields are required");
      Swal.fire('Error!','PLEASE FILL ALL ENTRIES!','error')

      }
      else
      {
      // AJAX Code To Submit Form.
      $.ajax({
      type: "POST",
    	url: "<?php echo base_url("users/signup");?>",
      data: {
          type: POST,
          name: name,
          email: email,
          password: password,
          userfile: userfile,
          country: country,
          date : date
      },
      //cache: false,
      success: function(result){
          if(result!=0){
            alert('success');
           // window.location = "<?=base_url('users/product')?>";
           }else{
            // jQuery("div#err_msg").show();
            // jQuery("div#msg").html("Login Failed");
            Swal.fire('Error!','INCORRECT USERNAME OR PASSWORD!','error')
           }

      }
      });
      }
      return false;
      });
      });
</script>
