<?php

defined( 'ABSPATH' ) || exit;

return [
	'btns_type' => [
		'type'  => 'select',
		'title' => __( 'Buttons type', 'buttons' ),
		'val'   => 'standard',
		'atts'  => [
			'standard' => __( 'Standard', 'buttons' ),
			'floating' => __( 'Floating', 'buttons' )
		],
	],

	'btns_standard' => [
		'type'  => 'select',
		'title' => __( 'Position', 'buttons' ),
		'val'   => 'shortcode',
		'atts'  => [
			'shortcode' => __( 'Shortcode placement', 'buttons' ),
			'after'     => __( 'After Content', 'buttons' ),
			'before'    => __( 'Before Content', 'buttons' )
		],
	],

	'btns_float' => [
		'type'  => 'select',
		'title' => __( 'Position', 'buttons' ),
		'val'   => '-right-center-block',
		'atts'  => [
			'-left-top'             => __( 'Left Top', 'buttons' ),
			'-left-center-block'    => __( 'Left Center', 'buttons' ),
			'-left-bottom'          => __( 'Left Bottom', 'buttons' ),
			'-right-top'            => __( 'Right Top', 'buttons' ),
			'-right-center-block'   => __( 'Right Center', 'buttons' ),
			'-right-bottom'         => __( 'Right Bottom', 'buttons' ),
			'-top-center-inline'    => __( 'Top center', 'buttons' ),
			'-bottom-center-inline' => __( 'Bottom center', 'buttons' ),
		],
		'class' => 'is-hidden'
	],

	'btns_offset_inline' => [
		'type'  => 'number',
		'title' => __( 'Offset Inline', 'buttons' ),
		'val'   => '15',
		'atts'  => [
			'step' => '1',
		],
		'addon' => __( 'px', 'buttons' ),
	],

	'btns_offset_block' => [
		'type'  => 'number',
		'title' => __( 'Offset Block', 'buttons' ),
		'val'   => '15',
		'atts'  => [
			'step' => '1',
		],
		'addon' => __( 'px', 'buttons' ),
	],


	'btns_gap' => [
		'type'  => 'number',
		'title' => __( 'Gap', 'buttons' ),
		'val'   => '12',
		'atts'  => [
			'step' => '1',
			'min'  => 0
		],
		'addon' => __( 'px', 'buttons' ),
	],

	'btns_direction' => [
		'type'  => 'select',
		'title' => __( 'Direction', 'buttons' ),
		'val'   => 'row',
		'atts'  => [
			'row'    => __( 'Row', 'buttons' ),
			'column' => __( 'Column', 'buttons' ),
		],
	],

	'btns_align' => [
		'type'  => 'select',
		'title' => __( 'Align', 'buttons' ),
		'val'   => 'center',
		'atts'  => [
			'center'  => __( 'Center', 'buttons' ),
			'start'   => __( 'Left', 'buttons' ),
			'end'     => __( 'Right', 'buttons' ),
			'stretch' => __( 'Stretch', 'buttons' ),
		],
	],

	'btns_justify' => [
		'type'  => 'select',
		'title' => __( 'Justify Content', 'buttons' ),
		'val'   => 'left',
		'atts'  => [
			'left'          => __( 'left', 'buttons' ),
			'right'         => __( 'right', 'buttons' ),
			'center'        => __( 'center', 'buttons' ),
			'space-between' => __( 'space-between', 'buttons' ),
			'space-around'  => __( 'space-around', 'buttons' ),
			'space-evenly'  => __( 'space-evenly', 'buttons' ),
		],
	],
];