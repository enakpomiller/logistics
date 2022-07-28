


<!--- admin footer -->

<div class="copyrights">
 <p>© 2016 Shoppy. All Rights Reserved | Design by  <a href="http://w3layouts.com/" target="_blank"> m=tech</a> </p>
</div>
<!--COPY rights end here-->
</div>
</div>
<!--slider menu-->
   <?php if($this->session->userdata('logged_in')===TRUE && ($this->session->usertype=="admin")):?>
  <div class="sidebar-menu">
      <div class="logo"> <a href="#" class="sidebar-icon"> <span class="fa fa-bars"></span> </a> <a href="#"> <span id="logo" ></span>
          <!--<img id="logo" src="" alt="Logo"/>-->
      </a> </div>
      <div class="menu">
        <ul id="menu" >
          <li id="menu-home" ><a href="<?=base_url('admin/index')?>"><i class="fa fa-tachometer"></i><span>Dashboard</span></a></li>
          <li><a href="#"><i class="fa fa-cogs"></i><span>Upload</span><span class="fa fa-angle-right" style="float: right"></span></a>
            <ul>
              <li><a href="<?=base_url('admin/InsertCountry')?>">Country</a></li>
              <li><a href="<?=base_url('admin/product')?>">Products</a></li>
            </ul>
          </li>
          <li id="menu-comunicacao" ><a href="#"><i class="fa fa-book nav_icon"></i><span>User Management</span><span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-comunicacao-sub" >
              <li id="menu-mensagens" style="width: 120px" ><a href="<?=base_url('admin/userprofile')?>"> All Cart</a>
              </li>
              <li id="menu-arquivos" ><a href="<?=base_url('admin/activeuserscart')?>">Active  Cart</a></li>
              <li id="menu-arquivos" ><a href="icons.html">Icons</a></li>
            </ul>
          </li>
            <li><a href="<?=base_url('admin/update_shipping')?>"><i class="fa fa-map-marker"></i><span> Shipment </span></a></li>
          <li id="menu-academico" ><a href="<?=base_url('admin/allprofile')?>"><i class="fa fa-file-text"></i><span>All profile</span><span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub">
               <!-- <li id="menu-academico-boletim" ><a href="login.html">Login</a></li>
              <li id="menu-academico-avaliacoes" ><a href="signup.html">Sign Up</a></li> -->
            </ul>
          </li>

          <li><a href="<?=base_url('admin/search_user')?>"><i class="fa fa-search"></i><span>Search User</span></a></li>
          <li><a href="<?=base_url('admin/viewcomment')?>"><i class="fa fa-envelope"></i><span>View Comment</span><span class="fa fa-angle-right" style="float: right"></span></a>

          </li>
           <li><a href="#"><i class="fa fa-cog"></i><span>System</span><span class="fa fa-angle-right" style="float: right"></span></a>
             <ul id="menu-academico-sub" >
                <li id="menu-academico-avaliacoes" ><a href="404.html">404</a></li>
                <li id="menu-academico-boletim" ><a href="blank.html">Blank</a></li>
               </ul>
           </li>
           <li><a href="#"><i class="fa fa-shopping-cart"></i><span>E-Commerce</span><span class="fa fa-angle-right" style="float: right"></span></a>
            <ul id="menu-academico-sub" >
                <li id="menu-academico-avaliacoes" ><a href="product.html">Product</a></li>
                <li id="menu-academico-boletim" ><a href="price.html">Price</a></li>
               </ul>
           </li>
        </ul>
      </div>
 </div>



<?php else:?>
 <!-- sellers menu -->
<div class="sidebar-menu text-center" style=" height:120%;">
  <img src="<?=base_url()?>assets/admin_uploads/<?=$this->session->userfile?>" style="position:relative;width:70px;height:70px;border-radius:50%;top:20px;"> <br>
  <div class="text-center" style="position:relative;top:30px;"><?=$this->session->firstname?> <?=$this->session->othernames?> </div>
    <div class="menu">
     <ul id="menu" class="float:right">
      <li><span class="text-center"><a href="<?=base_url('admin/multiple_upload')?>" style="color:white;text-decoration:none;"><i class="fa fa-th"> &nbsp; New Product </i></a></span></li>
      <li><span class="text-center"><a href="<?=base_url('admin/view_seller_prod')?>" style="color:white;text-decoration:none;"><i class="fa fa-th"> &nbsp; View Product </i> </a></span></li>
      <li><span class="text-center"><a href="<?=base_url('admin/update_seller')?>" style="color:white;text-decoration:none;"><i class="fa fa-th"> &nbsp; seller profile</i> </a></span></li>
      <li><span class="text-center"><a href="" style="color:white;text-decoration:none;"><i class="fa fa-th"> &nbsp; Delete Product </i></a></span> </li>
      <li><span class="text-center"><a href="<?=base_url('admin/change_pass')?>" style="color:white;text-decoration:none;"><i class="fa fa-th"> &nbsp; Change User </i></a></span></li>
      <li><span class="text-center"><a href="<?=base_url('admin/bulk_update')?>" style="color:white;text-decoration:none;"><i class="fa fa-th">  &nbsp; Upload/Excel </i></a></span></li>
    </ul>
  </div>
</div>

<?php endif;?>




<div class="clearfix"> </div>
</div>
<!--slide bar menu end here-->
<script>
var toggle = true;

$(".sidebar-icon").click(function() {
if (toggle)
{
  $(".page-container").addClass("sidebar-collapsed").removeClass("sidebar-collapsed-back");
  $("#menu span").css({"position":"absolute"});
}
else
{
  $(".page-container").removeClass("sidebar-collapsed").addClass("sidebar-collapsed-back");
  setTimeout(function() {
    $("#menu span").css({"position":"relative"});
  }, 400);
}
              toggle = !toggle;
          });
</script>


<!--scrolling js-->
  <script src="<?=base_url()?>assets/admin/js/jquery.nicescroll.js"></script>
  <script src="<?=base_url()?>assets/admin/js/scripts.js"></script>
  <!--//scrolling js-->
<script src="<?=base_url()?>assets/admin/js/bootstrap.js"> </script>
<!-- mother grid end here-->


<div id = "v-w3layouts"></div><script>(function(v,d,o,ai){ai=d.createElement('script');ai.defer=true;ai.async=true;ai.src=v.location.protocol+o;d.head.appendChild(ai);})(window, document, '../../../../../a.vdo.ai/core/v-w3layouts/vdo.ai.js');</script>
</body>

<!-- Mirrored from p.w3layouts.com/demos/28-03-2016/shoppy/web/index.html by HTTrack Website Copier/3.x [XR&CO'2014], Wed, 25 Aug 2021 23:39:36 GMT -->
</html>
