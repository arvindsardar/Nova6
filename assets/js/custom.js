/* » JQuery
**************************************************/
	(function ($) {
		jQuery(document).ready(function () {

		//show/hide mobile menu
			$('#hamburger-button,.offscreen-menu-container a').click(function(){
				$('#hamburger-button').toggleClass('active');
				$('body').toggleClass('offscreen-menu-active');
			});

		// Mobile Menu - add toggle
			$('#menu-main-mobile .menu-item a').click(function (event) {
				$('body').removeClass('offscreen-menu-active');
				$('#hamburger-button').removeClass('active');
			});

		}); // end doc ready
	})(jQuery); //end compatibility

/* » Vanilla JS
**************************************************/
	//Scrolled Body Class
	window.onscroll = function(){scrollBodyClass()}
	window.onload = function(){scrollBodyClass()}
	function scrollBodyClass() {
		let scroll = window.scrollY;
		if (scroll > 105) {
			document.body.classList.add('scrolled');
		} else {
			document.body.classList.remove('scrolled');
		}
	}

/* » Mobile Menu
**************************************************/
		//the mobile menu
		const mobSubMenus = document.querySelectorAll('#menu-main-mobile .icon--ui');
		mobSubMenus.forEach(item => {
			item.addEventListener('click', function handleClick(event) {
				event.preventDefault();
				if (item.classList.contains('active')) {
					event.target.closest('.menu-item').classList.remove('active')
				} else {
					event.target.closest('.menu-item').classList.add('active')
				}
			});
		});
