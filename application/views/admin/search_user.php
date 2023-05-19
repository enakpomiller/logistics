

<div class="page-container">




<!-- start search menu-->
			 <div class="inner-block">
                <form action="<?=base_url('admin/search_user')?>" method="POST" class="form_submit">
									<center> <input type="text" placeholder=" Search " name="email" class="form-control" style="width:30%"></center>
								</form>

<div class="chit-chat-layer1">
	<div class="col-md-6 chit-chat-layer1-left">
               <div class="work-progres">
                            <div class="chit-chat-heading">
                                  Buyer Profile
                            </div>
                            <div class="table-responsive">
                                <table class="table table-hover">
                               <?php if(($userprofile)){?>
                               	      <?php foreach($userprofile as $user):?>
                               	<table class="table table-bordered">
                               		<thead>
                                    <tbody>
                                    	<td>
                              <center><img src="<?=base_url('assets/uploads/'.$user ->userfile)?>" style="width:80%;height: 200px;"></center>
                                    	</td>
                                    	   	<td>
                                    	   		<ul style="position:relative;top:30px;font-family: sans-serif;">
                                    		  <li>Name: <?=$user->name?></li>
                                    		  <li>Email: <?=$user->email?></li>
                                    		   <li>Country <?=$user->country?></li>
                                    		    <li>Date: <?=$user->date?></li>
                                    		   </ul>
                                    	</td>
                                    </tbody>
                               		</thead>
                               	</table>
                               <?php endforeach ;?>
							   <?php }else{?>
								<?=" record not found " ?>
                                 <?php }?>


                          </tbody>
                      </table>
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
                         <?php if(!empty($searchproduct)):?>
                         	<?php $total_sum=0;?>
                         	  <table class="table table-bordered">
                        	 <tr>
                        	 		<th> Image </th>
                        	 		<th>Item Name </th>
                        	 		<th>Unit Price </th>
                        	 		<th>QTY </th>
                        	 		<th>Total </th>
                        	 </tr>
                         	<?php foreach($searchproduct as $search):?>
                         		<tr>
                       	  <td><img src="<?=base_url('/uploads/'.$search->userfile)?>" style="width:30px;"></td>
                       	  <td><?=$search->prod_name?></td>
                       	   <td><?=' &#36; '.$search->prod_price?></td>
                       	      <td><?=$search->prod_quantity?></td>
                       	        <td><?=$search->prod_price*$search->prod_quantity?></td>
                       	     </tr>
                       	   <?php $msg = $total_sum+=$search->prod_price * $search->prod_quantity ;?>

                       <?php endforeach ;?>
                        </table>
                           	 <label style="position: relative;left: 68%;">Grand Total <?='&#36;'.$msg?></label>
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
