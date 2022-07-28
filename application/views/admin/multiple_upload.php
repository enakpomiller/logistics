


<style>
.entry:not(:first-of-type)
{
    margin-top: 10px;
}
.glyphicon
{
    font-size: 12px;
}
</style>



<div class="advisors-area gray-bg pt-95 pb-70">
    <div class="container" style="margin-top:100px;margin-bottom:100px;">
        <div class="row">
              <span style="position:relative;left:10%;"> <?=$msg?> </span>
              <strong><?php if(isset($totalFiles)) echo "Successfully uploaded ".count($totalFiles)." files"; ?></strong>

            <div class="col-xl-7 col-lg-8 col-md-10 offset-md-1 ml-md-auto">
                <div class="events-details-form faq-area-form mb-30 p-0">
                  <form method="post" action="<?=base_url('admin/multiple_upload')?>" enctype="multipart/form-data">
                      <div class="events-details-form faq-area-form mb-30 p-0">
                        <div class="form-group">
                            <input type="file" class="form-control" style="width:99%;" name="files[]" multiple/>
                        </div>
                        </div>
                          <div id="myRepeatingFields">
                            <div class="entry input-group col-xs-3">
                               <input class="form-control" style="position:relative;padding:25px;" required name="prod_name[]"  id="subject" type="text" value="<?=set_value('subject[]')?>" placeholder=" Enter Name" />&nbsp;
                               <input class="form-control"  style="position:relative;padding:25px;"  required name="prod_price[]"  id="grade" type="text" value="<?=set_value('grade[]')?>"  placeholder=" Enter Price" />&nbsp;
                               <input class="form-control" style="position:relative;padding:25px;"   required name="prod_brand[]"  id="score" type="text" value="<?=set_value('score[]')?>"  placeholder="Enter Brand" />&nbsp;

                                <span class="input-group-btn" style="position:relative;left:3%;top:0px;">
                                     <button type="button" class="btn btn-success btn-lg btn-add">
                                       <span class="glyphicon glyphicon-plus" aria-hidden="true"> </span>
                                    </button>
                                </span>
                            </div>
                        </div> &nbsp;
                        <div class="form-group">
                            <input class="form-control btn btn-primary" type="submit" style="width:40%;" name="fileSubmit" value="UPLOAD"/>
                        </div>
                    </form>
                </div>
            </div>

        </div>
    </div>
</div>





      <!-- <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous"> -->

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
 <script>
$(function()
{
    $(document).on('click', '.btn-add', function(e)
    {
        e.preventDefault();
        var controlForm = $('#myRepeatingFields:first'),
            currentEntry = $(this).parents('.entry:first'),
            newEntry = $(currentEntry.clone()).appendTo(controlForm);
        newEntry.find('input').val('');
        controlForm.find('.entry:not(:last) .btn-add')
            .removeClass('btn-add').addClass('btn-remove')
            .removeClass('btn-success').addClass('btn-danger')
            .html('');
    }).on('click', '.btn-remove', function(e)
    {
        e.preventDefault();
        $(this).parents('.entry:first').remove();
        return false;
    });
});
</script>
