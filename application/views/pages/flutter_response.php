
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


<!--  <section class="inner-w3ls">
   <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->


<section class="shipment-w3ls">

     <div class="container" style="margin-top:100px;">
         <h1 class="" style="text-align:center;position:relative;top:0px;"> Payment Response  </h1>
          <center>
             <img src="<?=base_url('assets/images/mobile_pay.png')?>" style="width: 20%;">
              <table class="table table-striped" style="width:20%">
              <tr> <td><b style="font-family:sans-serif">Payment Status :</b> <?=$this->input->get('status',true)?></td></tr>
          </table>
           <form action="<?=base_url('users/tracking')?>" method="POST">
                  <input type="hidden" name="code" id="code" value="<?=$this->session->userdata('code')?>">
              <button class="btn" id="butsave" style="font-family:sans-serif;padding:10px;background:sandybrown;">Click to get  your tracking code </button>
          </form>
      </center>
    </div>

</section>






<!-- sweet -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

 <script>
$(document).ready(function() {
    $('#butsave').on('click', function() {
        var code = $('#code').val();
        if(code!=""){
            $("#butsave").attr("disabled", "disabled");
                         //ajax
                        $.ajax({
                            url: "<?php echo base_url(); ?>users/tracking/",
                            type: "POST",
                            data:{
                              code:code
                            },//changes
                            datatype: 'json',
                            success: function (data) {
                                 //alert('tracking code has been sent to yout email');
                                      //window.location = '<?=base_url('users')?>';

                                Swal.fire(
                                      'Congratulations!',
                                      'Your tracking code has been sent to Your email!',
                                      'success')

                            }

                           })

                      //end of ajax

               }
            else{
            alert('Please get tracking code  !');
        }
    });
});
</script>
