(function () {

	window.onload = function () {

		var template_function = {

			init_intro_animation: function () {

				var heart_anim = new TimelineLite()

				var landing_wrapper = document.querySelector('.landing-wrapper')

				var background_anim = new TweenMax.to(".landing-wrapper > .bg-image", .8, {
					autoAlpha: 1,
					delay: .8,
					ease: Power3.easeInOut
				}).pause()

				var up_down_logotype = new TweenMax.to(".intro-tagline-wrapper", .8, {
					y: "50",
					delay: .6,
					ease: Power3.easeInOut,
					onComplete: function () {
						new TweenMax.staggerTo(".landing-content > div", .8, {
							autoAlpha: 0,
							delay: .8,
							y: -100,
							ease: Power3.easeInOut,
							onComplete: function () {

							}
						}, .1)
						new TweenMax.to(".landing-wrapper > .bg-image", .8, {
							autoAlpha: 0,
							delay: .8,
							ease: Power3.easeInOut,
							onComplete: function () {
								landing_wrapper.classList.add('deactive')
							}
						})
						menu.play()
						nextbutton_anim.play()
						enableScroll()
					}
				}).pause()

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
				var logotype = new TweenMax.fromTo(".intro-logotype", 1.2, {
					autoAlpha: 0,
					y: "50",
					delay: 1.1,
					ease: Power3.easeOut
				}, {
					autoAlpha: 1,
					y: "0",
					delay: 1.1,
					ease: Power3.easeOut
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
								delay: .8,
								y: -100,
								ease: Power3.easeInOut,
								onComplete: function () {

								}
							}, .1)
							new TweenMax.to(".landing-wrapper > .bg-image", .8, {
								autoAlpha: 0,
								delay: .8,
								ease: Power3.easeInOut,
								onComplete: function () {
									landing_wrapper.classList.add('deactive')
								}
							})
							enableScroll()
						}
					}, "continous")
			}
		}
		

		disableScroll();
		
		TweenMax.to(window, 1.2, {
			onStart: function() {
				$('html,body').scrollTop(0);
				console.log('start');
			},
			//scrollTo: {y: 0},
			ease: Power3.easeOut,
			onComplete: function () {
				template_function.init_intro_animation()
			}
		});
		

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