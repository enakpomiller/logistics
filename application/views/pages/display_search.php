

<div class="container">
<?=(count($keyprod))." Items Found "?>
</div>
 

<?php foreach($keyprod as $products) { ?>
       <?php 
         if($products->category =="shirt"){
           $msg =  $products;
          }
        ?>
    <div class="col-lg-6" style="background:sandybrown;margin-top:50px;margin-bottom:40px;">
         <div class="cards" style="background:white;padding:20px 20px; margin:20px;">
            <span style="margin-to:10px;">
      
            <a href="<?=base_url('users/single_prod/'.$products->id)?>">
                <img src="<?=base_url()?>uploads/<?=$products->userfile?>" style="width: 90%;height: 300px;margin-top: 10px;">
            </a>
                <li> <?= " Product Name : " .$products->prod_name?> </li>
                <li> <?= " Product Price : &#x20A6; " .$products->prod_price?> </li>
                <li> <?= " Product Brand : " .$products->prod_brand?> </li>
                <li> <?= " Product Category : " .$products->category?> </li>
            </span>
         </div>
    </div>
   
<?php }?>




