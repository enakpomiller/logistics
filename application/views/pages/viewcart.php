

 <?php //session_start();?>

  <div class="container" style="margin-top:180px;">
       <?php $total_sum=0;?>
       <?php $grand_sum=0;?>
          <h2><?=ucfirst($this->session->userdata('name'))."'s".' cart'?></h2>
          <table class="table table-striped" id="table">
            <thead>
              <tr>
                <th> Image </th>
                <th scope="col">Product Name</th>
                <th scope="col">Product brand </th>
                <th scope="col">Unit price</th>
                <th scope="col">Quantity</th>
                <th scope="col">Total</th>
                <th scope="col">Action</th>
              </tr>
              </thead>
                <tbody>
                  <?php if($demo):?>
                  <?php foreach($demo as $row):?>
                 <tr id="<?=$row->id?>">
                   <td style="width:20%;">
                    <img src="<?=base_url()?>uploads/<?=$row->userfile?>"  style="width:12%;border-radius: 5px;"> </td>
                    <td>  <?=$row->prod_name?> </td>
                    <td>  <?=$row->prod_brand?> </td>
                    <td>  <?='&#8358;'.$row->prod_price?> </td>
                    <td>  <?=$row->prod_quantity?> </td>
                    <td> <?='&#8358;'.(number_format($row->totalprice))?> </td>
                    <td> <button type="submit" class="btn btn-danger remove"><i class="fa fa-trash"></i> Delete</button>  </td>
                  </tr>
                   <!-- <?=$total_sum+=$row->prod_quantity;?>
                  <?php $grand_sum+=($row->prod_price)*($row->prod_quantity);?> -->
              <?php endforeach ;?>
            <?php else:?>
              <?= " No Product In Your Cart, Click On Shop Now"?>
              <a href="<?=site_url('users/product')?>"> Shop Now </a>
            <?php endif;?>
      </tbody>
    </table>




<!-- start cart -->
<a href='<?= base_url('users/export_csv')?>' class="btn btn-primary" style="background:sandybrown;font-family:sans-serif;padding:10px;"><b>Export to Excel</b></a>
<table class="table table-striped" style="width:30%;position: relative;left:70%;top: 10px;">
    <tr>
       <th style="font-family:sans-serif;"> Total  Number Of Items </th>
        <th style="font-family:sans-serif:"> Grand Total </th>
    </tr>
      <tr>
         <td><center>  <?php echo  $total_sum;?></center></td>
         <td> <center><?php echo  '&#8358;'.number_format(($grand_sum),2);?> </center></td>
    </tr>
      <tr style="border:0px solid red;"><td>
           <center><a href="<?=base_url('users/product')?>" class="btn" style="background:sandybrown;color:white;padding:10px;font-family:sans-serif;"><b> Continue shopping </b></a></center>
            </td>
            <td><a href="<?=base_url('users/checkout')?>" class="btn" style="background:sandybrown;color:white;padding:10px;font-family:sans-serif;"> Check Out </a></td>
       </tr>
   </table>
   <?php $this->session->set_userdata('total',$grand_sum);?>
 <?php  $_SESSION['quantity'] = $total_sum; ?>
 <?php  $_SESSION['sum'] = $grand_sum; ?>
</div>




<!--
<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
});
</script> -->

<script type="text/javascript">
$(document).ready(function() {
    $('#table').DataTable();
});

</script>


<script type="text/javascript">
    $(".remove").click(function(){
        var id = $(this).parents("tr").attr("id");
        var prod_name = $(this).parents("td").attr("prod_name");
      console.log(prod_name);

        if(confirm(' ARE YOU SURE YOU WANT TO DELETE THIS PRODUCT? ?'))
        {
            $.ajax({
               url: '<?=base_url('users/deleteusercart/')?>'+id,
               type: 'DELETE',
               error: function() {
                  alert('Something is wrong');
               },
               success: function(data) {
                    $("#"+id).remove();
                    //alert("Record removed successfully");
                    swal.fire("success"," PRODUCT DELETED SUCCESSFULLY","success");
               }
            });
        }
    });


</script>
