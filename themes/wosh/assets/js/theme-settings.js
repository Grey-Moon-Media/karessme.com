jQuery(document).ready(function($){
	$('.system-theme-settings').before('<div class="theme-setting-header"><div class="col-half theme-brand"><h3><span>W</span>WOSH THEME</h3></div><div class="col-half theme-version">1.0</div></div>');
});
 $(document).ready(function() {
	$('.field-overall-rating').each(function() {
		$(this).insertAfter($(this).parent().find('.product-title'));
	});
});
$(document).ready(function() {
	$('.lds-dual-ring').hide(); 
	$('#edit-actions-next').click(function() {
	  $('.lds-dual-ring').show(); // <- Show spinner here
		$.ajax({
		  url: "/checkout/" + this.id + "/complete",
		  success: function(result) {
		  $('.lds-dual-ring').hide(); // <- Hide spinner here
		}
	  });
	});
  });