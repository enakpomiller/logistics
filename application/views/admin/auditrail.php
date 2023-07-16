

<!-- sweet alert -->
<link rel="stylesheet" href="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.css" />
<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
<!-- datatable bootstrap -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>



<div class="container" style="margin-top:100px;margin-bottom:100px;height:1000px;" align="center">
   <?php if(count($allaudit)>0){ ?>
   <table class="table table-striped" id="table" style="margin-top:150px;">
            <thead>
                <tr>
                <th scope="col">s/n</th>
                <th scope="col" class="text-center">IMAGE</th>
                <th scope="col">NAMES</th>
                <th scope="col">LOGIN DATE</th>
                <th scope="col">LOGOUT DATE</th>
                <th scope="col">DEVICE NAME</th>
                <th scope="col">IP ADDRESS</th>
                <th scope="col">COMPUTER NAME</th>
                <th scope="col"> ACTION</th>
                </tr>
            </thead>
            <tbody>
                <?php  $counter =1; foreach($allaudit as $audit){ ?>
                <tr id="<?=$audit->id?>">
                <th scope="row"><?=$counter++?></th>
                <td style="width:10%;"><center> <img src="<?='http://localhost/logistics/assets/uploads/'.$audit->image?>" style="width:50%;"></center> </td>
                <td> <?=$audit->name?> </td>
                <td> <?=$audit->logintime?> </td>
                <td> <?=$audit->logouttime?> </td>
                <td> <?=$audit->device_name?> </td>
                <td> <?=$audit->ip_address?> </td>
                <td> <?=$audit->computer_name?> </td>
                <td width="100"> 
                    
                    <button type="submit" class="btn btn-danger remove"><i class="fa fa-trash"></i> Delete</button> 
                </td>
                </tr>
                <?php }?>
            </tbody>
            </table>
            <?php }else{ ?>
             <img src="<?=base_url('assets/images/Notebook-bro.svg')?>" width="25%" style="position:relative;top:50px;right:50px;">
             <h2 style="margin-top:50px;margin-right:50px;"> No Record Found </h2>
            <?php } ?>
</div>



<!-- sweet alert -->

<!-- <script src="https://common.olemiss.edu/_js/sweet-alert/sweet-alert.min.js"></script> -->
  <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://lipis.github.io/bootstrap-sweetalert/dist/sweetalert.js"></script>
  
  <!-- ende sweet alert --> 

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
   // $('#submit').on('click', function(e) {
   //       e.preventDefault();
   //       var email = $('#email').val();
   //       var password = $('#password').val();
   //       var passconf = $('#passconf').val();
   //       if(email!="" && password!="" && passconf!=""){
   //         $.ajax({
   //           // url:  "<?php echo base_url(); ?>" + "admin/change_pass",
   //           url:"<?//=base_url('admin/change_pass')?>",
   //           type: "POST",
   //           data: {
   //             type:'json',
   //             email: email,
   //             password: password,
   //             passconf:passconf
   //           },
   //            cache: false,
   //           success: function(dataResult){
   //             var dataResult = JSON.parse(dataResult);
   //             if(dataResult.statusCode===200){
   //               alert(' changed success');
   //               // window.location = "<?=base_url('users/product')?>";
   //             }
   //             else   {
   //               console.log("error");
   //               $("#error").show();
   //                $('#error').html('Invalid EmailId or Password !');
   //               //Swal.fire('Error!','INCORRECT EMAIL OR PASSWORD!','error');
   //
   //             }
   //
   //           }
   //         });
   //       }
   //       else{
   //           Swal.fire('Error!','PLEASE FILL THE ENTRY!','error');
   //       }
   //      });

   </script>




   <script>

  $('#submit').on('click', function() {

       $.ajax({
         type: "POST",
         url: "<?php echo base_url('admin/change_pass'); ?>",
         dataType :'json',
         data: { email : email,
                password: password,
                passconf : passconf
               },
         success: function(response)
         {
           if (response.success === true){
             alert("success");
           } else {
             alert('failed');
           }
         },
         error: function(){
           alert("Error");
         },
       });


     });


   </script>


<script type="text/javascript">
    // $(".remove").click(function(){
    //         var id = $(this).parents("tr").attr("id");
    //         var prod_name = $(this).parents("td").attr("name");

    //         if(confirm(' ARE YOU SURE YOU WANT TO DELETE THIS USER? ?'))
    //         {
    //             $.ajax({
    //               url: '<?=base_url('admin/delete_audit/')?>'+id,
    //               type: 'DELETE',
    //               error: function() {
    //                   alert('Something is wrong');
    //               },
    //               success: function(data) {
    //                     $("#"+id).remove();
    //                     swal("Good job!", "You clicked the button!", "success")
    //               }
    //             });
    //         }else{
    //           // swal.fire("cancel"," Delete Action Was Cancelled","info");
    //           swal({
    //             title: "Action Cancelled!",
    //             text: "close in 2 seconds.",
    //             timer: 2000
    //           });
    //         }


    // });
</script> 



<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
    
       swal({
        title: "Sure to  delete?",
        text: "You will not be able to recover this record!",
        type: "warning",
        showCancelButton: true,
        confirmButtonClass: "btn-danger",
        confirmButtonText: "Yes, delete it!",
        cancelButtonText: "No, cancel action!",
        closeOnConfirm: false,
        closeOnCancel: false
      },
      function(isConfirm) {
        if (isConfirm) {
          $.ajax({
            url: '<?=base_url('admin/delete_audit/')?>'+id,
             type: 'DELETE',
             error: function() {
                alert('Something is wrong');
             },
             success: function(data) {
                  $("#"+id).remove();
                  swal("Deleted!", "Your record has been deleted.", "success");
             }
          });
        } else {
          swal("Cancelled", "Record is safe :)", "error");
        }
      });
     
    });
    
</script>
