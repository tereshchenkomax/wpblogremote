( function( $ ) {
	$( '.offcanvas-toggle' ).click( function() {
		$( 'body' ).toggleClass( 'open-sidebar' );
	} );

	$( '.main-navigation' )
		.find( '.menu-item-has-children > a' ).after( '<i class="fa fa-caret-down"></i>' )
		.end()
		.find( 'i' ).on( 'click', function() {
			$(this)
				.toggleClass( 'fa-caret-down' )
				.toggleClass( 'fa-caret-up' )
				.parent().find( '> .sub-menu' ).toggle();
		} );

	if ( jQuery.support.touch ) {
        var $body = $( 'body' );
        $( '#page, #sidebar' )
            .bind( 'swipeleft', function(e) {
	            if ( $body.hasClass( 'left-sidebar' ) ) {
					$body.removeClass( 'open-sidebar' );
				} else {
					$body.addClass( 'open-sidebar' );
				}
                e.stopImmediatePropagation();
                return false;
            } )
            .bind( 'swiperight', function( e ) {
	            if ( $body.hasClass( 'left-sidebar' ) ) {
					$body.addClass( 'open-sidebar' );
				} else {
					$body.removeClass( 'open-sidebar' );
				}
                e.stopImmediatePropagation();
                return false;
            } );
	}
} )( jQuery );