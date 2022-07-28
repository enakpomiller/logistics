

<div class="page-container">




<!-- start search menu-->
			 <div class="inner-block">

            <div class="chit-chat-layer1">
              	<div class="col-md-6 chit-chat-layer1-left">
                     <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Product Image
                            </div>
                  <div class="table-responsive">
								<!-- production grid -->
									  <?php foreach($seller_product as $user):?>
												<div class="row-fluid ">
														<div class="col-sm-4">
																<div class="card-columns-fluid" style="width:60%;">
																		<div class="card  bg-light" style = "width: 5rem;">
																				<div class="card-body" style="text-align: center;">
																		   <center><img src="<?=base_url('assets/admin2/'.$user['file_name'] )?>" style="width:80%;height:100px;margin:10px;"></center>
								                 </div>
															 </div>
														 </div>
													 </div>
												 </div>
								 <!-- end of product grid -->
								 <?php endforeach;?>


                  </div>
             </div>
      </div>


      <div class="col-md-6 chit-chat-layer1-rit">
      	  <div class="geo-chart">
					<section id="charts1" class="charts">
				<div class="wrapper-flex">



				    <div class="col geo_main">
				          <div class="chit-chat-heading">
                      Cart Details
                        </div>
												  <?php $total =0; ?>
                         <?php if(!empty($get_product)):?>
                         	  <table class="table table-bordered">
                        	 <tr>
                        	 		<th>prod Name </th>
                        	 		<th>prod Price </th>
                        	 		<th>product brand </th>
                        	 </tr>
                         	<?php foreach($get_product as $prod):?>
                         <tr>
                       	  <td><?=$prod->prod_name?></td>
													<td>	<?= '&#8358;'.($prod->prod_price)?></td>
                       	  <td><?=$prod->prod_brand?></td>
                       	 </tr>
                       <?php endforeach ;?>
                        </table>
                           	 <label style="position: relative;left: 68%;">Grand Total <?='&#8358;'.$total?></label>
                      <?php else: ?>
                      <?="cart is empty"?>
                    <?php endif;?>
				        </div>


				</div><!-- .wrapper-flex -->
				</section>
			</div>
      </div>
     <div class="clearfix"> </div>
</div>










</div>
</div>
