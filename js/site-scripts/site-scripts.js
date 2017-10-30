// define $
$ = jQuery.noConflict();

// Width detector. Good for triggering responsive actions
$(document).ready(function(){
	var compareWidth; 
	var detector;
	detector = $('#wrapper'); // whatever container accurately reflects the site width
	compareWidth = detector.width();
	$(window).resize(function(){
		if(detector.width()!=compareWidth){
			compareWidth = detector.width();
			if(detector.width()>1023){
				$('.header-nav-mobile-wrapper').attr('style', '');
				$('.navicon').removeClass('active');
			}
		}
	});
	
	//homepage team carousel
	$('.team-members').slick({
        infinite: false,
        slidesToShow: 3,
        slidesToScroll: 1,
        swipeToSlide: true,
        adaptiveHeight: false,
        responsive: [{
            breakpoint: 769,
            settings: {
                slidesToShow: 2,
            }
        },
        {
            breakpoint: 480,
            settings: {
                slidesToShow: 1,
            }
        }]
    });
    
    $('.team-member').click(function(){
	    var bio_count = $(this).data('bio');
	    $('.team-member-long-bio[data-bio='+bio_count+']').fadeIn();
    });
    $('.team-member-long-bio').click(function(){
	    $(this).fadeOut();
    });
    
/*
    $('.nav-link').click(function(){
	    var section = $(this).data('section');
	    $('html,body').animate({scrollTop: $('section[data-section="'+section+'"]').offset().top - 120},800);
	    if($('.navicon').hasClass('active') && $('.header-nav-mobile-wrapper:visible')){
		    $('.navicon').removeClass('active');
		    $('.header-nav-mobile-wrapper').slideToggle();
	    }
	    return false;
    });
*/
    
    $('header nav .anchor a, footer nav .anchor a').click(function(){
	    if($('body').hasClass('home')){
			var section = $(this).attr('href');
			section = section.split('#')[1];
			$('html,body').animate({scrollTop: $('section[data-section="'+section+'"]').offset().top - 120},800);
			if($('.navicon').hasClass('active') && $('.header-nav-mobile-wrapper:visible')){
			    $('.navicon').removeClass('active');
			    $('.header-nav-mobile-wrapper').slideToggle();
		    }
			return false;
		}
	});
    
    $('.navicon').click(function(){
	    $('.header-nav-mobile-wrapper').slideToggle();
	    $('.navicon').toggleClass('active');
    });
    
    $('.section-2').waypoint(function(direction) {
		if (direction === 'down') {
			$('header').addClass('condensed');
		}
		else {
			$('header').removeClass('condensed');
		}
	}, {
		offset: function(){
			if($('body').hasClass('home')){
				return 200;
			}
			else {
				return -200;
				
			}
		}
	});
	
	//transitions
	setTimeout(function(){
        $('.fade-in-load').css('opacity', 1);
    }, 600);
    
    scrollfade_in_up($('.fade-in-out-scroll'), 100, 300, 2.5);
    scrollfade_in_left($('.fade-in-out-scroll-left'), 100, 200, 2.5);
    scrollfade_in_right($('.fade-in-out-scroll-right'), 100, 200, 2.5);
    scrollfade_in_left($('.fade-in-out-scroll-left-alt'), 100, 400, 2.5);
    scrollfade_in_right($('.fade-in-out-scroll-right-alt'), 100, 400, 2.5);
    scrollfade_in($('.fade-in-out-scroll-simple'), 100, 300);
});

function scrollfade(element, range, manualoffset){
	$(window).on('scroll', function () {
        var scrollTop = $(this).scrollTop();
        var offset = element.offset().top;
        if(manualoffset !== 0){
            offset = manualoffset;
        }
        var height = element.outerHeight();
        offset = offset + height / 2;
        var calc = 1 - (scrollTop - offset + range) / range;
        element.css({ 'opacity': calc });
      
        if ( calc > '1' ) {
            element.css({ 'opacity': 1 });
        } else if ( calc < '0' ) {
            element.css({ 'opacity': 0 });
        }
      
    });
}

