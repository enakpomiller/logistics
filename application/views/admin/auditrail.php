


<!-- datatable bootstrap -->
<link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>



<div class="container" style="margin-top:100px;margin-bottom:100px;height:1000px;" align="center">

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
                <tr>
                <th scope="row"><?=$counter++?></th>
                <td style="width:10%;"><center> <img src="<?='http://localhost/logistics/assets/uploads/'.$audit->image?>" style="width:50%;"></center> </td>
                <td> <?=$audit->name?> </td>
                <td> <?=$audit->logintime?> </td>
                <td> <?=$audit->logouttime?> </td>
                <td> <?=$audit->device_name?> </td>
                <td> <?=$audit->ip_address?> </td>
                <td> <?=$audit->computer_name?> </td>
                <td width="100"> 
                    <a href="<?=base_url('admin/delete_augit/'.$audit->id)?>" class="btn btn-danger remove"><i class="fa fa-trash"></i>delete </a>
                </td>
                </tr>
                <?php }?>
            </tbody>
            </table>
</div>



<!-- sweet alert -->
  <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>

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
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        var prod_name = $(this).parents("td").attr("name");
      console.log(prod_name);

        if(confirm(' ARE YOU SURE YOU WANT TO DELETE THIS USER? ?'))
        {
            $.ajax({
               url: '<?=base_url('admin/delete_augit/')?>'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    alert("Record removed successfully");
                    //swal.fire("success"," PRODUCT DELETED SUCCESSFULLY","success");
               }
            });
        }
    });
</script>
