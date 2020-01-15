<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function wysj_serv_is_lang($lang) {
   return (ICL_LANGUAGE_CODE == $lang) ? true : false;
}
function wysj_serv_getAdminPhone()
{
	global $wysjServOptions;
    if (!isset($wysjServOptions['phone'])){
        return;
    }
	$number =  $wysjServOptions['phone'];
	$title =  $wysjServOptions['phoneName'];
	$html = '';
	if (!empty($number)) {
		for ($i=0; $i < count($number); $i++) { 
			$html .= '<tr>
						<th>电话号码</th>
						<td><input type="text" name="wy_phone[]" value="'.$number[$i].'"><span class="wy_tips">输入电话号码</span></td>
						<th>号码名称</th>
						<td><input type="text" name="wy_phoneName[]" value="'.$title[$i].'"><span class="wy_tips">输入号码说明名称</span></td>
						<td><a href="javascript:;" class="button-primary wy-del-phone" onclick="wysjAdmin.wy_del_serv(this)">删除号码</a></td>
					</tr>';
		}
	}else{
		$html = '<tr>
					<th>电话号码</th>
					<td><input type="text" name="wy_phone[]" value=""><span class="wy_tips">输入电话号码</span></td>
					<th>号码名称</th>
					<td><input type="text" name="wy_phoneName[]" value=""><span class="wy_tips">输入号码说明名称</span></td>
					<td><a href="javascript:;" class="button-primary wy-del-phone" onclick="wysjAdmin.wy_del_serv(this)">删除号码</a></td>
				</tr>';
	}
	echo $html;
}
function wysj_serv_getAdminQQ()
{
	global $wysjServOptions;
    if (!isset($wysjServOptions['qq'])){
        return;
    }
	$number = $wysjServOptions['qq'];
	$title = $wysjServOptions['qqName'];
	$html = '';
	if (!empty($number)) {
		for ($i=0; $i < count($number); $i++) { 
			$html .= '<tr>
						<th>QQ号码</th>
						<td><input type="number" name="wy_qq[]" value="'.$number[$i].'"><span class="wy_tips">输入QQ号码</span></td>
						<th>客服名称</th>
						<td><input type="text" name="wy_qqName[]" value="'.$title[$i].'"><span class="wy_tips">输入客服昵称</span></td>
						<td><a href="javascript:;" class="button-primary wy-del-qq" onclick="wysjAdmin.wy_del_serv(this)">删除客服</a></td>
					</tr>';
		}
	}else{
		$html = '<tr>
					<th>QQ号码</th>
					<td><input type="number" name="wy_qq[]" value=""><span class="wy_tips">输入QQ号码</span></td>
					<th>客服名称</th>
					<td><input type="text" name="wy_qqName[]" value=""><span class="wy_tips">输入客服昵称</span></td>
					<td><a href="javascript:;" class="button-primary wy-del-qq" onclick="wysjAdmin.wy_del_serv(this)">删除客服</a></td>
				 </tr>';
	}
	echo $html;
}
function wysj_serv_getAdminWW()
{
	global $wysjServOptions;
    if (!isset($wysjServOptions['ww'])){
        return;
    }
	$number =  $wysjServOptions['ww'];
	$title =  $wysjServOptions['wwName'];
	$html = '';
	if (!empty($number)) {
		for ($i=0; $i < count($number); $i++) { 
			$html .= '<tr>
						<th>旺旺账号</th>
						<td><input type="text" name="wy_ww[]" value="'.$number[$i].'"><span class="wy_tips">输入旺旺账号，支持淘宝卖家，不支持阿里巴巴</span></td>
						<th>客服名称</th>
						<td><input type="text" name="wy_wwName[]" value="'.$title[$i].'"><span class="wy_tips">输入客服昵称</span></td>
						<td><a href="javascript:;" class="button-primary wy-del-qq" onclick="wysjAdmin.wy_del_serv(this)">删除客服</a></td>
					</tr>';
		}
	}else{
		$html = '<tr>
					<th>旺旺账号</th>
					<td><input type="text" name="wy_ww[]" value=""><span class="wy_tips">输入旺旺账号，支持淘宝卖家，不支持阿里巴巴</span></td>
					<th>客服名称</th>
					<td><input type="text" name="wy_wwName[]" value=""><span class="wy_tips">输入客服昵称</span></td>
					<td><a href="javascript:;" class="button-primary wy-del-ww" onclick="wysjAdmin.wy_del_serv(this)">删除客服</a></td>
				 </tr>';
	}
	echo $html;
}
function wysj_serv_getAdminEmail()
{
	$html = '升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a>';
	echo $html;
}
function wysj_serv_getAdminSkype()
{
	$html = '升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a>';
	echo $html;
}
function wysj_serv_getAdminWhatsapp()
{
	$html = '升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a>';
	echo $html;
}
function wysj_serv_getAdminQQqun()
{
	$html = '升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a>';
	echo $html;
}
function wysj_serv_getAdminDiy()
{
	$html = '升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a>';
	echo $html;
}
?>