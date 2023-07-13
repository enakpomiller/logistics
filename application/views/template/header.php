<html>
<head>
<title> <?=$title?> </title>
<!-- datatable bootstrap -->
    <link rel="stylesheet" type="text/css" href="https://cdn.datatables.net/v/dt/dt-1.10.13/datatables.min.css"/>
		<!-- enddatatable bootstrap -->
<!--dropdwon for logout -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="stylesheet" href="https://www.w3schools.com/w3css/4/w3.css">
<!-- /banner section -->
<!-- wallet icons -->
<link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">


</head>
<!-- ajax -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.1/jquery.min.js"></script>
<!-- sweet alert -->
<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
<!-- for-mobile-apps -->
<meta name="viewport" content="width=device-width, initial-scale=1">
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="keywords" content="Courier Store Responsive web template, Bootstrap Web Templates, Flat Web Templates, Android Compatible web template,
Smartphone Compatible web template, free webdesigns for Nokia, Samsung, LG, SonyEricsson, Motorola web design" />
<script type="application/x-javascript"> addEventListener("load", function() { setTimeout(hideURLbar, 0); }, false);
		function hideURLbar(){ window.scrollTo(0,1); } </script>
<!-- css files -->
<link href="<?=base_url()?>assets/css/bootstrap.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url()?>assets/css/font-awesome.min.css" rel="stylesheet" type="text/css" media="all" />
<link href="<?=base_url()?>assets/css/style.css" rel="stylesheet" type="text/css" media="all" />
<!-- /css files -->
<!-- font files -->
<link href='<?=base_url()?>assets/cfonts.googleapis.com/css?family=Open+Sans:400,300,300italic,400italic,600,600italic,700italic,700,800,800italic' rel='stylesheet' type='text/css'>
<link href="<?=base_url()?>assets/fonts.googleapis.com/css?family=Exo+2:100,200,300,400,500,600,700,800,900" rel="stylesheet">
<!-- eternal css -->
<link href="<?=base_url()?>assets/css/stylesheet.css" rel="stylesheet" type="text/css">
<!-- Latest compiled and minified CSS -->
<!-- jQuery library -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<!-- Latest compiled JavaScript -->
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
<!-- /js files -->

<!-- colum cards -->
<!-- -->

</head>


