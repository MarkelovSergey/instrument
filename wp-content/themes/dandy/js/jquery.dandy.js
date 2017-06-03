(function($) {
	"use strict";
	
	$(document).ready(function() {
		
		/*-----------------------------------------------------------------------------------*/
		/*  Flash News
		/*-----------------------------------------------------------------------------------*/ 
			$('#dandyFlash').newsTicker({
				  row_height: 40,
				  max_rows: 1,
				  speed: 400,
				  direction: 'up',
				  duration: 4000,
				  autostart: 1,
				  pauseOnHover: 1
			});
		
		/*-----------------------------------------------------------------------------------*/
		/*  Home icon in main menu
		/*-----------------------------------------------------------------------------------*/ 
			if($('body').hasClass('rtl')) {
				$('.main-navigation .menu-item-home > a').append('<i class="fa fa-home spaceLeft"></i>');
			} else {
				$('.main-navigation .menu-item-home > a').prepend('<i class="fa fa-home spaceRight"></i>');
			}
		
		/*-----------------------------------------------------------------------------------*/
		/*  Mobile Menu
		/*-----------------------------------------------------------------------------------*/ 
			if ($( window ).width() <= 1024) {
				$('.main-navigation').find("li").each(function(){
					if($(this).children("ul").length > 0){
						$(this).append("<span class='indicator'></span>");
					}
				});
				$('.main-navigation ul > li.menu-item-has-children .indicator, .main-navigation ul > li.page_item_has_children .indicator').click(function() {
					$(this).parent().find('> ul.sub-menu, > ul.children').toggleClass('yesOpen');
					$(this).toggleClass('yesOpen');
					var $self = $(this).parent();
					if($self.find('> ul.sub-menu, > ul.children').hasClass('yesOpen')) {
						$self.find('> ul.sub-menu, > ul.children').slideDown(300);
					} else {
						$self.find('> ul.sub-menu, > ul.children').slideUp(200);
					}
				});
			}
			$(window).resize(function() {
				if ($( window ).width() > 769) {
					$('.main-navigation ul > li.menu-item-has-children, .main-navigation ul > li.page_item_has_children').find('> ul.sub-menu, > ul.children').slideDown(300);
				}
			});
			
		/*-----------------------------------------------------------------------------------*/
		/*  Detect Mobile Browser
		/*-----------------------------------------------------------------------------------*/ 
		if ( /Android|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
		} else {
			
			/*-----------------------------------------------------------------------------------*/
			/*  Scroll To Top
			/*-----------------------------------------------------------------------------------*/ 
				$(window).scroll(function(){
					if ($(this).scrollTop() > 700) {
						$('#toTop').fadeIn(300);
					} 
					else {
						$('#toTop').fadeOut(300);
					}
				}); 
				$('#toTop').click(function(){
					$("html, body").animate({ scrollTop: 0 }, 1000);
					return false;
				});
			/*-----------------------------------------------------------------------------------*/
			/*   Sticky & Resize Menu
			/*-----------------------------------------------------------------------------------*/
			var $filter = $('.headContDan');
			var $filterSpacer = $('<div />', {
				"class": "filter-drop-spacer",
				"height": $filter.outerHeight()
			});
			
			$(window).scroll(function(){
					if ($(this).scrollTop() > 39) {
						$filter.before($filterSpacer);
						$('.headContDan').addClass('dHeaderRes');
						$('.site-description').addClass('dDescRes');
						$('.main-navigation a').addClass('dNavRes');
						$('.site-title').addClass('dTitRes');
						$('.custom-logo').addClass('dLogoRes');
					} 
					else {
						$filterSpacer.remove();
						$('.headContDan').removeClass('dHeaderRes');
						$('.site-description').removeClass('dDescRes');
						$('.main-navigation a').removeClass('dNavRes');
						$('.site-title').removeClass('dTitRes');
						$('.custom-logo').removeClass('dLogoRes');
					}
				}); 
			/*----------------------------------------------------------------------------------*/
			/*
			/*----------------------------------------------------------------------------------*/
			
		}
		
	});
	
})(jQuery);