
<?php foreach($keyprod as $products) { ?>

    <div class="col-lg-6" style="background:sandybrown;margin-top:50px;margin-bottom:40px;">
         <div class="cards" style="background:white;padding:20px 20px; margin:20px;">
            <img src="<?=base_url()?>uploads/<?=$products->userfile?>" style="width: 90%;height: 300px;margin-top: 10px;">
            <li> <?= " Product Name : " .$products->prod_name?> </li>
            <li> <?= " Product Price : " .$products->prod_price?> </li>
            <li> <?= " Product Brand : " .$products->prod_brand?> </li>
         </div>
    </div>
   
<?php }?>



