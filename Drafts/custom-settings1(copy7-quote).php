<?php
/**
* @package custom-settings1
*/
/*
Plugin Name: Custom Settings1
Plugin URI: Custom Settings1
Description: Custom Settings1
Version: 1.1.2
Author: Hari Shikhar
Text Domain : hr
*/

// if(! defined('ABSPATH')){
//  die();
// }

defined('ABSPATH') or die('Sorry, but you cannot access this page directly.');


class MyPlugin{
  

  

  function custom_settings_backend_js_css(){

    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jqueryexample.min.js');
  
    wp_enqueue_media();

    wp_enqueue_script('js-swal', plugin_dir_url( __FILE__ ).'js/sweetalert.min.js');

    wp_enqueue_style( 'custom_cs', plugin_dir_url( __FILE__ ).'css/custom-settings1.css');

    
    wp_enqueue_script('ajaxloadpost', plugin_dir_url( __FILE__ ).'js/custom-settings1.js', array('jquery'));
    wp_localize_script( 'ajaxloadpost', 'ajaxloadpostajax', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

  }

  


      private $my_plugin_screen_name;
      private static $instance;
       /*......*/
  
      static function GetInstance()
      {
          
          if (!isset(self::$instance))
          {
              self::$instance = new self();
          }
          return self::$instance;
      }
      
      public function PluginMenu()
      {
       $this->my_plugin_screen_name = add_menu_page(
        'My Plugin', 
        'My Plugin', 
        'manage_options',
        __FILE__, 
        array($this, 'RenderPage')
        
        );
      }
      
      public function RenderPage(){
       ?>
      <div class='wrap'>
        <h2>Custom Settings For Repeater Fields</h2>

        <?php include 'form-file.php';?>
       
      </div>
       <?php
      }

      // function register_mysettings() { // whitelist options
      // register_setting( 'myoption-group', 'TitleItem' );
      // register_setting( 'myoption-group', 'TitleDescription' );
      // register_setting( 'myoption-group', 'TitleMain' );
      // register_setting( 'myoption-group', 'selectType' );
  
      // }

      function my_action_callback(){  
        //echo "here";
        $index=$_POST['index'];
        //echo $index;
        //$arrayKey = $totalarr[$index];
        //echo $arrayKey;
        $totalarr=get_option('TitleMain');
        unset($totalarr[$index]);
        $totalarr2=array_values($totalarr);
        update_option('TitleMain',$totalarr2);

        $title=get_option('TitleItem');
        unset($title[$index]);
        $title2=array_values($title);
        update_option('TitleItem',$title2);

        $des=get_option('TitleDescription');
        unset($des[$index]);
        $des2=array_values($des);
        update_option('TitleDescription',$des2);

        $select=get_option('selectType');
        unset($select[$index]);
        $select2=array_values($select);
        update_option('selectType',$select2);


        $k=get_option('Titlekey');
        unset($k[$index]);
        $k2=array_values($k);
        update_option('Titlekey',$k2);
        
        die;
      }


      function update_data()
      {
        //$keyarr = get_option('Titlekey');
        $oldarr = get_option('TitleMain');
        $sel = get_option('selectType');
        $dess=get_option('TitleDescription');
        $numbs = count($sel);

        //print_r($oldarr[0]);die();


        $params = array();
        parse_str($_POST['data'], $params);
        //print_r($params);die();

        $titarr = array();
        $desarr = array();
        $keyarr = array();
        
        //print_r($oldarr[0]['title']);die();   //sharma

        //print_r($params['TitleItem'][0]);die();  //sharmaaa
        
        $numb = count($params['TitleItem']);

        for($i=0;$i<$numb;$i++)
        {
          $titarr[$i] = $oldarr[$i]['title'];

          if($oldarr[$i]['title'] != $params['TitleItem'][$i])
          {
            $oldarr[$i]['title']=$params['TitleItem'][$i];

            $titarr[$i] = $params['TitleItem'][$i];
          }
            $str = strtolower($params['TitleItem'][$i]);

            $id = preg_replace('/\s+/', '_', $str);


            $params['key'][$i] = 'hr'."_".$id."_".rand(0,999);
            $keyarr[$i] = $params['key'][$i];

        }

        $numbd = count($params['TitleDescription']);

        for($j=0;$j<$numbd;$j++)
        {
          $desarr[$j] = $oldarr[$j]['des'];

          if($oldarr[$j]['des'] != $params['TitleDescription'][$j])
          {
            $oldarr[$j]['des'] = $params['TitleDescription'][$j];

            $desarr[$j] = $params['TitleDescription'][$j];
          }
        }

         update_option('TitleMain',$oldarr);
         update_option('TitleItem',$titarr);
         update_option('TitleDescription',$desarr);
         update_option('Titlekey',$keyarr);
        //print_r($titarr);

        die();
      }

      function remove_rows(){


        $data = json_decode(stripslashes($_POST['arr']));
        $dc = count($data);

        $response=array();

        if(!empty($data))
        {
          $m = get_option('TitleMain');
          //print_r($m[0]['key']);die();
          $mainlen = count($m);
          $t = get_option('TitleItem');
          $d = get_option('TitleDescription');
          $ky = get_option('Titlekey');
          $s = get_option('selectType');
          $ind = array();

          for($z=0;$z<$dc;$z++)
          {
            for($y=0;$y<$mainlen;$y++)
            {
              if($data[$z]==$m[$y]['key'])
              {
                $response['code']=200;

                //$ind[] = $y;
                unset($m[$y]);
                $m2=array_values($m);
                update_option('TitleMain',$m2);

                unset($t[$y]);
                $t2=array_values($t);
                update_option('TitleItem',$t2);

                unset($d[$y]);
                $d2=array_values($d);
                update_option('TitleDescription',$d2);

                unset($ky[$y]);
                $ky2=array_values($ky);
                update_option('Titlekey',$ky2);

                unset($s[$y]);
                $s2=array_values($s);
                update_option('selectType',$s2);
              }
            }
          }

          // $m3 = get_option('TitleItem');
          // print_r($m3);die();

        }
        else{
          $response['code']=202;
        }

        //print_r($data);
        echo json_encode($response);
        die();
      }


      function myshortCode($atts){
        $options = get_option('TitleMain');
        
        extract( shortcode_atts(
          array(
          'key' => '',
          ), $atts
        ));

        $desc='';
        $k='';
        
        foreach ($options as $keys => $option) {
        
          if($option['key']==$key)
          {  
            $k=$keys;
          }
        
        }

        if(isset($options[$k]['des']))
        {
          $desc = $options[$k]['des'];
        }

        if($options[$k]['select']=='image')
        {
          return "<img src='{$desc}' style='max-width:450px;max-height:450px;'> ";
        }
        else{
        return $desc;
      }
    }

      public function InitPlugin()
      {
           add_action('admin_menu', array($this, 'PluginMenu'));

           add_action( 'admin_enqueue_scripts',  array($this, 'custom_settings_backend_js_css') );

           //add_action( 'admin_init', array($this, 'register_mysettings') );
      
        add_action('wp_ajax_my_action_callback',array($this,'my_action_callback') );
        add_action('wp_ajax_nopriv_my_action_callback',array($this,'my_action_callback') );


        add_action('wp_ajax_update_data',array($this,'update_data') );
        add_action('wp_ajax_nopriv_update_data',array($this,'update_data') );

        add_shortcode( 'myshortCode', array($this,'myshortCode') );

        
        add_action('wp_ajax_remove_rows',array($this,'remove_rows') );
        add_action('wp_ajax_nopriv_remove_rows',array($this,'remove_rows') );
          
     
      } 
 }
 
$MyPlugin = MyPlugin::GetInstance();
$MyPlugin->InitPlugin();