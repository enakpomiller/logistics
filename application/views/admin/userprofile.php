



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

<!-- datatable bootstrap -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>


<div class="container" style="margin-top:180px;">
      <?php if($this->session->flashdata('delrec')) {?>
      <div class="alert alert-danger text-center" style="width:40%;margin:auto;"><?=$this->session->flashdata('delrec')?></div>
       <?php
        }else{ echo " ";}
       ?>
         <table class="table table-hover" style="" id="table">
          <thead>
            <tr>
              <th scope="col"> Image</th>
              <th scope="col"> Name</th>
              <th scope="col"> Price</th>
              <th scope="col"> Brand</th>
              <th scope="col"> Qty</th>
              <th scope="col"> Total </th>
            <th scope="col"> Action </th>
          </tr>
          </thead>
          <?php if(!empty($displaycart)):?>
          <tbody>
            <?php foreach($displaycart as $cart):?>
            <tr>
              <th scope="row"><img src="<?=base_url('uploads/'.$cart->userfile)?>" style="width:30px;"></th>
            <td><?=$cart->prod_name?></td>
            <td><?="&#8358;".$cart->prod_price?></td>
            <td><?=$cart->prod_brand?></td>
            <td><?=$cart->prod_quantity?></td>
            <td><?="&#8358;".$total_sum = $cart->prod_price * $cart->prod_quantity?></td>
            <td><a href="<?=base_url('admin/DeleteFromCart/'.$cart->id)?>" class="btn btn-danger" onclick="return confirm('YOU WANT TO DELETE THIS RECORD');" title="Delete Record"><i class="fa fa-trash"></i></a></td>
            </tr>
            <?php endforeach ;?>
          <?php else:?>
            <?=" record not found"?>
          <?php endif;?>
          </tbody>
        </table>

           <!-- more --> 
           <div id="data-container">
              <!-- Display the initial batch of data -->
              <?php foreach ($data as $item): ?>
                  <div class="data-item"><?php echo $item->name; ?></div>
              <?php endforeach; ?>
              </div>

             <button id="load-more-btn">Load More</button>
           </div>




<div class="chit-chat-layer1 container" style="margin-top:130px;">

      <h2 align="left" style="font-family: sans-serif;"><?=$title?></h2>
      <div class="form-group">

              <div class="table-responsive">
              <!-- open table -->

                      <!-- close table -->

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


            <!-- datatable script -->
            <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
            <script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
            <!-- end datatable script -->

            <script type="text/javascript">
            $(document).ready(function() {
                $('#table').DataTable();
            });
            </script> 



<script>
var page = 1; // Initialize the current page

// Attach event listener to the "Load More" button
document.getElementById('load-more-btn').addEventListener('click', function() {
    // Send AJAX request to CodeIgniter controller
    var xhr = new XMLHttpRequest();
    xhr.open('GET', '<?php echo site_url("admin/load_more_data"); ?>' + '/' + page);
    xhr.onload = function() {
        if (xhr.status === 200) {
            // Parse the response
            var response = JSON.parse(xhr.responseText);
            
            // Check if there is more data to load
            if (response.data.length > 0) {
                // Append the retrieved data to the existing data container
                var dataContainer = document.getElementById('data-container');
                response.data.forEach(function(item) {
                    var div = document.createElement('div');
                    div.classList.add('data-item');
                    div.textContent = item.name;
                    dataContainer.appendChild(div);
                });
                
                // Increment the page number for the next load
                page++;
            } else {
                // No more data to load, hide the "Load More" button
                document.getElementById('load-more-btn').style.display = 'none';
            }
        }
    };
    xhr.send();
});
</script>
