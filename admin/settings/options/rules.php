<?php


use WPButtons\Helper;

defined( 'ABSPATH' ) || exit;

$show = [
	'general_start' => __( 'General', 'buttons' ),
	'shortcode'     => __( 'Shortcode', 'buttons' ),
	'everywhere'    => __( 'Everywhere', 'buttons' ),
	'general_end'   => __( 'General', 'buttons' ),
];

$pages_type = [
	'is_front_page' => __( 'Home Page', 'buttons' ),
	'is_home'       => __( 'Posts Page', 'buttons' ),
	'is_search'     => __( 'Search Pages', 'buttons' ),
	'is_404'        => __( '404 Pages', 'buttons' ),
	'is_archive'    => __( 'Archive Page', 'buttons' ),
];

$operator = [
	'1' => 'is',
	'0' => 'is not',
];


$args = [
	'show' => [
		'type'    => 'select',
		'title'   => __( 'Display', 'buttons' ),
		'atts' => $show,
	],

	'operator' => [
		'type'    => 'select',
		'title'   => __( 'Is or is not', 'buttons' ),
		'atts' => $operator,
		'val'     => '1',
		'class' => 'is-hidden',
	],

	'ids' => [
		'type'  => 'text',
		'title' => __( 'Enter ID\'s', 'buttons' ),
		'atts'  => [
			'placeholder' => __( 'Enter IDs, separated by comma.', 'buttons' )
		],
		'class' => 'is-hidden',
	],

	'page_type'  => [
		'type'    => 'select',
		'title'   => __( 'Specific page types', 'buttons' ),
		'atts' => $pages_type,
		'class' => 'is-hidden',
	],

	'fontawesome' => [
		'type'  => 'checkbox',
		'title' => __( 'Disable Font Awesome Icon', 'buttons' ),
		'val'   => 0,
		'label' => __( 'Disable', 'buttons' ),
	],
];

return $args;
