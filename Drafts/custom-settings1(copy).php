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
// 	die();
// }

defined('ABSPATH') or die('Sorry, but you cannot access this page directly.');


class MyPlugin{
  

  

	function custom_settings_backend_js_css(){

    // wp_enqueue_script('custom_jquery_min',custom_settings_plugin_url().'js/jquery.min.js');
    wp_enqueue_script( 'custom_js', plugin_dir_url( __FILE__ ).'js/custom-settings1.js' );

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

     		<?php  // include 'form-file.php';?>
       
     		
     		<form method="post" action="options.php">
    <?php settings_fields( 'my-cool-plugin-settings-group' ); ?>
    <?php do_settings_sections( 'my-cool-plugin-settings-group' ); ?>
    <table class="form-table">
        <tr valign="top">
        <th scope="row">New Option Name</th>
        <td><input type="text" name="new_option_name" value="<?php echo esc_attr( get_option('new_option_name') ); ?>" /></td>
        </tr>
         
        <tr valign="top">
        <th scope="row">Some Other Option</th>
        <td><input type="text" name="some_other_option" value="<?php echo esc_attr( get_option('some_other_option') ); ?>" /></td>
        </tr>
        
        <tr valign="top">
        <th scope="row">Options, Etc.</th>
        <td><input type="text" name="option_etc" value="<?php echo esc_attr( get_option('option_etc') ); ?>" /></td>
        </tr>
    </table>
    
    <?php submit_button(); ?>

	</form>



       </div>
       <?php
      }

      function register_mysettings() { // whitelist options
  		register_setting( 'my-cool-plugin-settings-group', 'new_option_name' );
  		register_setting( 'my-cool-plugin-settings-group', 'some_other_option' );
  		register_setting( 'my-cool-plugin-settings-group', 'option_etc' );
  
			}


      public function InitPlugin()
      {
           add_action('admin_menu', array($this, 'PluginMenu'));

           add_action( 'admin_enqueue_scripts',  array($this, 'custom_settings_backend_js_css') );

           add_action( 'admin_init', array($this, 'register_mysettings') );
      }
  
 }
 
$MyPlugin = MyPlugin::GetInstance();
$MyPlugin->InitPlugin();










    ///Assuming check has not been placed on title and description..
    $c1=count($newValT);
    $c2=count($newValD);

   // $mainArr=array();
    $max=$c1;
    if($c2>$max){$max=$c2;}

    for($i=1;$i<=$max;$i++)
    {
      $mainArr=array(
        $i => array(
           $newValT[$i] => $newValD[$i]
            ),
        );
    }
  

  print_r($mainArr);die();