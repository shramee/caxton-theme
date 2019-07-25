/**
 * Created by shramee on 16/11/15.
 */
( function ( $ ) {
	$.fn.cxthGoogleFonts = function () {
		var $t = $( this ),
			$div = $( '<div />' ).addClass( 'cxth-google-fonts' );

		if ( $t.siblings( '.cxth-google-fonts' ).length ) {
			return;
		}

		$t.find( 'option' ).each( function () {
			var $$ = $( this ),
				Font = $$.attr( 'value' ) || 'Default',
				font = Font.replace( / /g, '-' ).toLowerCase(),
				classes = 'cxth-gf-' + font;
			if ( $$.prop( 'selected' ) ) {
				classes += ' active'
			}
			$div.append( $( '<span/>' ).data( 'font', Font ).addClass( classes ).html(
				'<span style="font-family:' + Font + ';">' + $$.text() + '</span>'
			) );
		} );
		$t.after( $( '<div />' ).addClass( 'cxth-google-fonts-wrap' ).append( $div ) );
		$t.hide();
		$div = $t.siblings( '.cxth-google-fonts-wrap' ).children( '.cxth-google-fonts' );
		$div.show();
		$div.find( 'span' ).click( function () {
			var $$ = $( this );
			$$.siblings().removeClass( 'active' );
			$$.addClass( 'active' );
			$t.val( $$.data( 'font' ) ).change();
		} );

		var $active_field = $t.siblings( 'div.cxth-google-fonts' ).find( '.active' );

		if ( 1 == $active_field.count ) {
			$t.siblings( 'div.cxth-google-fonts' ).scrollTop( $active_field.offsetTop )
		}
	};
	$( '.cxth-google-fonts' ).cxthGoogleFonts();
} )( jQuery );