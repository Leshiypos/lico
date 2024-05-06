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
	
	$('#search_icon').click(function(){
		$('#search_header').addClass('form_sivible');
	})
	$(window).scroll(function(){
		$('#search_header').removeClass('form_sivible');
	})

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