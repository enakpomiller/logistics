



<br>
<style>
#a:hover{
  background:red;
  color:red;
}
#a{
  background:sandybrown;
  padding:10px 15px;
}
.active{
 background: : green;
}
</style>
<div class="container">
  <h2><?=$title?></h2>
  <br>
  <!-- Nav pills -->
  <ul class="nav nav-pills" role="tablist">
    <li class="nav-item">
      <a class="nav-link active"  data-toggle="pill" href="#home" id="a">View Comment</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu1" id="a">Menu 1</a>
    </li>
    <li class="nav-item">
      <a class="nav-link" data-toggle="pill" href="#menu2" id="a">Menu 2</a>
    </li>
  </ul>

  <!-- Tab panes -->
  <div class="tab-content">
    <div id="home" class="container tab-pane"><br>
      <h3>FAQ</h3>



    </div>
    <div id="menu1" class="container tab-pane fade"><br>
      <h3>Menu 1</h3>
      <p>Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat.</p>
    </div>
    <div id="menu2" class="container tab-pane fade"><br>
      <h3>Menu 2</h3>
      <p>Sed ut perspiciatis unde omnis iste natus error sit voluptatem accusantium doloremque laudantium, totam rem aperiam.</p>
    </div>
  </div>
</div>






<?php $counter =1;?>
<table class="table table-striped">
  <tr>
    <th> s/n </th>
    <th> Product name </th>
    <th> CUstomer name </th>
    <th> Date </th>
    <th> Action </th>
  </tr>
  <?php if(!empty($comment)):?>
  <?php foreach($comment as $row):?>
     <tr>
      <td><?=$counter++?></td>
       <td><?=$row->prod_title?></td>
       <td> <?=$row->name?></td>
       <td> <?=$row->date?>
       <td>
        <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?=$row->id?>" style="margin: 10px;"><i class="fa fa-book"></i> </a>
        <a href="<?=base_url('admin/DeleteComment/'.$row->id)?>" class="btn btn-danger" onclick="return confirm('YOU WANT TO DELETE THIS RECORD');" title="Delete Record"><i class="fa fa-trash"></i>
         </td>
     </tr>
     <!-- Large modal -->
         <div class="modal fade" id="exampleModal<?=$row->id?>" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true" style="width: 100%;">
           <div class="modal-dialog modal-dialog-centered" role="document">
             <div class="modal-content">
               <div class="modal-header">
                 <h5 class="modal-title" id="exampleModalLongTitle"><label> <?=$title?> </label></h5>
                 <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                   <span aria-hidden="true">&times;</span>
                 </button>
               </div>
               <div class="modal-body">
             <form action="<?=base_url('admin/allprofile')?>" method="POST">
              <center align="justify" style="padding:10px 10px;">
                <center>
              <img src="<?=base_url('uploads/'.$row->userfile)?>" style="width:30%;height:120%;"><br>
              <?=$row->prod_title?>
                 </center>
              <?=$row->body?>
            </center>
               </div>
               <div class="modal-footer">
                 <button type="button"  class="btn btn-secondary" data-dismiss="modal">Close</button>
               <input  type="submit" id="btn-submit" class="btn btn-primary" value="save changes">
                   </form>
               </div>

             </div>
           </div>
         </div>
       <!-- end of modal -->
     <?php endforeach;?>
     <?php endif;?>
</table>
<p><?php echo $links; ?></p>
