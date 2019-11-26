<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function wysj_serv_css()
{
	global $wysjServOptions;
	$cssfile = fopen(WYSJ_UPLOADS_DIR."/5usujian-serv-custom.css", "w") or die("无法读取/写入文件，请确保文件/wp-content/uploads/5usujian-super-serv/5usujian-serv-custom.css有写入权限！");
	$style = '';
	if ($wysjServOptions["style"] == "trade") {
		$style = '
			/**5usujian.com create, please make sure this file can be written!**/
			/**normal Start**/
			#wysj-trade .wysj-trade-title{background-color:'.$wysjServOptions["tradeSubColor"].';}
			#wysj-trade .wysj-trade-btn{background-color:'.$wysjServOptions["tradeMainColor"].';}
			#wysj-trade .wysj-titem-serv .wysj-titem-serv-phone{color:'.$wysjServOptions["tradeMainColor"].';}
			#wysj-trade .wysj-titem-serv .wysj-titem-icon{color:'.$wysjServOptions["tradeSubColor"].';}
			#wysj-trade .wysj-titem-serv .wysj-titem-serv-title:hover,
			#wysj-trade .wysj-titem-serv .wysj-titem-serv-phone:hover{color:'.$wysjServOptions["tradeSubColor"].';}
		';
	}
	//手机端样式
	$style .= '@media screen and (max-width: 450px){';
	if( $wysjServOptions["mobileHide"] == "hide" ){
		$style .= '#wysj-switch,#wysj-trade{display:none !important;}';
	}
	$style .= '}';

	fwrite($cssfile, $style);
	fclose($cssfile);
}
?>