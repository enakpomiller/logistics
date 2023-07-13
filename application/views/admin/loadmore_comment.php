




  <?php foreach($loadcomment as $loadmore){?>
        <tr>
          <th scope="row">
              <div class="form-check">
                    <input class="form-check-input" type="checkbox"
                      name="checkAll" value="option1">
                     
              </div>
          </th>
            <td><?=$loadmore->prod_title?></td>
            <td><?=$loadmore->name?></td>
            <td><?=$loadmore->date?></td>
            <td style="float:right;">
              <a href="<?=base_url('admin/deletecomment/'.$loadmore->id)?>" class="btn btn-danger" onclick="return confirm('YOU WANT TO DELETE THIS RECORD');"><i class="fa fa-trash"></i></a>
              <a href="" class="btn btn-warning" data-toggle="modal" data-target="#exampleModal<?=$row->id?>" style="margin: 10px;"><i class="fa fa-book"></i> </a>
          </td>
        </tr>


 <?php  }?>


