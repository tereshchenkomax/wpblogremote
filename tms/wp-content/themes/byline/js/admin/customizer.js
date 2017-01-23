( function($) {
	$( '#customize-theme-controls' ).on( 'click', '#abc-reset-theme-options', function(e) {
		e.preventDefault();

        if ( window.confirm( Byline_Customizer.confirmText ) ) {
			window.location.href = Byline_Customizer.customizerURL + '?abc-reset=' + Byline_Customizer.exportNonce;
		}
	} );
} )(jQuery);