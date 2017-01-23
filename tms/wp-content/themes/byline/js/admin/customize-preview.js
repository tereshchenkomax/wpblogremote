( function( $ ) {
	var api = wp.customize;

    api( 'byline_text', function( value ) {
        value.bind( function( to ) {
            $( '.byline-text' ).html( $.parseHTML( to ) );
        } );
    });

    api( 'read_more_text', function( value ) {
        value.bind( function( to ) {
            $( '.more-link' ).html( $.parseHTML( to ) );
        } );
    });

} )( jQuery );