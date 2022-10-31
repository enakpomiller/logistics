

          <style>

          .txt{
              width:80px;
              border: 0px solid red;
          }
          #prod-cover{
              border:1px solid skyblue;margin-bottom: 10px;margin-top: 10px;
          }
          #prod-cover:hover{
              border: 1px solid sandybrown;
          }
          .btn-submit{
              background:sandybrown;border: 0px solid red;
              padding: 4px;border-radius: 4px;
              color: #000000;
          }
          .btn-submit:hover{
              background:#ffffff;
              color: #2196F3;
          }
          .checked {
            color: orange;
          }
          </style>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.7.0/css/font-awesome.min.css">

<!-- <section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->
<!-- /banner section -->

<!-- tracking section -->
<section class="shipment-w3ls">
    <div class="container">
        <i class="fa fa-braille" aria-hidden="true"></i>
        <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Product Listings </h3>
    </div>

    <div class="container">
        <div class="content-w3ls" style="overflow:auto;height:100%;background: #ffffff;">
            <div class="content1-w3ls">
            </div>
            <center>

              <!-- product listings -->

<div class="container">
    <div class="row-fluid ">

     <?php foreach($GetProd as $row_prod):?>
   <form  action="" class="subscribeForm" method="POST">

        <div class="col-sm-4">
            <div class="card-columns-fluid">
                <div class="card  bg-light" style = "width: 22rem; " >
                    <div class="card-body" style="text-align: center;">
                      <input type="hidden" name="user_id" id="user_id"   value="<?=$this->session->userdata('id')->id?>">
                        <input type="hidden" name="product_id"  id="prodcut_id"   value="<?=$row_prod->id?>">
                           <div id="prod-cover">
                              <a href="<?=base_url('users/comment/'.$row_prod->id)?>">
                                <img src="<?=base_url()?>uploads/<?=$row_prod->userfile?>" style="width: 90%;height: 100px;margin-top: 10px;">
                                </a>
                               <input type="hidden" name="userfile" id="userfile"  value="<?=$row_prod->userfile?>">
                               <div style="margin:20px;">
                                 <p>  <input type="text" name="prod_name"  id="prod_name" readonly value="<?= $row_prod->prod_name?>" class="txt"> </p>
                                  <p> &#x20A6; <input type="text" name="prod_price" id="prod_brand"  value="<?=$row_prod->prod_price?>" class="txt"></p>
                                  <!-- star rating -->
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star checked"></span>
                                  <span class="fa fa-star"></span>
                                  <span class="fa fa-star"></span>
                                  <!-- end star rating -->
                                  <p> &#x20A6; <input style="text-decoration:line-through;font-weight:bold;" readonly id="prod_brand"  value="<?=$row_prod->prod_price?>" class="txt"></p>

                                   <p> <input type="hidden" required readonly name="prod_brand" id="prod_brand" value="<?=$row_prod->prod_brand?>" class="txt"></p>
                                    <input type="number"  name="prod_quantity" id="prod_quantity" placeholder="Qty" style="width:50px;">
                                    <button  class="btn-submit" id="butcave"  class="btn btn-md btn-block bg-navy default"><span>Add to Cart</span></button>
                                   </div>
                                </div>

                            </div>
                        </div>
                     </div>
                 </div>
            </form>
        <?php endforeach; ?>

              <!-- end of product listings -->
        </div>
    </div>

</section>



<!-- ajax -->
  <script>
        // Ajax post
            $(document).ready(function(){
                $(".subscribeForm").on('submit', function(e){
                    e.preventDefault();
                    let data = $(this).serialize();
                    //sweet alert
                        Swal.fire({
                        title: 'Are you sure?',
                        text: "You want to add this item to your cart?!",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#3085d6',
                        cancelButtonColor: '#d33',
                        confirmButtonText: 'Yes!',
                        width: '450px',
                        }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                type: "POST",
                                url:  "<?= base_url(); ?>" + "/users/product",
                                data: data,
                                success: function(result){
                                    Swal.fire(
                                    'Item Added!',
                                    'Item added to cart successfully.',
                                    'success'
                                    );


                                }
                            });

                        }

                        })


                });
            });
   </script>
