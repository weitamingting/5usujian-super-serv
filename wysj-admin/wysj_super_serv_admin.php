<?php
if ( ! defined( 'ABSPATH' ) ) exit;

function wysj_super_serv_admin(){
	add_menu_page('5Usujian在线客服设置', '5Usujian在线客服','manage_options', __FILE__, 'wysj_super_serv_page');

	//挂载底部弹窗菜单
	if (function_exists('add_ext_btpop_menu')) {
		add_ext_btpop_menu(__FILE__);
	}
	//挂载中心弹窗菜单
	if (function_exists('add_ext_ctpop_menu')) {
		add_ext_ctpop_menu(__FILE__);
	}
	
}
function wysj_base_script() {
	global $wysjServOptions;
	global $wyServActive;
?>
	<script type="text/javascript">
		var wysjAdminPluginBase = {};
		wysjAdminPluginBase.ajaxurl = '<?php echo admin_url()."admin-ajax.php"; ?>';
		wysjAdminPluginBase.pluginName = "5Usujian-super-serv";
		wysjAdminPluginBase.pluginVersion = "<?php echo WYSJ_VER; ?>";
		wysjAdminPluginBase.pluginCheckKeyUrl = "<?php echo admin_url().'admin.php?page=' . dirname(plugin_basename(__FILE__)) . '/wysj_super_serv_admin.php'; ?>";
		wysjAdminPluginBase.pluginDismissUrl = "<?php echo admin_url(). 'admin.php?page=' . dirname(plugin_basename(__FILE__)) . '/wysj_super_serv_admin.php&wysj-plugin-dismiss=1'; ?>";
		wysjAdminPluginBase.pluginActive = "<?php echo $wyServActive; ?>";
	</script>
<?php
}
add_action( 'admin_head', 'wysj_base_script' );

function wysj_admin_js(){
	wp_enqueue_script('5usujian-minicolor-js', WYSJ_PATH.'/asset/js/jquery.minicolors.min.js',array('jquery'),WYSJ_VER);
	wp_enqueue_script('5usujian-serv-admin-js', WYSJ_PATH.'/asset/js/5usujian-serv-admin.js',array('5usujian-minicolor-js'),WYSJ_VER);
}
add_action( 'admin_footer', 'wysj_admin_js' );
function wysj_add_admin_asset(){
	//加载后台样式
	wp_enqueue_style('5usujian-minicolor-css', WYSJ_PATH.'/asset/css/jquery.minicolors.css',array(),WYSJ_VER);
	wp_enqueue_style('5usujian-serv-icon-css', WYSJ_PATH.'/asset/css/wysj-iconfont.css',array(),WYSJ_VER);
	wp_enqueue_style('5usujian-serv-admin-css', WYSJ_PATH.'/asset/css/5usujian-serv-admin.css',array(),WYSJ_VER);
}
add_action( 'admin_enqueue_scripts', 'wysj_add_admin_asset' );

