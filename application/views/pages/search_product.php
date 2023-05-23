



     <div class="container" style="position:relative;top:150px;">
            
                <div class="form-group" align="center">
                 <p>  <?=$title?> </p>
                    <input type="text" name="search_product"  autocomplete="off" id="search_product"  placeholder=" enter product key word...." size="55px;" style="position:relative;top:10px;padding:10px;border-radius:3px;border:1px solid sandybrown;">
                    <!-- <button onclick="populateprod()" data-bs-dismiss="modal" class="btn btn-primary">Choose Customer</button> -->
                </div> <p> 

                 <div class="col-lg-12" id="result"></div> 
               
                
                
                    <!-- <div class="row" id="result" align="center">
                        <div class="col-md-4"></div>
                        <div class="col-md-4 text-center">
                            <i class="fa fa-spinner fa-spin fa-3x fa-fw"></i>
                            <p class="">Processing...</p>
                        </div>
                        <div class="col-md-4"></div>
                        </div>  -->

                    

                <div class="col-md-12 border-top border-top-dashed">
                    <div class="list-group mt-4" id="searchResult">

                    </div>
                </div> 
     
    
 </div>


 <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
  </script>

<script>

// $('#loader').hide();
// $('#productArea').val();


// function searchProd(){
//     let searchprod = $('#search_product').val();
//         if(searchprod.length > 3){
//             $('#loader').show();
//              if(searchprod ==""){
//                 errorMessage(" enter product please ");
//                 $('#loader').hide();
//                 return false;
//              }else{
//                 $.ajax({
//                     type: "POST",
//                     url: '<?=base_url('users/search_product')?>',
//                     data: {searchprod},
//                     success: function(res){
//                          $('#loader').hide();
//                         if(res == 400){
//                         errorMessage('Customer not found!');
//                         }else{
//                             $('#searchResult').html(res);
//                         }
//                     }
//                     });
            
//             }
            
          

//         }

// }


</script>



<script type="text/javascript">

$(document).ready(function(){

    function search_product (){
        $("#result").html("<p style='width:100%; text-align:center;'>Loading...</p>");
        var val = $("#search_product").val();
        $.ajax({
        type : 'POST',
        url : '<?php echo base_url() ?>' + 'users/search_product',
        dataType: "html",
        data : "search_product=" + val,
        success : function(response){
        $("#result").html(response);

        }
        });

    }

    $("#search_product").keydown(function(e){
        if(e.keyCode == '13'){
            search_product();
        }
    });



});

</script>