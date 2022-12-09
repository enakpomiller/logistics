
  <script src="<?=base_url()?>assets/ckeditor_4.14.0_standard/ckeditor/ckeditor.js"></script>

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
    width: 100%;
    padding: 100px;
    height:65%;
    top:10px;
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
    right: 70px;
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
  .checked {
    color: orange;
  }
   </style>



<!-- tracking section -->
    <section class="shipment-w3ls">
        <div class="container">
            <i class="fa fa-braille" aria-hidden="true"></i>
            <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Shop Now</h3>
        </div>
    <div class="container">
        <div class="content-w3ls" style="height:90%;background:white;">
          <div class="content1-w3ls">
        </div>

                <div class="warehouse">

                <style>
                  .prod:hover{
                    //border: 1px solid red;
                    box-shadow: 2px 1px 5px 2px  #888888;
                  }
                </style>

                  <div class="lefthouse" style="font-family:sans-serif">
                     <img src="<?=base_url('uploads/'.$prod_details->userfile)?>"  style="width:90%;height:120%;position: relative;left:30px;">
                      <center><label style="margin:10px 10px;font-family:ariel;font-size:20px"><?=($result->prod_name)?></label></center>

                    </div>

               <form  action="<?=base_url('users/single_prod')?>" class="subscribeForm" method="POST">
                  <div class="righthouse" style="padding:20px;">
                       <div class="form-group" style="position: relative;top: ;">
                        <input type="hidden" name="user_id" id="user_id"   value="<?=$this->session->userdata('id')->id?>">
                        <input type="hidden" name="product_id" id="product_id" value="<?=$prod_details->id?>">
                        <h2> <?=$prod_details->prod_name?></h2>
                        <p style="font-family:sans-serif;font-size:2em;margin-top:20px;"><?= " &#x20A6;".($prod_details->prod_price)?></p>
                        <p style="font-family:sans-serif;;font-size:14px;text-decoration:line-through;font-weight:bold;"><?= " &#x20A6;".($prod_details->prod_price)?></p>
                        <input type="hidden" name="prod_price" value="<?=$prod_details->prod_price?>">
                         <input type="hidden" required class="form-control line_remove" id="prod_title" name="prod_name" value="<?=$prod_details->prod_name?>" readonly>
                         </div>
                         <span class="fa fa-star checked "></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star checked"></span>
                         <span class="fa fa-star"></span>
                         (42 verified ratings)
                          <p> In Stock </p>

                        <p style="font-family:sans-serif;"> <?=$prod_details->prod_brand?> </p>
                          <input type="hidden" name="prod_brand" value="<?=$prod_details->prod_brand?>">
                            <p> <input type="hidden" required readonly name="prod_brand" id="prod_brand" value="<?=$prod_details->prod_brand?>" class="txt"></p>
                            <input type="number"  name="prod_quantity" id="prod_quantity" placeholder="Qty" style="width:70px;margin:8px;">

                              <input type="hidden" name="userfile" value="<?=$prod_details->userfile?>">
                              <input type="hidden" name="category" value="<?=$prod_details->category?>">
                              <div class="form-group">
                              <label style="color:red;"> <?=form_error('date')?></label>
                              <input type="date" required class="form-control line_remove" value="<?=set_value('date')?>" name="date" id="date">
                          </div>
                        <div class="form-group">
                       <button class="btn btn-primary btn-save"  style="width:100%;"><i class='fas fa-shopping-cart' style="margin-right:20px;"></i> ADD TO CART</button>
                     </div>
                   </div>
                </form>
              </div>

              <h3>Similar Products </h3> &nbsp;
               <div class="row">
                 <?php foreach($similar as $sametype){?>
                 <div class="col-md-2 prod">
                 <a href="<?=base_url('users/single_prod/'.$sametype->id)?>">
                 <img src="<?=base_url('uploads/'.$sametype->userfile)?>" style="width:80%;height:20%;position: relative;left:20px;">
                 </a>
                 <p class="text-center"><?=$sametype->prod_name?>
                  <?= "<b>"." &#x20A6;"."<b>".$sametype->prod_price?>
                  </p>
                 </div>
                  <?php }?>
               </div>

        </div>
    </div>

</section>


<script>
      // Ajax post
          $(document).ready(function(){
              $(".subscribeForm").on('submit', function(e){
                  e.preventDefault();
                  let data = $(this).serialize();
                  //sweet alert
                      Swal.fire({
                      title: 'Are you sure?',
                      text: "You want to add this item to your cart?!",
                      icon: 'warning',
                      showCancelButton: true,
                      confirmButtonColor: '#3085d6',
                      cancelButtonColor: '#d33',
                      confirmButtonText: 'Yes!',
                      width: '450px',
                    }).then((result) => {
                      if (result.isConfirmed) {
                          $.ajax({
                              type: "POST",
                              url:  "<?= base_url(); ?>" + "/users/single_prod",
                              data: data,
                              success: function(result){
                                  Swal.fire(
                                  'Item Added!',
                                  'Item added to cart successfully.',
                                  'success'
                                  );


                              }
                          });

                      }

                      })


              });
          });
 </script>
