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

	//Копка мобильного меню

var winW = $(window).width();

if (winW < 1000){
	$('#but_menu').click(function(){
	  $('#nav_main_menu').slideToggle();
	})
	
	// $(window).scroll(function(){
	//   $('#nav_main_menu').slideUp();
	// })
	
	$('#nav_main_menu a').click(function(){
	  $('#nav_main_menu').slideUp();
	})
	}
	
	$('#search_icon').click(function(){
		$('#search_header').toggleClass('form_sivible');
		$('#search_header input').focus();
	})
	$(window).scroll(function(){
		$('#search_header').removeClass('form_sivible');
	})

		//fancybox
		Fancybox.bind("[data-fancybox]", {
			// Your custom options
		  });

	//карусель

	const container = document.getElementById("myCarousel");
	const container2 = document.getElementById("adverPubl");
	const options = { 
		infinite: true,
		center: true,
		Navigation: false,
		Dots : false,
		Autoplay: {
			timeout: 10000,
			autoStart : true,
		},
 
	};

	if (container){
		new Carousel(container, options, { Autoplay }); //Реклама для страницы личности
	}
	if (container2){
		new Carousel(container2, options, { Autoplay }); //Реклама общая для все категорий
	}

}); // Конец Ready
	
});