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

	//карусель

	const container = document.getElementById("myCarousel");
	const options = { 
		infinite: true,
		Navigation: false,
		Dots : false,
		Autoplay: {
			timeout: 10000,
			autoStart : true,
		  },
 
	};

	new Carousel(container, options, { Autoplay });

	//fancybox
	Fancybox.bind("[data-fancybox]", {
		// Your custom options
	  });
	
}); // Конец Ready
	
});