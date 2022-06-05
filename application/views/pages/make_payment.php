
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


<section class="shipment-w3ls">
    <div class="container">
          <!-- shipping start -->
            <center>
                <div class="warehouse" style="margin-top:180px;height:450px;">
                   <div class="lefthouse">
                       <!-- client details -->
                     <span style="font-family: sans-serif;text-align">
                        <div style="margin-top: 50px;">
                         <label>
                           <b><h3> Grand Total </3> <p>
                        <h1> <?php echo ' &#8358;'.number_format(($_SESSION['sum']),2);?></h1>
                         </label>
                      </div>
                    </span>
                   <!-- end of client -->
              </div>
                  <div class="righthouse">
                     <h3> Make Payment </h3>
                        <!-- paypal div -->
                        <div id="paypal-button-container" style="margin-top:50px;"></div>
                        <!-- fluter wave div -->
                     <div class="form-group">
                      <script src="https://checkout.flutterwave.com/v3.js"></script>
                      <button type="button" onClick="makePayment()">
                      <img src="<?=base_url('assets/images/Flutterwave_IMTC.jpg')?>" style="width:35%;';">
                      Pay Now
                       </button>
                      </div>
                        <form action="<?=base_url('users/make_payment')?>" class="wallet_form subscribeForm" id="btn-wallet"  method="POST">
                          <div class="alert alert-danger"> <?=$msg?>  </div>
                         <p>
                         OR <br>
                         Pay From Wallet
                       </p>
                      <div class="form-group">
                        <input type="hidden" name="wallet" id="wallet" value="<?=$this->session->userdata('wallet_ballance')?>">
                        <button class="btn btn-primary" style="width:100%;"> Pay Now </button>
                      </div>
                       <br>
                   </div>
                </form>
            </div>
        </center>
        <!-- end shipping -->
    </div>
</section>



<!-- Include the PayPal JavaScript SDK -->
<script src="https://www.paypal.com/sdk/js?client-id=test&currency=USD"></script>
<script>
    // Render the PayPal button into #paypal-button-container
    paypal.Buttons({
        // Set up the transaction
        createOrder: function(data, actions) {
            return actions.order.create({
                purchase_units: [{
                    amount: {
                        value: '<?=$_SESSION['sum']?>'
                    }
                }]
            });
        },
        // Finalize the transaction
        onApprove: function(data, actions) {
            return actions.order.capture().then(function(orderData) {
                // Successful capture! For demo purposes:
                console.log('Capture result', orderData, JSON.stringify(orderData, null, 2));
                var transaction = orderData.purchase_units[0].payments.captures[0];
                alert('Transaction '+ transaction.status + ': ' + transaction.id + '\n\nSee console for all available details');

                // Replace the above to show a success message within this page, e.g.
                // const element = document.getElementById('paypal-button-container');
                // element.innerHTML = '';
                // element.innerHTML = '<h3>Thank you for your payment!</h3>';
                // Or go to another URL:  actions.redirect('thank_you.html');
            });
        }
    }).render('#paypal-button-container');
</script>
<!-- flutter wave -->
<script src="https://checkout.flutterwave.com/v3.js"></script>
<script>
   function makePayment() {
     FlutterwaveCheckout({
       public_key: "FLWPUBK_TEST-SANDBOXDEMOKEY-X",
       tx_ref: "RX1",
       amount:"<?=$_SESSION['sum']?>",
       currency: "NGN",
       country: "NG",
       payment_options: " ",
       redirect_url: "http://localhost/logistics/users/flutter_response",
       meta: {
         consumer_id: 23,
         consumer_mac: "92a3-912ba-1192a",
       },
       customer: {
         email: "enakpomiller8899@gmail.com",
         phone_number: "08059526974",
         name: "Flutterwave Developers",
       },
       callback: function (data) {
         console.log(data);
       },
       onclose: function() {
         // close modal
       },
       customizations: {
         title: "GaysBuy",
         description: "Payment for items in cart",
         logo: "https://assets.piedpiper.com/logo.png",
       },
     });
   }
</script>
