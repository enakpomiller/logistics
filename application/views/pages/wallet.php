

  <!-- <section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->
<!-- /banner section -->
<style>
.vacum{
  background:;height: 300px;
  width:60%;margin:auto;
  position: relative;top: 50px;bottom:50px;
}
.right{
  background: #FAFAFA; height: 200px;
  width:40%;margin:auto;
}
</style>
<!-- tracking section -->
<section class="shipment-w3ls">
      <!-- product listings -->
      <?php $wallet_sum=0;?>
      <div class="container" style="margin-top:100px;">
                  <?php if(!empty($getwallet)):?>
                    <div class="vacum">
                    <div class="right">
                        <center>
                         <br>
                        <h3> Wallet Ballance </h3>
                        <?php foreach($getwallet as $row):?>
                          <?php $wallet_sum+=($row->wallet_amt);?>
                        <?php endforeach;?>
                        <label style="margin-top:50px;">
                          <h1>
                        <?php echo '&#8358;'.number_format(($wallet_sum),2);?>
                      </h1>
                     </label>

                      </center>
                      </div>
                    </div>
                <?php endif;?>
                <?php $this->session->set_userdata('wallet_ballance',$wallet_sum);?>
              <!-- end of product listings -->


        </div>
    </div>

</section>
