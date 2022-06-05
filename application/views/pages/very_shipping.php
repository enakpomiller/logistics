
<?php session_start();?>
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
    height:70%;
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
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Verify Details </h3>
    </div>

    <div class="container">
          <!-- shipping start -->

                  <!-- client details -->
                     <?php if(!empty($getship)):?>
                       <label style="position:relative;bottom:10px;"><h2><h2> Sender </h2></label><br>
                         <?php foreach($getship as $ship):?>
                          <img src="<?=base_url()?>assets/uploads/<?=$ship->userfile?>" style="width:10%;height: 100px;position:relative;bottom:10px;">
                            <table class="table table-bordered">
                              <tr>
                                <th> name </th>
                                <th> email </th>
                                <th> country </th>
                            <tr>
                              <td><?=$ship->name?></td>
                              <td><?=$ship->email?></td>
                              <td><?=$ship->country?></td>
                          </tr>
                            <?php endforeach;?>
                         </table>
                    <?php endif;?>
                   <!-- end of client -->

                            <!-- cart details -->
                            <?php if(!empty($demo)):?>
                           
                       <label style="position:relative;bottom:10px;"><h2><h2> Cart details </h2></label><br>
                      
                            <table class="table table-bordered">
                              <tr>
                                <th> Product name </th>
                                <th> Product Price </th>
                                <th> Product Brand  </th>
                                <th>  Quantity </th>
                                <th> Amount  </th>
                                <th> Date          </th>
                                <?php foreach($demo as $cart):?>
                            <tr>
                              <td><?=$cart->prod_name?></td>
                              <td><?=$cart->prod_price?></td>
                              <td><?=$cart->prod_brand?></td>
                              <td><?=$cart->prod_quantity?></td>
                              <?php $amt = $cart->prod_quantity * $cart->prod_price?>
                               <td><?=' &#8358;'.number_format(($amt),2)?></td>
                              <td><?=$ship->created_at?></td>
                          </tr>
                            <?php endforeach;?>
                         </table>
                    <?php endif;?>
                   <!-- end of client -->

                        <?php if($getship):?>
                    <label><h2> Recipient  Details </h2></label>
                        <table class="table table-bordered">
                          <tr>
                              <th>Name</th>
                              <th> Email </th>
                              <th> Country </th>
                              <th> State </th>
                              <th> Land Mass </th>
                              <th> time </th>
                              <td> Total Amout </td>
                          <tr>
                        <?php foreach($getship as $getship):?>
                         <tr>
                            <td>  <?=$getship->s_name?> </td>
                            <td>  <?=$getship->s_email?></td>
                            <td>  <?=$getship->s_country?></td>
                            <td>  <?=$getship->s_state?></td>
                            <td>  <?=$getship->s_land_mass?></td>
                            <td>  <?=$getship->created_at?></td>
                            <td> <b> <?php echo ' &#8358;'.number_format(($_SESSION['sum']),2);?> </td>
                         </tr>
                      <?php endforeach;?>
                    </table>
                  <?php endif?>
              <?php $this->session->set_userdata('very_amt',$_SESSION['sum']); ?>



  <a href="<?=base_url('users/make_payment')?>" class="btn btn-primary"> Proceed to  payment </a>
<button onclick="print()" class="btn btn-primary"> print </buttob>
 </section>
