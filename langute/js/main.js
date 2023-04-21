/* =====================================
Template Name: Eduland
Author Name: ThemeLamp
Author URI: http://themelamp.com/
Description: Eduland is a awesome Education & Courses Template.
Version:	1.0
========================================*/

/*======================================
[ CSS Table of contents ]
* Search Form JS
* Mobile Menu JS
* Slider JS
* Nice Select JS
* Course Slider JS
* Course Single Slider JS
* Teachers Slider JS
* Testimonial Slider JS
* News Slider JS
* Events Slider JS
* Clients Slider JS
* Image Gallery JS
* CounterUp JS
* Circle JS
* Faqs JS
* VideoPopup JS
* Parallax JS
* ScrollUp JS
* Preloader JS
========================================*/

(function($) {
    "use strict";
     $(document).on('ready', function() {	
	
		/*===============================
			Search Form JS
		=================================*/
		$('.search-area .icon').on( "click", function(){
			$('.search-area').toggleClass('active');
		});		
		
		/*===============================
			Mobile Menu JS
		=================================*/
		$('.menu').slicknav({
			prependTo:".mobile-menu",
			duration: 600,
			closeOnClick:true,
		});
		

		/*================================
			Nice Select JS
		==================================*/ 
		$('select').niceSelect();
		
		
		/*================================
			Course Single Slider JS
		==================================*/ 
		$('.course-single-gallery').owlCarousel({
			items:1,
			autoplay:true,
			loop:false,
			animateIn: 'fadeIn',
			animateOut: 'fadeOut',
			autoplayTimeout:5000,
			autoplayHoverPause:true,
			smartSpeed: 500,
			merge:true,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false
		});
		
		/*================================
			Testimonials JS
		==================================*/ 
		$('.testimonial-slider').owlCarousel({
			items:1,
			autoplay:false,
			autoplayTimeout:3000,
			smartSpeed: 500,
			autoplayHoverPause:true,
			margin:0,
			loop:true,
			merge:true,
			center:false,
			nav:false,
			dots:true,
		});	
		
		
		/*================================
			News Slider JS
		==================================*/ 
		$('.news-slider').owlCarousel({
			autoplay:false,
			autoplayTimeout:3500,
			smartSpeed: 600,
			autoplayHoverPause:true,
			margin:10,
			loop:true,
			merge:true,
			dots:false,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			responsive:{
				300: {
					items:1,
					nav:false,
				},
				480: {
					items:1,
					nav:false,
				},
				768: {
					items:2,
					nav:false,
				},
				1170: {
					items:2,
				},
			}
		});	
		
		/*================================
			Events Slider JS
		==================================*/
		$('.event-gallery').owlCarousel({
			items:1,
			autoplay:false,
			autoplayTimeout:3500,
			smartSpeed: 600,
			autoplayHoverPause:true,
			animateOut: 'fadeOut',
			animateIn: 'fadeIn',
			margin:0,
			loop:true,
			merge:true,
			nav:true,
			navText: ['<i class="fa fa-angle-left" aria-hidden="true"></i>', '<i class="fa fa-angle-right" aria-hidden="true"></i>'],
			dots:false,
		});	
		
		/*================================
			Clients Slider JS
		==================================*/
		$('.client-slider').owlCarousel({
			autoplay:false,
			autoplayTimeout:3500,
			smartSpeed: 600,
			autoplayHoverPause:true,
			margin:30,
			loop:true,
			merge:true,
			nav:false,
			dots:false,
			responsive:{
				300: {
					items:2,
				},
				480: {
					items:3,
				},
				768: {
					items:3,
				},
				1170: {
					items:4,
				},
			}
		});	
		
		/*================================
			Image Gallery JS
		==================================*/
		$('#gallery-item').cubeportfolio({
			filters: '#gallery-menu',
			loadMore: '#loadMore',
			loadMoreAction: 'click',
			defaultFilter: '*',
			layoutMode: 'grid',
			animationType: 'quicksand',
			gridAdjustment: 'responsive',
			gapHorizontal: 20,
			gapVertical: 20,
				mediaQueries: [{
					width: 1100,
					cols: 3,
				},{
					width: 768,
					cols: 3,
				}, {
					width: 480,
					cols: 2,
				},{
					width: 0,
					cols: 1,
				}],
				caption: 'overlayBottomPush',
				displayType: 'sequentially',
				displayTypeSpeed: 80,

			// lightbox
			lightboxDelegate: '.cbp-lightbox',
			lightboxGallery: true,
			lightboxTitleSrc: 'data-title',
			lightboxCounter: '<div class="cbp-popup-lightbox-counter">{{current}} of {{total}}</div>',
		});

		
		/*================================
			CounterUp JS
		==================================*/
		$('.counter').counterUp({
			delay: 10,
			time: 4000
			
		});	
		
		/*================================
			Circle JS
		==================================*/
		$('.circle').circleProgress({
			fill: {
				color: '#05C46B'
			}
		})
		
		
		/*================================
			Faqs JS
		==================================*/
		$('.panel').on('click', function() {
            $(".panel").removeClass("active");
            $(this).addClass("active");
		});
		
		/*================================
			VideoPopup JS
		==================================*/
		$('.video-popup').magnificPopup({
			type: 'iframe',
			removalDelay: 300,
			mainClass: 'mfp-fade'
		});
	
		/*================================
			Parallax JS
		==================================*/
		$(window).stellar({
            responsive: true,
            positionProperty: 'position',
			horizontalOffset: 0,
			verticalOffset: 0,
            horizontalScrolling: false
        });
		
		/*=====================================
			Final CountDown
		======================================*/ 
		$('[data-countdown]').each(function() {
			var $this = $(this),
				finalDate = $(this).data('countdown');
			$this.countdown(finalDate, function(event) {
				$this.html(event.strftime(
					'<div class="cdown"><span class="days"><strong>%-D</strong><p>Days</p></span></div><div class="cdown"><span class="hour"><strong> %-H</strong><p>Hours</p></span></div> <div class="cdown"><span class="minutes"><strong>%M</strong> <p>Minutes</p></span></div><div class="cdown"><span class="second"><strong> %S</strong><p>Seconds</p></span></div>'
				));
			});
		});
		
		
		/*================================
			ScrollUp JS
		==================================*/
		$.scrollUp({
			scrollName: 'scrollUp',      // Element ID
			scrollDistance: 300,         // Distance from top/bottom before showing element (px)
			scrollFrom: 'top',           // 'top' or 'bottom'
			scrollSpeed: 1000,            // Speed back to top (ms)
			animation: 'fade',           // Fade, slide, none
			animationSpeed: 200,         // Animation speed (ms)
			scrollTrigger: false,        // Set a custom triggering element. Can be an HTML string or jQuery object
			scrollTarget: false,         // Set a custom target element for scrolling to. Can be element or number
			easing: 'easeInOutQuart',
			scrollText: ["<i class='fa fa-home'></i>"], // Text for element, can contain HTML
			scrollTitle: false,          // Set a custom <a> title if required.
			scrollImg: false,            // Set true to use image
			activeOverlay: false,        // Set CSS color to display scrollUp active point, e.g '#00FFFF'
			zIndex: 2147483647           // Z-Index for the overlay
		});
	
	});
		
		/*================================
			Preloader JS
		==================================*/
		$(window).on('load', function() {
				$('.book_preload').fadeOut('slow', function(){
				$(this).remove();
			});
		});
})(jQuery);