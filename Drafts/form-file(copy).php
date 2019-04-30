<?php
  if($_POST){
    $title=get_option('TitleItem');
    $t=$_POST['TitleItem'];

    $t1=array_filter( $title );
    $t2=array_filter( $t );

    $newTitle=array_merge($t1,$t2);

    update_option('TitleItem',$newTitle);

    $newVal=get_option('TitleItem');
    //print_r($newVal);die();



    $description=get_option('TitleDescription');
    $d=$_POST['TitleDescription'];

    $d1=array_filter( $description );

    $d2=array_filter( $d );

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
           'des' => empty($newValD[$i]) ? '' : $newValD[$i]
            
        );
    }
  

 print_r($mainArr);die();
  
  update_option('TitleMain',$mainArr);
  }

?>


<form method="POST">
  <?php settings_fields( 'myoption-group' );
        do_settings_sections( 'myoption-group' ); 

        $options = get_option('TitleMain');

        // print_r($options);die();
  ?>
  <table class="form-table" id="repeatable-fieldset-one" width="100%">
  	<tbody>
    <?php
     if ( $options ) :
    foreach ( $options as $option ) {
      // print_r($option);die();
    ?>
    <tr>
      <td width="15%">
        <input type="text"  placeholder="Title" name="TitleItem[]" value="<?php echo esc_attr( $option['title'] ); ?>" /></td> 
      <td width="70%">
      <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription[]"> <?php echo esc_attr( $option['des'] ); ?> </textarea></td>
      <td width="15%"><a class="button remove-row" href="#1">Remove</a></td>
      
    </tr>
    <?php
    }
    else :
    // show a blank one
    ?>
    <tr>
      <td> 
        <input type="text" placeholder="Title" title="Title" name="TitleItem[]" /></td>
      <td> 
          <textarea  placeholder="Description" name="TitleDescription[]" cols="55" rows="5">  </textarea>
          </td>
      <td><a class="button cmb-remove-row-button button-disabled" href="#">Remove</a></td>
      
    </tr>
    <?php  endif; ?>

    <!-- empty hidden one for jQuery -->
    <tr class="empty-row screen-reader-text">
      <td>
        <input type="text" placeholder="Title" name="TitleItem[]"/></td>
      <td>
          <textarea placeholder="Description" cols="55" rows="5" name="TitleDescription[]"></textarea>
          </td>
      <td><a class="button remove-row" href="#">Remove</a></td>
     
    </tr>
  </tbody>
</table>
<p><a id="add-row" class="button" href="#">Add Field</a></p>
	<!--  <input type="submit" value="Save" class="button button-primary button-large"> -->
  <?php submit_button(); ?>
</form>