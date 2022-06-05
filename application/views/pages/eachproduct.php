




<!-- bootstrap column card -->

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
    text-align: center;}

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


}
</style>


   <style> 


@media screen and (min-width: 600px) {
  div.warehouse {
    /*background: grey;*/
    border: 1px solid #33accc;
    margin: auto;
    width: 70%;
    padding: 100px;
    height: 55%
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
    height: 50%
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

       <body> 
		<section class="">
		    <div class="bg">
		        <h2 class="text-center w3 w3l agileinfo wthree">Be In Touch With Us</h2>

		     
		    </div>
		</section>

		
<!-- /contact section

  
  

<!-- end slider container -->

        <h1 style="position:relative;text-align: center;top:50px;font-family: sans-serif;"><?=$title?></h1>
   <center style="margin-top: 100px;margin-bottom: 100px;"> 

                <div class="warehouse"> 
                    <form action="<?=base_url('')?>">
                  <div class="lefthouse" style="font-family:sans-serif">
                 
                     <img src="<?=base_url()?>assets/admin/uploads/<?=$GetSingleProduct->userfile?>"  style="width: 70%;border-radius: 5px;">
                
                      <li>Name: <input type="" class="input_hide" name="prod_name" value="<?=$GetSingleProduct->prod_name?>"></li>
                       <li> Price : <input class="input_hide" type="prod_price" name="" value="<?=$GetSingleProduct->prod_price?>"></li>
                         <li>Brand: <input class="input_hide" type="" name="prod_brand" value="<?=$GetSingleProduct->prod_brand?>"></li>
                       <li> Date : <input class="input_hide" type="" name="" value="<?=$GetSingleProduct->created_at?>"></li>
                
                  </div>
                   <div class="righthouse">
                     <input type="hidden" name="user_id" value="<?=$this->session->userdata('id')?>">
                     <div class="form-group">
                       <input type="text" class="form-control" name="sname" value="<?=set_value('sname')?>" placeholder=" yOUR nAMES">
                        <?php $this->session->set_userdata('sname') ?>
                     </div>  
                       <div class="form-group">
                       <input type="text" class="form-control" name="email" placeholder=" yOUR Email">
                     </div>  
                       <div class="form-group">
                    <select name="scountry" class="form-control" style="">
                      <option>Select Your Country </option>
                         <?php foreach($countries as $row_country):?>
                          <option value="<?=$row_country->country?>"><?=$row_country->country?></option>
                             <?php endforeach ;?>
                        </select>
                     </div>    
                       <div class="form-group">
                       <input type="text" class="form-control" name="state" placeholder=" Your State">
                     </div> 
                        <div class="form-group">
                  <!--      <button class="btn btn-primary" data-target="#exampleModal<?=$row_prod->id?>" style="width:100%;">Verify Shipment</button> -->

                          <a href="" data-target="#exampleModal" class="btn btn-primary" data-toggle="modal" style="width:100%">verify product </a>
                     </div>            
                   </div>

                    </form>

                </div>

                     </center>


 </body>




<!-- Modal: modalAbandonedCart-->
<div class="modal fade right" id="exampleModal<?=$row_prod->id?>"  tabindex="-1" role="dialog" aria-labelledby="myModalLabel"
  aria-hidden="true" data-backdrop="false">
  <div class="modal-dialog modal-side modal-bottom-right modal-notify modal-info" role="document">
    <!--Content-->
    <div class="modal-content">
      <!--Header-->
      <div class="modal-header">
        <p class="heading">Product in the cart
        </p>

        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true" class="white-text">&times;</span>
        </button>
      </div>

      <!--Body-->
      <div class="modal-body">

        <div class="row">
          <div class="col-3" style="margin:10px;">
            
        <!--     <p class="text-center"><i class="fas fa-shopping-cart fa-4x"></i></p> -->
            <center><img src="<?=base_url('assets/admin/uploads/'.$GetSingleProduct->userfile)?>" style="width:40%;"></center>
             <br>

                      <center>
               <!--      <td><input type="text" name="" value="Product Name" readonly></td>
                          <td><input type="text" name="" value="<?=$GetSingleProduct->prod_name?>" readonly></td><br>
                          <td><input type="text"  value="Product Price" readonly></td>
                             <td><input type="text" name="" value="<?=$GetSingleProduct->prod_price?>" readonly></td><br>
                        <td><input type="text"  value="Product Brand" readonly></td>
                       <td><input type="text" name="" value="<?=$GetSingleProduct->prod_brand?>" readonly></td>
                        <td><input type="text"  value="Product Date" readonly></td>
                       <td><input type="text" name="" value="<?=$GetSingleProduct->created_at?>" readonly></td> -->

                       <style>

                       .txt{
                        width: 100%;border: 0px solid red;
                       }
                     </style>
                       <table class="table table-striped">
                        <?=$this->session->userdata('sname')?>
                        <tr> 
                          <th>Product Name </th>
                          <th>Product price </th>
                          <th>Product Brand </th>
                        </tr>
                          <td><input type="" name="" readonly  class="txt" value="<?=$GetSingleProduct->prod_name?>"></td>
                            <td><input type=""name="" readonly="" class="txt" value="<?=$GetSingleProduct->prod_price?>"></td>
                              <td><input type=""name="" readonly="" class="txt" value="<?=$GetSingleProduct->prod_brand?>"></td>

                       </table>
          
           <input type="hidden" name="" value="<?=$this->session->userdata('id')?>" readonly="readonly">
            <input type="hidden" id="type" name="" value="<?=$row_prod->prod_name?>" readonly="readonly"><br>
             <input type="hidden" id="type" name="" value="<?=$row_prod->prod_price?>" readonly="readonly"><br>
            <input type="hidden" id="type" name="" value="<?=$row_prod->prod_brand?>" readonly="readonly"><br>
     
          </div>

          <div class="col-9">
           <span style="font-family:sans-serif;font-size:2em;"> Shipping Details</span>
               <div class="form-group">

                      
                       <input type="text" class="form-control" name="sname" value="<?=set_value('sname')?>" placeholder=" yOUR nAMES">
                        <?php $this->session->set_userdata('sname') ?>
                     </div>  
                       <div class="form-group">
                       <input type="text" class="form-control" name="semail" placeholder=" yOUR Email">
                     </div>  
                       <div class="form-group">
                    <select name="scountry" class="form-control" style="">
                      <option>Select Your Country </option>
                         <?php foreach($countries as $row_country):?>
                          <option value="<?=$row_country->country?>"><?=$row_country->country?></option>
                             <?php endforeach ;?>
                        </select>
                     </div>
            <div class="form-group">
            <input type="text" name="" placeholder="Enter Your State" class="form-control" style="width:50%;">
           </div>
          </div>
        </div>
      </div>

      <!--Footer-->
      <div class="modal-footer justify-content-center">
     <a type="" id="modalPoll-1<?=$row_prod->id?>"  class="btn btn-info">Go to cart</a> 
        <a type="button" class="btn btn-outline-info waves-effect" data-dismiss="modal">Cancel</a>
      </div>
    </div>
    <!--/.Content-->
  </div>
</div>
<!-- Modal: modalAbandonedCart-->





