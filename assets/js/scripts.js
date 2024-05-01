jQuery(function($) {
	
$(document).ready(function() {
	
	$(document).on('click', 'a.tab', function() {
		
		var thisTab = $(this).data('tab');
		var tabEl = $('div.tab.tab_' + thisTab);
		if (!tabEl.length) {
			return false;
		}
		
		$('a.tab').removeClass('active');
		$(this).addClass('active');
		
		$('div.tab').hide();
		tabEl.show();
		
		return false;
		
	});
	
});
	
});