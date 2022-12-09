<!--
Author: W3layouts
Author URL: http://w3layouts.com
License: Creative Commons Attribution 3.0 Unported
License URL: http://creativecommons.org/licenses/by/3.0/
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
		<!--//webfonts-->
</head>
<body>

				 <!-----start-main---->

		<div class="login-form">
			 <a href="<?=base_url('admin/seller_reg')?>"> <p style="position:relative;top:20px;left:80%;"> Sign Up </p> </a>
			 <form action="<?=base_url('admin/adminlogin')?>" method="POST" class="form_submit">
		    <center style="margin:10px 10px;">
					<?=$this->session->flashdata('error')?> <br>
					<?php if($this->session->flashdata('msg')){?>
					 <?=$this->session->flashdata('msg')?>
					 <?php }?>
				</center>
					<li>
						<input type="text" name="username" required class="text" placeholder="USERNAME"><a href="#" class=" icon user"></a>
					</li>
					<li>
						<input type="password" name="password" required placeholder="Password"><a href="#" class=" icon lock"></a>
					</li>
					<div class="p-container">
							 <input type="submit"  value="LOGIN">
								</form>
					</div>


			</div>


				<!-----//end-copyright---->

</body>
</html>
