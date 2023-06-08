
  <script src="<?=base_url()?>assets/ckeditor_4.14.0_standard/ckeditor/ckeditor.js"></script>
  <!-- date picker cdn -->
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/flatpickr/dist/flatpickr.min.css">

<style>

.bg{
    background: url("<?=base_url('assets/images/banner1-1.jpg')?>");
    height: 200px;
    padding: 0px;
   background:#000000;
    opacity:0.6;
}
.font{
    font-family:sans-serif;
    text-transform: uppercase;
    text-align: center;
}

.grid-container {
  display: grid;
  height: 400px;
  align-content: center;
  grid-template-columns: auto auto auto;
  grid-gap: 10px;
  background-color: #2196F3;
  padding: 10px;
}

.grid-container > div {
  background-color: rgba(255, 255, 255, 0.8);
  text-align: center;
  padding: 20px 0;
  font-size: 30px;
}


.input_hide{
  border: 0px solid red;
}

.line_remove{
    border-top : 0px;
    border-left: 0px;
    border-right:0px;

</style>


   <style>

@media screen and (min-width: 600px) {
  div.warehouse {
    width: 100%;
    padding: 100px;
    height:65%;
    top:10px;
   position: relative;
  }
    div.righthouse{
    float: right;
  /*  background: #ff00ff;*/
    width: 50%;
    padding: 20px;
    height: 300px;
    position: relative;
    bottom: 100px;
    left: 20px;
 }
 div.lefthouse{
    float: left;
   /* background: #ff0000;*/
    width: 50%;
    padding: 20px;
    height: 300px;
    position: relative;
    bottom: 100px;
    right: 70px;
 }

}

@media screen and (max-width: 600px) {
   div.warehouse {
/*    background: grey;*/
    margin: auto;
    width: 80%;
    padding: 100px;
    display: flex;
    overflow: auto;

  }
    div.righthouse{
    float: right;
/*    background: #ff00ff;*/
    width: 100%;
    padding: 20px;
    height: 250px;
    position: relative;
    bottom: 350px;
    left: 100px;
 }
 div.lefthouse{
    float: left;
/*    background: #ff0000;*/
    width: 100%;
    padding: 20px;
    height: 250px;
    position: relative;
    bottom: 100px;
    right: 100px;

 }


}

/* For width 400px and larger: */
@media only screen and (min-width: 400px) {
  img {

  }
}
   </style>





<!-- tracking section -->
 <section class="shipment-w3ls" style="margin-top:100px;">
    <div class="text-center">
          <div class="container">
              <div class="row w-50" style="margin-top:40px;">
                <div class="col-md-6">
                   <img src="<?=base_url('uploads/'.$result->userfile)?>" style="width:90%;height:45%;position: relative;left:30px;">
                   <center><label style="margin:10px 10px;font-family:ariel;font-size:20px"><?=($result->prod_name)?></label></center>
                   <center><label style="padding:10px;font-family:ariel;font-size:2em"><?= " &#x20A6;".($result->prod_price)?></label></center>
                </div>

                <div class="col-md-6">
                <form  method="POST">
                    <div class="form-group">
                      <input type="hidden" name="prod_id" id="prod_id" id="prod_id" value="<?=$result->id?>">
                      <input type="text" required class="form-control line_remove" name="prod_title" id="prod_title"  value="<?=$result->prod_name?>" readonly>
                    </div>
                    <div class="form-group">
                      <label style="color:red;"> <?=form_error('name')?></label>
                      <input type="text"  name="name" id="name" class="form-control line_remove" value="<?=set_value('name')?>"  id="name" placeholder=" Your name ">
                    </div>
                    <div class="form-group">
                         <label style="color:red;"> <?=form_error('content')?></label>
                         <textarea  name="content" id="content" rows="10" cols="75"></textarea> 
                    </div>
                    <div class="form-group">
                        <input type="hidden"  name="userfile" id="userfile" id="userfile" value="<?=$result->userfile?>">
                    </div>
                    <div class="form-group">
                      <label style="color:red;"> <?=form_error('date')?></label>
                      <input type="text"  placeholder="select date " name="date" id="pickadateandtime" class="form-control line_remove" value="<?=set_value('date')?>">
                    </div>
                    <div class="form-group">
                        <button class="btn"   style="width:100%;background:sandybrown;" id="btnsubmit">Submit</button>
                    </div>
                 </form>  
              </div>
          </div>
      </div>
   </div>
</section>

<!-- date picker script  -->
<script src="https://code.jquery.com/jquery-3.3.1.min.js"></script>
<script src="https://cdn.jsdelivr.net/npm/flatpickr"></script>


<script> 
$("#pickadate").flatpickr();
$("#pickadateandtime").flatpickr({enableTime: true,dateFormat: "Y-m-d H:i"});
</script>
<!-- end date picker --> 

 <script type="text/javascript">
    // CKEDITOR.replace('editor',{
    //   width: "100%",
    //   height: "140px"

    // });
     //CKEDITOR.replace('content');
</script>


<script>
  $(document).ready(function() {
    $('#btnsubmit').on('click', function(e) {
      e.preventDefault();
      var prod_id = $('#prod_id').val();
      var prod_title = $('#prod_title').val();
      var name = $('#name').val();
      var content = $('#content').val();
      var userfile = $('#userfile').val();
      var date = $('#pickadateandtime').val();
      if(prod_id!="" && prod_title!="" && name!="" && content!="" && userfile!="" && date!=""){
        $("#butsave").attr("disabled", "disabled");
        $.ajax({
          url: "<?php echo base_url("users/comment");?>",
          type: "POST",
          data: {
            type: 1,
            prod_id: prod_id,
            prod_title: prod_title,
            name: name,
            content: content,
            userfile: userfile,
            date: date
          },
          cache: false,
          success: function(dataResult){
            $('#btnsubmit').html(`<i class="ti ti-filter text-white me-1 fs-5"></i> Filter`);
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              swal.fire('success','  Comment On Product Sent Successfully ','success');
              $("#butsave").removeAttr("disabled");
              $('#fupForm').find('input:text').val('');
              $("#success").show();
              $('#success').html('Data added successfully !'); 						
            }
            else if(dataResult.statusCode==201){
              alert("Error occured !");
            }
            
          }
        });
      }
      else{
        $('#btnsubmit').html(`<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span>Loading...`)
        swal.fire('warning',' please fill all entries ','warning');
      }
    });
  });
</script>







