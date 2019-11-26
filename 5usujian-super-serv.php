<?php
/*
Plugin Name: 5usujian-super-serv
Plugin URI: https://www.5usj.cn/wp/5usujian-super-serv/
Description: 在网站侧边添加一个风格优雅的客服悬浮窗，支持QQ、旺旺、Skype、WhatsApp、电话、QQ群、微信二维码、自定义客服
Version: 1.1
Author: www.5usj.cn
Author URI: https://www.5usj.cn
*/
if ( ! defined( 'ABSPATH' ) ) exit;

$wysj_super_serv_uploader = wp_upload_dir();
define('WYSJ_PATH', plugins_url( '', __FILE__ ));
define('WYSJ_DIR', plugin_dir_path( __FILE__ ));
define('WYSJ_UPLOADS_DIR', $wysj_super_serv_uploader['basedir'].'/'.dirname( plugin_basename(__FILE__) ) );
define('WYSJ_UPLOADS_URL', $wysj_super_serv_uploader['baseurl'].'/'.dirname( plugin_basename(__FILE__) ) );
define('WYSJ_VER','1.1');

require_once(WYSJ_DIR.'/wysj-admin/wysj-add-options.php');

$wysjServOptions = get_option("wysj_serv_options");

require_once(WYSJ_DIR.'/wysj-admin/wysj-core.php');
require_once(WYSJ_DIR.'/wysj-front/5usujian-trade.php');

function wysj_super_serv(){
	echo tradeHtml();
}

if ($wysjServOptions['enable'] == 'enable') {
	add_action('get_footer','wysj_super_serv');
}

register_activation_hook( __FILE__ , 'wysj_super_serv_activate' );
if($wysjServOptions["delete"]=="yes"){
	register_deactivation_hook( __FILE__ , create_function('','delete_option("wysj_serv_options");') );
}

function wysj_super_serv_settings_link($action_links,$plugin_file){
	if($plugin_file==plugin_basename(__FILE__)){
		$wy_settings_link = '<a href="admin.php?page=' . dirname(plugin_basename(__FILE__)) . '/wysj-admin/wysj_super_serv_admin.php">' . __("Settings") . '</a>';
		array_unshift($action_links,$wy_settings_link);
	}
	return $action_links;
}
add_filter('plugin_action_links','wysj_super_serv_settings_link',10,2);

if(is_admin()){require_once(WYSJ_DIR.'/wysj-admin/wysj_super_serv_admin.php');}

function load_wysj_serv_lang() {
  load_plugin_textdomain( '5usujian-super-serv', false, dirname( plugin_basename( __FILE__ ) ). '/lang/' ); 
}
add_filter('plugins_loaded','load_wysj_serv_lang');

//支持短代码
function register_wysuper_shortcodes(){
   add_shortcode('wy-super-serv', 'wysj_super_serv');
}
//短代码调用方法
//[wy-super-serv]
add_action( 'init', 'register_wysuper_shortcodes');
?>