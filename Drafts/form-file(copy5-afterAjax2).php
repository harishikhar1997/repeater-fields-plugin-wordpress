<?php
  if($_POST){
    $st=$_POST['selectType'];
    array_pop($st);
    $st2=get_option('selectType');

    $st5=array_filter($st);
    $st6=array_filter($st2);

    $st3=array_merge($st6,$st5);
    //print_r($st);die();
    update_option('selectType',$st3);
    $st4=get_option('selectType');
    
   // print_r($st2);die();

    $title=get_option('TitleItem');
    $t=$_POST['TitleItem'];

    $t1=array_filter( $title );
    $t2=array_filter( $t );

    $newTitle=array_merge($t1,$t2);

    update_option('TitleItem',$newTitle);

    $newVal=get_option('TitleItem');
    print_r($t);die();



    $description=get_option('TitleDescription');
    $d=$_POST['TitleDescription'];

    $d1=array_filter( $description );
    //print_r($d1);die();
    $d2=array_filter( $d );
    //print_r($d2);die();

    $newdes=array_merge($d1,$d2);

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
           'select'=>$st4[$i]
            
        );
    }
  

  //print_r($mainArr);die();
  
  update_option('TitleMain',$mainArr);
  }

?>



<div class="tab">
  <button class="tablinks" onclick="openCity(event, 'London')" id="defaultOpen">Add Custom Fields</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')" >List All Custom Fields</button>
</div>



<div id="Paris" class="tabcontent">
  <h3>Listing and Editing Tab</h3>
  <p>Listing all the custom Fields</p> 

<form method="post" id="update-form">
  <?php $options = get_option('TitleMain') ?>
    <table class="form-table" width="100%" >
    <tbody>
    <?php $i=1;
     if ( $options ) :
    foreach ( $options as $key=> $option ) {
       //print_r($option);die();
    ?>
    <tr>
      <td><label>Field<?=  $i?>:</label></td>
      <td width="15%">
        <input type="text" class="head" placeholder="Title" name="TitleItem[]" value="<?php echo esc_attr( $option['title'] ); ?>" />
      </td> 
      
      <!-- <td><label>Description<?=  $i?>:</label></td> -->
    <?php if($option['select']=='text' || $option['select']=='') {?>
      <td width="15%">
        <input type="text" class="subhead" name="TitleDescription[]" value="<?php echo esc_attr( $option['des'] ); ?>" />
      </td>

        <?php } else if($option['select']=='textarea'){?>
      <td width="70%">
        <textarea placeholder="Description" class="subhead" cols="55" rows="5" name="TitleDescription[]"> <?php echo esc_attr( $option['des'] ); ?>
        </textarea>
      </td>
      
      <?php }?>
      <td width="15%"><a class="button remove-row" onclick="remove(<?php echo $key?>)" href="#1">Remove</a></td>
   
    </tr>
    <?php $i++;
    }?>

  </tbody>

</table>
<button type="button" id="update-button" onclick="updateData()">Edit Data</button>
<?php // submit_button(); ?>
</form>

</div>



<div id="London" class="tabcontent">
  <h3>Add Fields Tab</h3>
  <p>Add custom Fields</p>


<form method="POST">
  <?php settings_fields( 'myoption-group' );
        do_settings_sections( 'myoption-group' ); 

      //  $options = get_option('TitleMain');

        // print_r($options);die();
  ?>
  <table class="form-table" id="repeatable-fieldset-one" width="100%" rules="rows">
    <tbody>
    <?php
    //  if ( $options ) :
    // foreach ( $options as $option ) {
      // print_r($option);die();
    ?>
   
    <?php
    //}
   // else :
    // show a blank one
    ?>
    <tr>
      <td><label>Title:</label></td>
      <td> 
        <input type="text" class="head" placeholder="Title" title="Title" name="TitleItem[]" />
      </td>
      <td><label>Description:</label></td> 
      <td> 

          <textarea class="subhead" placeholder="Description" name="TitleDescription[]" cols="55" rows="5">  </textarea>
      </td>
      <td>
        <select name="selectType[]">
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
        </select>
      </td>

      <td><a class="button cmb-remove-row-button button-disabled" href="#">Remove</a></td>
      
    </tr>
    <?php  endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
      <td><label>Title:</label></td>
      <td>
        <input type="text" class="head" placeholder="Title" name="TitleItem[]"/></td>
      
      <td><label>Description:</label></td>
      <td>
          <textarea class="subhead" placeholder="Description" cols="55" rows="5" name="TitleDescription[]"></textarea>
      </td>

      <td>
        <select name="selectType[]">
          <option value="text">Text</option>
          <option value="textarea">Textarea</option>
        </select>
      </td>


      <td><a class="button remove-row" href="#">Remove</a></td>
     
    </tr>
  </tbody>
</table>
<p><a id="add-row" class="button" href="#">Add Field</a></p>
  
  <?php submit_button(); ?>
</form>

</div>