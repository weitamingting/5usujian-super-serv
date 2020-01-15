<?php
function tradeHtml()
{
	global $wysjServOptions;
	wp_enqueue_style('5usujian-serv-icon-css', WYSJ_PATH.'/asset/css/wysj-iconfont.css',array(),WYSJ_VER);
	wp_enqueue_style('5usujian-serv-trade-css', WYSJ_PATH.'/asset/css/5usujian-serv-trade.css',array(),WYSJ_VER);
	wp_enqueue_style('5usujian-serv-custom-css', WYSJ_UPLOADS_URL.'/5usujian-serv-custom.css',array(),$wysjServOptions['cssVer']);
	wp_enqueue_style('5usujian-serv-compatible-css',WYSJ_PATH.'/asset/css/5usujian-serv-compatible.css',array('5usujian-serv-custom-css'),WYSJ_VER);
	wp_enqueue_script('5usujian-serv-trade-js', WYSJ_PATH.'/asset/js/5usujian-serv-trade.js',array('jquery'),WYSJ_VER);
?>
	<div id="wysj-trade">
		<div class="wysj-trade-box">
			<?php
				if ($wysjServOptions['tradeToggleType'] == 'text') {
			?>
					<div class="wysj-trade-btn"><?php echo $wysjServOptions['tradeToggleText']; ?></div>
			<?php
				}
			?>
			<?php
				if ($wysjServOptions['tradeToggleType'] == 'img') {
			?>
					<div class="wysj-trade-btn-img"><img src="<?php echo $wysjServOptions['tradeToggleImg']; ?>" alt=""></div>
			<?php
				}
			?>
			<div class="wysj-trade-title"><?php echo $wysjServOptions['tradeToggleText']; ?></div>
			<?php
				getTradePhone();
				getTradeQQ();
				getTradeWW();
			?>
		</div>
	</div>
<?php
}
?>
<?php
function getTradePhone(){
	global $wysjServOptions;
    if (!isset($wysjServOptions['phone'])){
        return;
    }
	if ( count($wysjServOptions['phone']) > 0 && $wysjServOptions['phone'][0] != '') {
			?>
		<div class="wysj-trade-item">
			<div class="wysj-titem-title">热线电话</div>
			<ul class="wysj-titem-serv">
				<?php
					for ($i=0; $i < count($wysjServOptions['phone']); $i++) { 
				?>
				<li>
					<a href="tel:<?php echo $wysjServOptions['phone'][$i]; ?>">
						<span class="wysj-titem-serv-phone"><?php echo $wysjServOptions['phone'][$i]; ?></span>
					</a>
				</li>
				<?php
					}
				?>
			</ul>
		</div>
		<?php
		}
}
?>
<?php
function getTradeQQ(){
	global $wysjServOptions;
    if (!isset($wysjServOptions['qq'])){
        return;
    }
	if ( count($wysjServOptions['qq']) > 0 && $wysjServOptions['qq'][0] != '') {
			?>
		<div class="wysj-trade-item">
			<div class="wysj-titem-title">QQ客服</div>
			<ul class="wysj-titem-serv">
				<?php
					for ($i=0; $i < count($wysjServOptions['qq']); $i++) { 
				?>
				<li>
				<a target="_blank" href="http://wpa.qq.com/msgrd?v=3&uin=<?php echo $wysjServOptions['qq'][$i]; ?>&site=qq&menu=yes">
						<span class="wysj wysj-qq wysj-titem-icon"></span>
						<span class="wysj-titem-serv-title"><?php echo $wysjServOptions['qqName'][$i]; ?></span>
					</a>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
		<?php
	}
}
?>
<?php
function getTradeWW(){
	global $wysjServOptions;
    if (!isset($wysjServOptions['ww'])){
        return;
    }
	if ( count($wysjServOptions['ww']) > 0 && $wysjServOptions['ww'][0] != '') {
			?>
		<div class="wysj-trade-item">
			<div class="wysj-titem-title">旺旺客服</div>
			<ul class="wysj-titem-serv">
				<?php
					for ($i=0; $i < count($wysjServOptions['ww']); $i++) { 
				?>
				<li>
					<a target="_blank" href="http://www.taobao.com/webww/ww.php?ver=3&touid=<?php echo $wysjServOptions['ww'][$i]; ?>&siteid=cntaobao&status=1&charset=utf-8">
						<span class="wysj wysj-wangwang-b wysj-titem-icon"></span>
						<span class="wysj-titem-serv-title"><?php echo $wysjServOptions['wwName'][$i]; ?></span>
					</a>
				</li>
				<?php
				}
				?>
			</ul>
		</div>
		<?php
		}
}
?>
<?php
function getTradeDiy(){
	return;
}
function getTradeScrollTop(){
	return;
}
?>