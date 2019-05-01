<?php
  if($_POST){
    
    $key1=$_POST['key'];    
    array_pop($key1);
   // print_r($key1);die();
    $key2=get_option('Titlekey');

    
    $title=get_option('TitleItem');
    $t=$_POST['TitleItem'];
    array_pop($t);
    
    $cntt = count($t);

    for($f=0;$f<$cntt;$f++)
    {
      $str = strtolower($t[$f]);
      $str2 = preg_replace('/\s+/', '_', $str);

      $key1[$f] = 'hr'."_".$str2."_".rand(0,999);
    } 
    //print_r($key1);die();
    // $t1=array_filter( $title );
    // $t2=array_filter( $t );
    $newTitle=array_merge($title,$t);
    //print_r($title);die();
    update_option('TitleItem',$newTitle);
    $newVal=get_option('TitleItem');


    
    $key3=array_merge($key2,$key1);
    update_option('Titlekey',$key3);
    $key4=get_option('Titlekey');


    $st=$_POST['selectType'];
    array_pop($st);
    $st2=get_option('selectType');
    // $st5=array_filter($st);
    // $st6=array_filter($st2);
    $st3=array_merge($st2,$st);
    //print_r($st);die();
    update_option('selectType',$st3);
    $st4=get_option('selectType');
    

    
    $description=get_option('TitleDescription');
    $d=$_POST['TitleDescription'];
    array_pop($d);
    //print_r($d);die();
    // $d1=array_filter( $description );
    // $d2=array_filter( $d );
    $newdes=array_merge($description,$d);
    //print_r($newdes);die();
    update_option('TitleDescription',$newdes);
    $newValD=get_option('TitleDescription');
    //print_r($newValD);die();



    ///Assuming check has not been placed on title and description..
    
    $c1=count($newVal);
    $c2=count($newValD);
    $mainArr=array();
    if($c1 != $c2){
    $max=$c1;
    if($c2>$max){$max=$c2;}
    }
    else{$max=$c1;}

    for($i=0;$i<$max;$i++)
    {
      $mainArr[]=array(
           'title' => $newVal[$i],
           'des' => empty($newValD[$i]) ? '' : $newValD[$i],
           'select'=>$st4[$i],
           'key' => empty($key4[$i]) ? '' : $key4[$i] 
        );
    }
  

  //print_r($mainArr);die();
  
  update_option('TitleMain',$mainArr);
}

?>



<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" >Add Custom Fields</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')" id="defaultOpen">Edit Custom Fields</button>
</div>



<div id="Paris" class="tabcontent">
  <h3>Editing Tab</h3>
  <p>Editing the custom Fields</p> 

<form method="post" id="update-form">
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
      <td><input name="checkbox" type="checkbox" value="<?php echo esc_attr( $option['key'] );?>"></td>

      <td><label class="heading">Field<?=  $i?>:</label></td>
      <td width="15%">
        <input type="text" class="head" placeholder="Title" name="TitleItem[]" value="<?php echo esc_attr( $option['title'] ); ?>" />
      </td>

<!--       <td>
      <span class="notice-shortcode"><b><?php echo '[myshortCode key='.'"'.$option['key'].'"'.']'; ?></b>
        </span>
      </td> -->

       <td>
        <input type="hidden" name="key[]" title="key" value="<?php echo esc_attr( $option['key'] ); ?>">
      </td>
      
      <!-- <td><label>Description<?=  $i?>:</label></td> -->
    <?php if($option['select']=='text') {?>
      <td width="15%">
        <input type="text" class="subhead" name="TitleDescription[]" readonly/>
      </td>

        <?php } else if($option['select']=='textarea' || $option['select']=='quote'){?>
      <td width="70%">
        <textarea placeholder="Description" class="subhead" cols="55" rows="5" name="TitleDescription[]" readonly>
        </textarea>
      </td>
      
      <?php } else if($option['select']=='image'){?>

    <td>
      <label for="upload_image">
      <input type="text" class="subhead" id="img<?=$j?>" name="TitleDescription[]" readonly /> 
      <input class="upload_image_button1" id="<?=$j?>" onclick="addimg(<?php echo $rep1 ?>)" type="button" value="Upload Image" />
      <br />Enter a URL or upload an image
      </label>
      <!-- <div id="show-preview">
         <a class="boxclose" id="boxclose"></a> 
        <img style="max-width:450px;max-height:450px;" src="<?php echo esc_attr( $option['des'] ); ?>" id="image1">
      </div> -->
    </td>
      <?php 
      $j=$j+1;
    }
    $a=$b=$c=$d='';

    if($option['select']=='text')
      $a="selected";
    else if($option['select']=='textarea')
      $b="selected";
    else if($option['select']=='image')
      $c="selected";
    else if($option['select']=='quote')
      $d="selected";
    ?>

      <td>
        <select name="selectType[]">
          <option value="text" <?php echo $a?> >Text</option>
          <option value="textarea" <?php echo $b?> >Textarea</option>
          <option value="image"<?php echo $c?> >Image</option>
          <option value="quote" <?php echo $d?> >Quote</option>
        </select>
      </td>

      
    <td width="15%"><a class="button remove-row" onclick="remove(<?php echo $key?>)" href="#1">Remove</a></td>
   
  </tr>
    <?php $i++;
    }?>

  </tbody>

</table>
<button type="button" id="update-button" onclick="updateData()">Update Fields</button>

<button type="button" id="remove-button" onclick="removeRows()">Remove Selected Fields</button>
<?php // submit_button(); ?>
</form>

</div>



<div id="London" class="tabcontent">
  <h3>Add Fields Tab</h3>
  <p>Add custom Fields</p>


<form method="POST" enctype="multipart/form-data">
  <?php settings_fields( 'myoption-group' );
        do_settings_sections( 'myoption-group' ); 

  ?>
  <table class="form-table" id="repeatable-fieldset-one" width="100%" rules="rows">
    <tbody>
    <?php
    //  if ( $options ) :
    // foreach ( $options as $option ) {
    ?>
   
    <?php
    //}
   // else :
    // show a blank one
    ?>
    <tr>
      <td><label>Title:</label></td>
      <td> 
        <input type="text" class="head1" placeholder="Title" title="Title" name="TitleItem[]" />
      </td>
      <!-- <td><label>Description:</label></td>  -->
      <td> 
          <textarea class="subhead" style="display: none;" placeholder="Description" name="TitleDescription[]" cols="55" rows="5">  </textarea>
      </td>
      <td>
        <select name="selectType[]">
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
          <option value="image">Image</option>
          <option value="quote">Quote</option>
        </select>
      </td>

      <td>
        <input type="hidden" name="key[]" title="key">
      </td>

      <td><a class="button cmb-remove-row-button button-disabled" href="#">Remove</a></td>
      
    </tr>
    <?php  endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
      <td><label>Title:</label></td>
      <td>
        <input type="text" class="head1" placeholder="Title" name="TitleItem[]"/></td>
      
     <!--  <td><label>Description:</label></td> -->
      <td>
          <textarea class="subhead" style="display: none;" placeholder="Description" cols="55" rows="5" name="TitleDescription[]"></textarea>
      </td>

      <td>
        <select name="selectType[]">
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
          <option value="image">Image</option>
          <option value="quote">Quote</option>
        </select>
      </td>

      <td>
        <input type="hidden" name="key[]" title="key">
      </td>

      <td><a class="button remove-row1" href="#">Remove</a></td>
     
    </tr>
  </tbody>
</table>
<p><a id="add-row" class="button" href="#">Add Field</a></p>
  
  <?php submit_button(); ?>
</form>

</div>