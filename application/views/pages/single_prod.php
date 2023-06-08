
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
        <div class="container" style="margin-top:30px;">

            <h1 style="text-align:center;margin-top:50px;font-family:sans-serif;"> Shop Now</h1>
        </div>

    <div class="container">
        <div class="content-w3ls " style="height:90%;background:white;">
          <div class="content1-w3ls" style="background:sandybrown;">
          <span class="text-right"><a href="<?=base_url('users/search_product')?>"> Search Product  </a> </span>
        </div>

                <div class="warehouse">

                <style>
                  .prod:hover{
                    //border: 1px solid red;
                    box-shadow: 1px 1px 5px 1px  sandybrown;
                    padding:0px;
                  }
                </style>

                  <div class="lefthouse" style="font-family:sans-serif">
                     <img src="<?=base_url('uploads/'.$prod_details->userfile)?>"  style="width:90%;height:120%;position: relative;left:30px;">
                      <center><label style="margin:10px 10px;font-family:ariel;font-size:20px"><?=($result->prod_name)?></label></center>
                       <div class="col-md-8">
                         <label>

                          <?php
                            if($num_views < '1'){
                              echo (($num_views)+(1)) ." view" ;
                            }else if($num_views =='1'){
                              echo (($num_views)+(1)) ." views" ;
                            }
                            else{
                             echo (($num_views)+(1)) ." views" ;
                            }

                            ?>
                       </label>
                       </div>

                        <div class="col-md-4">
                           <div id="mydiv">

                              <?php
                               
                                if($num_likes=='1'){
                                  $msg = $num_likes. "like";
                                }elseif($num_likes > '1'){
                                  $msg = $num_likes." likes";
                                }else{
                                  $msg = " 0 likes ";
                                }
                                echo $msg;
                               ;?>
                            </div>
                                 
                               <button style="margin-left:50px;border:1px;position:relative;bottom:20px;color:red;font-weight:bold;" id="likeprod"><i class="glyphicon glyphicon-thumbs-up"></i> Like </button>
                              
                          </div>
                    </div>

               <form  action="<?=base_url('users/single_prod')?>" class="subscribeForm" method="POST">
                  <div class="righthouse" style="padding:20px;">
                       <div class="form-group" style="position: relative;top: ;">
                        <input type="hidden" name="user_id" id="user_id"   value="<?=$this->session->userdata('id')?>">
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
                            <input type="number" required  name="prod_quantity" id="prod_quantity" placeholder="Qty" style="width:70px;margin:8px;">

                              <input type="hidden" name="userfile" value="<?=$prod_details->userfile?>">
                              <input type="hidden" name="category" value="<?=$prod_details->category?>">
                              <div class="form-group">
                              <label style="color:red;"> <?=form_error('date')?></label>
                              <input type="date" required class="form-control line_remove" value="<?=set_value('date')?>" name="date" id="date">
                          </div>
                        <div class="form-group">
                       <button class="btn  btn-save"  style="width:100%;background:sandybrown;color:white;padding:10px;font-weight:bold;"><i class='fas fa-shopping-cart' style="margin-right:20px;"></i> ADD TO CART</button>
                     </div>
                   </div>
                </form>
              </div>

              <h3 style="font-family:sans-serif;"><i class="glyphicon glyphicon-thumbs-up"></i> Related  Products </h3>   <hr></hr>

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
               </div> <br>

                <h3  style="padding:10px;font-family:sans-serif;"><i class="glyphicon glyphicon-thumbs-up"></i> Recently  Viewed </h3>   <hr></hr>
                  <div class="row">
                         <?php
                            // $prod_id = $this->uri->segment(3);
                            // $get_view_prod = $this->db->get_where('tbl_product',array('id'=>$prod_id))->row();
                            // if(isset($prod_id)){
                            //   $data_arr = array(
                            //     'product_id' => $get_view_prod->id,
                            //     'user_id' =>$this->session->userdata('id')->id,
                            //     'prod_name'  => $get_view_prod->prod_name,
                            //     'prod_price' => $get_view_prod->prod_price,
                            //     'userfile' => $get_view_prod->userfile
                            //    );
                            //    $this->users_model->insert_into_viewprod('tbl_viewed_prod',$data_arr);
                            //
                            // }else{
                            //   echo " not set ";
                            // }
                            // $img = $this->db->get_where('tbl_product',array('id'=>$img_id))->row();

                          ?>
                         </p>

                      <?php
                         $get_view_prod = $this->db->get_where('tbl_viewed_prod',array('user_id'=>$this->session->userdata('id')))->result();
                           foreach($get_view_prod as $prod_row){?>
                          <div class="col-md-2 prod">
                            <a href="<?=base_url('users/single_prod/'.$prod_row->product_id)?>">
                             <img src="<?=base_url()?>uploads/<?=$prod_row->userfile?>" style="width:80%;height:20%;position: relative;left:20px;">
                           </a>
                               <p class="text-center"><?=json_decode($prod_row->prod_name)?>
                               <?= "<b>"." &#x20A6;"."<b>".$prod_row->prod_price?><br>
                               <?=$prod_row->no_views." Views"?><br>
                               <?=$prod_row->likes." Likes"?>
                          </p>
                        </div>
                       <?php } ?>
                </div>
             <h3  style="padding:10px;font-family:sans-serif;"><i class="glyphicon glyphicon-thumbs-up"></i> Feedback From Verified Customers  </h3>   <hr></hr>
             <?php if($cust_feedback){ ?> 
              <?php foreach($cust_feedback as $feedback) {?>
                    <div class="col-md-4 mt-4 mb-4">
                       <div style="font-family:sans serif"> <?=$feedback->body?> </div>
                    </div>
                    <div class="col-md-6">
                     <div style="font-family:sans serif" class="text-right"> <?=$feedback->date?> </div>
                    </div>
                <?php }?>
             <?php }else{?>
              <?= " No Feedback on this product "?>
              <?php } ?>
               </div>

        </div>
    </div>

</section>
<?php

  ?>

<script>
 // function load(){
 //   location.reload();
 //   // setTimeout(() => {
 //   //   window.location.reload();
 //   // }, 3000);
 // }


</script>

<script>
    $(document).ready(function() {
          $('#likeprod').on('click', function(){
            
            var count = 1;
            var like = $('#like').val();
            if(likeprod){
                $.ajax({
                  url:  "<?php echo base_url(); ?>" + "users/no_likes",
                  type: "POST",
                    data: {type:1},
                  cache: false,
                  success: function(dataResult){
                    var dataResult =JSON.parse(dataResult);
                    if(dataResult.statusCode==200){
                      swal.fire("WELDONE","Thank you so much for the Like","success");
                      
                      //alert(" you liked this");
                    }
                    else if(dataResult.statusCode==201){
                      console.log("failed");
                      $("#error").show();
                      // $('#error').html('Invalid EmailId or Password !');
                      Swal.fire('Error!','INCORRECT EMAIL OR PASSWORD!','error')

                    }

                  }
                });


            }else{
              alert(" not empty");
            }
          });


          //  $(document).ready(function() {
          //     setInterval(function() {
          //        $("#mydiv").load('<?//=base_url('users/no_likes')?>')
          //     }, 500);
          //   });



    });

</script>


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
