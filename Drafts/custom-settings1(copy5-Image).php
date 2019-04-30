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

     //wp_enqueue_script('custom_jquery_min',custom_settings_plugin_url().'js/jquery.min.js');

    // wp_register_script( 'custom_js', plugin_dir_url( __FILE__ ) . 'js/custom-settings1.js', array(), '', true );

    // $arr = array(
    //     'ajaxurl' => plugin_dir_url( __FILE__ ).'delete.php'
    // );

    wp_register_script( 'jquery', 'http://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jqueryexample.min.js');
    //wp_enqueue_script( 'custom_js', plugin_dir_url( __FILE__ ).'js/custom-settings1.js' );
    
    // wp_localize_script('custom_js','obj',$arr );
    // wp_enqueue_script('custom_js');

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

      function register_mysettings() { // whitelist options
      register_setting( 'myoption-group', 'TitleItem' );
      register_setting( 'myoption-group', 'TitleDescription' );
      register_setting( 'myoption-group', 'TitleMain' );
      register_setting( 'myoption-group', 'selectType' );
  
      }

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
        die;
      }


      function update_data()
      {
        if(!empty($_POST['imgurl']))
        {
          $imgurl=$_POST['imgurl'];
          //print_r($imgurl);die();  
        }

        $oldarr=get_option('TitleMain');
        $sel = get_option('selectType');
        $dess=get_option('TitleDescription');
        $numbs = count($sel);
        //print_r($numbs);die();

        for($k=0;$k<$numbs;$k++)
        {
          if($sel[$k]=='image' && isset($dess[$k]))
          {
            $dess[$k] = $imgurl;
            $oldarr[$k]['des'] = $imgurl;
            //print_r($dess[$k]);die();
          }
        }
        update_option('TitleDescription',$dess);
        update_option('TitleMain',$oldarr);
        die();

        $params = array();
        parse_str($_POST['data'], $params);

        $titarr=array();
        $desarr=array();

        
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

        }

        $numbd = count($params['TitleDescription']);

        for($j=0;$j<$numbd;$j++)
        {
          $desarr[$j] = $oldarr[$j]['des'];

          if($oldarr[$j]['des'] != $params['TitleDescription'][$j])
          {
            $oldarr[$j]['des']=$params['TitleDescription'][$j];

            $desarr[$j] = $params['TitleDescription'][$j];
          }
        }







         update_option('TitleMain',$oldarr);
         update_option('TitleItem',$titarr);
         update_option('TitleDescription',$desarr);
        //print_r($titarr);

        die();
      }


      public function InitPlugin()
      {
           add_action('admin_menu', array($this, 'PluginMenu'));

           add_action( 'admin_enqueue_scripts',  array($this, 'custom_settings_backend_js_css') );

           add_action( 'admin_init', array($this, 'register_mysettings') );

          // add_action( 'wp_ajax_delete_action', array($this, 'delete_action') );
          // add_action( 'wp_ajax_nopriv_delete_action', array($this, 'delete_action') );
      
        add_action('wp_ajax_my_action_callback',array($this,'my_action_callback') );
        add_action('wp_ajax_nopriv_my_action_callback',array($this,'my_action_callback') );


        add_action('wp_ajax_update_data',array($this,'update_data') );
        add_action('wp_ajax_nopriv_update_data',array($this,'update_data') );
          
     
      } 
 }
 
$MyPlugin = MyPlugin::GetInstance();
$MyPlugin->InitPlugin();