var wysjFront = {
	backTop:function(){
		jQuery('html,body').stop(false, true).animate({scrollTop: 0}, 600);
	},
	hideTrade: function(me){
		jQuery("#wysj-trade").removeClass('hover')
		jQuery(me).remove()
	}
}
jQuery(function() {

	jQuery(".wysj-trade-btn,.wysj-trade-btn-img").on('click', function(event) {
		var box = jQuery("#wysj-trade");
		if (!box.hasClass('hover')) {
			box.addClass('hover')
			jQuery("body").append('<div id="wysj-model" onclick="wysjFront.hideTrade(this)" ontouchstart="wysjFront.hideTrade(this)" ontouchmove="wysjFront.hideTrade(this)"></div>')
		}else{
			box.removeClass('hover')
			jQuery("#wysj-model").remove()
		}
		
	});

});
