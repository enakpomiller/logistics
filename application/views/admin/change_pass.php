



<div class="container" style="margin-top:100px;margin-bottom:100px;" align="center">
  <h1> Change Password </h1> &nbsp;
  <div class="row">
    <form action="<?=base_url('admin/change_pass')?>" class"butsave" method="POST">

      <?php if($this->session->flashdata('err_mismatch')):?>
          <div class="alet alert-danger" style="padding:10px 5px;width:40%;"> <?=$this->session->flashdata('err_mismatch')?></div>
          <?php endif;?>

   <div class="form-group">
     <label style="color:red;"> <?=form_error('email')?></label>
     <input type="text" name="email" placeholder="Enter email" value="<?=set_value('email')?>" class="form-control" style="width:40%;">
   </div>
   <div class="form-group">
     <label style="color:red;"> <?=form_error('password')?></label>
     <input type="text" name="password"  placeholder="Enter New  Password" value="<?=set_value('password')?>" class="form-control" style="width:40%;">
   </div>
   <div class="form-group">
    <label style="color:red;"> <?=form_error('passconf')?></label>
     <input type="text" name="passconf"  placeholder="Confirm Password" class="form-control" style="width:40%;">
   </div>

   <div class="form-group">
     <button class="btn btn-primary" style="width:40%;"> Change </button>
   </div>
</div>
</form>
</div>


  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>

<script>
    // $(document).ready(function() {
    // 	$('.butsave').on('submit', function(e) {
    //     e.preventDefault();
    // 		var email = $('#email').val();
    // 		var password = $('#password').val();
    // 		var passconf = $('#passconf').val();
    //
    // 		if(email!="" && password!="" && passconf!=""){
    // 			$("#butsave").attr("disabled", "disabled");
    //       console.log("correct");
    // 			$.ajax({
    // 				url: "<?=base_url('admin/change_pass')?>",
    // 				type: "POST",
    // 				data: {
    // 					email: email,
    // 					password: password,
    // 					passconf: passconf
    //
    // 				},
    // 				// cache: false,
    // 				success: function(dataResult){
    // 					var dataResult = JSON.parse(dataResult);
    // 					if(dataResult.statusCode==200){
    // 						$("#butsave").removeAttr("disabled");
    // 						$('#fupForm').find('input:text').val('');
    // 						$("#success").show();
    // 						//$('#success').html('Data added successfully !');
    //             alert("success");
    // 					}
    // 					else if(dataResult.statusCode==201){
    //             console.log(" empty");
    // 					   alert("Error occured !");
    // 					}
    //
    // 				}
    // 			});
    // 		}
    // 		else{
    // 			alert('Please fill all the field !');
    // 		}
    // 	});
});
</script>
