

 <?php //session_start();?>

  <div class="container" style="margin-top:180px;">
       <?php $total_sum=0;?>
       <?php $grand_sum=0;?>
          <h2><?=ucfirst($this->session->userdata('name'))."'s".' cart'?></h2>
          <table class="table" id="table">
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

                  <?php foreach($demo as $row):?>
                  <tr>
                   <td style="width:20%;">
                    <img src="<?=base_url()?>uploads/<?=$row->userfile?>"  style="width:12%;border-radius: 5px;"> </td>
                    <td>  <?=$row->prod_name?> </td>
                    <td>  <?=$row->prod_brand?> </td>
                    <td>  <?='&#8358;'.$row->prod_price?> </td>
                    <td>  <?=$row->prod_quantity?> </td>
                  <td> <?='&#8358;'.(number_format($row->totalprice))?> </td>
                 <td><a href="<?=base_url('users/deleteusercart/'.$row->id)?>" onclick="return confirm('do you want to delete this record?')" class="btn btn-danger delete" style="float:right;">X </a></td>

                  </tr>

                   <!-- <?=$total_sum+=$row->prod_quantity;?>
                  <?php $grand_sum+=($row->prod_price)*($row->prod_quantity);?> -->
              <?php endforeach ;?>
      </tbody>
    </table>




<!-- start cart -->
<a href='<?= base_url('users/export_csv')?>' class="btn btn-primary">Export to Excel</a>


<a href='<?= base_url('users/export_excel')?>' class="btn btn-primary">Export to new Excel</a>

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
           <center><a href="<?=base_url('users/product')?>"> Continue shopping </a></center>
            </td>
            <td><a href="<?=base_url('users/checkout')?>"> Check Out </a></td>
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
