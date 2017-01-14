$(document).ready(function(){
	
	(function(){
			  
		$('.po-slider-loop').bxSlider({
		  auto: ($(".po-slider-loop li").length > 1) ? true: false,
		  autoControls: false,
		  speed: 1000,
		  pause:10000,
		  mode: 'fade',
		  pager: false
		});
		
	})();
	
	(function(){
			  
		$(document).ready(function(){
	 	// Target your .container, .wrapper, .post, etc.
		 $(".entry-content, .video-container").fitVids();
	 	});
		
	})();
	
	(function(){
			  
		$('.po-slider-loop-no-control').bxSlider({
		  auto: ($(".po-slider-loop-no-control li").length > 1) ? true: false,
		  autoControls: false,
		  speed: 1000,
		  pause:10000,
		  mode: 'fade',
		  pager: false,
		  controls: false
		});
		
	})();
	
	(function(){
	if ( $(window).width() > 767) {		  
		$('.po-carousel, .po-carousel-ie').bxSlider({
		  minSlides: 1,
		  maxSlides: 4,
		  slideWidth: 340,
		  slideMargin: 0,
		  pager: false
		});
	}
	else
	{
		$('.po-carousel, .po-carousel-ie').bxSlider({
		  slideWidth: 320,
		  slideMargin: 0,
		  pager: false
		});
	}
	})();
	
	$('.po-test-slide').bxSlider({
	  adaptiveHeight: true,
	  mode: 'fade',
	  pager: false
	});
	
	(function() {
		var delay = $(".po-slider-text-container, .po-slider-text-container-static").data("text-delay");	
		var quotes = $(".po-slider-header");
		var quoteIndex = -1;
		
		$(".po-slider-header").hide();
		$(".po-slider-header").delay(delay);
		if(quotes.length > 1)
		{
		function showNextQuote() {
			
			++quoteIndex;
			quotes.eq(quoteIndex % quotes.length)
				.fadeIn(2000)
				.delay(delay)
				.fadeOut(2000, showNextQuote);
		}
		
		showNextQuote();
		} else
		{
			function singleQuote() {
			
			++quoteIndex;
			quotes.eq(quoteIndex % quotes.length)
				.fadeIn(2000)
				.delay(delay)
		}
		
		singleQuote();
		}
		
	})();
	
	(function() {
		var sliderBackground = $('.background-greyscale');	  
		var sliderImages = $('.po-slider-loop');
		var sliderText = $('.po-slider-text-container');
		var sliderButtons = $('.po-slider-buttons');
		var sliderLogo = $('.po-slider-logo');
		if ( $(window).width() > 992) {
			$(window).on('scroll', function() {
			   var st = $(this).scrollTop();
			   sliderBackground.css({ 'opacity' : (0.5 - st/800) });
			   sliderImages.css({ 'opacity' : (1 - st/400) });
			   sliderText.css({ 'opacity' : (1 - st/100) });
			   sliderButtons.css({ 'opacity' : (1 - st/300) });
				sliderLogo.css({ 'opacity' : (1 - st/550) });
				 
			});
		}
	})();
	
	(function() {
		if ( $(window).width() > 992) {	  
		$.stellar({
		  // Set scrolling to be in either one or both directions
		  horizontalScrolling: false,
		  verticalScrolling: true,
		
		  // Set the global alignment offsets
		  horizontalOffset: 0,
		  verticalOffset: 0,
		
		  // Refreshes parallax content on window load and resize
		  responsive: false,
		
		  // Select which property is used to calculate scroll.
		  // Choose 'scroll', 'position', 'margin' or 'transform',
		  // or write your own 'scrollProperty' plugin.
		  scrollProperty: 'scroll',
		
		  // Select which property is used to position elements.
		  // Choose between 'position' or 'transform',
		  // or write your own 'positionProperty' plugin.
		  positionProperty: 'position',
		
		  // Enable or disable the two types of parallax
		  parallaxBackgrounds: true,
		  parallaxElements: true,
		
		  // Hide parallax elements that move outside the viewport
		  hideDistantElements: false,
		
		  // Customise how elements are shown and hidden
		  hideElement: function($elem) { $elem.hide(); },
		  showElement: function($elem) { $elem.show(); }
		});
		}
 	
	})();
	
	(function() { 
		"use strict";
		if ( $(window).width() > 992) {
			// Init Skrollr
			var s = skrollr.init({
				render: function(data) {
					//Debugging - Log the current scroll position.
					//console.log(data.curTop);
				},
				forceHeight:false
			});
		}
	})();
	
	(function() {
  
		var menu = document.querySelector('.po-nav');
		var origOffsetY = menu.offsetTop;
		
		function scroll () {
		  if ($(window).scrollTop() >= origOffsetY) {
			$('.po-navbar-slide').addClass('navbar-fixed-top');
			$('.po-nav-slide').addClass('nav-fixed-padding');
		  } else {
			$('.po-navbar-slide').removeClass('navbar-fixed-top');
			$('.po-nav-slide').removeClass('nav-fixed-padding');
		  }  
		  
		  
		}
		
		document.onscroll = scroll;		  
 	
	})();
	
	(function() {
  
		jQuery('.nav li.dropdown').hover(function() {
		jQuery(this).addClass('hovered');
		}, function() {
		jQuery(this).removeClass('hovered');
		});

 	
	})();
	
	(function() {
		if ( $(window).width() > 992) {
			//Add Hover effect to menus
			jQuery('.po-navbar ul.nav li.dropdown').hover(function() {
			  jQuery(this).find('.dropdown-menu').stop(true, true).fadeIn(200);
			}, function() {
			  jQuery(this).find('.dropdown-menu').stop(true, true).fadeOut(100);
			});
		}
	})();
	
	(function() {
		var logoAnimation = $(".po-slider-logo").data("logo-animation");		  
		var detailsAnimation = $(".po-slider-details").data("details-animation");	
		var textAnimation = $(".po-slider-text").data("text-animation");	
			$(".po-slider-logo").addClass(logoAnimation); 
			$(".po-slider-details").addClass(detailsAnimation); 
			$(".po-slider-text").addClass(textAnimation);
 	
	})();
	
	(function() {
		var detailsDelay = $(".po-slider-details").data("details-delay");	
		var textDelay = $(".po-slider-text-container, .po-slider-text-container-static").data("text-delay");	
		var logoDelay = $(".po-slider-logo").data("logo-delay");
		$(window).load(function(){
			$(".po-slider-load").fadeOut(200); 					
			$(".load-block").delay(200).fadeOut(1000);
			$(".po-slider-details").delay(detailsDelay).fadeIn(0); 
			$(".po-slider-text-container, .po-slider-text-container-static").delay(textDelay).fadeIn(0);
			$(".po-page").fadeIn();
			$(".logo").delay(logoDelay).animate({opacity:1},1000);
		});	  
 	
	})();
	
	(function() {
			  
		$('#learn-more-button').click(function(){
			$('html, body').animate({scrollTop:$(".po-nav").offset().top}, 1000);
			return false;
		}); 
 	
	})();
	
	(function() {

		var divs = $('.to-top');
		
		if ( $(window).width() < 767) {
		$(window).scroll(function(){
		   if($(window).scrollTop()<350){
				 divs.fadeOut(500);
		   } else {
				 divs.fadeIn(500);
		   }
		});
		}
		
		else {
		$(window).scroll(function(){
		   if($(window).scrollTop()<700){
				 divs.fadeOut(500);
		   } else {
				 divs.fadeIn(500);
		   }
		});
		}

		
	})();
	
	(function() {

		var divs = $('.search-icon, .search-icon-form');
		
		if ( $(window).width() > 992) {
		$(window).scroll(function(){
		   if($(window).scrollTop()<700){
				 divs.fadeOut(500);
		   } else {
				 divs.fadeIn(500);
		   }
		});
		}

		
	})();
	
	(function() {

		var searchForm = $('.search-form');
		$(window).scroll(function(){
		   if($(window).scrollTop()<700){
				 searchForm.fadeOut(500);
		   } 
		});
		
	})();
	
	(function() {

		$('.to-top').on("click",function(){
			$('html,body').animate({ scrollTop: 0 }, 'slow');
		}); 
		
	})();
	
	(function() {
		if ( $(window).width() > 768) {
			$(".po-column, .portfolio-item, .po-column-mobile").each(function() {
				var animatedElement = $(this),
				animation = animatedElement.data('animation'),
				delay = animatedElement.data('delay');
				
				animatedElement.appear(function() {
				setTimeout(function(){ 
					animatedElement.addClass(animation);
				}, delay);
				});
			});
		}
	})();
	
	(function() {
		$(".po-column-mobile-ani").each(function() {
			var animatedElement = $(this),
			animation = animatedElement.data('animation'),
			delay = animatedElement.data('delay');
			
			animatedElement.appear(function() {
			setTimeout(function(){ 
				animatedElement.addClass(animation);
			}, delay);
			});
		});
	})();
	
	(function() {
		if ( $(window).width() < 991) {
			$(".po-column-mobile").each(function() {
				var animatedElement = $(this),
				animation = animatedElement.data('animation'),
				delay = animatedElement.data('delay');
				setTimeout(function(){ 
					animatedElement.addClass(animation);
				}, delay);
			});
		}
	})();
	
	(function() {
		var opts = {
		  lines: 6, // The number of lines to draw
		  length: 15, // The length of each line
		  width: 1, // The line thickness
		  radius: 8, // The radius of the inner circle
		  corners: 0, // Corner roundness (0..1)
		  rotate: 0, // The rotation offset
		  direction: 1, // 1: clockwise, -1: counterclockwise
		  color: '#fff', // #rgb or #rrggbb or array of colors
		  speed: 1, // Rounds per second
		  trail: 62, // Afterglow percentage
		  shadow: false, // Whether to render a shadow
		  hwaccel: false, // Whether to use hardware acceleration
		  className: 'spinner', // The CSS class to assign to the spinner
		  zIndex: 2e9, // The z-index (defaults to 2000000000)
		  top: 'auto', // Top position relative to parent in px
		  left: 'auto' // Left position relative to parent in px
		};
		var target = document.getElementById('po-slider-load');
		var spinner = new Spinner(opts).spin(target);
	})();
	
	(function() {
		$(window).load(function(){
			$(".po-background-video").animate({opacity:1});
		});	
	})();
	
	(function() {
			$('.po-count').each(function(){
				var that = $(this);	
				$(that).appear(function() {	  
					$('.po-number').countTo();
				});
			});
		
	})();
	
	(function() {
		$(".liquid-container, .liquid-container-footer, .liquid-container-clients, .liquid-container-page, .liquid-container-format, .non-immediate-parent-container-b, .po-carousel li, .media-container").imgLiquid();
	})();
	
	(function() {
		$('.arrow').hover(
			   function(){ $('.banner, .titleb').fadeIn(200) },
			   function(){ $('.banner, .titleb').fadeOut(200) }
		);
		
		$('.arrow-next').hover(
			   function(){ $('.banner2, .titlea').fadeIn(200) },
			   function(){ $('.banner2, .titlea').fadeOut(200) }
		);
	})();
	
	(function() {
		$('.progress').each(function(){
			var that = $(this);
			that.appear(function() {
			var progressBar = $(this).find('.progress-bar').data("progress");
			var progress = $(this);
			progress.find('.progress-bar').animate({width:progressBar + '%'}, 900, function() {
				progress.parent().find('.progress-value').fadeIn(600);
			});
			});
		});
	})();
	
	(function() {
		$('.dial').each(function () {

           var $this = $(this);
           var myVal = $(this).data("value");	
		   
		   $this.appear(function() {
           // alert(myVal);
           $this.knob({

           });
		   
           $({
               value: 0
           }).animate({

               value: myVal
           }, {
               duration: 1200,
               easing: 'swing',
               step: function () {
                   $this.val(Math.ceil(this.value)).trigger('change');

               }
           });
		    });

       });
	})();
	(function() {
		// init Isotope
		var $container = $('#container').imagesLoaded( function() {
		  $container.fadeIn(400).isotope({
			// options
		  });
		});
		// filter items on button click
		$('#filters').on( 'click', 'span', function( event ) {
		  var filterValue = $(this).attr('data-filter-value');
		  $container.isotope({ filter: filterValue });
		});
	})();
	(function() {
		$(document).ready(function() {
			$(".btn").first().button("toggle");
		});
	})();
	
	(function() {
		$('.po-tooltip, .client-container').tooltip()
	})();
	(function() {
		if ( $(window).width() > 992) {
			$(".search-icon, .search-icon-form, .search-icon-noslide, .search-icon-form-noslide").click(function () {
				$(".search-form, .search-form-noslide").toggle('slide', {
				direction: 'left'
			}, 800);
				$(".search-input").focus();
			});
			
			$(".po-page").click(function () {
				$(".search-form, .search-form-noslide").hide('slide', {
				direction: 'left'
			}, 800);						  
			});
		}
	})();
	(function() {
		$('.bg-image-ani').delay(200).fadeIn(400);
	})();
	(function() {
		
		$('#myModal').on('show.bs.modal', function () {		
		var embedCode = $(this).attr('data-embed-code');
			$('div.modal-body').html(embedCode);  
			
			$('#myModal').on('hide.bs.modal', function () {
				$('div.modal-body').html('&nbsp;');  
			});
			
		});	
	})();
	
	(function() {
		"use strict";
	$(".scroll-arrow").each(function() {	
		var scrollArrow = $(this),
		scrollTowards = scrollArrow.data('scroll');						 
		scrollArrow.click(function() {
			$('html, body').animate({
				scrollTop: $('#' + scrollTowards).offset().top
			}, 700, "easeInCubic");
		});
	});
	})();

});