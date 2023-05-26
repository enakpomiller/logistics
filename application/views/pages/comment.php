
  <script src="<?=base_url()?>assets/ckeditor_4.14.0_standard/ckeditor/ckeditor.js"></script>

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

<!-- <section class="inner-w3ls">
    <div class="container">
        <h2 class="text-center w3layouts w3 w3l agileits agileinfo">Track Your Product</h2>
        <p class="text-center w3layouts w3 w3l agileits agileinfo">Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industry's standard dummy text.</p>
    </div>
</section> -->
<!-- /banner section -->


<!-- tracking section -->
    <section class="shipment-w3ls" style="margin-top:100px;">
          <!-- <div class="container">
              <i class="fa fa-braille" aria-hidden="true"></i>
              <h3 class="text-center wthree w3-agileits agileits-w3layouts agile w3-agile"> Comment section </h>
          </div> -->
          <div class="container" >
              <div class="content-w3ls" style="height:90%;background:white;">
                <!-- <div class="content1-w3ls"></div> -->

                <div class="warehouse">

                    <div class="lefthouse" style="font-family:sans-serif">
                      <img src="<?=base_url('uploads/'.$result->userfile)?>" style="width:90%;height:120%;position: relative;left:30px;">
                        <center><label style="margin:10px 10px;font-family:ariel;font-size:20px"><?=($result->prod_name)?></label></center>
                        <center><label style="padding:10px;font-family:ariel;font-size:2em"><?= " &#x20A6;".($result->prod_price)?></label></center>
                      </div>

                  <form   action="<?php //echo base_url("Users/comment/$result->id");?>" method="POST">
                  <div class="righthouse">
                       <div class="form-group" style="position: relative;top: ;">
                        <input type="hidden" name="prod_id" id="prod_id" value="<?=$result->id?>">
                         <input type="text" required class="form-control line_remove" id="prod_title" name="prod_title" value="<?=$result->prod_name?>" readonly>
                         </div>
                        <div class="form-group">
                         <label style="color:red;"> <?=form_error('name')?></label>
                           <input type="text" class="form-control line_remove" value="<?=set_value('name')?>" name="name" id="name" placeholder=" Your name ">
                         </div>

                      <div class="form-group">
                        <label style="color:red;"> <?=form_error('body')?></label>
                        <textarea name="body" id="body"  value="<?=set_value('body')?>" id="body"></textarea>
                     </div>
                       <input type="hidden" name="userfile" value="<?=$result->userfile?>">
                     <div class="form-group">
                      <label style="color:red;"> <?=form_error('date')?></label>
                         <input type="date"  class="form-control line_remove" value="<?=set_value('date')?>" name="date" id="date">
                      </div>
                        <div class="form-group">
                         <button class="btn"  style="width:100%;background:sandybrown;" id="submit">Submit</button>
                     </div>
                   </div>
                    </form>
                </div>
        </div>

                  <!-- <table class="table table-bordered"  style="width:90%;margin:auto;">
                      <tr>
                        <th class="text-center text-primary"> CUSTOMER NAME</th>
                        <th class="text-center text-primary"> COMMENT</th>
                        <TH class="text-center text-primary"> DATE </TH>
                      </tr>
                      <?php /*foreach($getcomment as $comment){?>
                        <tr>
                          <td class="text-center"> <?=$comment->name?> </td>
                          <td class="text-center"> <?=$comment->body?> </td>
                          <td class="text-center"> <?=$comment->date?> </td>
                        </tr>
                        <?php
                        }*/
                        ?>
                  </table> -->


    </div>

</section>


 <script type="text/javascript">
    CKEDITOR.replace('body',{
      width: "100%",
      height: "140px"

    });

</script>


<script>

$('#submit').on('click', function() {
      var prod_id = $('#prod_id').val();
      var prod_title = $('#prod_title').val();
      var name = $('#name').val();
      var body = $('#body').val();
      var userfile = $('#userfile').val();
      var date = $('#date').val();

      if(prod_id!="" && prod_title!="" && name!="" && body!="" && userfile!="" && date!=""){
        $.ajax({
          url:"<?php echo base_url(); ?>" + "Users/comment",
          type:"POST",
          data: {
            prod_id:prod_id,
            prod_title:prod_title,
            name: name,
            body:body,
            userfile:userfile,
            date:date
          },

           cache: false,
          success: function(dataResult){
            var dataResult = JSON.parse(dataResult);
            if(dataResult.statusCode==200){
              $("#butsave").removeAttr("disabled");
      				$('#fupForm').find('input:text').val('');
      				$("#success").show();
      				$('#success').html('Data added successfully !');
            }
            else if(dataResult.statusCode==201){
              // $("#error").show();
              // $('#error').html('Invalid EmailId or Password !');
              Swal.fire('Error!','cannot send!','error')

            }

          }
        });
      }
      else{
        	$('#success').html('Data added successfully !');
           alert("please fill the fields");
      }
     });

</script>


<!--
<script>
    $(document).ready(function() {

      $('#proceed').on('submit', function() {
        var prod_id = $('#prod_id').val();
        var prod_title = $('#prod_title').val();
        var name = $('#name').val();
        var body = $('#body').val();
        var date  = $('#date').val();
        if(prod_id!="" && prod_title!="" && name!="" && body!="" && date!=""){
          $("#proceed").attr("disabled", "disabled");
          $.ajax({
            // url: "<?php// echo base_url("Users/comment");?>",
            type: "POST",
            data: {
              type:1,
              prod_id: prod_id,
              prod_title: prod_title,
              name: name,
              body: body,
              date: date
            },
            // cache: false,
            success: function(dataResult){
              if(dataResult!=0){
                // $("#proceed").removeAttr("disabled");
                // $('#fupForm').find('input:text').val('');
                // $("#success").show();
                // $('#success').html('Data added successfully !');
                 alert("success");

              }
              else if(dataResult.statusCode==201){
                alert("Error occured !");
              }

            }
          });
        }
        else{
          alert('Please fill all the field !');
        }
      });
    });
</script>
-->
