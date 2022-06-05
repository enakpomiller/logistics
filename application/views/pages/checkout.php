
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
     </style>


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
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Shipping Details </h3>
    </div>

    <div class="container">
        <div class="content-w3ls" style="height:100%;background:;">
            <div class="content1-w3ls">   </div>
          <!-- shipping start -->
           <h1 style="position:relative;text-align: center;top:50px;font-family: sans-serif;"> </h1>
              <center style="margin-top: 100px;margin-bottom: 100px;">

                <div class="warehouse">
                  <div class="lefthouse" style="font-family:sans-serif">
                     <img src="<?=base_url('assets/images/undraw_gatsbyjs_st4g.png')?>" style="width:120%;">
                  </div>
                  <div class="righthouse">
                      <label style="position: relative;bottom:10px;font-family:sans-serif;font-size:20px;margin: 10px;"><?=$title_name?></label>
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

                       <form action="<?=base_url('users/checkout')?>" method="POST">
                       <div class="form-group" style="position: relative;top: ;">
                       <input type="text" required class="form-control line_remove" name="s_name" value="<?=set_value('s_name')?>" placeholder=" yOUR nAMES">
                        <?php $this->session->set_userdata('s_name') ?>
                     </div>
                       <div class="form-group">
                       <input type="text" class="form-control line_remove" name="s_email" placeholder=" yOUR Email">
                     </div>
                       <div class="form-group">
                    <select name="s_country" class="form-control line_remove" style="">
                      <option>Select Your Country </option>
                         <?php foreach($countries as $row_country):?>
                          <option value="<?=$row_country->country?>"><?=$row_country->country?></option>
                             <?php endforeach ;?>
                        </select>
                     </div>
                       <div class="form-group">
                       <input type="text" class="form-control line_remove" name="s_state" placeholder=" Your State">
                     </div>
                         <div class="form-group">
                       <input type="text" class="form-control line_remove" name="s_land_mass" placeholder=" Your Landmass">
                     </div>
                      <div class="form-group">
                       <button class="btn btn-primary" style="width:100%;">Verify Shipment</button>
                     </div>
                   </div>

                    </form>

                </div>

                     </center>
                <!-- end shipping -->
     </div>

</section>