<!-- navigation -->
<nav class="navbar navbar-default navbar-fixed-top" style="height:108px;">
  <div class="" style="background:sandybrown;padding:5px;">
  <marquee style="font-style:italic;color:white;"><blink> Check out our latest products and their prices, very much affordable...... </marquee></marquee>
  </div>
    <div class="container" style="position: relative;">
        <div class="navbar-header">
			<button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
				<span class="sr-only">Toggle navigation</span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
				<span class="icon-bar"></span>
			</button>
        </div>

	
       <div id="navbar" class="navbar-collapse collapse">
	   
			  <ul class="nav navbar-nav navbar-right ">
				   <li class="<?=($this->uri->uri_string()==='users')?'active':''?>" style="margin-top:13px;right:30px;"> <a href="<?=base_url()?>users/">Home</a></li>

    				<!-- <li class="<?=($this->uri->uri_string()=='users/about')?'active':''?>" ><a href="<?=base_url()?>users/about/">About</a></li>
    				<li class="<?=($this->uri->uri_string()=='users/services')?'active':''?>" ><a href="<?=base_url()?>users/services">Services</a></li>
    				<li class="<?=($this->uri->uri_string()=='users/ourwork')?'active':''?>"><a href="<?=base_url()?>users/ourwork">Our Work</a></li>
    				<li class="<?=($this->uri->uri_string()=='users/process')?'active':''?>"><a href="<?=base_url()?>users/process">Process</a></li>
    				<li class="<?=($this->uri->uri_string()=='users/contact')?'active':''?>" ><a href="<?=base_url()?>users/contact">Contact</a></li>  -->
         <!-- cart logo -->
         <li class="dropdown">
					<a href="#" class="dropdown-toggle"  data-toggle="dropdown" style="margin-top:13px;right:20px;"><i class="fa fa-truck" aria-hidden="true"></i> Tracking<b class="caret"></b></a>
					<div class="dropdown-menu" style="">

						<div class="track-w3ls">
							<h3>Enter Your Tracking Code</h3>
				        <?php if(($this->session->flashdata('error_tracking'))):?>
				    	     <center> <div class="alert alert-danger" style="width:70%"><?=$this->session->flashdata('error_tracking')?></div></center>
				         <?php endif;?>
							<form action="<?=base_url('users/trackshipment')?>" method="POST">
								<input type="text" name="trackcode"  autocomplete="off" placeholder="Enter Tracking Code" required />
								<button type="submit" class="btn btn-primary">Track</button>
							</form>
							<p class="track-p1">Contact Us :</p>
                         <input type="text" name="">
							<p class="track-p2"><a href="mailto:mail@example.com">mail@example.com</a></p>
						</div>
					</div>
				</li>

			  <?php if($this->session->userdata("logged_in")){ ?>
					<input type="text" name="search" id="search" placeholder=" enter product key word...." size="55px;" style="position:relative;top:10px;padding:10px;border-radius:3px;border:1px solid sandybrown;">
					<button  id="search_prod" style="position:relative;top:10px;padding:8px;background:sandybrown;border-radius:3px;border:0px solid red;"> SEARCH  </button>
			<?php }else{  ?>
			    <input type="text" name="search" id="search"  placeholder=" enter product key word...." size="55px;" style="position:relative;bottom:30px;padding:10px;border-radius:3px;border:1px solid sandybrown;">
				<button style="position:relative;bottom:30px;padding:8px;background:sandybrown;border-radius:3px;border:0px solid red;" onclick="revenue_request()"> SEARCHx  </button>
		 <?php } ?> 

		   <li class="<?=($this->uri->uri_string()==='login/login_user')?'active':''?>" style="margin-top:13px;right:20px;">
			<a  href="<?=base_url('login/login_user')?>">
            Login<b class="caret"></b></a>

				<!-- <!-- 	<a href="" class="dropdown-toggle" data-toggle="dropdown"><i class="fa fa-lock" aria-hidden="true"></i> Login<b class="caret"></b></a>
				<!-- 	<div class="dropdown-menu">7
						<div class="login-w3ls">
							<h3>Login To Your Account</h3>
							<form action="<?=base_url('login/users_login')?>" method="post">
								<input type="email" name="email1" placeholder=" email" required />
								<input type="password" name='password' placeholder="Password" required>
								<input type="submit" name="submit" value="Continue">
							</form>
						</div>
					</div> -->
				</li>

				<li class="<?=($this->uri->uri_string()==='users/signup')?'active':''?>" style="margin-top:13px;right:20px;">
					<a href="<?=base_url('users/signup')?>">
						<i class="fa fa-truck" aria-hidden="true">
					 </i>Signup<b class="caret"></b></a>
				</li>
        <!--
						<li>
              <div class="w3-dropdown-hover">
					      <label>
					      <?php if($this->session->userdata('logged_in')):?>
						  <img src="<?=base_url()?>assets/uploads/<?=$this->session->userdata('image')?>" style="position:relative;width:50px;height:50px;left:20%;border-radius:50%;bottom:10px;"> <br>
						  <?=$this->session->userdata('name')?>
					         <?php endif;?>
					      </label>

					      <div class="w3-dropdown-content w3-bar-block w3-border" style="width:30px;">
					       <a href="#" class="w3-bar-item w3-button">  </a>
					   	   <a href="<?=base_url('login/logout')?>" class="w3-bar-item w3-button" onclick="return confirm('do you want to login out ?')" style="font-family: sans-serif;"> logout </a>
                     </div>
                   </div>

				</li> -->
	<style>
<style>
/* Style The Dropdown Button */
.dropbtn {
  background-color: #4CAF50;
  color: white;
  padding: 16px;
  font-size: 16px;
  border: none;
  cursor: pointer;
}

/* The container <div> - needed to position the dropdown content */
.dropdown {
  position: relative;
  display: inline-block;
}

/* Dropdown Content (Hidden by Default) */
.dropdown-content {
  display: none;
  position: absolute;
  background-color: #f9f9f9;
  min-width: 160px;
  box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
  z-index: 1;
}

/* Links inside the dropdown */
.dropdown-content a {
  color: black;
  padding: 12px 16px;
  text-decoration: none;
  display: block;
}

/* Change color of dropdown links on hover */
.dropdown-content a:hover {background-color: #f1f1f1;}

/* Show the dropdown menu on hover */
.dropdown:hover .dropdown-content {
  display: block;
}

/* Change the background color of the dropdown button when the dropdown content is shown */
.dropdown:hover .dropbtn {
  background-color: #3e8e41;
}


.dot{tive;
    position: relative;
    bottom: 60px;
		background: green;height: 10px;
		border: 1px solid yellow;
		font-weight: bolder;
		width: 13%;
		height: 14px;
		border-radius: 200px;
		margin-left: 90px;
		z-index: 1;
	}
	@media screen and (min-width: 600px) {
	div.cart{
		position:relative;
		width:50px;
		height:50px;
		left:110%;
		border-radius:50%;
		border: 1px solid #33accc;bottom:10px;
	  background: red;
	 }
	}
	@media screen and (max-width: 600px) {
		div.cart{
		position:relative;
		width:50px;
		height:50px;
		left:130%;
		border-radius:50%;
		border: 1px solid #33accc;top:7px;


	 }
	}

		@media screen and (min-width: 600px) {
			div.cart-icon{
				 position: relative;
				 font-size: 50px;
			}
			}
		@media screen and (max-width: 600px) {
				 div.cart-icon{
				 position: relative;
				 font-size: 50px;
			}
		   }
       #blink {
         font-size: 14px;
         font-weight: bold;
         color: #2d38be;
         transition: 0.5s;
     }
