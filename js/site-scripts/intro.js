(function () {

	window.onload = function () {

		var template_function = {

			init_intro_animation: function () {

				var heart_anim = new TimelineLite()

				var landing_wrapper = document.querySelector('.landing-wrapper')

				var bingegiving_better = new TweenMax.fromTo(".intro-tagline-2", .8, {
					autoAlpha: 0,
					y: "0",
					delay: .2,
					ease: Power3.easeInOut
				}, {
					autoAlpha: 1,
					y: "-50",
					delay: .2,
					ease: Power3.easeInOut
				}).pause()

				heart_anim.set(".intro-logo", {
					rotation: "-45%",
					x: "50%",
					transformOrigin: "left bottom"
				});

				heart_anim
					.fromTo(".intro-logo", 1.2, {
						autoAlpha: 0,
						y: "100",
						ease: Power3.easeInOut
					}, {
						autoAlpha: 1,
						y: "30",
						ease: Power3.easeInOut
					}, "up_anim")
					.fromTo(".intro-tagline-1", 1.2, {
						autoAlpha: 0,
						y: "0",
						ease: Power3.easeInOut
					}, {
						autoAlpha: 1,
						y: "-30",
						delay: .3,
						ease: Power3.easeInOut
					}, "up_anim")
					.to(".intro-logo", 1.3, {
						rotation: "0",
						x: "0%",
						transformOrigin: "left bottom",
						ease: Bounce.easeOut
					}, "continous")
					.fromTo(".intro-tagline-2", .8, {
						autoAlpha: 0,
						y: "0",
						delay: .2,
						ease: Power3.easeInOut
					}, {
						autoAlpha: 1,
						y: "-30",
						delay: .2,
						ease: Power3.easeInOut,
						onComplete: function () {
							new TweenMax.staggerTo(".landing-content > div", .8, {
								autoAlpha: 0,
								delay: 3,
								y: -100,
								ease: Power3.easeInOut,
								onComplete: function () {
									landing_wrapper.classList.add('deactive');
									setTimeout(function(){
										landing_wrapper.classList.add('displaynone');
									}, 1000);
								}
							}, .1)
							enableScroll()
							home_load_scroll()
							
						}
					}, "continous")
			}
		}
		

		disableScroll();
		
		TweenMax.to(window, 1.2, {
			onStart: function() {
				$('html,body').scrollTop(0);
			},
			//scrollTo: {y: 0},
			ease: Power3.easeOut,
			onComplete: function () {
				template_function.init_intro_animation()
			}
		});
		

	}
	
	function home_load_scroll(){
		if(document.location.href.split('#')[1]){
			setTimeout(function(){
				var section = document.location.href.split('#')[1];
				$('html,body').animate({scrollTop: $('section[data-section="'+section+'"]').offset().top - 120},800);
			}, 2000);
		}
	}

	var keys = {37: 1, 38: 1, 39: 1, 40: 1};

	function preventDefault(e) {
		e = e || window.event;
		if (e.preventDefault)
			e.preventDefault();
		e.returnValue = false;
	}

	function preventDefaultForScrollKeys(e) {
		if (keys[e.keyCode]) {
			preventDefault(e);
			return false;
		}
	}

	function disableScroll() {
		if (window.addEventListener) // older FF
			window.addEventListener('DOMMouseScroll', preventDefault, false);
		window.onwheel = preventDefault; // modern standard
		window.onmousewheel = document.onmousewheel = preventDefault; // older browsers, IE
		window.ontouchmove = preventDefault; // mobile
		document.onkeydown = preventDefaultForScrollKeys;
	}

	function enableScroll() {
		if (window.removeEventListener)
			window.removeEventListener('DOMMouseScroll', preventDefault, false);
		window.onmousewheel = document.onmousewheel = null;
		window.onwheel = null;
		window.ontouchmove = null;
		document.onkeydown = null;
	}

})();