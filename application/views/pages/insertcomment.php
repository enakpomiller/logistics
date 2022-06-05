
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
   </style>

<section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section>
<!-- /banner section -->


<!-- tracking section -->
<section class="shipment-w3ls">
    <div class="container">
        <i class="fa fa-braille" aria-hidden="true"></i>
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Comment section </h3>
    </div>     
             
    <div class="container">
        <div class="content-w3ls" style="height:90%;">  
            <div class="content1-w3ls">
                <?php if($this->session->flashdata('InsertComment')):?>
                    <div class="alert alert-success"><?=$this->session->flashdata('InsertComment')?></div>
                <?php endif;?> 
               <?=validation_errors()?>
            </div>
            <center>
            
                <div class="warehouse"> 
      
                  <div class="lefthouse" style="font-family:sans-serif">
                     <img src="<?=base_url('assets/admin/uploads/'.$result->userfile)?>" style="width:120%;height:120%">
                  </div>
                  <div class="righthouse"> 
                       <form action="<?=base_url('users/comment')?>" method="POST">
                       <div class="form-group" style="position: relative;top: ;">
                        <input type="hidden" name="prod_id" value="<?=$result->id?>">
                       <input type="text" required class="form-control line_remove" name="com_title" value="<?=$result->prod_name?>" readonly>
                      
                         </div>   
                           <div class="form-group">
               
                           <input type="text" class="form-control line_remove" name="com_name" placeholder=" Your name ">
                         </div> 

                         <div class="form-group">
                          
                       <textarea name="body" id="body"></textarea>
                     </div> 
                        <div class="form-group">
                   <button class="btn btn-primary" style="width:100%;">Submit</button> 
                     </div>            
                   </div>

                    </form>

                </div>
             </center> 
         
        </div>
    </div>  
   
</section>  
<!-- /tracking section




<!-- ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script type="text/javascript">
    /*
            $(document).ready(function(){   

        $(".submit_form").submit(function()
        {       
         $.ajax({
             type: "POST",
             url: "<?php echo base_url('users/product');?>",
             data: {user_id: $("#user_id").val()},
             data: {product_id: $("#product_id").val()},
             data: {usefile: $("#userfile").val()},
             data: {prod_name: $("#prod_name").val()},
             data: {prod_price: $("#prod_price").val()},
             data: {prod_brand: $("#prod_brand").val()},
             data: {prod_quantity: $("#prod_quantity").val()},
             dataType: "text",  
             cache:false,
             success: 
                  function(data){
                     //alert(data);  //as a debugging message.
                     alert('success');
                     //window.location="<?=base_url('users/product')?>";
                  }
              });// you have missed this bracket
         return false;
     });
     });
     */
</script>

 <script type="text/javascript">
CKEDITOR.replace('body',{

  width: "100%",
  height: "140px"

}); 

</script>