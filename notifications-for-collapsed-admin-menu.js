window.addEventListener( 'load', () => {

	function c2c_maybe_highlight_comments_icon() {
		const target = document.querySelector('.awaiting-mod .pending-count');
		if ( target === null ) {
			return;
		}
		const parent = target.closest('#menu-comments');
		if ( parent === null ) {
			return;
		}
		const css_class = 'collapsed-with-pending';
		const i = target.textContent;

		i > 0 ?
			parent.classList.add(css_class) :
			parent.classList.remove(css_class);
	}

	function c2c_maybe_highlight_plugins_icon() {
		const css_class = 'collapsed-with-pending';

		document.querySelectorAll('.plugin-count').forEach( target => {
			const parent = target.closest('li');
			if ( parent === null ) {
				return;
			}
			const i = target.textContent;

			i > 0 ?
				parent.classList.add(css_class) :
				parent.classList.remove(css_class);
		});
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

	const comment_counter = document.querySelector('.awaiting-mod .pending-count');
	if ( comment_counter !== null ) {
		observer.observe(comment_counter, nfcam_observer_config);
	}
	const plugin_counter = document.querySelector('.plugin-count');
	if ( plugin_counter !== null ) {
		observer.observe(plugin_counter, nfcam_observer_config);
	}

});