function scrollfade_in(element, range, manualoffset, emthreshold){
    if($(window).height() < 450){
        manualoffset = manualoffset / 4;
    }
    $(window).scroll(function() {
        $(element).each(function(){
            var scrollTop = $(window).scrollTop(); 
            var offset = $(this).offset().top; 
            var height = $(this).outerHeight();
            var window_height = $(window).outerHeight(); 
            var window_offset_bottom = window_height - manualoffset; 
            var window_offset_top = window_height - manualoffset - range; 
            
            var calc = 1 + (scrollTop - offset + window_offset_bottom) / range;
            $(this).css({ 'opacity': calc });
            
            if ( calc > '1' ) {
                $(this).css({ 'opacity': 1 });
            } else if ( calc < '0' ) {
                $(this).css({ 'opacity': 0 });
            }
        });
        
    }).scroll();
}

function scrollfade_in_up(element, range, manualoffset, emthreshold){
    if($(window).height() < 450){
        manualoffset = manualoffset / 4;
    }
    $(window).scroll(function() {
        $(element).each(function(){
            var scrollTop = $(window).scrollTop(); 
            var offset = $(this).offset().top; 
            var height = $(this).outerHeight(); 
            var window_height = $(window).outerHeight(); 
            var window_offset_bottom = window_height - manualoffset; 
            var window_offset_top = window_height - manualoffset - range; 
            
            var calc = 1 + (scrollTop - offset + window_offset_bottom) / range;
            top_calc = emthreshold - calc;
            $(this).css({ 'opacity': calc });
            $(this).css({ 'top': top_calc + 'rem' });
            
            if ( calc > '1' ) {
                $(this).css({ 'opacity': 1 });
            } else if ( calc < '0' ) {
                $(this).css({ 'opacity': 0 });
            }
            if ( top_calc >= emthreshold ) {
                $(this).css({ 'top': emthreshold +'rem' });
            } else if ( top_calc < '0' ) {
                $(this).css({ 'top': 0 });
            }
        });
        
    }).scroll();
}

function scrollfade_in_left(element, range, manualoffset, emthreshold){
    if($(window).height() < 450){
        manualoffset = manualoffset / 4;
    }
    $(window).scroll(function() {
        $(element).each(function(){
            var scrollTop = $(window).scrollTop(); 
            var offset = $(this).offset().top; 
            var height = $(this).outerHeight();
            var window_height = $(window).outerHeight();
            var window_offset_bottom = window_height - manualoffset;
            var window_offset_top = window_height - manualoffset - range;
            
            var calc = 1 + (scrollTop - offset + window_offset_bottom) / range;
            left_calc = emthreshold - calc;
            $(this).css({ 'opacity': calc });
            $(this).css({ 'transform': 'translateX('+-left_calc+'rem)' });
            
            if ( calc > '1' ) {
                $(this).css({ 'opacity': 1 });
            } else if ( calc < '0' ) {
                $(this).css({ 'opacity': 0 });
            }
            if ( left_calc >= emthreshold ) {
                $(this).css({ 'transform': 'translateX('+-emthreshold+'rem)' });
            } else if ( left_calc < '0' ) {
                $(this).css({ 'transform': 'translateX(0)' });
            }
        });
        
    }).scroll();
}

function scrollfade_in_right(element, range, manualoffset, emthreshold){
    if($(window).height() < 450){
        manualoffset = manualoffset / 4;
    }
    $(window).scroll(function() {
        $(element).each(function(){
            var scrollTop = $(window).scrollTop();
            var offset = $(this).offset().top;
            var height = $(this).outerHeight();
            var window_height = $(window).outerHeight();
            var window_offset_bottom = window_height - manualoffset;
            var window_offset_top = window_height - manualoffset - range;
            
            var calc = 1 + (scrollTop - offset + window_offset_bottom) / range;
            left_calc = emthreshold - calc;
            $(this).css({ 'opacity': calc });
            $(this).css({ 'transform': 'translateX('+left_calc+'rem)' });
            
            if ( calc > '1' ) {
                $(this).css({ 'opacity': 1 });
            } else if ( calc < '0' ) {
                $(this).css({ 'opacity': 0 });
            }
            if ( left_calc >= emthreshold ) {
                $(this).css({ 'transform': 'translateX('+emthreshold+'rem)' });
            } else if ( left_calc < '0' ) {
                $(this).css({ 'transform': 'translateX(0)' });
            }
        });
        
    }).scroll();
}