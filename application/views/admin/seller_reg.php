
-->
<!DOCTYPE html>
<html>

<head>
	<title><?=$title?></title>
		<meta charset="utf-8">
		<link href="<?=base_url()?>assets/admin2/css/style.css" rel='stylesheet' type='text/css' />
		<meta name="viewport" content="width=device-width, initial-scale=1">
		<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false); function hideURLbar(){ window.scrollTo(0,1); } </script>
		<!--webfonts-->
		<link href='https://fonts.googleapis.com/css?family=Open+Sans:600italic,400,300,600,700' rel='stylesheet' type='text/css'>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
		<!--//webfonts-->
</head>
<body>

	 <div class="login-form" style="width:40%;position:relative;bottom:100px;">
		 <?=$msg_insert?>
     <a href="<?=base_url('admin/adminlogin')?>" style="position:absolute;margin:40px;" class="btn btn-warning"> Back </a>
			 <form method="post" action="<?=base_url('admin/seller_reg')?>" id="form"  enctype="multipart/form-data" class="subscribeForm">
              <p class="text-center text-uppercase h2" style="position:relative;bottom:40px;font-family:ariel;"> Sellers Form </p>
          <div class="mb-3">
               <label  class="form-label"> First Name</label>
               <div class="text-danger"><?=form_error('firstname')?></div>
              <input type="firstname" name="firstname" class="form-control" id="exampleInputEmail1" value="<?=set_value('firstname')?>">
          </div>
           <div class="mb-3">
             <label  class="form-label"> Other Names</label>
              <span class="text-danger">  <?=form_error('othernames')?></span>
             <input type="othername" name="othernames" class="form-control" id="exampleInputEmail1"  value="<?=set_value('othernames')?>">
           </div>
           <div class="mb-3">
            <label for="exampleInputEmail1" class="form-label">Email address</label>
              <span class="text-danger">  <?=form_error('email')?></span>
            <input type="email"  name="email" class="form-control" id="exampleInputEmail1">
            <div id="emailHelp" class="form-text">We'll never share your email with anyone else.</div>
          </div>
					<div class="mb-3">
					 <label for="exampleInputEmail1" class="form-label">Upload Passport</label>
						 <span class="text-danger">   <?=form_error('userfile')?></span>
					 <input type="file"  name="userfile" class="form-control" id="exampleInputEmail1">
				 </div>
          <div class="mb-3">
          <label  class="form-label">Username</label>
             <span class="text-danger"> <?=form_error('username')?> </span>
          <input type="username" name="username" class="form-control" value="<?=set_value('username')?>">
        </div>
          <div class="mb-3">
            <label  class="form-label"> Password </label>
             <span class="text-danger">  <?=form_error('password')?></span>
            <input type="password" name="password" class="form-control">
          </div>
          <div class="mb-3">
            <label  class="form-label"> Confirm  Password </label>
             <span class="text-danger">   <?=form_error('conf_password')?> </span>
            <input type="" name="conf_password" class="form-control" value="<?=set_value('conf_password')?>">
          </div>

           <button type="submit" class="btn btn-primary">Submit</button>
					 <button type="reset" class="btn btn-primary" style="margin-left:70%;">Reset</button>
         </form>

	</div>


				<!-----//end-copyright---->

</body>
</html>


<script type="text/javascript">
      // Ajax post
      // $(document).ready(function(){
      //   $("#form").submit(function(){
      //   var name = $("#name").val();
      //   var email = $("#email").val();
      //   var password = $("#password").val();
      //   var conf_password = $("#conf_password").val();
      //   var userfile = $("#userfile").val();
      //   var country = $("#country").val();
      //   var date = $("#date").val();
      // // Returns error message when submitted without req fields.
      // if(name =='' || email=='' || password=='' || conf_password =='' || userfile=='' || country=='' || date=='')
      // {
      // // jQuery("div#err_msg").show();
      // // jQuery("div#msg").html("All fields are required");
      // Swal.fire('Error!','PLEASE FILL ALL ENTRIES!','error')
			//
      // }
      // else
      // {
      // // AJAX Code To Submit Form.
      // $.ajax({
      // type: "POST",
    	// url: "<?=base_url('admin/seller_reg')?>",
      // data: {
      //     type: POST,
      //     name: name,
      //     email: email,
      //     password: password,
      //     userfile: userfile,
      //     country: country,
      //     date : date
      // },
      // //cache: false,
      // success: function(result){
      //     if(result!=0){
      //       alert('success');
      //      // window.location = "<?=base_url('admin/seller_reg')?>";
      //      }else{
      //       // jQuery("div#err_msg").show();
      //       // jQuery("div#msg").html("Login Failed");
      //       Swal.fire('Error!','INCORRECT USERNAME OR PASSWORD!','error')
      //      }
			//
      // }
      // });
      // }
      // return false;
      // });
      // });
</script>
