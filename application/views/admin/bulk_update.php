



<div class="page-container" style="height:1000px;">


<!-- start search menu-->
			 <div class="inner-block">
            <div class="chit-chat-layer1">
              	<div class="col-md-6 chit-chat-layer1-left">
									<?php echo $this->session->flashdata('prod_updated');?>
                     <div class="work-progres">
                          <div class="chit-chat-heading">
                                <center>
																	 <?=$title?>
																	 <?=$csv_insert?>
																  </center>
                            </div>
              	      <form method="post" action="<?= base_url('admin/import_csv') ?>" enctype="multipart/form-data">
                        <div class="table-responsive">
                           <div class="form-group">
                               <a href="<?=base_url('admin/download_to_csv')?>" class="btn btn-primary" style="font-size: 14px; padding: 10px 10px;">DOWNLOAD EXCEL TEMPLATE </a>
                           </div>
                          <div class="form-group pt-5">
                            	<input name="csvFile" required required style=" width:510px;position:relative;right:15px;" type="file" class="form-control" accept=".csv" required>
                          </div>
                          <div class="btn-group">
                            <button class="btn btn-primary"> submit </button>
                          </div>
                  </div>
             </div>
         </div>
</form>
     <div class="clearfix"> </div>
</div>






</div>
</div>









<!-- script for multiple delete -->
 <!-- <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css" />
 <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script> -->

<!-- sweet alert -->
 <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
