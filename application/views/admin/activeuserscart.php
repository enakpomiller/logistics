


<!-- datatable bootstrap -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>


 <div class="container" style="margin-top:200px;">
    <table class="table table-striped" id="table">
      <thead>
        <tr>
          <th scope="col">Product Image</th>
          <th scope="col">Product Name</th>
          <th scope="col">Product Price</th>
          <th scope="col">Product Brand</th>
          <th scope="col">QTY</th>
          <th scope="col">Total </th>
          <th scope="col">Action </th>
        </tr>
      </thead>
      <?php if(!empty($ActiveUserCart)):?>
        <?php $total_sum=0;?>
        <?php foreach($ActiveUserCart as $cart):?>
      <tbody>
        <tr>
            <td><img src="<?=base_url('/uploads/'.$cart->userfile)?>" style="width:30px;"></td>
            <td><?=$cart->prod_name?></td>
            <td><?php echo  "&#8358;".$cart->prod_price ;?></td>
            <td><?=$cart->prod_brand?></td>
            <td><?=$cart->prod_quantity?></td>
            <td><?="&#8358;".$total_sum = $cart->prod_price * $cart->prod_quantity?></td>
            <td><a href="<?=base_url('admin/DeleteActiveCart/'.$cart->id)?>" class="btn btn-danger" onclick="return confirm('YOU WANT TO DELETE THIS RECORD');" title="Delete Record"><i class="fa fa-trash"></i>
               <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?=$cart->id?>" style="margin: 10px;"><i class="fa fa-pencil"></i> </a></td>
        </tr>

      </tbody>
      <!-- Large modal -->
       <div class="modal fade" id="exampleModal<?=$cart->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
            <div class="modal-dialog modal-dialog-centered" role="document">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="exampleModalLongTitle"><label> <?=$title?> </label></h5>
                  <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                  </button>
                </div>
                <div class="modal-body">
                <form action="<?=base_url('admin/update')?>" method="POST">
               <center>
               <img src="<?=base_url('/uploads/'.$cart->userfile)?>" style="width:30%;height: 150px;margin: 10px;"><br>
             </center>
                 <input type="hidden" name="id" value="<?=$cart->id?>"> <br>
                 <label>Product Name </label>
               <input type="input" id="prod_name" name="prod_name" class="form-control" value="<?=$cart->prod_name?>"><br>
                 <label>Product Price </label>
                  <input type="input" id="prod_price" name="prod_price" class="form-control" value="<?=$cart->prod_price?>"><br>
                 <label>Product Brand </label>
                  <input type="input" id="prod_brand" name="prod_brand" class="form-control" value="<?=$cart->prod_brand?>"><br>
                   <label> Quantity </label>
                    <input type="input" id="prod_quantity" name="prod_quantity" class="form-control" value="<?=$cart->prod_quantity?>"><br>

                </div>
                <div class="modal-footer">
                  <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                  <input  type="submit" id="btn-submit" class="btn btn-primary" value="save changes">
            </form>
                </div>

              </div>
            </div>
          </div>
        <!-- end of modal -->
          <?php endforeach ;?>
        <?php elseif(empty($displaycart)):?>
        <?php $msg=" Cart is empty ";?>
      <?php endif ;?>
  </table>

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







<script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js"></script>
						<!--
						<script>
							$('.form_submit').submit(function(e){

								e.preventDefault();

								var email = $('#email').val();

								var url = '<?=base_url('admin/search_user')?>';

								$(this).find('span').html('<i class="fa fa-spinner fa-spin"></i> Please wait...');

								$.ajax({
									url : url,
									type: 'POST',
									dataType: 'html',
									data: {email: email},
									success : function(r,d){
						                console.log(r);
										if(d == 'success'){
											$('#result').html(r);
											$('.form_submit').find('span').html('Fetch');
										}
										else{
											alert('An Error Occured Please Try Again Later.');
										}
									}
								})

							});
						</script> -->


            <!-- datatable script -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
            <!-- end datatable script -->

            <script type="text/javascript">
            $(document).ready(function() {
                $('#table').DataTable();
            });
            </script>
