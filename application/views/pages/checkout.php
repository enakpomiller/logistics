
<style>

.bg{
    background: url("<?=base_url('assets/images/banner1-1.jpg')?>");
    height: 200px;
    padding: 0px;
   background:#000000;
    opacity:0.6;
}
.font{
    font-family:sans-serif;
    text-transform: uppercase;
    text-align: center;
}

.grid-container {
  display: grid;
  height: 400px;
  align-content: center;
  grid-template-columns: auto auto auto;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}


.input_hide{
  border: 0px solid red;
}

.line_remove{
    border-top : 0px;
    border-left: 0px;
    border-right:0px;

</style>


   <style>

@media screen and (min-width: 600px) {
  div.warehouse {
    /*background: grey;*/
    border: 1px solid #33accc;
    margin: auto;
    width: 70%;
    padding: 100px;
    height: 60%;
    overflow:auto;
   bottom: 50px;
   position: relative;
  }
    div.righthouse{
    float: right;
  /*  background: #ff00ff;*/
    width: 50%;
    padding: 20px;
    height: 300px;
    position: relative;
    bottom: 100px;
    left: 20px;
 }
 div.lefthouse{
    float: left;
   /* background: #ff0000;*/
    width: 50%;
    padding: 20px;
    height: 300px;
    position: relative;
    bottom: 100px;
    right: 20px;
 }

}

@media screen and (max-width: 600px) {
   div.warehouse {
/*    background: grey;*/
    margin: auto;
    width: 80%;
    padding: 100px;
    display: flex;
    overflow: auto;

  }
    div.righthouse{
    float: right;
/*    background: #ff00ff;*/
    width: 100%;
    padding: 20px;
    height: 250px;
    position: relative;
    bottom: 350px;
    left: 100px;
 }
 div.lefthouse{
    float: left;
/*    background: #ff0000;*/
    width: 100%;
    padding: 20px;
    height: 250px;
    position: relative;
    bottom: 100px;
    right: 100px;

 }


}

/* For width 400px and larger: */
@media only screen and (min-width: 400px) {
  img {

  }
}
   </style>

     <style>

       .txt{
        width: 100%;border: 0px solid red;
       }
       .ship{
         //border: 1px solid red;
         box-shadow: 0px 0px 2px 1px  grey;
         border-radius: 5px;
       }
     </style>

     <!-- Include Select2 CSS -->
       <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.6.3/jquery.min.js"></script>
       <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
       <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     <!-- end select 2 links -->


<!-- <section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->
<!-- /banner section -->

<!-- tracking section -->
<section class="shipment-w3ls">

  <div class="container" style="margin-top:100px;">
     <h1 class=" " style="text-align:center;margin:10px;"> Shipping Details </h1>

        <!-- <div class="content-w3ls" style="height:100%;background:red;"></div> -->
            <div class="content1-w3ls" style="background:sandybrown;">  </div>
          <!-- shipping start -->
           <h1 style="position:relative;text-align: center;top:50px;font-family: sans-serif;"> </h1>
              <center style="margin-top: 100px;margin-bottom: 100px;">  </center>

                       <!-- user details -->
                                 <!-- <?php if(!empty($userprofile)):?>
                                            <?php $total_sum =0;?>
                                           <?php foreach($userprofile as $user):?>
                                            <?php $grand_sum = $total_sum+=$user->prod_price;?>
                                            <?php endforeach;?>
                                           <input type="hidden" name="ship_amount" value="<?=$grand_sum?>">
                                            <?php endif;?>
                                            <?php if(!empty($oneuser)):?>
                                        <input type="hidden" name="s_userfile" value=" <?=$oneuser->userfile?>">
                                        <input type="hidden" name="s_name" value=" <?=$oneuser->name?>">
                                        <input type="hidden" name="s_country" value=" <?=$oneuser->country?>">
                                         <input type="hidden" name="s_email " value="<?=$oneuser->email?>">
                                        <input type="hidden" name="" value="<?=$oneuser->date?>">
                                        <?php endif;?> -->
                       <!-- end of userdetail -->

                       <div class="row ship" style="width:80%;margin:auto;position:relative;bottom:50px;">
                         <div class="col-md-4" style="margin-right:10px;margin-right:80px;">
                            <img src="<?=base_url('assets/images/shipping.png')?>" style="position:relative;width:120%;top:30px;height:200px;">
                         </div>
                         <div class="col-md-6">
                           <h3> <p style="padding:20px;"> <?=$title_name?></p> </h3>
                           <form action="" method="POST">
                                 <div class="form-group" class="form-control">
                                     <input type="text" class="form-control line_remove" id="s_name" name="s_name" placeholder=" yOUR nAMES" value="<?=set_value('s_name')?>">
                                     <?php $this->session->set_userdata('s_name') ?>
                                  </div>
                                    <div class="form-group">
                                      <input type="text" class="form-control line_remove" id="s_email" name="s_email" placeholder=" yOUR Email">
                                   </div>
                                 <div class="form-group">
                                    <select name="s_country"  id="s_country"  class="form-control line_remove" style="">
                                         <option disabled>Select Your Country </option>
                                          <option></option>
                                          <?php foreach($countries as $row_country):?>
                                          <option value="<?=$row_country->country?>"><?=$row_country->country?></option>
                                          <?php endforeach;?>
                                     </select>
                                  </div>
                                   <div class="form-group">
                                     <input type="text" class="form-control line_remove" id="s_state" name="s_state" placeholder=" Your State">
                                    </div>
                                      <div class="form-group">
                                        <input type="text" class="form-control line_remove" id="s_land_mass" name="s_land_mass" placeholder=" Your Landmass">
                                      </div>
                                      <div class="form-group">
                                        <button class="btn btn-primary" id="submit_ship" style="width:100%;background:sandybrown;padding:10px;border:0px solid red;">Verify Shipment</button>
                                   </div>
                                   <!-- loader -->
                                   <center> <div id="loading"></div></center>

                           </form>
                         </div>
                       </div>
                <!-- end shipping -->
                <!-- <div class="row" style="margin-top: 30px;" id="loading">
                  <div class="col-md-4"></div>
                  <div class="col-md-4 text-center">
                    <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                    <p class="">Processing...</p>
                  </div>
                  <div class="col-md-4"></div>
                </div> -->

</section>

<style>
#spin{
  background: red;
}
</style>
<script>

         $('#loading').hide();
          $('#gen_toggle').hide();

          $('#submit_ship').click(function(e){
            e.preventDefault();
              var s_name = $('#s_name').val();
              var s_email = $('#s_email').val();
              var s_country = $('#s_country').val();
              var s_state = $('#s_state').val();
              var s_land_mass = $('#s_land_mass').val();
              //var param = $('#prn').val();
             if(s_name!="" && s_email!="" && s_country!="" && s_state!="" && s_land_mass!=""){
               $('#loading').show();
                  $.ajax({
                    type: "POST",
                    url:  "<?php echo base_url(); ?>" + "users/checkout",
                     data:{type:1,s_name:s_name,s_email:s_email,s_country:s_country,s_state:s_state,s_land_mass:s_land_mass},
                    //data: 'load=' + param,
                    success: function(dataResult){
                       var dataResult =JSON.parse(dataResult);
                       if(dataResult.statusCode==200){
                         $("#loading").html("<p style='width:50%; text-align:center;' style='font-size:9px;'><i style='background:sandybrown;' class='fa fa-spinner fa-spin'></i> loading...</p>");
                         window.location = "<?=base_url('users/very_shipping')?>";
                       }else if(dataResult.statusCode==201){
                         $('#loading').hide();
                         Swal.fire('Error!','Sorry an Error Occured, please login and try again !','error')

                       }

                    }
                  });
             }else{
               // $("#msg_error").html("<p class='alert alert-danger'> Error please fill the entries </p>")
                Swal.fire('Warning!','Please Fill All Entry!','warning')
             }

            //}
          });
</script>


<script type="text/JavaScript">
$(document).ready(function() {
  $('#s_country').select2();
});
</script>
