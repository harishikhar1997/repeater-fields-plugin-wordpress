<div id="defaultOpen">

<form method="post" id="update-form1" enctype="multipart/form-data">
  <?php $options = get_option('TitleMain') ?>
  <hr>
  <!-- <button type="button" id="remove-button" onclick="removeRows()">Remove Selected Rows</button> -->
  <?php $selcnt = get_option('selectType');
        $cnt = count($selcnt);$rep=0;
        for($i=0;$i<$cnt;$i++)
        {
          if($selcnt[$i]=='image')
          {
            $rep++;
          }
        }
        $rep1=$rep;
  ?>
    <table class="form-table" width="100%" >
    <tbody>
    <?php $i=1;
    $j=1;
     if ( $options ) :
    foreach ( $options as $key=> $option ) {
      //print_r($options[2]['title']);die();
    ?>
    <tr>
    

      <td><label class="heading">Field<?=  $i?>:</label></td>
      
      <td width="15%">
       <!--  <label class="heading">Title</label> -->
        <input type="text" style="border: none transparent;outline: none;font-weight: bold;" class="head" placeholder="Title" name="TitleItem[]" value="<?php echo esc_attr( $option['title'] ); ?>" readonly />
      </td>


       <td>
        <input type="hidden" name="key[]" title="key" value="<?php echo esc_attr( $option['key'] ); ?>">
      </td>
      
      <!-- <td><label>Description<?=  $i?>:</label></td> -->
    <?php if($option['select']=='text') {?>
      <td width="15%">
        <input type="text" class="subhead" name="TitleDescription[]" value="<?php echo esc_attr(trim( $option['des'] )," " ); ?>" />
      </td>

        <?php } else if($option['select']=='textarea' || $option['select']=='quote'){?>
      <td width="70%">
        <textarea placeholder="Description" class="subhead" cols="55" rows="5" name="TitleDescription[]"> <?php echo esc_attr(trim( $option['des'] )," " ); ?>
        </textarea>
      </td>
      
      <?php } else if($option['select']=='image'){?>

    <td>
      <label for="upload_image">
      <input type="text" class="subhead" id="img<?=$j?>" name="TitleDescription[]" value="<?php echo esc_attr( $option['des'] ); ?>" /> 
      <input class="upload_image_button" id="<?=$j?>" onclick="addimg(<?php echo $rep1 ?>)" type="button" value="Upload Image" />
      <br/ >Enter a URL or upload an image
      </label>
<!--       <input type='button' id='hideshow' value='hide/show'>
      <div class="show-preview" id="<?=$j?>">
        <img style="max-width:450px;max-height:450px;" src="<?php echo esc_attr( $option['des'] ); ?>" id="image1">
      </div> -->
    
    </td>


      <?php 
      $j=$j+1;
    }?>
      
      <td>
      <span class="notice-shortcode"><b><?php echo '[myshortCode key='.'"'.$option['key'].'"'.']'; ?></b>
        </span>
      </td>
   
  </tr>
    <?php $i++;
    }?>

  <?php endif;?>

  </tbody>

</table>
<button type="button" id="update-button" onclick="updateData1()">Save Data</button>


</form>

</div>