


<div class="page-container">


<!-- start search menu-->
			 <div class="inner-block">

            <div class="chit-chat-layer1">
              	<div class="col-md-6 chit-chat-layer1-left">
									<?php echo $this->session->flashdata('prod_updated');?>
                     <div class="work-progres">
                            <div class="chit-chat-heading">
                                <center>  <?=$title?> </center>
                            </div>
	                       <button style="margin-bottom: 10px" class="btn btn-primary delete_all" data-url="<?=base_url()?>/admin/delete_seller_product">Delete All Selected</button>

												  <button style="margin-bottom: 10px; color:black;width:30%;" class="btn btn-warning update_all float-right" data-url="<?=base_url()?>/admin/update_batch_seller_product">Update Record</button>

                        <div class="table-responsive">
													<?php echo $msg_delete ;?>
							    	<!-- production grid -->
                <?php if(($get_product)):?>
                   <table class="table table-bordered">
										 <thead>
                      <tr>
												 <th><input type="checkbox" id="master"></th>
                         <th>prod Name </th>
                         <th>prod Price </th>
                         <th>product brand </th>
												 	 <th>Action </th>
                      </tr>
										</thead>
                   <?php foreach($get_product as $prod):?>
										 <tbody>
                      <tr>
										   <td><input type="checkbox" class="sub_chk" data-id="<?php echo $prod->id;?>"></td>
                       <td><?=$prod->prod_name?></td>
                       <td>	<?=$prod->prod_price?>"</td>
                       <td><?=$prod->prod_brand?>"</td>
											 <td> <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?=$prod->id?>" style="margin: 10px;"><i class="fa fa-pencil"></i> </a></td>
                     </tr>
									 </form>
									 </tbody>
                   <!-- Large modal -->
                    <div class="modal fade" id="exampleModal<?=$prod->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
                         <div class="modal-dialog modal-dialog-centered" role="document">
                           <div class="modal-content">
                             <div class="modal-header">
                               <h5 class="modal-title" id="exampleModalLongTitle"><label> <?=$title. '( '.$prod->prod_name.')'?> </label></h5>
                               <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                 <span aria-hidden="true">&times;</span>
                               </button>
                             </div>
                             <div class="modal-body">
                          <form  id="insertResearch" action="<?=base_url('admin/update_single_seller_product')?>" method="POST">

                            <center>
                            <!-- <img src="<?//=base_url('/assets/admin2/'.$img->file_name)?>" style="width:30%;height: 150px;margin: 10px;"><br> -->
                          </center>

                            <input type="hidden" name="id" value="<?=$prod->id?>"> <br>
                              <label>Product Name </label>
                            <input type="input" id="prod_name" name="prod_name" class="form-control" value="<?=$prod->prod_name?>"><br>
                              <label>Product Price </label>
                               <input type="input" id="prod_price" name="prod_price" class="form-control" value="<?=$prod->prod_price?>"><br>
                              <label>Product Brand </label>
                            <input type="input" id="prod_brand" name="prod_brand" class="form-control" value="<?=$prod->prod_brand?>"><br>
															 <div class="form-control">
																 <input type="file" name="file_name">
															 </div>

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
										 	<?php endforeach;?>
                  </table>

                 <?php endif;?>
                </div>
             </div>
         </div>



      <div class="col-md-6 chit-chat-layer1-rit">
      	  <div class="geo-chart">
					<section id="charts1" class="charts">
				<div class="wrapper-flex">



				     <div class="col geo_main">
				          <div class="chit-chat-heading">
                         <center> User Details </center>
                         </div>
                         <?php if(!empty($seller_record)):?>
                         	  <table class="table table-bordered">
                        	 <tr>
                        	 		<th>First Name </th>
                        	 		<th> Orther Names </th>
                        	 		<th class="text-center"> Email </th>
                              <th> Category </th>
                              <th> Action </th>
                        	 </tr>
                         		<tr>
                       	  <td><?=$seller_record->firstname?></td>
                       	    <td><?=$seller_record->othernames?></td>
                       	    <td><?=$seller_record->email?></td>
                            <td><?=$seller_record->usertype?></td>

                          <td> <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal1" data-whatever="@mdo"><i class="fa fa-pencil"></i></button></td>


                       	  </tr>
                        </table>


                    <?php endif;?>
				      </div>
				</div><!-- .wrapper-flex -->
				</section>
			</div>
      </div>
     <div class="clearfix"> </div>
