
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
     border: 1px solid sandybrown;
    margin: auto;
    width: 100%;
    padding: 80px;
    height: 110%;
    margin-bottom: 90px;
/*   overflow:auto;*/
   bottom: 0px;
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
   /* overflow: auto;*/

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
            <style>
            .blink_me {
              animation: blinker 1s linear infinite;
            }

            @keyframes blinker {
              50% {
                opacity: 1;
                    color: #ff0000;
                    font-weight: bolder;

              }
            }
            </style>

 <!-- <section class="inner-w3ls">
   <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->



<!--
<section class="shipment-w3ls">
    <div class="container">
        <i class="fa fa-braille" aria-hidden="true"></i>
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Tracking  Response  </h3>
    </div>
      <p> -->


                  <center class="container" style="margin-top:200px;">

                        <div class="warehouse" style="height:80%;">
                          <div class="lefthouse" style="font-family:sans-serif">
                           <img src="<?=base_url('assets/uploads/'.$track->userfile)?>" style="width:40%;border-radius:8px;margin: 20px;height:80%;">
                          </div>
                          <div class="righthouse">
                              <labe><h3> Details</h3> </labe>
                               <form action="<?=base_url('users/trackshipment')?>" method="POST">
                                 <table class="table table-hover">
                                     <tr>
                                        <td> Sender Name : <?=$track->name?></td>
                                     </tr>
                                       <tr>
                                        <td> Shipment Code  : <?=md5($track->tracking_code)?></td>
                                     </tr>
                                        <tr>
                                        <td> Sender email : <?=$track->email?></td>
                                     </tr>
                                        <tr>
                                        <td> Departure  Country : <?=$track->country?></td>
                                     </tr>
                                     <tr>
                                        <td> Recipent Name : <?=$GetShipment->s_name?></td>
                                     </tr>
                                     <tr>
                                        <td> Recipent email : <?=$GetShipment->s_email?></td>
                                     </tr>
                                     <tr>
                                        <td> Recipent country : <?=$GetShipment->s_country?></td>
                                     </tr>
                                        <tr>
                                        <td> Recipent state : <?=$GetShipment->s_state?></td>
                                     </tr>

                                     <tr>
                                        <td> Current Location of goods: <div class="blink_me"> <?=$GetShipment->current_location?> </div> </td>
                                     </tr>
                                        <tr>
                                          <td> Date Of purchase : <?=$track->date?></td>
                                      </tr>
                                         <tr>
                                          <td> Amount Paid  : <?php echo"&#36; <strong>". $_SESSION['sum']."</strong>"?></td>
                                      </tr>
                                 </table>
                                <div class="form-group">
                                  <button onclick="print()" class="btn btn-primary" style="width:105%;background:sandybrown;padding:10px;border:0px solid red;">Print Receipt </button>

                             </div>
                           </div>
                            </form>
                       </div>
              </center>
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
                                 alert('tracking code has been sent to yout email');
                                      //window.location = '<?=base_url('users')?>';

                                // Swal.fire(
                                //       'Congratulations!',
                                //       'Your tracking code has been sent to Your email!',
                                //       'success')
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