</style>

<!--
<div class="dropdown">
  <button class="dropbtn">Dropdown</button>
  <div class="dropdown-content">
    <a href="#">Link 1</a>
    <a href="#">Link 2</a>
    <a href="#">Link 3</a>
  </div>
</div>
	 -->


		 <label>
				<div class="dropdown" style="float:right;margin-top:20px;">
						 <?php if($this->session->userdata('logged_in')):?>
					      <a href="#"> <img src="<?=base_url()?>assets/uploads/<?=$this->session->userdata('image')?>" style="position:relative;width:50px;height:50px;left:50%;border-radius:50%;bottom:10px;"> <br>
                </a>
                   <p style="position:relative;bottom:55px;left:120px;" id="blink"> 
								Hi, 
								<?php
									if((date('H')>=18)){
										echo " good evening <br>".$this->session->userdata('name');
										}elseif(date('H')>=1){
										 echo "good morning <br>".$this->session->userdata('name');
										}elseif(data('H')>=13){
										  echo " good afternoon <br>".$this->session->userdata('name');
										}
									
									;?>
								</p>
								<div class="dot"></div>
						         <div class="dropdown" style="margin-left:80px;padding:10px;position:relative;bottom:40px;">
							  	     <div class="dropdown-content">
								         <h4 style="font-family:sans-serif;text-align:center;padding-top:20px;padding: 5px;color: deepskyblue;"><?=$this->session->userdata('name')?></h4>
								            <a href="#"><i class="fa fa-diamond"><?=$this->session->userdata('email')?></i></a>
							                <a href="#"><i class="fa fa-user"> Profile </i></a>
							             <a href="<?=base_url('users/product')?>"><i class="fa fa-cloud">View Product</i></a>
							         <a href="#"><i class="fa fa-smile-o"> Smile </i></a>
								    <a href="<?=base_url('login/logout')?>"  onclick="return confirm('do you want to log out ?')"><i class="fa fa-arrow-circle-left">logout </i></a>
								</div>
					  </div>
			  </div>

 				 <div class="dropdown">
					 <i class="fa fa-shopping-cart" class="dropbtn" style="position:relative;top:5px;font-size:43px;left: 20px;color: sandybrown;top:8px;top:20px;">
					 	<psan class="badge badge-light" style="position: relative;right: 40px;bottom: 8px;background:sandybrown;color:black;">
					 	    <?php $total_sum=0;?>
			         	<?php foreach($demo as $cart):?>
			         	<?php //$total_sum+=$cart->prod_quantity;?>
                <?php $total_sum+=$cart->quantity;?>
			         	<?php endforeach;?>
                 <?=$total_sum?>
					   </i>
					 </psan>

						  <div class="dropdown-content">
							  <a href="<?=base_url('users/checkout')?>"  data-toggle="modal"><i class="fa fa-car"></i> Checkout </a>
					     <a href="<?=base_url('users/viewcart')?>"  data-toggle="modal"><i class="fa fa-eye"></i> View Cart </a>
               <a href="<?=base_url('users/wallet')?>"  data-toggle="modal"> 	<i class="fas fa-wallet"></i> View wallet </a>
						  </div>
				</div>
				   </label>
					</div>
					</label>
         <?php else:?>
             <div id="navbar" class="navbar-collapse collapse" style="position:relative;bottom:8px;">
          			 <ul class="nav navbar-nav navbar-right ">
    				      <li class="<?=($this->uri->uri_string()=='users/about')?'active':''?>" ><a href="<?=base_url()?>users/about/">About</a></li>
                 	<li class="<?=($this->uri->uri_string()=='users/contact')?'active':''?>" ><a href="<?=base_url()?>users/contact">Contact</a></li>
                </ul>
             </div>
        <?php endif;?>

    </div>

</nav>



<script src="https://code.jquery.com/jquery-3.6.0.js" integrity="sha256-H+K7U5CnXl1h5ywQfKtSj8PCmoN9aaq30gDh27Xc0jk=" crossorigin="anonymous"></script>

<script type="text/javascript">
        var blink = document.getElementById('blink');
        setInterval(function() {
            blink.style.opacity = (blink.style.opacity == 0 ? 1 : 0);
        }, 1500);
    </script>
<!-- navigation -->

<!-- /contact section -->





<script type="text/javascript">

	function revenue_request(){
		var search = $('#search').val();
		consokle.log(search);
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
  