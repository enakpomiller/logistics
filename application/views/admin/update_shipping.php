

<div class="container" style="margin-top:100px;">
<div class="chit-chat-layer1">
	<div class="col-md-6 chit-chat-layer1-left">
               <div class="work-progres">
                        <div class="chit-chat-heading">
                                  Update Location
                            </div>
                               <div class="table-responsive">

                               <?php if(!empty($GetShipping)):?>
                         	       <form action="<?=base_url('admin/insert_update')?>" method="POST">
                         		      <?php if($this->session->flashdata('location_msg')):?>
                         			    <div class="alert alert-success"><?=$this->session->flashdata('location_msg')?></div>
                         		       <?php endif;?>
                                    <div class="form-group">
                          	        <input type="text" class="form-control" value="<?=$GetShipping->s_name?>">
                                    </div>
                                  <div class="form-group">
                          	<input type="text" class="form-control"  value="<?=$GetShipping->s_email?>">
                          </div>
                                  <div class="form-group">
                          	<input type="text" class="form-control"  value="<?=$GetShipping->s_country?>">
                          </div>
                                <div class="form-group">
                          	<input type="text" class="form-control"  value="<?=$GetShipping->s_state?>">
                          </div>

                            <div class="form-group">
                          	<input type="text" class="form-control"  value="<?=$GetShipping->s_land_mass?>">
                          </div>
                          <label> location </label>
                           <div class="form-group">
                          	<input type="text" class="form-control" required name="current_location" value="<?=set_value('current_location')?>">
                          </div>
                             <div class="form-group">
                             	 <button class="btn btn-primary">update</button>
                             </div>
                           </form>
                         <?php else:?>
                         	 <center> <label> <?="User not activated "?> </label></center>
                         <?php endif ;?>
                  </div>
             </div>
      </div>

      <div class="col-md-6 chit-chat-layer1-rit">
      	 <div class="geo-chart">
					  <section id="charts1" class="charts">
				        <div class="wrapper-flex">
                     <div class="col geo_main">
				             <?php if(!empty($image)):?>
                     <img src="<?=base_url('assets/uploads/'.$image->userfile)?>" style="width:100px"><p>
                    <?=$image->name?>
				          </div>
						     <?php endif ;?>
				     </div><!-- .wrapper-flex -->
				 </section>
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
