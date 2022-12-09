

<!--heder end here-->

	<?php if($this->session->flashdata('country_created')):?>
   <div class="alert alert-success"> <?=$this->session->flashdata('country_created')?></div>

   <?php endif;?>
<!-- script-for sticky-nav -->
		<script>
		$(document).ready(function() {
			 var navoffeset=$(".header-main").offset().top;
			 $(window).scroll(function(){
				var scrollpos=$(window).scrollTop();
				if(scrollpos >=navoffeset){
					$(".header-main").addClass("fixed");
				}else{
					$(".header-main").removeClass("fixed");
				}
			 });

		});
		</script>



<div class="container" style="position: relative;top:50px;">
    <h2 align="left" style="font-family: sans-serif;"><?=$title?></h2>
    <div class="form-group">
           <?php echo form_open_multipart('admin/product');?>

            <div class="table-responsive">
                <table class="table table-bordered" id="dynamic_field">

                    <tr>
                        <td><input type="file" name="userfile" id="file"  class="form-control name_list" required="" /></td>
                        <td><input type="text" name="prod_name" id="prod_name" placeholder="Enter product name" class="form-control name_list" required="" /></td>
                        <td><input type="text" name="prod_price" id="prod_price" placeholder="Enter product price" class="form-control name_list" required="" /></td>
                         <td><input type="text" name="prod_brand"  id="prod_brand" placeholder="Enter product brand" class="form-control name_list" required="" /></td>
												 <td>
													  <select name="category" class="form-control" id="category">
															<option> Select  </option>
															<option value="bag"> Bag </option>
															<option value="shirt"> shirt </option>
															<option value="jean"> jeans </option>
															<option value="phone"> phones </option>
															<option value="electronics"> Electronics </option>
															<option value="shoes"> shoes </option>
														</select>
												 </td>
             <!-- <td><button type="button" name="add" id="add" class="btn btn-success">Add Field</button></td> -->
                    </tr>
                </table>
                <input type="submit" name="submit" id="butsave" class="btn btn-info" value="Submit" />
            </div>

         </form>
    </div>
</div>
 <br>






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