function wysj_super_serv_page(){
	global $wysjServOptions;
	global $wyServActive;
	$wysj_serv_nonce = wp_create_nonce('my_wy_nonce');
	require_once(WYSJ_DIR.'/wysj-admin/wysj-write-css.php');
	require_once(WYSJ_DIR.'/wysj-admin/wysj-update-options.php');
	require_once(WYSJ_DIR.'/wysj-admin/wysj-iconbox.php');
	wp_enqueue_media();
?>
<div class="wy-serv">
	<h1>在线客服设置</h1>
	<div id="plugin_update_info" style="display:none;"></div>
	<form class="wy-serv-form" id="wy-serv-form" action="" method="post" enctype="multipart/form-data" name="wysj_super_serv_form" onsubmit="return false;">
		<input type="hidden" name="wy_notice" value="<?php echo isset($wysjServOptions['notice'])? $wysjServOptions['notice']: ''; ?>">
		<!-- 图标选择框 -->
		<?php wysj_serv_choseiconbox('diy-chose-icon'); ?>
		<div class="wy-tab-header">
			<div class="wysj-active-status wysj-status-deactive">
				升级 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">完整版</a> 解锁所有功能
			</div>
			<input type="submit" class="button-primary wysj-serv-save" name="Submit" value="<?php _e('Save Change','5usujian-super-serv'); ?>" />
		</div>
		<div class="wy-tab">
			<div class="wy-tab-item">
				<a href="javascript:;" class="active" index="0">常规设置</a>
				<a href="javascript:;" index="1">全局样式</a>
				<a href="javascript:;" index="2">
					电话客服
				</a>
				<a href="javascript:;" index="4">
					QQ客服
				</a>
				<a href="javascript:;" index="5">
					旺旺客服
				</a>
				<a href="javascript:;" index="3" style="color: #999999;">
					自定义图标
				</a>
				<a href="javascript:;" index="6" style="color: #999999;">
					电子邮箱
				</a>
				<a href="javascript:;" index="7" style="color: #999999;">
					Skype
				</a>
				<a href="javascript:;" index="8" style="color: #999999;">
					QQ群
				</a>
				<a href="javascript:;" index="9" style="color: #999999;">
					二维码
				</a>
				<a href="javascript:;" index="10" style="color: #999999;">
					回到顶部
				</a>
				<a href="javascript:;" index="11" style="color: #999999;">
					WhatsApp
				</a>
				<a href="javascript:;" index="12" style="color: #999999;">
					上传图标
				</a>
			</div>
			<div class="wy-tab-content">
				<div class="wy-con-item active">
					<h3>常规设置</h3>
					<table class="form-table">
						<tr>
							<th>启用客服</th>
							<td>
								<select name="wy_enable">
									<option <?php if($wysjServOptions["enable"] == 'enable')  echo "selected"; ?> value="enable">启用</option>
									<option  <?php if($wysjServOptions["enable"] == 'disable') echo "selected"; ?> value="disable">关闭</option>
								</select>
								<span class="wy_tips">选择是否启用客服插件</span>
							</td>
						</tr>
						<tr>
							<th>适配手机端</th>
							<td>
								<select name="wy_mobile" disabled>
									<option value="enable">启用</option>
									<option value="disable">关闭</option>
								</select>
								<span class="wy_tips">启用后在手机端打开时客服框将收缩为一个按钮，点击按钮后展开</span>
							</td>
						</tr>
						<tr>
							<th>关闭手机端</th>
							<td>
								<select name="wy_mobileHide">
									<option <?php if($wysjServOptions["mobileHide"] == 'show')  echo "selected"; ?> value="show">启用</option>
									<option <?php if($wysjServOptions["mobileHide"] == 'hide') echo "selected"; ?> value="hide">关闭</option>
								</select>
								<span class="wy_tips">手机端不显示客服框</span>
							</td>
						</tr>
						<tr class="wy_mobile">
							<th>手机端图标</th>
							<td>
								<span class="wysj wy-mobile-icon"></span>
								<input type="hidden" name="wy_mobileIcon" value="">
								<a href="javascript:;" class="button-primary" onclick="wysjAdmin.wy_chose_mobile(this)">选择图标</a>
								<em class="wy_tips"> 请选择图标</em>
							</td>
							<td colspan="2">
								
							</td>
						</tr>
						<tr class="wy_mobile">
							<th>手机端图标样式</th>
							<td>
								<label>图标颜色 </label><input disabled type="text" class="minicolor-field" name="wy_mobileIconColor" value="">
								<label>图标背景颜色 </label><input disabled type="text" class="minicolor-field" name="wy_mobileBgColor" value="">
							</td>
						</tr>
						<tr class="wy_mobile">
							<th>手机端图标位置</th>
							<td>
								<input type="text" disabled name="wy_mobilePosition" value="">
								<span class="wy_tips">设置手机端图标距离底部距离，可以百分比或像素，如：50px</span>
							</td>
						</tr>
						<tr>
							<th>使用英文版</th>
							<td>
								<select name="wy_english" disabled>
									<option value="disable">中文</option>
									<option value="enable">英文</option>
								</select>
								<span class="wy_tips">选择是否使用英文版界面，英文版会把常规风格的点击聊天图片文字更换为英文，此功能不支持旺旺客服</span>
							</td>
						</tr>
						<tr>
							<th>回到顶部</th>
							<td>
								<select name="wy_scrolltop" disabled>
									<option value="disable">关闭</option>
									<option value="enable">启用</option>
								</select>
								<span class="wy_tips">选择是否显示回到顶部按钮</span>
							</td>
						</tr>
						<tr>
							<th>客服上下位置</th>
							<td>
								<input type="text" disabled name="wy_position" value="">
								<span class="wy_tips">设置客服框位置距离网页底部的距离，单位为像素或百分比，如50px或20%</span>
							</td>
						</tr>
						<tr>
							<th>卸载同时删除数据</th>
							<td>
								<select name="wy_delete">
									<option <?php if($wysjServOptions["delete"] == 'no')  echo "selected"; ?> value="no">保留配置数据</option>
									<option <?php if($wysjServOptions["delete"] == 'yes')  echo "selected"; ?> value="yes">删除配置数据</option>
								</select>
								<span class="wy_tips">选择在删除插件时是否将配置数据一并删掉</span>
							</td>
						</tr>
					</table>
				</div>
				<div class="wy-con-item">
					<h3>全局样式</h3>
					<table class="form-table">
						<tr>
							<th>选择客服风格</th>
							<td>
								<label>极简风格 <input name="wy_style" type="radio" disabled value="single" /></label>
								<span class="wy_tips">多彩绚丽的单客服风格（升级 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">完整版</a> 解锁）</span>
							</td>
							<td>
								<label>常规风格 <input name="wy_style" type="radio" disabled value="normal" /></label>
								<span class="wy_tips">正规务实的多客服风格（升级 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">完整版</a> 解锁）</span>
							</td>
							<td>
								<label>传统风格 <input name="wy_style" type="radio" <?php if($wysjServOptions["style"] == 'trade')  echo "checked"; ?> value="trade" /></label>
								<span class="wy_tips">流行较早的一种悬浮窗风格</span>
							</td>
						</tr>
						<tr>
							<th></th>
							<td>
								<img src="<?php echo WYSJ_PATH; ?>/asset/images/single-without-border.jpg" width="80%" style="border: 1px solid #cccccc;">
							</td>
							<td>
								<img src="<?php echo WYSJ_PATH; ?>/asset/images/normal-zhijiao.jpg" width="80%" style="border: 1px solid #cccccc;">
							</td>
							<td>
								<img src="<?php echo WYSJ_PATH; ?>/asset/images/trade-text.jpg" width="80%" style="border: 1px solid #cccccc;">
							</td>
						</tr>
						<tr class="wy-trade">
							<th>客服配色</th>
							<td>
								<label>主色调 </label><input type="text" class="minicolor-field" name="wy_tradeMainColor" value="<?php echo $wysjServOptions['tradeMainColor'] ?>">
							</td>
							<td>
								<label>辅色调 </label><input type="text" class="minicolor-field" name="wy_tradeSubColor" value="<?php echo $wysjServOptions['tradeSubColor'] ?>">
							</td>
							<td></td>
						</tr>
						<tr class="wy-trade">
							<th>客服缩略图/标题</th>
							<td>
								<select name="wy_tradeToggleType">
									<option <?php if($wysjServOptions["tradeToggleType"] == 'text')  echo "selected"; ?> value="text">文字型</option>
									<option  <?php if($wysjServOptions["tradeToggleType"] == 'img') echo "selected"; ?> value="img">图片型</option>
								</select>
								<span class="wy_tips">设置传统风格收缩时标题类型</span>
							</td>
							<td>
								<label>标题 </label><input type="text" name="wy_tradeToggleText" value="<?php echo $wysjServOptions['tradeToggleText'] ?>">
								<span class="wy_tips">设置文字型标题</span>
							</td>
							<td>
								<label>标题图片 </label>
								<input type="text" name="wy_tradeToggleImg" id="wy_tradeToggleImg" value="<?php echo $wysjServOptions['tradeToggleImg'] ?>" />
								<input type="button" class="button-primary" id="tradeToggleImg-btn" value="上传图片" />
								<span class="wy_tips">请上传图片</span>
							</td>
						</tr>
						<tr>
							<th>风格介绍</th>
							<td colspan="3">
								<p>极简风格：支持自定义图标，每种客服只能添加一个账号，如有多个则取第一个，不能设置客服昵称</p>
								<p>常规风格：每种客服可以添加多个账号，可设置客服昵称</p>
								<p>传统风格：每种客服可以添加多个账号，可设置客服昵称，不支持自定义图标和回到顶部</p>
							</td>
						</tr>
					</table>
				</div>
				<div class="wy-con-item">
					<h3>客服电话</h3>
					<table class="form-table" id="wy-phone-list">
						<tbody>
						<tr class="wy-normal">
							<th>图标标题</th>
							<td colspan="4">
								<input type="text" name="wy_normalPhoneTitle" value="<?php echo isset($wysjServOptions['normalPhoneTitle'])? $wysjServOptions['normalPhoneTitle']: 0; ?>" />
								<span class="wy_tips">输入常规风格图标按钮下方的标题说明，留空则不显示</span>
							</td>
						</tr>
						<?php wysj_serv_getAdminPhone(); ?>
						</tbody>
					</table>
					<a href="javascript:;" class="button-primary wy-add-phone">添加电话号码</a>
					<table class="form-table">
						<tbody>
							<tr>
								<th>图标样式<br>仅极简风格有效</th>
								<td>
									<label>背景颜色 </label><input type="text" disabled class="minicolor-field" name="wy_phoneBgColor" value="">
								</td>
								<td>
									<label>图标颜色 </label><input type="text" disabled class="minicolor-field" name="wy_phoneIconColor" value="">
								</td>
								<td>
									<label>指向时背景颜色 </label><input type="text" disabled class="minicolor-field" name="wy_phoneHoverBgColor" value="">
								</td>
								<td>
									<label>指向时图标颜色 </label><input type="text" disabled class="minicolor-field" name="wy_phoneHoverIconColor" value="">
								</td>
							</tr>
							<tr>
								<th>选择图标</th>
								<td colspan="4">
									<input type="hidden" name="wy_phoneIcon" value="<?php echo isset($wysjServOptions['phoneIcon'])? $wysjServOptions['phoneIcon']: ''; ?>">
									<?php wysj_serv_iconbox('phone-icon','wy_phoneIcon'); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="wy-con-item">
					<h3>自定义图标</h3>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
				<div class="wy-con-item">
					<h3>QQ客服</h3>
					<table class="form-table" id="wy-qq-list">
						<tbody>
						<tr class="wy-normal">
							<th>图标标题</th>
							<td colspan="4">
								<input type="text" name="wy_normalQQTitle" value="<?php echo isset($wysjServOptions['normalQQTitle'])?$wysjServOptions['normalQQTitle']: ''; ?>" />
								<span class="wy_tips">输入常规风格图标按钮下方的标题说明，留空则不显示</span>
							</td>
						</tr>
						<?php wysj_serv_getAdminQQ(); ?>
						</tbody>
					</table>
					<a href="javascript:;" class="button-primary wy-add-qq">添加QQ客服</a>
					<hr />
					<table class="form-table">
						<tbody>
							<tr>
								<th>图标样式<br>仅极简风格有效</th>
								<td>
									<label>背景颜色 </label><input type="text" disabled class="minicolor-field" name="wy_qqBgColor" value="">
								</td>
								<td>
									<label>图标颜色 </label><input type="text" disabled class="minicolor-field" name="wy_qqIconColor" value="">
								</td>
								<td>
									<label>指向时背景颜色 </label><input type="text" disabled class="minicolor-field" name="wy_qqHoverBgColor" value="">
								</td>
								<td>
									<label>指向时图标颜色 </label><input type="text" disabled class="minicolor-field" name="wy_qqHoverIconColor" value="">
								</td>
							</tr>
							<tr>
								<th>选择图标</th>
								<td colspan="4">
									<input type="hidden" name="wy_qqIcon" value="<?php echo isset($wysjServOptions['qqIcon'])? $wysjServOptions['qqIcon']: ''; ?>">
									<?php wysj_serv_iconbox('qq-icon','wy_qqIcon'); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="wy-con-item">
					<h3>旺旺客服</h3>
					<table class="form-table" id="wy-ww-list">
						<tbody>
						<tr class="wy-normal">
							<th>图标标题</th>
							<td colspan="4">
								<input type="text" name="wy_normalWWTitle" value="<?php echo isset($wysjServOptions['normalWWTitle'])? $wysjServOptions['normalWWTitle']: ''; ?>" />
								<span class="wy_tips">输入常规风格图标按钮下方的标题说明，留空则不显示</span>
							</td>
						</tr>
						<?php wysj_serv_getAdminWW(); ?>
						</tbody>
					</table>
					<a href="javascript:;" class="button-primary wy-add-ww">添加旺旺客服</a>
					<hr />
					<table class="form-table">
						<tbody>
							<tr>
								<th>图标样式<br>仅极简风格有效</th>
								<td>
									<label>背景颜色 </label><input type="text" disabled class="minicolor-field" name="wy_wwBgColor" value="">
								</td>
								<td>
									<label>图标颜色 </label><input type="text" disabled class="minicolor-field" name="wy_wwIconColor" value="">
								</td>
								<td>
									<label>指向时背景颜色 </label><input type="text" disabled class="minicolor-field" name="wy_wwHoverBgColor" value="">
								</td>
								<td>
									<label>指向时图标颜色 </label><input type="text" disabled class="minicolor-field" name="wy_wwHoverIconColor" value="">
								</td>
							</tr>
							<tr>
								<th>选择图标</th>
								<td colspan="4">
									<input type="hidden" name="wy_wwIcon" value="<?php echo isset($wysjServOptions['wwIcon'])? $wysjServOptions['wwIcon']: ''; ?>">
									<?php wysj_serv_iconbox('ww-icon','wy_wwIcon'); ?>
								</td>
							</tr>
						</tbody>
					</table>
				</div>
				<div class="wy-con-item">
					<h3>电子邮箱</h3>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
				<div class="wy-con-item">
					<h3>Skype</h3>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
				<div class="wy-con-item">
					<h3>QQ群</h3>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
				<div class="wy-con-item">
					<h3>二维码设置</h3>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
				<div class="wy-con-item">
					<h3>回到顶部</h3>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
				<div class="wy-con-item">
					<h3>WhatsApp</h3>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
				<div class="wy-con-item">
					<h3>上传图标</h3>
					<p>上传您自己喜欢的图标，支持png、gif、svg、jpg等格式</p>
					<p>升级至完整版开启此功能，马上 <a href="https://www.5usj.cn/wp/5usujian-super-serv/" target="_blank">了解完整版</a></p>
				</div>
			</div>
		</div>
		<div class="wy-tab-header">
			<a class="wysj-logo" target="_blank" href="http://5usujian.com">
				<img src="<?php echo WYSJ_PATH.'/asset/images/wysj-logo.png'; ?>" title="无忧速建网-轻轻松松自己建网站" alt="无忧速建网-轻轻松松自己建网站">
			</a>
			<input type="hidden" name="wy_cssVer" value="<?php echo time(); ?>" />
			<input type="hidden" name="wysj_super_serv_update" value="update" />
			<input type="hidden" name="wysj_super_serv_nonce_update" value="<?php echo $wysj_serv_nonce; ?>" />
			<input type="submit" class="button-primary wysj-serv-save" name="Submit" value="<?php _e('Save Change','5usujian-super-serv'); ?>" />
		</div>
		
	</form>
	<div class="wysj-dialog" id="wysj-dialog">
		<div class="wysj-dialog-title"></div>
		<div class="wysj-dialog-content"></div>
	</div>
</div>
<?php 
}
add_action('admin_menu', 'wysj_super_serv_admin');
?>