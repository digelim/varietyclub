/* global ajaxurl, moucheNUX */
( function( wp, $ ) {
	'use strict';

	if ( ! wp ) {
		return;
	}

	$( function() {
		// Dismiss notice
		$( document ).on( 'click', '.sf-notice-nux .notice-dismiss', function() {
			$.ajax({
				type:     'POST',
				url:      ajaxurl,
				data:     { nonce: moucheNUX.nonce, action: 'mouche_dismiss_notice' },
				dataType: 'json'
			});
		});
	});
})( window.wp, jQuery );