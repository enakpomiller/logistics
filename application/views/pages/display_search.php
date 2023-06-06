

<div class="container">
    <?php 
    //   if(count($keyprod)>1){
    //   echo "<h4>". (count($keyprod))." Products Found </h4> ";
    // }else{
    //     echo (count($keyprod))." Product Found ";
    // }
    // ?>

</div>
 

         <?php if($keyprod){ ?> 
                    <?php foreach($keyprod as $products) { ?>
                            <div class="col-lg-6" style="background:sandybrown;margin-top:50px;margin-bottom:40px;">
                                <div class="cards" style="background:white;padding:20px 20px; margin:20px;border-radius:5px;">
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
        <?php } else{?>
            <div align="center">
            <img src="<?=base_url('assets/error_img/search.png')?>" style="width:30%;"><br>
             <h2> OOps!!!<h2>
                <h4> Product Search Not Found </h4>
            <a class="btn btn-warning pt-4 pb-4" href="javascript:location.reload();" role="button" style="margin-top:20px;">Reload Data</a>
        <?php } ?>
        </div>






