var wysjAdmin = {
	wy_del_serv:function(obj){
		jQuery(obj).parents('tr').remove();
	},
	closeChose:function(){
		jQuery(".wy-chose-box").hide();
	},
	wy_chose_diy:function(obj){
		var theIcon = jQuery("#diy-chose-icon").find('a');
		jQuery(".wy-chose-box").show();
		theIcon.off().on('click', function(event) {
			if(confirm('升级到完整版开启自定义图标功能，马上获取完整版？')){
				location.href = 'https://www.5usj.cn/wp/5usujian-super-serv/'
			}
		})
	},
	wy_chose_shrink:function(obj){
		var theIcon = jQuery("#diy-chose-icon").find('a');
		jQuery(".wy-chose-box").show();
		theIcon.off().on('click', function(event) {
			if(confirm('升级到完整版开启自定义图标功能，马上获取完整版？')){
				location.href = 'https://www.5usj.cn/wp/5usujian-super-serv/'
			}
		})
	},
	wy_chose_mobile:function(obj){
		var theIcon = jQuery("#diy-chose-icon").find('a');
		jQuery(".wy-chose-box").show();
		theIcon.off().on('click', function(event) {
			if(confirm('升级到完整版开启自定义图标功能，马上获取完整版？')){
				location.href = 'https://www.5usj.cn/wp/5usujian-super-serv/'
			}
		})
	},
	//Check key
	check_key:function(alipayid,pluginkey){
		jQuery("#wysj-dialog").addClass('show').children('.wysj-dialog-content').html('正在验证密钥...');
	    jQuery.ajax({
	        type: "POST",
	        url: "https://active.wysujian.com/plugin_key/check_key_active.php",
	        data: {
	            alipayid: alipayid,
	            pluginkey: pluginkey
	        },
	        success: function(msg){
	        	if(msg){
					jQuery("#wysj-dialog").children('.wysj-dialog-content').html('验证成功，继续验证域名是否合法，请稍后...');
					wysjAdmin.active_plugin(alipayid,pluginkey,"ok", "yes");
		        }else{
					wysjAdmin.active_plugin(alipayid,pluginkey,"failed", "yes");
		        }
	        }
	    })
	},
    arrRepeat:function(arr){
    	var arrStr = arr;
		for (var i = 0; i < arr.length; i++) {
			if (arrStr.indexOf(arr[i]) != arrStr.lastIndexOf(arr[i])){
				return true;//重复
			}
		}
		return false;//不重复
	},
	trim(str){
		return str.replace(/(^\s*)|(\s*$)/g, "");
	}
}
jQuery(function() {
	jQuery(".minicolor-field").minicolors({
		format: "rgb",
		opacity: 1
	});
	
	//风格选项控制
	jQuery(".wy-single,.wy-normal,.wy-trade").hide();
	jQuery(".wy-"+jQuery("input[name=wy_style]:checked").val()).show();
	jQuery("input[name=wy_style]").on('click', function(event) {
		jQuery(".wy-single,.wy-normal,.wy-trade").hide();
		jQuery(".wy-"+jQuery(this).val()).show();
	});
	var tabItem = jQuery('.wy-tab-item a');
	var tabCon = jQuery('.wy-tab-content .wy-con-item');
	//选项卡切换
	tabItem.on('click',  function(event) {
		tabItem.removeClass('active');
		tabCon.removeClass('active');
		jQuery(this).addClass('active');
		tabCon.eq(jQuery(this).attr('index')).addClass('active');
	});
	//电话号码增删
	jQuery('.wy-add-phone').on('click', function(event) {
		jQuery('#wy-phone-list tbody').append('<tr><th>电话号码</th><td><input type="text" name="wy_phone[]" value=""><span class="wy_tips">输入电话号码</span></td><th>号码名称</th><td><input type="text" name="wy_phoneName[]" value=""><span class="wy_tips">输入号码说明名称</span></td><td><a href="javascript:;" class="button-primary wy-del-phone" onclick="wysjAdmin.wy_del_serv(this)">删除号码</a></td></tr>');
	});
	//QQ客服增删
	jQuery('.wy-add-qq').on('click', function(event) {
		jQuery('#wy-qq-list tbody').append('<tr><th>QQ号码</th><td><input type="text" name="wy_qq[]" value=""><span class="wy_tips">输入QQ号码</span></td><th>客服名称</th><td><input type="text" name="wy_qqName[]" value=""><span class="wy_tips">输入客服昵称</span></td><td><a href="javascript:;" class="button-primary wy-del-qq" onclick="wysjAdmin.wy_del_serv(this)">删除客服</a></td></tr>');
	});
	//旺旺客服增删
	jQuery('.wy-add-ww').on('click', function(event) {
		jQuery('#wy-ww-list tbody').append('<tr><th>旺旺号码</th><td><input type="text" name="wy_ww[]" value=""><span class="wy_tips">输入旺旺账号，支持淘宝卖家，不支持阿里巴巴</span></td><th>客服名称</th><td><input type="text" name="wy_wwName[]" value=""><span class="wy_tips">输入客服昵称</span></td><td><a href="javascript:;" class="button-primary wy-del-ww" onclick="wysjAdmin.wy_del_serv(this)">删除客服</a></td></tr>');
	});


	jQuery('select[name=wy_mobile]').on('change', function(event) {
		event.preventDefault();
		if (jQuery(this).val() == "enable") {
			jQuery('.wy_mobile').show()
		}else{
			jQuery('.wy_mobile').hide()
		}
	});
	if (jQuery('select[name=wy_mobile]').val() == "enable") {
		jQuery('.wy_mobile').show()
	}else{
		jQuery('.wy_mobile').hide()
	}
	
	jQuery('#tradeToggleImg-btn').on('click',function(event){
		var wysj_upload_frame;
        event.preventDefault();
        if( wysj_upload_frame ){   
            wysj_upload_frame.open();   
            return;   
        }
        wysj_upload_frame = wp.media({   
            title: '插入图片',   
            button: {   
                text: '插入',   
            },   
            multiple: false   
        });
        wysj_upload_frame.on('select',function(){   
            var attachment = wysj_upload_frame.state().get('selection').first().toJSON();
            jQuery('#wy_tradeToggleImg').val(attachment.url);
        });    
        wysj_upload_frame.open();   
    });
	//提交表单
	jQuery(".wysj-serv-save").on('click', function(event) {
		event.preventDefault();
		jQuery("input[name=wy_cssVer]").val(new Date().getTime());
		var sort = [];
		jQuery(".wy-sort").each(function(index, el) {
			sort.push(jQuery(el).val());
		});
		if ( wysjAdmin.arrRepeat(sort) ) {
			alert("排序序号不能重复，请检查排序！");
			return;
		};

		jQuery.ajax({
			url: '',
			type: 'POST',
			data: jQuery('#wy-serv-form').serialize(),
			beforeSend: function(){
				jQuery(".wysj-serv-save").attr('disabled', true);
				jQuery("#wysj-dialog").addClass('show').children('.wysj-dialog-content').html('正在保存，请稍候...');
			},
			success: function(data) {
               	jQuery("#wysj-dialog").children('.wysj-dialog-content').html('保存成功！');
               	var timer = setTimeout(function(){jQuery("#wysj-dialog").removeClass('show')},1000);
            },
            error: function(){

            },
            complete: function(){
            	jQuery(".wysj-serv-save").attr('disabled', false);
            	// wysjAdmin.setCookie("wysj-plugin-checked", "", -1, "/");
        		// wysjAdmin.setCookie("wysj-plugin-dismiss", "", -1, "/");
            }
		});
		
	});
	
});