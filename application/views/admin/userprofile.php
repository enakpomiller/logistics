



<style>
.pagination-links {
  padding: 18px 13px;
  //float:right;
}
a.pagination-links{
  padding:10px 12px;
  background: sandy brown;
  border: 1px solid black;
  color:black;
}
</style>


<div class="chit-chat-layer1 container" style="margin-top:130px;">

      <h2 align="left" style="font-family: sans-serif;"><?=$title?></h2>
      <div class="form-group">

              <div class="table-responsive">
                   <table  class="table table-striped">
                   	  <tr>
                   	  	<th>Product Image </th>
                   	  		<th>Product Name </th>
                   	  			<th>Product Price </th>
                   	  				<th>Product Brand </th>
                   	  				<th>Qty </th>
                   	  				<th>Total </th>
                   	  				<th style="float:right;">Action </th>
                   	  </tr>
  						            <?php if(!empty($displaycart)):?>
  						            	<?php $total_sum=0;?>
  						            	<?php foreach($displaycart as $cart):?>
  						            			<tr>
  						            				<td><img src="<?=base_url('uploads/'.$cart->userfile)?>" style="width:30px;"></td>
  						            					<td><?=$cart->prod_name?></td>
  						            						<td><?=$cart->prod_price?></td>
  						            							<td><?=$cart->prod_brand?></td>
  						            								<td><?=$cart->prod_quantity?></td>
  						            									<td><?=$total_sum = $cart->prod_price * $cart->prod_quantity?></td>
                                        <td><a href="<?=base_url('admin/DeleteFromCart/'.$cart->id)?>" class="btn btn-danger" onclick="return confirm('YOU WANT TO DELETE THIS RECORD');" title="Delete Record" style="float:right;"><i class="fa fa-trash"></i></td>
  						            			  </tr>
  						            	  <?php endforeach ;?>
  						              <?php elseif(empty($displaycart)):?>
  						            <?php $msg=" No Record Found ";?>
  						          <?php endif ;?>
  										</table>

  										<?=$msg?>
                      <div class="pagination-links text-left">
                       <p><?php echo $links; ?></p>
                     </div>
              </div>

      </div>






          <div class="chit-chat-layer1">
          	<div class="col-md-6 chit-chat-layer1-left">
                         <div class="work-progres">
                                      <div class="chit-chat-heading">
                                            Buyer Profile
                                      </div>
                                      <div class="table-responsive">
                                          <table class="table table-hover">
                                            <thead>
                                              <tr>
                                                <th>#</th>
                                                <th>Project</th>
                                                <th>Manager</th>

                                                <th>Status</th>
                                                <th>Progress</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                          <tr>
                                            <td>1</td>
                                            <td>Face book</td>
                                            <td>Malorum</td>

                                            <td><span class="label label-danger">in progress</span></td>
                                            <td><span class="badge badge-info">50%</span></td>
                                        </tr>
                                        <tr>
                                            <td>2</td>
                                            <td>Twitter</td>
                                            <td>Evan</td>

                                            <td><span class="label label-success">completed</span></td>
                                            <td><span class="badge badge-success">100%</span></td>
                                        </tr>
                                        <tr>
                                            <td>3</td>
                                            <td>Google</td>
                                            <td>John</td>

                                            <td><span class="label label-warning">in progress</span></td>
                                            <td><span class="badge badge-warning">75%</span></td>
                                        </tr>
                                        <tr>
                                            <td>4</td>
                                            <td>LinkedIn</td>
                                            <td>Danial</td>

                                            <td><span class="label label-info">in progress</span></td>
                                            <td><span class="badge badge-info">65%</span></td>
                                        </tr>
                                        <tr>
                                            <td>5</td>
                                            <td>Tumblr</td>
                                            <td>David</td>

                                            <td><span class="label label-warning">in progress</span></td>
                                            <td><span class="badge badge-danger">95%</span></td>
                                        </tr>
                                        <tr>
                                            <td>6</td>
                                            <td>Tesla</td>
                                            <td>Mickey</td>

                                            <td><span class="label label-info">in progress</span></td>
                                            <td><span class="badge badge-success">95%</span></td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                       </div>
                </div>

                <div class="col-md-6 chit-chat-layer1-rit">
                	  <div class="geo-chart">
          					<section id="charts1" class="charts">
          				<div class="wrapper-flex">

          				    <table id="myTable" class="geoChart tableChart data-table col-table" style="display:none;">
          				        <caption>Student Nationalities Table</caption>
          				        <tr>
          				            <th scope="col" data-type="string">Country</th>
          				            <th scope="col" data-type="number">Number of Students</th>
          				            <th scope="col" data-role="annotation">Annotation</th>
          				        </tr>
          				        <tr>
          				            <td>China</td>
          				            <td align="right">20</td>
          				            <td align="right">20</td>
          				        </tr>
          				        <tr>
          				            <td>Colombia</td>
          				            <td align="right">5</td>
          				            <td align="right">5</td>
          				        </tr>
          				        <tr>
          				            <td>France</td>
          				            <td align="right">3</td>
          				            <td align="right">3</td>
          				        </tr>
          				        <tr>
          				            <td>Italy</td>
          				            <td align="right">1</td>
          				            <td align="right">1</td>
          				        </tr>
          				        <tr>
          				            <td>Japan</td>
          				            <td align="right">18</td>
          				            <td align="right">18</td>
          				        </tr>
          				        <tr>
          				            <td>Kazakhstan</td>
          				            <td align="right">1</td>
          				            <td align="right">1</td>
          				        </tr>
          				        <tr>
          				            <td>Mexico</td>
          				            <td align="right">1</td>
          				            <td align="right">1</td>
          				        </tr>
          				        <tr>
          				            <td>Poland</td>
          				            <td align="right">1</td>
          				            <td align="right">1</td>
          				        </tr>
          				        <tr>
          				            <td>Russia</td>
          				            <td align="right">11</td>
          				            <td align="right">11</td>
          				        </tr>
          				        <tr>
          				            <td>Spain</td>
          				            <td align="right">2</td>
          				            <td align="right">2</td>
          				        </tr>
          				        <tr>
          				            <td>Tanzania</td>
          				            <td align="right">1</td>
          				            <td align="right">1</td>
          				        </tr>
          				        <tr>
          				            <td>Turkey</td>
          				            <td align="right">2</td>
          				            <td align="right">2</td>
          				        </tr>

          				    </table>

          				    <div class="col geo_main">
          				         <h3 id="geoChartTitle">World Market</h3>
          				        <div id="geoChart" class="chart"> </div>
          				    </div>



          				</div><!-- .wrapper-flex -->
          				</section>
          			</div>
                </div>
               <div class="clearfix"> </div>
          </div>
    </div>






<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>

						<script>
							// $('.form_submit').submit(function(e){
              //
							// 	e.preventDefault();
              //
							// 	var email = $('#email').val();
              //
							// 	var url = '<?=base_url('admin/search_user')?>';
              //
							// 	$(this).find('span').html('<i class="fa fa-spinner fa-spin"></i> Please wait...');
              //
							// 	$.ajax({
							// 		url : url,
							// 		type: 'POST',
							// 		dataType: 'html',
							// 		data: {email: email},
							// 		success : function(r,d){
						  //               console.log(r);
							// 			if(d == 'success'){
							// 				$('#result').html(r);
							// 				$('.form_submit').find('span').html('Fetch');
							// 			}
							// 			else{
							// 				alert('An Error Occured Please Try Again Later.');
							// 			}
							// 		}
							// 	})
              //
							// });
						</script>
