
<!-- general boostrap 5.0 cdn -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-EVSTQN3/azprG1Anm3QDgpJLIm9Nao0Yz1ztcQTwFspd3yD65VohhpuuCOmLASjC" crossorigin="anonymous">

<br>
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

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- datatable bootstrap -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>

<div class="container" style="margin-top:100px;">
<label><?=$title?></label>
<?php $counter =1;?>


<center>
<table class="table table-striped">
  <thead>
  <tr>
    <th> s/n </th>
    <th> Product name </th>
    <th> CUstomer name </th>
    <th> Date </th>
    <th style="float:right;"> Action </th>
  </tr>
</thead>
<tbody class="list form-check-all">
  <?php if(!empty($comment)):?>
  <?php foreach($comment as $row):?>
     <tr class="order-each">
       <td><?=$counter++?> </td>
       <td><?=$row->prod_title?></td>
       <td> <?=$row->name?></td>
       <td> <?=$row->date?></td>
       <td style="float:right;">
       <a href="<?=base_url('admin/deletecomment/'.$row->id)?>" class="btn btn-danger" onclick="return confirm('YOU WANT TO DELETE THIS RECORD');"><i class="fa fa-trash"></i></a>
        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?=$row->id?>" style="margin: 10px;"><i class="fa fa-book"></i> </a>
       
         </td>
     </tr>
     <!-- Large modal -->
         <div class="modal fade" id="exampleModal<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
           <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle"><label> <?=$title?> </label></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">

             <form action="<?=base_url('admin/allprofile')?>" method="POST">

              <center align="justify" style="padding:10px 10px;">
                <center>
                   <img src="<?=base_url('uploads/'.$row->userfile)?>" style="width:30%;height:120%;"><br>
                     <label style="text-transform:capitalize;"><?=$row->prod_title?></label>
              </center>
              <center>  <p class="text-center"><?=$row->body?></p></center>
            
               </div>
               <div class="modal-footer">
                 <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                   </form>
               </div>

             </div>
           </div>
         </div>
       <!-- end of modal -->
     <?php endforeach;?>
     <?php endif;?>
  </tbody>
</table>
</center>


     
         <div class="d-flex justify-content-center text-center">
              <div class="pagination-wrap hstack gap-2">
                  <!-- <button class="page-item pagination-prev disabled" onclick="loadMore()">
                      Previous
                  </button> -->
                  <ul class="pagination listjs-pagination mb-0"></ul>
                  <button class="page-item pagination-next btn-primary" onclick="loadMore()" id="next">
                      Load More
                  </button>
              </div>
          </div>



  <div class="pagination-links text-left">
   <p><?php// echo $links; ?></p>
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

    <!-- general boostrap 5.0 cdn -->
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js" integrity="sha384-IQsoLXl5PILFhosVNubq5LC7Qb9DXgDA9i+tQ8Zj3iwWAwPtgFTxbJ8NT4GN1R8p" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.2/dist/js/bootstrap.min.js" integrity="sha384-cVKIPhGWiC2Al4u+LWgxfKTRIcfu0JTxR+EQDz/bgldoEyl4H0zUF0QKbrJ0EcQF" crossorigin="anonymous"></script>


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
function loadMore(){
    $('#next').html(`<svg xmlns="http://www.w3.org/2000/svg" xmlns:xlink="http://www.w3.org/1999/xlink" width="24px" height="24px" viewBox="0 0 100 100" preserveAspectRatio="xMidYMid">
    <circle cx="50" cy="50" fill="none" stroke="#000" stroke-width="10" r="35" stroke-dasharray="164.93361431346415 56.97787143782138">
      <animateTransform attributeName="transform" type="rotate" repeatCount="indefinite" dur="1s" values="0 50 50;360 50 50" keyTimes="0;1"></animateTransform>
    </circle></svg>`);

    var offset = $(".order-each").length;

    $.ajax({
      type: "POST",
      url: '<?=base_url('admin/offset')?>',
      data: 'offset=' + offset,
      success: function(res){
        $('#next').html('Load More');
        if(res == 400){
          $('#next').html('<div class="spinner-border" role="status"><span class="visually-hidden">Loading...</span></div>');
          alert(' nor more data');
          errorMessage('No more data to load!')
        }else{

          $('.form-check-all').append(res);
        }
      }
    });
  }
</script>



