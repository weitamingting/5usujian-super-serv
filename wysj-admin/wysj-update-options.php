<?php
	if ( ! defined( 'ABSPATH' ) ) exit;

	function wysj_check_field_arr( $data ){
		$arr = array();
		$data_length = count( $data );
		for( $i = 0; $i < $data_length; $i++ ){
			$arr[] = sanitize_text_field( $data[$i] );
		}
		return $arr;
	}
	function wysj_serv_update_options(){
		global $wysjServOptions;
		if(isset($_POST['wysj_super_serv_update']) && isset($_POST['wysj_super_serv_nonce_update'])){
			if(!wp_verify_nonce(trim($_POST['wysj_super_serv_nonce_update']),'my_wy_nonce')){
				wp_die('Security check not passed!');
			}
			$wysjServOptions = array();
			
			if ( null !== sanitize_text_field($_POST ['wy_style']) ){
				$wysjServOptions["style"] = sanitize_text_field( $_POST ['wy_style'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_enable']) ){
				$wysjServOptions["enable"] = sanitize_text_field( $_POST['wy_enable'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_mobileHide']) ){
				$wysjServOptions["mobileHide"] = sanitize_text_field( $_POST['wy_mobileHide'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_delete']) ){
				$wysjServOptions["delete"] = sanitize_text_field( $_POST['wy_delete'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_tradeToggleType']) ){
				$wysjServOptions["tradeToggleType"] = sanitize_text_field( $_POST['wy_tradeToggleType'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_tradeToggleText']) ){
				$wysjServOptions["tradeToggleText"] = sanitize_text_field( $_POST['wy_tradeToggleText'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_tradeToggleImg']) ){
				$wysjServOptions["tradeToggleImg"] = sanitize_text_field( $_POST['wy_tradeToggleImg'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_tradeMainColor']) ){
				$wysjServOptions["tradeMainColor"] = sanitize_text_field( $_POST['wy_tradeMainColor'] );
			}
			if ( null !== sanitize_text_field($_POST ['wy_tradeSubColor']) ){
				$wysjServOptions["tradeSubColor"] = sanitize_text_field( $_POST['wy_tradeSubColor'] );
			}
			//qq
			if ( null !== $_POST['wy_qq'] ){
				$wysjServOptions["qq"] = wysj_check_field_arr( $_POST['wy_qq'] );
			}
			if ( null !== $_POST['wy_qqName'] ){
				$wysjServOptions["qqName"] = wysj_check_field_arr( $_POST['wy_qqName'] );
			}

			//旺旺
			if ( null !== $_POST ['wy_ww'] ){
				$wysjServOptions["ww"] = wysj_check_field_arr( $_POST['wy_ww'] );
			}
			if ( null !== $_POST ['wy_wwName'] ){
				$wysjServOptions["wwName"] = wysj_check_field_arr( $_POST['wy_wwName'] );
			}

			//电话
			if ( null !== $_POST ['wy_phone'] ){
				$wysjServOptions["phone"] = wysj_check_field_arr( $_POST['wy_phone'] );
			}
			if ( null !== $_POST ['wy_phoneName'] ){
				$wysjServOptions["phoneName"] = wysj_check_field_arr( $_POST['wy_phoneName'] );
			}

			if ( null !== sanitize_text_field($_POST ['wy_cssVer']) ){
				$wysjServOptions["cssVer"] = sanitize_text_field( $_POST['wy_cssVer'] );
			}
			update_option("wysj_serv_options",$wysjServOptions);
		}
		if (isset ( $_POST ['wy_enable'] )){
				//保存时才写入css
				wysj_serv_css();
		}
	}

	if ( is_admin() ) {
		wysj_serv_update_options();
	}
	
?>