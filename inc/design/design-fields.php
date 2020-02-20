<?php
/**
 * Contains fields info
 */
$background       = apply_filters( 'cxth_default_background', '#f5f5f5' );
$text_line_height = apply_filters( 'cxth_text_line_height', 1.6 );
$text_size        = apply_filters( 'cxth_default_text_size', 16 );
$text_font        = apply_filters( 'cxth_default_text_color', 'Helvetica,sans-serif' );
$text_color       = apply_filters( 'cxth_default_text_font', '#454545' );
$heading_color    = apply_filters( 'cxth_default_heading_color', '#5a5a5a' );

$header_color = apply_filters( 'cxth_default_accent_color', '#ffffff' );
$footer_color = apply_filters( 'cxth_default_accent_color', $header_color );

$accent_color       = apply_filters( 'cxth_default_accent_color', '#00a0e7' );
$accent_color_hover = apply_filters( 'cxth_default_accent_color_hover', '#33b9ff' );

$fields = [
	'General' => [
		'background-color' => [
			'label'    => 'Background color',
			'type'     => 'color',
			'user'     => 'creative',
			'section'     => 'Colors',
			'output'   => 'body{background:%s;}',
			'default'  => $background,
			'priority' => '5',
		],
		'link-color'       => [
			'label'       => 'Link color',
			'type'        => 'color',
			'description' => 'Set Active link color',
			'user'        => 'creative',
			'section'     => 'Colors',
			'output'      => 'a{color:%s;}',
			'default'     => $accent_color,
			'priority'    => '10',
		],
		'link-hover-color' => [
			'label'       => 'Link hover color',
			'type'        => 'color',
			'description' => 'Set Active link color',
			'user'        => 'creative',
			'section'     => 'Colors',
			'output'      => 'a:hover{color:%s;}',
			'default'     => $accent_color_hover,
			'priority'    => '15',
		],
		'text-font'        => [
			'label'       => 'Body text',
			'type'        => 'typography',
			'description' => 'Specify default font styling of your site',
			'user'        => 'business',
			'section'     => 'Typography',
			'output'      => 'body{%s}',
			'default'     => "||||$text_size|$text_font|$text_color|0|1.6",
			'priority'    => '10',
		],
		'heading-font'     => [
			'label'       => 'Heading/Title Font',
			'type'        => 'typography',
			'description' => 'Specify font styling of all headings on your site',
			'user'        => 'business',
			'section'     => 'Typography',
			'output'      => 'h1,h2,h3,h4,h5,h6,.entry-title{%s}',
			'default'     => '||||' . 2 * $text_size . "|$text_font|$heading_color|0|1.6",
			'priority'    => '15',
		],
		'heading2-font'     => [
			'label'       => 'H2',
			'type'        => 'typography',
			'description' => 'Specify font styling of all heading 2 (h2) on your site',
			'user'        => 'business',
			'section'     => 'Header Typography',
			'output'      => 'h2{%s}',
			'priority'    => '5',
		],
		'heading2-border'     => [
			'label'       => 'H2 border',
			'type'        => 'all-border',
			'description' => 'Border for all heading 2 (h2) on your site',
			'user'        => 'design',
			'section'     => 'Header Typography',
			'output'      => 'h2{%s}',
			'priority'    => '5',
		],
		'heading3-font'     => [
			'label'       => 'H3',
			'type'        => 'typography',
			'description' => 'Specify font styling of all heading 3 (h3) on your site',
			'user'        => 'business',
			'section'     => 'Header Typography',
			'output'      => 'h3{%s}',
			'priority'    => '5',
		],
		'heading3-border'     => [
			'label'       => 'H3 border',
			'type'        => 'all-border',
			'description' => 'Border for all heading 3 (h3) on your site',
			'user'        => 'design',
			'section'     => 'Header Typography',
			'output'      => 'h3{%s}',
			'priority'    => '5',
		],
		'heading4-font'     => [
			'label'       => 'H4',
			'type'        => 'typography',
			'description' => 'Specify font styling of all heading 4 (h4) on your site',
			'user'        => 'business',
			'section'     => 'Header Typography',
			'output'      => 'h4{%s}',
			'priority'    => '5',
		],
		'heading4-border'     => [
			'label'       => 'H4 border',
			'type'        => 'all-border',
			'description' => 'Border for all heading 4 (h4) on your site',
			'user'        => 'design',
			'section'     => 'Header Typography',
			'output'      => 'h4{%s}',
			'priority'    => '5',
		],
		'heading5-font'     => [
			'label'       => 'H5',
			'type'        => 'typography',
			'description' => 'Specify font styling of all heading 5 (h5) on your site',
			'user'        => 'business',
			'section'     => 'Header Typography',
			'output'      => 'h5{%s}',
			'priority'    => '5',
		],
		'heading5-border'     => [
			'label'       => 'H5 border',
			'type'        => 'all-border',
			'description' => 'Border for all heading 5 (h5) on your site',
			'user'        => 'design',
			'section'     => 'Header Typography',
			'output'      => 'h5{%s}',
			'priority'    => '5',
		],
		'heading6-font'     => [
			'label'       => 'H6',
			'type'        => 'typography',
			'description' => 'Specify font styling of all heading 6 (h6) on your site',
			'user'        => 'business',
			'section'     => 'Header Typography',
			'output'      => 'h6{%s}',
			'priority'    => '5',
		],
		'heading6-border'     => [
			'label'       => 'H6 border',
			'type'        => 'all-border',
			'description' => 'Border for all heading 6 (h6) on your site',
			'user'        => 'design',
			'section'     => 'Header Typography',
			'output'      => 'h6{%s}',
			'priority'    => '5',
		],
	],
	'Header'  => [

		'header-logo-height' => [
			'label'    => 'Header Logo size',
			'type'     => 'range',
			'input_attrs' => [ 'min' => 25, 'max' => 200, 'step' => 2 ],
			'section'  => 'existing_title_tagline',
			'user'     => 'business',
			'output'   => '.site-logo img{height:%spx;}',
			'priority' => 9,
			'default'  => 50,
		],

		'header' => [
			'label'   => '',
			'type'    => 'box',
			'user'    => 'business',
			'output'  => '.site-header{%s}',
			'default' => [
				'padding'       => '5|5',
				'bg-color'      => $header_color,
				'border-radius' => '0',
				'shadow'        => '|0|0|3|0|rgba(0,0,0,.1)',
			],
		],

	],

	'Primary Menu' => [

		// region Menu items
		'prinav-text'        => [
			'label'       => '',
			'type'        => 'typography',
			'description' => 'Specify default font styling of header navigation',
			'user'        => 'business',
			'output'      => 'body{%s}',
			'default'     => "||||$text_size|$text_font|$text_color|0|1.6",
			'priority'    => '10',
		],
		'prinav-it-bg-color'   => [
			'label'       => 'Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a{background-color:%s;}',
			'priority'    => '5',
		],
		'prinav-it-text-color' => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Test color for active menu item',
			'section'     => 'Menu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a{color:%s;}',
			'priority'    => '10',
			'default'     => $text_color,
		],
		'prinav-it-gap'        => [
			'label'       => 'Gap Between Menu Items',
			'type'        => 'slider',
			'description' => 'Distance between adjacent menu items.',
			'section'     => 'Menu Items',
			'user'        => 'creative',
			'output'      => '.main-navigation > ul > li:not(:first-child){margin-left:%spx;}',
			'priority'    => '25',
			'default'     => '2',
		],
		'prinav-it-padding'    => [
			'label'    => 'Padding',
			'type'     => 'spacing',
			'section'  => 'Menu Items',
			'user'     => 'designer',
			'output'   => '.main-navigation li a{padding:%s;}',
			'priority' => '20',
			'default'  => '7|10',
		],
		// endregion Menu items

		// region Menu items Hover

		'prinav-it-ho-bg-color'      => [
			'label'       => 'Hover Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a:hover{background-color:%s;}',
			'priority'    => '5',
		],
		'prinav-it-ho-text-color'    => [
			'label'       => 'Hover Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Menu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a:hover{color:%s;}',
			'priority'    => '10',
			'default'     => $heading_color,
		],
		// endregion Menu items Hover

		// region Menu items Active
		'prinav-it-ac-bg-color'      => [
			'label'       => 'Active menu item Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Item Active',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li.current-menu-item > a,.main-navigation > ul > li.current-menu-ancestor > a{background-color:%s;}',
			'priority'    => '5',
		],
		'prinav-it-ac-text-color'    => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Menu Item Active',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li.current-menu-item > a,.main-navigation > ul > li.current-menu-ancestor > a{color:%s;}',
			'priority'    => '10',
		],
		// endregion Menu items Active

		// region Submenu
		'prinav-submenu'             => [
			'label'    => 'Sub-Menu',
			'type'     => 'box',
			'section'  => 'Submenu',
			'user'     => 'business',
			'output'   => '.main-navigation li ul{%s}',
			'priority' => '5',
			'defaults' => [
				'padding'       => '5|5',
				'bg-color'      => '#fff',
				'border-radius' => '0',
				'shadow'        => '|0|0|3|0|rgba(0,0,0,.1)',
			],
		],
		// endregion Submenu

		// region Submenu Items
		'prinav-su-it-padding'       => [
			'label'       => 'Padding',
			'type'        => 'spacing',
			'description' => 'Padding',
			'section'     => 'Submenu Items',
			'user'        => 'designer',
			'output'      => '.main-navigation li ul a{padding:%s;}',
			'priority'    => '15',
		],
		'prinav-su-it-bg-color'      => [
			'label'       => 'Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul a{background-color:%s;}',
			'priority'    => '5',
		],
		'prinav-su-it-text-color'    => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Items',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul a{color:%s;}',
			'priority'    => '10',
		],
		// endregion Submenu Items

		// region Submenu Items Hover
		'prinav-su-it-ho-bg-color'   => [
			'label'       => 'Hover Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul a:hover{background-color:%s;}',
			'priority'    => '5',
		],
		'prinav-su-it-ho-text-color' => [
			'label'       => 'Hover Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Item Hover',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li > a:hover{color:%s;}',
			'priority'    => '10',
		],
		// endregion Submenu Items Hover

		// region Submenu Items Active
		'prinav-su-it-ac-bg-color'   => [
			'label'       => 'Active menu item Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Active Item',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul .current-menu-item > a{background-color:%s;}',
			'priority'    => '5',
		],
		'prinav-su-it-ac-text-color' => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Active Item',
			'user'        => 'business',
			'output'      => '.main-navigation > ul > li ul .current-menu-item > a{color:%s;}',
			'priority'    => '10',
		],
		// endregion Submenu Items Active

	],

	'Mobile Menu' => [

		'mobnav' => [
			'label'    => '',
			'type'     => 'box',
			'section'  => 'Menu',
			'user'     => 'business',
			'output'   => '.mobile-navigation{%s}',
			'priority' => '5',
			'defaults' => [
				'padding'       => '5|7',
				'bg-color'      => '#fff',
				'border-radius' => '0',
				'shadow'        => '|0|0|3|0|rgba(0,0,0,.1)',
			],
		],

		'mobnav-icon'                  => [
			'label'    => 'Menu icon color',
			'type'     => 'color',
			'section'  => 'Icon',
			'user'     => 'business',
			'output'   => '.site-navigation .caxton-hamburger{color:%s}',
			'priority' => '5',
			'defaults' => $accent_color,
		],

		// region Menu items
		'mobnav-it-bg-color'         => [
			'label'       => 'Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Items',
			'user'        => 'business',
			'output'      => '.mobile-navigation li a{background-color:%s;}',
			'priority'    => '5',
		],
		'mobnav-it-text-color'       => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Menu Items',
			'user'        => 'business',
			'output'      => '.mobile-navigation li a{color:%s;}',
			'priority'    => '10',
			'default'     => $text_color,
		],
		'mobnav-it-padding'          => [
			'label'    => 'Padding',
			'type'     => 'spacing',
			'section'  => 'Menu Items',
			'user'     => 'designer',
			'output'   => '.mobile-navigation li a{padding:%s;}',
			'priority' => '20',
			'default'  => '7|10',
		],
		// endregion Menu items

		// region Menu items Active
		'mobnav-it-ac-bg-color'      => [
			'label'       => 'Active menu item Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Menu Item',
			'user'        => 'business',
			'output'      => '.mobile-navigation > ul > li.current-menu-item > a,.mobile-navigation > ul > li.current-menu-ancestor > a{background-color:%s;}',
			'priority'    => '5',
		],
		'mobnav-it-ac-text-color'    => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Menu Item',
			'user'        => 'business',
			'output'      => '.mobile-navigation > ul > li.current-menu-item > a,.mobile-navigation > ul > li.current-menu-ancestor > a{color:%s;}',
			'priority'    => '10',
		],
		// endregion Menu items Active

		// region Submenu
		'mobnav-submenu'             => [
			'label'    => 'Sub-Menu',
			'type'     => 'box',
			'section'  => 'Submenu',
			'user'     => 'business',
			'output'   => '.mobile-navigation li ul{%s}',
			'priority' => '5',
			'defaults' => [
				'padding'       => '5|10',
				'bg-color'      => '#fff',
				'border-radius' => '0',
				'shadow'        => '|0|0|3|0|rgba(0,0,0,.1)',
			],
		],
		// endregion Submenu

		// region Submenu Items
		'mobnav-su-it-padding'       => [
			'label'       => 'Padding',
			'type'        => 'spacing',
			'description' => 'Padding',
			'section'     => 'Submenu Items',
			'user'        => 'designer',
			'output'      => '.mobile-navigation li ul a{padding:%s;}',
			'priority'    => '15',
		],
		'mobnav-su-it-bg-color'      => [
			'label'       => 'Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Items',
			'user'        => 'business',
			'output'      => '.mobile-navigation li ul a{background-color:%s;}',
			'priority'    => '5',
		],
		'mobnav-su-it-text-color'    => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Items',
			'user'        => 'business',
			'output'      => '.mobile-navigation > ul > li ul a{color:%s;}',
			'priority'    => '10',
		],
		// endregion Submenu Items

		// region Submenu Items Active
		'mobnav-su-it-ac-bg-color'   => [
			'label'       => 'Active menu item Background color',
			'type'        => 'color',
			'description' => 'Text color for active menu item',
			'section'     => 'Submenu Active Item',
			'user'        => 'business',
			'output'      => '.mobile-navigation > ul > li ul .current-menu-item > a{background-color:%s;}',
			'priority'    => '5',
		],
		'mobnav-su-it-ac-text-color' => [
			'label'       => 'Text color',
			'type'        => 'color',
			'description' => 'Background color for active menu item',
			'section'     => 'Submenu Active Item',
			'user'        => 'business',
			'output'      => '.mobile-navigation > ul > li ul .current-menu-item > a{color:%s;}',
			'priority'    => '10',
		],
		// endregion Submenu Items Active

	],

	'Footer' => [
		'footer' => [
			'label'    => '',
			'type'     => 'box',
			'user'     => 'business',
			'output'   => '.site-footer{%s}',
			'priority' => '5',
			'default'  => $footer_color,
		],
		'footer-text'     => [
			'label'       => 'Custom Text',
			'type'        => 'text',
			'description' => 'Put any custom text like Copyright info or any other Website Information',
			'user'        => 'business',
			'priority'    => '25',
		],
	],
];

