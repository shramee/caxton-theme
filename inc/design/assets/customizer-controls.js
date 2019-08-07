/**
 * Created by shramee on 19/10/15.
 */
( function ( $, api ) {
	api.cxth_multi_checkbox = api.Control.extend( {
		ready : function () {
			var $control = this.container.find('.wpd-custom-control'),
				$inputs = $control.find( 'input[type="checkbox"]' );
			$inputs.change( function () {
				var values = $control.find( 'input[type="checkbox"]:checked' ).not('.hidden').map( function () {
						return this.value;
				} ).get();

				$control.find( 'select' ).val( values ).change();

			} );
		}
	} );

	api.cxth_on_off = api.Control.extend( {
		ready : function () {
			var $t	= this.container,
				$b	= $t.find( '.button' );
			$b.click( function ( e ) {
				e.preventDefault();
				var $$ = $( this );

				if ( $$.hasClass( 'button-primary' ) ) {
					$$.siblings( 'input' )
						.val( '' )
						.change();
					$$
						.html( 'Off' )
						.attr( 'title', 'Disabled' );
				} else {
					$$.siblings( 'input' )
						.val( 'On' );
					$$
						.html( 'On' )
						.attr( 'title', 'Enabled' );
				}
				$$.siblings( 'input' ).change();
				$$.toggleClass( 'button-primary' );
			} );
		}
	} );

	api.controlConstructor['checkboxes'] = api.cxth_multi_checkbox;
	api.controlConstructor['img-checkboxes'] = api.cxth_multi_checkbox;
	api.controlConstructor['button-checkboxes'] = api.cxth_multi_checkbox;
	api.controlConstructor['on-off'] = api.cxth_on_off;

	api.cxth_alpha_color_control = api.Control.extend({
		ready: function() {
			var control = this,
				picker = this.container.find('.color-picker-hex');

//			picker.val( control.setting() );
			picker.cxthColorPicker({
				change: function() {
					control.setting.set( picker.cxthColorPicker('color') );
				},
				clear: function() {
					control.setting.set( false );
				}
			});

			control.setting.bind( function( value ) {
				picker.val( value );
				picker.cxthColorPicker( 'color', value );
			});
		}
	});

	api.controlConstructor['alpha-color'] = api.cxth_alpha_color_control;

	/* CSS complex controls */
	api.cxthSaveVals = function ( e ) {
		var $p = e.data.p,
			save_vals = $p.find( 'input, select, textarea' ).not( '.cxth-range-support, .val-store, [type="button"]' ).map(
				function () {
					var $t = $( this ),
						chkbx = $t.is(':checkbox');
					if (  $t.is(':radio') ) {
						if ( $t.is(':checked') ) {
							return this.value;
						}
					} else if ( ! chkbx || ( chkbx && $t.is(':checked') ) ) {
						return this.value;
					} else {
						return '';
					}
				}
			).get().join( '|' );
		$p.find( 'input.val-store' ).val( save_vals ).change();
	};

	api.cxthFields = api.Control.extend( {
		ready : function () {
			var $p = this.container;
			$p.find( '.cxth-color' ).cxthColorPicker( {
				change : function ( e, ui ) {
					setTimeout( function () {
						api.cxthSaveVals( { data : { p : $p } } );
					}, 250 );
				},
				clear : function ( e, ui ) {
					//$( this ).val( ui.color.toString() );
					setTimeout( function () {
						api.cxthSaveVals( { data : { p : $p } } );
					}, 250 );
				}
			} );
			$p.find( '.cxth-google-fonts' ).cxthGoogleFonts();

			$p.find( '.cxth-range-support, input[type="range"]' ).change( function() {
				$( this ).siblings( '.cxth-range-support, input[type="range"]' ).val( this.value );
			} );

			var $inputs = $p.find( 'input, select, textarea' ).not( '.val-store, [type="button"], .wp-color-picker' );
			$inputs.change( { p : $p }, api.cxthSaveVals );
		}
	} );
	api.controlConstructor['slider'] = api.cxthFields;
	api.controlConstructor['shadow'] = api.cxthFields;
	api.controlConstructor['border'] = api.cxthFields;
	api.controlConstructor['all-border'] = api.cxthFields;
	api.controlConstructor['typography'] = api.cxthFields;
	api.controlConstructor['text_shadow'] = api.cxthFields;
	api.controlConstructor['spacing'] = api.cxthFields;

} ) ( jQuery, wp.customize );
