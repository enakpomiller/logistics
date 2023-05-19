
    <style>
        .switch {
          position: relative;
          display: inline-block;
          width: 60px;
          height: 34px;
        }

        .switch input {
          opacity: 0;
          width: 0;
          height: 0;
        }

        .slider {
          position: absolute;
          cursor: pointer;
          top: 0;
          left: 0;
          right: 0;
          bottom: 0;
          background-color: #ccc;
          -webkit-transition: .4s;
          transition: .4s;
        }

        .slider:before {
          position: absolute;
          content: "";
          height: 26px;
          width: 26px;
          left: 4px;
          bottom: 4px;
          background-color: white;
          -webkit-transition: .4s;
          transition: .4s;
        }

        input:checked + .slider {
          background-color: #2196F3;
        }

        input:focus + .slider {
          box-shadow: 0 0 1px #2196F3;
        }

        input:checked + .slider:before {
          -webkit-transform: translateX(26px);
          -ms-transform: translateX(26px);
          transform: translateX(26px);
        }

        /* Rounded sliders */
        .slider.round {
          border-radius: 34px;
        }

        .slider.round:before {
          border-radius: 50%;
        }
    </style>


<br>
<style>
#a:hover{
  background:red;
  color:BLACK;
}
#a{
  background:black;
  padding:10px 15px;
  border:1px solid black;
  color:red;
}
.active{
 background: : black;

}
</style>

<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- datatable bootstrap -->
  <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>

  
<div class="container" style="margin-top:60px;">
  <h2><?=$title?></h2>
  <br>

  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active"  data-toggle="pill" href="#home" id="a">Sellers Profile </a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1" id="a"> Registered Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu3" id="a"> Sellers Products</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2" id="a"> Settings </a>
    </li>
  </ul>

  <!-- Tab panes -->
      <div class="tab-content">
        <div id="home" class="container active  tab-pane  w-100"><br>


           <table class="table" id="table">
                    <thead>
                      <tr>
                        <th> Image </th>
                        <th scope="col">First Name</th>
                        <th scope="col"> Other Names </th>
                        <th scope="col">Email</th>
                        <th scope="col">Category</th>
                        <th scope="col">Tracker</th>
                        <th scope="col">Status</th>
                        <th scope="col">Action</th>
                      </tr>
                      </thead>
                        <tbody>
                      <?php foreach($allsellers as $row):?>
                      <tr>
                       <td style="width:20%;">
                        <img src="<?=base_url()?>assets/admin_uploads/<?=$row->userfile?>"  style="width:12%;border-radius: 5px;"> </td>
                        <td>  <?=$row->firstname?> </td>
                        <td>  <?=$row->othernames?> </td>
                        <td>  <?=$row->email?> </td>
                        <td>  <?=$row->usertype?> </td>
                        <td> <?=$row->tracking_code?> </td>
                        <td> <?=$row->status=='on'?'<div class="btn btn-success">PAID</div>':'<div class="btn btn-danger">UNPAID</div>'?> </td>
                     <td>
                       <a href="" data-toggle="modal"  data-target="#exampleModal<?=$row->id?>" title="Edit Record" class="btn btn-success delete" style="position:relative;left:30px;"><i class="fa fa-pencil"></i> </a>
                       <a href="" data-toggle="modal"  data-target="#viewprod<?=$details->id?>" title="View Record" class="btn btn-warning" style="position:relative;left:20px;"><i class="fa fa-book"></i> </a>
                   </td>
                     <!-- Large modal -->
                      <div class="modal fade" id="exampleModal<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
                           <div class="modal-dialog modal-dialog-centered" role="document">
                             <div class="modal-content">
                               <div class="modal-header">
                                 <h5 class="modal-title" id="exampleModalLongTitle"><label> <?=" Edit Seller Profile"?> </label></h5>
                                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                   <span aria-hidden="true">&times;</span>
                                 </button>
                               </div>
                            <div class="modal-body">
                               <form action="<?=base_url('admin/updateseller')?>" method="POST">
                                   <div class="col-md-4">
                                      <img src="<?=base_url()?>assets/admin_uploads/<?=$row->userfile?> "    style="width:110%;border-radius: 5px;position:relative;right:20px;">
                                   </div>
                                     <input type="hidden" name="id" value="<?=$row->id?> ">
                                     <input type="text" name="firstname" class="form-control" style="width:60%;" value="<?=$row->firstname?>">
                                     &nbsp;
                                    <input type="text" name="othernames" class="form-control" style="width:60%;" value="<?=$row->othernames?>">
                                     &nbsp;
                                    <input type="text" name="email" class="form-control" style="width:60%;" value=" <?=$row->email?>">
                                     &nbsp;
                                    <input type="text" name="usertype" class="form-control" style="width:60%;" value="<?=$row->usertype?>">
                               </div>
                               <div class="modal-footer">
                                 <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
                               <input  type="submit" id="btn-submit" class="btn btn-primary" value="save changes">
                             </form>
                          </center>
                        </div>
                      </div>
                    </div>
                 </div>
               <!-- end of modal -->
                      </tr>
                       <!-- <?=$total_sum+=$row->prod_quantity;?>
                      <?php $grand_sum+=($row->prod_price)*($row->prod_quantity);?> -->
                  <?php endforeach ;?>
          </tbody>
        </table>

    </div>




    <div id="menu1" class="container  tab-pane fade"><br>
      <?php foreach($allsellersproduct as $all):?>
       <div class="col-md-4">
               <center>
              <img src="<?=base_url()?>assets/admin2/<?=$all->file_name?>"  style="width:60%;height:140px;border-radius: 5px;margin:10px 20px;"><br>
             <?=$all->prod_name?>
              </center>
       </div>
     <?php endforeach;?>
 </div>




  <div id="menu2" class="container tab-pane fade"><br>
      <table class="table" id="table1">
              <thead>
                <tr>
                  <th> Image </th>
                  <th scope="col">First Name</th>
                  <th scope="col"> Other Names </th>
                  <th scope="col">Email</th>
                  <th scope="col">Category</th>
                  <th scope="col" class="text-center">Action</th>
                </tr>
                </thead>
                  <tbody>
                    <?php foreach($allsellers as $row):?>
                    <tr id="<?php echo $row->id; ?>">
                     <td style="width:20%;">
                      <img src="<?=base_url()?>assets/admin_uploads/<?=$row->userfile?>"  style="width:12%;border-radius: 5px;"> </td>
                      <td>  <?=$row->firstname?> </td>
                      <td>  <?=$row->othernames?> </td>
                      <td>  <?=$row->email?> </td>
                      <td>  <?=$row->usertype?> </td>
                   <td style="width:25%;margin:auto;">
                     <form action="<?=base_url('admin/settings')?>"  method="POST">
                       <label class="switch">
                         <input type="hidden" name="id" value="<?=$row->id?>">
                         <input type="checkbox"  name="activity" id="activity" <?=$row->status=='on'?'checked':''?>/>
                         <span class="slider round"></span>
                       </label>
                       <button class="btn btn-success" id="triga" style="color:black;color:white;"> Activate </button>
                       <button type="submit" class="btn btn-danger remove"> Delete</button>
                       <!-- <a href="<?//=base_url('admin/del_user_profile/'.$row->id)?>" style="color:white;" class="btn btn-danger remove">Delete</a> -->
                    </form>
                   </td>
                 </tr>
                     <!-- <?=$total_sum+=$row->prod_quantity;?>
                    <?php $grand_sum+=($row->prod_price)*($row->prod_quantity);?> -->
                <?php endforeach ;?>
        </tbody>
      </table>
    </div>


     <div id="menu3" class="container   tab-pane">
        <div class="row" style="width:70%;margin:auto;margin-top:30px;">
           <div class="col-md-8">
                 <input type="text" placeholder="Search.." name="find" id="find" class="form-control" style="width:100%;margin-bottom:15px;">
                 <!-- <button type="submit"><i class="fa fa-search"></i></button> -->
            </div>
            <div class="col-md-4" style="margin-bottom:15px">
                <button id="fetch"  class="btn btn-primary btn-block">Fetch</button>
           </div>
         </div> 


            <div class="row" id="loading">
              <div class="col-md-4"></div>
              <div class="col-md-4 text-center">
                <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                <p class="">Processing...</p>
              </div>
              <div class="col-md-4"></div>
            </div>
            <!-- fetch data show here-->
            <div class="display">

          </div>
     </div>
  </div>