$panels = apply_filters( 'cxth_design_fields', $fields );

if ( ! $panels ) {
	return array();
}

foreach ( $panels as $panel => &$fields ) {
	$ids = array_keys( $fields );
	foreach ( $fields as $id => $f ) {
		if ( 'box' == $f['type'] ) {

			$defaults = empty( $f['defaults'] ) ? [] : $f['defaults'];

			unset( $f['defaults'] );

			$defaults = wp_parse_args( $defaults, [
				'padding'       => '',
				'bg-color'      => '',
				'border-radius' => '',
				'border'        => '',
				'shadow'        => '',
			] );

			$i          = array_search( $id, $ids );
			$new_fields = array();

			unset( $panels[ $panel ][ $id ] );

			$label     = $f['label'];
			$id_format = $id . '-%s';

			$base_output = $f['output'];

			//Padding
			$id                = sprintf( $id_format, 'padding' );
			$f['default']      = $defaults['padding'];
			$f['type']         = 'spacing';
			$f['label']        = $label . ' Padding';
			$f['output']       = sprintf( $base_output, 'padding:%s' );
			$new_fields[ $id ] = $f;

			//BG Color
			$id                = sprintf( $id_format, 'bg-color' );
			$f['default']      = $defaults['bg-color'];
			$f['type']         = 'alpha-color';
			$f['label']        = $label . ' Background Color';
			$f['output']       = sprintf( $base_output, 'background-color:%s' );
			$new_fields[ $id ] = $f;

			//Border
			$id                = sprintf( $id_format, 'border' );
			$f['default']      = $defaults['border'];
			$f['type']         = 'all-border';
			$f['label']        = $label . ' Border';
			$f['output']       = sprintf( $base_output, '%s' );
			$new_fields[ $id ] = $f;

			//Rounded corners
			$id                = sprintf( $id_format, 'border-radius' );
			$f['default']      = $defaults['border-radius'];
			$f['type']         = 'slider';
			$f['label']        = $label . ' Rounded Corners';
			$f['output']       = sprintf( $base_output, 'border-radius:%spx' );
			$new_fields[ $id ] = $f;

			//Shadow
			$id                = sprintf( $id_format, 'shadow' );
			$f['default']      = $defaults['shadow'];
			$f['type']         = 'shadow';
			$f['label']        = $label . ' Shadow';
			$f['output']       = $base_output;
			$new_fields[ $id ] = $f;

			$fields = array_merge(
				array_slice( $fields, 0, $i ),
				$new_fields,
				array_slice( $fields, $i, null )
			);

		}
	}
}


return apply_filters( 'cxth_design_fields', $panels );