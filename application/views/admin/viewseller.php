




        <div class="row" style="margin-top:50px;margin-bottom:100px;">
           <?php if($seller_info):?>
              <div class="col-md-4">
                <img src="<?=base_url()?>assets/admin_uploads/<?=$seller_info->userfile?>"  style="width:30%;border-radius: 50px;height:100px;"><br>
                <span style="position:relative;top:10px;">
                 <?=$seller_info->firstname?>
                <?=$seller_info->othernames?> <br>
                 <?=$seller_info->email?> <br>
                <?=$seller_info->usertype?> <br>
                <?php
                  $_SESSION['seller_id']=$seller_info->id;
                 ?>
            </span>
          </div>
        <?php endif;?>


        <?php if($prod_details):?>
            <?php foreach($prod_details as $prod_row):?>
                  <div class="col-lg-2">
                   <img src="<?=base_url()?>assets/admin2/<?=$prod_row->file_name?>" style="width:30%;border-radius: 5px; width:70%;height:150px;"></td><p>
                  <div> Product ID <?=$prod_row->prod_id?></div>
              </div>
          <?php endforeach;?>


       <div class="col-lg-4">

       </div>

       <?php foreach($prod_img as $prod):?>
         <div class="col-lg-2">
             <?=$prod->prod_name?><br>
           <?=$prod->prod_price?><br>
         </div>
     <?php endforeach;?>

   <?php else:?>
     <h3 style="color:red;" class="text-center"> <?=" Incoorect Tracking Code "?> </h3>
   <?php endif;?>
      </div>
