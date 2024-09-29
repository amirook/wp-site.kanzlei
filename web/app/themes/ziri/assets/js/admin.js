( function ( wp, $ ) {
	'use strict';

	if ( ! wp ) {
		return;
	}

	/*
	 * Ajax request
	 */
	function ziriDismissAction() {
		$.ajax( {
			type: 'POST',
			url: ajaxurl,
			data: {
				nonce: ziriNotices.nonce,
				action: 'ziri_dismiss_notice',
			},
			dataType: 'json',
		} );
	}

	$( function () {
		// Dismiss notice
		$( document ).on(
			'click',
			'.ziri-dismiss-btn .notice-dismiss',
			function () {
				ziriDismissAction();
			}
		);
	} );
} )( window.wp, jQuery );
