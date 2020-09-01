window.addEventListener( 'load', () => {

	function c2c_maybe_highlight_comments_icon() {
		const target = document.querySelector('.awaiting-mod .pending-count');
		if ( target === null ) {
			return;
		}
		const parent = target.closest('#menu-comments');
		const css_class = 'collapsed-with-pending';
		const i = target.textContent;

		i > 0 ?
			parent.classList.add(css_class) :
			parent.classList.remove(css_class);
	}

	function c2c_maybe_highlight_plugins_icon() {
		const target = document.querySelector('.plugin-count');
		const parent = target.closest('#menu-plugins');
		const css_class = 'collapsed-with-pending';
		const i = target.textContent;

		i > 0 ?
			parent.classList.add(css_class) :
			parent.classList.remove(css_class);
	}

	function c2c_maybe_highlight() {
		c2c_maybe_highlight_comments_icon();
		c2c_maybe_highlight_plugins_icon();
	}

	c2c_maybe_highlight();

	const observer = new MutationObserver( mutation => {
		c2c_maybe_highlight();
	});
	const nfcam_observer_config = { childList: true };

	observer.observe(document.querySelector('.awaiting-mod .pending-count'), nfcam_observer_config);
	observer.observe(document.querySelector('.plugin-count'), nfcam_observer_config);

});
