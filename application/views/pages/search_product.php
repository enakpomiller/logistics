

<style>
.btn{
  border: 1px solid sandy brown;
}

</style>



     <div class="container" style="position:relative;top:150px;">
              <div class="form-group" align="center">
                 <p>  <?=$title?> </p>
                   <input type="text" name="search_product"   autocomplete="off" id="search_product"  placeholder=" enter product key word...." size="55px;" style="position:relative;top:10px;padding:10px;border-radius:3px;border:1px solid sandybrown;"> 
                   <a href="javascript:void(0)" onclick="revenue_request();" id="btn-revenue" class="ms-2 btn btn-warning d-flex" style="margin-top:15px;padding:10px;">
                      <i class="fa fa-search text-white me-1 fs-5"></i> Search
		               </a>
                </div> <p> 
                <div class="col-md-12 border-top border-top-dashed">
                    <div class="list-group mt-4" id="searchResult">

                    </div>
                </div>  


              <div class="col-lg-12" id="result"></div> 

              <div id="resultDisplay_revenue"></div>
     
    </div>





 <script
    src="https://code.jquery.com/jquery-3.6.0.js"
    integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk="
    crossorigin="anonymous">
  </script>





<script type="text/javascript">

        // $(document).ready(function(){

        //     function search_product (){
        //         $("#spin").html("<p style='width:100%; text-align:center;'>Loading...</p>");
        //         var val = $("#search_product").val();
        //             $.ajax({
        //               type : 'POST',
        //               url : '<?php echo base_url() ?>' + 'users/search_product',
        //               dataType: "html",
        //               data : "search_product=" + val,
        //               success : function(response){
        //               $("#result").html(response);

        //             }
        //             });

        //     }


        //     $("#search_product").keydown(function(e){
        //         if(e.keyCode == '13'){
        //             search_product();
        //         }
        //     });


        // });


</script>  





<script type="text/javascript">

	function revenue_request(){
		var search = $('#search_product').val();
    console.log(search);
		if (search == "") {
      swal.fire('warning',' please enter a keyword ','warning');
			//errorMessage('Filter cannot be empty!')
			return false
		}

		$('#btn-revenue').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`)

		$.ajax({
	    type: "POST",
      url : '<?php echo base_url() ?>' + 'users/search_product',
	    data: {search: search},
	    success: function(res){

	      $('#btn-revenue').html(`<i class="fa fa-search text-white me-1 fs-5"></i> Search`);

	      if(res == 400){
	        // $('.loader').hide();
					errorMessage('Reference not found!')
					$('#resultDisplay_revenue').html('');
					$('#table-mda').dataTable({
            "ordering": false
          });
	      }else{
	        $('#resultDisplay_revenue').html(res);
					$('#table-mda').dataTable({
            "ordering": false
          });
	      }
	    },
	    error: function(error){
	      errorMessage('Oops! Something went wrong.')
        $('#btn-revenue').html(`<i class="fa fa-search text-white me-1 fs-5"></i> Search`);
	    }
	  });
	}
</script>

<script>
$(function(e){

	if(e.keyCode == 13) {
		search_tin_request();
	}

	$(document).keyup(function(e){
		if(e.keyCode == 27){
			// $('#resultDisplay').html('');
		}
	});

	$('#search_product').keyup(function(e) {
		if(e.keyCode == 13) {
			search_tin_request();
		}
		if(e.keyCode == 8 && $('#search_product').val() == ''){
			// $('#resultDisplay').html('');
		}
	});

});
</script>
  






