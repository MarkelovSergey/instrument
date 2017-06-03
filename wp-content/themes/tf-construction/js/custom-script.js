jQuery(document).ready(function($) {
	/* MENU JS */
	if( $(window).width() > 767) {
		   $('.nav li.dropdown').hover(function() {
			   $(this).addClass('open');
		   }, function() {
			   $(this).removeClass('open');
		   }); 
		   $('.nav li.dropdown-menu').hover(function() {
			   $(this).addClass('open');
		   }, function() {
			   $(this).removeClass('open');
		   }); 
		}
		
		$('.nav li.dropdown').find('.caret').each(function(){
			$(this).on('click', function(){
				if( $(window).width() < 768) {
					$(this).parent().next().slideToggle();
				}
				return false;
			});
		});
		
	/* Onload Animation */
	 new WOW().init();
	
	/* For Scoll Up */
	 var amountScrolled = 300;
		$(window).scroll(function() {
			if ( $(window).scrollTop() > amountScrolled ) {
				$('a.scroll_up').fadeIn('slow');
			} else {
				$('a.scroll_up').fadeOut('slow');
			}
		});
		$('a.scroll_up').click(function() {
			$('html, body').animate({
				scrollTop: 100
			}, 700);
			return false;
		});

		//$('.back').parallax("10%", 0.4);	

		/* Slider 1 */
	var swiper = new Swiper('.swiper1', {
        pagination: '.swiper-pagination1',
		nextButton: '.swiper-button-next1',
        prevButton: '.swiper-button-prev1',
        slidesPerView: '1',
        paginationClickable: true,
        spaceBetween: 10,
		autoplay:3000,
		loop:true		
    });
	
	/* Swiper 2*/
	var swiper = new Swiper('.swiper2', {
		/* nextButton: '.swiper-button-next2',
        prevButton: '.swiper-button-prev2', */
        slidesPerView: '3',
        paginationClickable: true,
        spaceBetween: 20,
		autoplay:3000,
		loop:true,
		breakpoints: {
            1040: {
                slidesPerView: 3,
                spaceBetween: 40
            },
            768: {
                slidesPerView: 2,
                spaceBetween: 30
            },
            640: {
                slidesPerView: 1,
                spaceBetween: 20
            },
            320: {
                slidesPerView: 1,
                spaceBetween: 10
            }
        }	
    });
	
	/* Swiper 3*/
	var swiper = new Swiper('.swiper3', {
		pagination: '.swiper-pagination3',
        slidesPerView: '1',
        paginationClickable: true,
        spaceBetween: 20,
		autoplay:3000,
		loop:true	
    });

   
    var lightbox = $('.c_blog_post .c_port.p_left').simpleLightbox();

});