</div>






  <script type="text/javascript">
  $(document).ready(function() {
      $('#table').DataTable();
      $('#table1').DataTable();

  });
  </script>




    <script>
      	$('#loading').hide();
      	$('#gen_toggle').hide();

      	$('#fetch').click(function(){

          var find = $('#find').val();
          // var mode = $('#entry_mode').val();

          if(find == ""){
            alert('Please enter a tracking code');
            return false;
          }else{ 

              $('#loading').show();
                $.ajax({
                  type: "POST",
                  url: '<?=base_url('admin/search_for_seller_prod')?>',
                  // data: 'load=' + programme + "&mode="+mode,
                  data: 'load='+ "&find="+find,
                  success: function(data){
                    $('#loading').hide();
                    if(data != '0' || data != 0){
                      $('.display').html(data);
                      //$('#simple-table').dataTable();
                    }
                  }
                });
           }
          

      	});



          $(".remove").click(function(e){
            e.preventDefault();
               var id = $(this).parents("tr").attr("id");
              if(confirm('Are you sure to remove this record ?'))
              {
                  $.ajax({
                     url: '/del_user_profile/'+id,
                     type: 'DELETE',
                     error: function() {
                        alert('Something is wrong');
                     },
                     success: function(data) {
                          $("#"+id).remove();
                          alert("Record removed successfully");
                     }
                  });
              }
          });






      // $('#loader').hide();

      //     $('#fetch').click(function(){
      //       let searchName = $('#find').val();
      //       // var offset = $(".order-each").length;
      //       if (searchName.length > 3) {
      //         $('#loader').show();
      //         if (searchName == ""){
      //           errorMessage('Please enter a search data!')
      //           $('#loader').hide();
      //           return false;
      //         }else{
      //           $.ajax({
      //             type: "POST",
      //             url: '<?=base_url('admin/search_for_seller_prod')?>',
      //             data: {searchName},
      //             success: function(res){

      //               $('#loader').hide();

      //               if(data != '0' || data != 0){
      //                 $('.display').html(data);
      //                 //$('#simple-table').dataTable();
      //               }
      //             }
      //           });
      //         }
      //       } 
    

      //     }

</script> 





<!-- cdn for delete -->
   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<!-- datatable script -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.10.2/jquery.min.js"></script>
<script type="text/javascript" src="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.js"></script>
<!-- end datatable script -->

<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
});
</script>
