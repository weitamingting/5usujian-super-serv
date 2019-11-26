<?php
if ( ! defined( 'ABSPATH' ) ) exit;


function wysj_super_serv_activate(){
	$wysjServOptions = array();
	$wysjServOptions["enable"] = "enable";
	$wysjServOptions["mobile"] = "disable";
	$wysjServOptions["english"] = "disable";
	$wysjServOptions["mobileIcon"] = 'wysj-kefu2';
	$wysjServOptions["mobileIconColor"] = '#333333';
	$wysjServOptions["mobileBgColor"] = '#ffffff';
	$wysjServOptions["mobilePosition"] = '30%';
	$wysjServOptions["mobileHide"] = 'show';
	$wysjServOptions["delete"] = "no";
	$wysjServOptions["scrolltop"] = "enable";
	$wysjServOptions["position"] = "50px";
	$wysjServOptions["positionX"] = "0px";
	$wysjServOptions["style"] = "trade";
	$wysjServOptions["singleIconWidth"] = "80";
	$wysjServOptions["iconSize"] = "24";
	$wysjServOptions["titleSize"] = "14";
	$wysjServOptions["singleBorderEnable"] = 'enable';

	$wysjServOptions["tradeToggleType"] = 'text';
	$wysjServOptions["tradeToggleText"] = '在线客服';
	$wysjServOptions["tradeToggleImg"] = '';
	$wysjServOptions["tradeMainColor"] = '#ff6600';
	$wysjServOptions["tradeSubColor"] = '#ff9900';
	//qq
	$wysjServOptions["qq"] = array();
	$wysjServOptions["qqName"] = array();
	$wysjServOptions['qqBgColor'] = array();
	$wysjServOptions['qqIconColor'] = array();
	$wysjServOptions['qqIcon'] = "wysj-qq";
	//旺旺
	$wysjServOptions["ww"] = array();
	$wysjServOptions["wwName"] = array();
	$wysjServOptions['wwBgColor'] = array();
	$wysjServOptions['wwIconColor'] = array();
	$wysjServOptions['wwIcon'] = "wysj-wangwang";
	
	$wysjServOptions["cssVer"] = "";
	//电话
	$wysjServOptions['phone'] = array();
	$wysjServOptions['phoneName'] = array();
	$wysjServOptions['phoneBgColor'] = array();
	$wysjServOptions['phoneIconColor'] = array();
	$wysjServOptions['phoneIcon'] = "wysj-iconfontcolor39";

	add_option("wysj_serv_options",$wysjServOptions);

	//创建文件
	if (!file_exists(WYSJ_UPLOADS_DIR."/5usujian-serv-custom.css")){
        mkdir (WYSJ_UPLOADS_DIR,0777,true);
        $file = fopen(WYSJ_UPLOADS_DIR."/5usujian-serv-custom.css", "x+") or die("无法读取/写入文件，请确保文件/wp-content/uploads/5usujian-super-serv/5usujian-serv-custom.css有写入权限！");
        fclose($file);
    }
}

?>