</div>




<!-- seller profile modal -->
<div class="modal fade" id="exampleModal1" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">New message</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form action="" method="">
           <?php if(!empty($seller_record)):?>
						 <div class="form-group">
							 <label for="recipient-name" class="col-form-label">Name:</label>
							 <input type="text" class="form-control" name="id" value="<?=$seller_record->id?>">
						 </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Name:</label>
            <input type="text" class="form-control" value="<?=$seller_record->firstname?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Other Names:</label>
            <input type="text" class="form-control" value="<?=$seller_record->othernames?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Email:</label>
            <input type="text" class="form-control" value="<?=$seller_record->email?>">
          </div>
          <div class="form-group">
            <label for="recipient-name" class="col-form-label">Category:</label>
            <input type="text" class="form-control" value="<?=$seller_record->usertype?>">
          </div>
        </form>
      <?php endif;?>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" id="insertResearch" class="btn btn-primary">Send message</button>
      </div>
    </div>
  </div>
</div>
<!-- end of seller proile -->


</div>




</div>










<script type="text/javascript">
    $(document).ready(function () {
        // delete all records
        $('#master').on('click', function(e) {
         if($(this).is(':checked',true))
         {
            $(".sub_chk").prop('checked', true);
         } else {
            $(".sub_chk").prop('checked',false);
         }
        });

        $('.delete_all').on('click', function(e) {

            var allVals = [];
            $(".sub_chk:checked").each(function() {
                allVals.push($(this).attr('data-id'));
            });

            if(allVals.length <=0)
            {
                //alert("Please select row.");
								swal.fire('error',' please select roe','error');
            }  else {
							   var check = confirm("Are you sure you want to delete this row?");

                if(check == true){
                    var join_selected_values = allVals.join(",");

                    $.ajax({
                        url: $(this).data('url'),
                        type: 'POST',
                        data: 'ids='+join_selected_values,
                        success: function (data) {
                          console.log(data);
                          $(".sub_chk:checked").each(function() {
                              $(this).parents("tr").remove();
                          });
													Swal.fire(
														  'Thank You!',
														  'Item Deleted!',
														  'success'
														)
                        },
                        error: function (data) {
                            alert(data.responseText);
                        }
                    });

                  $.each(allVals, function( index, value ) {
                      $('table tr').filter("[data-row-id='" + value + "']").remove();
                  });
                }
            }
        });


				// update all records
				$('#master').on('click', function(e) {
				 if($(this).is(':checked',true))
				 {
						$(".sub_chk").prop('checked', true);
				 } else {
						$(".sub_chk").prop('checked',false);
				 }
				});

				$('.update_all').on('click', function(e) {

						var allVals = [];
						$(".sub_chk:checked").each(function() {
								allVals.push($(this).attr('data-id'));
						});

						if(allVals.length <=0)
						{
								//alert("Please select row.");
								swal.fire('error',' please select a record ','error');
						}  else {

								var check = confirm("Are you sure you want to update this row?");
								if(check == true){

										var join_selected_values = allVals.join(",");

										$.ajax({
												url: $(this).data('url'),
												type: 'POST',
												data: 'ids='+join_selected_values,
												success: function (data) {
													console.log(data);
													$(".sub_chk:checked").each(function() {
															$(this).parents("tr").remove();
													});
													alert("Item updated  successfully.");
												},
												error: function (data) {
														alert(data.responseText);
												}
										});

									$.each(allVals, function( index, value ) {
											$('table tr').filter("[data-row-id='" + value + "']").remove();
									});
								}
						}
				});
    });
</script>

 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
