<?php

use WPButtons\Helper;

defined( 'ABSPATH' ) || exit;

return [
	// Button Text
	'text'     => [
		'type'  => 'text',
		'title' => [
			'label' => __( 'Show Text', 'buttons' ),
			'name'  => 'text_enable',
			'val'   => '1',
		],
		'atts'  => [
			'placeholder' => __( 'Button text', 'buttons' )
		],
		'val'   => __( 'Button', 'buttons' ),
	],

	// Button Tooltip
	'tooltip'  => [
		'type'  => 'text',
		'title' => [
			'label'  => __( 'Tooltip', 'buttons' ),
			'name'   => 'tooltip_enable',
			'toggle' => true,
		],
		'val'   => __( 'Tooltip', 'buttons' ),
		'addon' => [
			'name' => 'tooltip_position',
			'type' => 'select',
			'val'  => 'top',
			'atts' => [
				'top'    => __( 'Top', 'buttons' ),
				'bottom' => __( 'Bottom', 'buttons' ),
				'left'   => __( 'Left', 'buttons' ),
				'right'  => __( 'Right', 'buttons' ),
			]
		],
	],

	// Button icon
	'icon'     => [
		'type'  => 'text',
		'title' => [
			'label'  => __( 'Icon', 'buttons' ),
			'name'   => 'icon_enable',
			'toggle' => true,
		],
		'addon' => [
			'name' => 'icon_type',
			'type' => 'select',
			'val'  => 'class',
			'atts' => [
				'class' => __( 'Class', 'buttons' ),
			]
		],
		'atts'  => [
			'class' => 'wpie-icon-picker',
		],
	],

	// Button type
	'type'     => [
		'type'  => 'select',
		'title' => __( 'Type', 'buttons' ),
		'atts'  => Helper::item_type(),
	],

	// Button link
	'btn_link' => [
		'type'  => 'url',
		'title' => [
			'label' => __( 'Open in new Window', 'buttons' ),
			'name'  => 'link_new_window',
		],
		'class' => 'is-hidden',
		'atts'  => [
			'placeholder' => __( 'Set Link URL', 'buttons' )
		],
	],

	'link_rel'   => [
		'type'  => 'text',
		'title' => __( 'Attribute rel', 'buttons' ),
	],

	// Button link for Register, Login, LostPassword, SmoothScroll
	'extra_link' => [
		'type'  => 'text',
		'title' => __( 'Link', 'buttons' ),
		'class' => 'is-hidden',
		'atts'  => [
			'placeholder' => __( 'Set Redirect URL', 'buttons' )
		],
	],

	// Share services
	'share'      => [
		'type'  => 'select',
		'title' => __( 'Social Networks', 'buttons' ),
		'class' => 'is-hidden',
		'atts'  => Helper::share_services(),
	],

	// Style Settings

	'gap' => [
		'type'  => 'number',
		'title' => __( 'Gap', 'buttons' ),
		'val'   => 8,
		'atts'  => [
			'step' => '1',
			'min'  => 0
		],
		'addon' => __( 'px', 'buttons' ),
	],

	'direction' => [
		'type'  => 'select',
		'title' => __( 'Direction', 'buttons' ),
		'val'   => 'row',
		'atts'  => [
			'row'            => __( 'Row', 'buttons' ),
			'row-reverse'    => __( 'Row Revers', 'buttons' ),
			'column'         => __( 'Column', 'buttons' ),
			'column-reverse' => __( 'Column Revers', 'buttons' ),
		],
	],

	'justify' => [
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

	// Size
	'width'   => [
		'type'  => 'number',
		'title' => __( 'Width', 'buttons' ),
		'val'   => 100,
		'atts'  => [
			'step' => '1',
			'min'  => 0
		],
		'addon' => [
			'name' => 'width_option',
			'type' => 'select',
			'val'  => 'auto',
			'atts' => [
				'auto' => __( 'auto', 'buttons' ),
				'px'   => __( 'px', 'buttons' ),
			]
		],
	],

	'height' => [
		'type'  => 'number',
		'title' => __( 'Height', 'buttons' ),
		'val'   => 40,
		'atts'  => [
			'step' => '1',
			'min'  => 0
		],
		'addon' => __( 'px', 'buttons' ),
	],

	'font_size' => [
		'type'  => 'number',
		'title' => __( 'Font Size', 'buttons' ),
		'val'   => 16,
		'atts'  => [
			'step' => '1',
			'min'  => 0
		],
		'addon' => __( 'px', 'buttons' ),
	],


	'color' => [
		'type' => 'text',
		'val'  => '#ffffff',
		'atts' => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],

		'title' => __( 'Text', 'buttons' ),
	],

	'color_hover' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
		'title' => __( 'Hover Text', 'buttons' ),
	],

	'background' => [
		'type'  => 'text',
		'val'   => '#6c757d',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
		'title' => __( 'Background', 'buttons' ),
	],

	'background_hover' => [
		'type'  => 'text',
		'val'   => '#5a6268',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
		'title' => __( 'Background Hover', 'buttons' ),
	],

	'border_radius' => [
		'type'  => 'number',
		'title' => __( 'Radius', 'buttons' ),
		'val'   => 4,
		'addon' => 'px',
		'atts'  => [
			'min'  => 0,
			'max'  => 9999,
			'step' => 1
		],
	],

	'border_width' => [
		'type'  => 'number',
		'title' => __( 'Width', 'buttons' ),
		'val'   => 1,
		'addon' => 'px',
		'atts'  => [
			'min'  => 0,
			'max'  => 9999,
			'step' => 1
		],
	],

	'border_style' => [
		'type'  => 'select',
		'title' => __( 'Style', 'buttons' ),
		'val'   => 'solid',
		'atts'  => [
			'none'   => __( 'None', 'buttons' ),
			'solid'  => __( 'Solid', 'buttons' ),
			'dotted' => __( 'Dotted', 'buttons' ),
			'dashed' => __( 'Dashed', 'buttons' ),
			'double' => __( 'Double', 'buttons' ),
		],
	],

	'border_color' => [
		'type'  => 'text',
		'val'   => '#6c757d',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
		'title' => __( 'Color', 'buttons' ),
	],

	'border_color_hover' => [
		'type'  => 'text',
		'val'   => '#5a6268',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
		'title' => __( 'Color Hover', 'buttons' ),
	],

	// Style for icon
	'icon_size'          => [
		'type'  => 'number',
		'title' => __( 'Icon Size', 'buttons' ),
		'val'   => 16,
		'atts'  => [
			'step' => '1',
			'min'  => 0
		],
		'addon' => __( 'px', 'buttons' ),
	],

	'icon_rotate' => [
		'type'  => 'number',
		'title' => __( 'Icon Rotate', 'buttons' ),
		'val'   => 0,
		'atts'  => [
			'step' => '1',
			'min'  => 0,
			'max'  => 360,
		],
		'addon' => __( 'px', 'buttons' ),
	],

	'icon_color' => [
		'type'  => 'text',
		'val'   => '#ffffff',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
		'title' => __( 'Icon Color', 'buttons' ),
	],

	// Shadow style
	'shadow'     => [
		'type'  => 'select',
		'title' => __( 'Shadow', 'buttons' ),
		'val'   => 'none',
		'atts'  => [
			'none'   => __( 'None', 'buttons' ),
			'outset' => __( 'Outset', 'buttons' ),
			'inset'  => __( 'Inset', 'buttons' ),
		],
	],

	'shadow_horizontal' => [
		'type'  => 'number',
		'title' => __( 'Horizontal Position', 'buttons' ),
		'val'   => 0,
		'atts'  => [
			'step' => 1
		],
		'addon' => 'px',
	],

	'shadow_vertical' => [
		'type'  => 'number',
		'title' => __( 'Vertical Position', 'buttons' ),
		'val'   => 0,
		'atts'  => [
			'step' => 1
		],
		'addon' => 'px',
	],

	'shadow_blur' => [
		'type'  => 'number',
		'title' => __( 'Blur', 'buttons' ),
		'val'   => 0,
		'atts'  => [
			'step' => 1
		],
		'addon' => 'px',
	],

	'shadow_spread' => [
		'type'  => 'number',
		'title' => __( 'Spread', 'buttons' ),
		'val'   => 0,
		'atts'  => [
			'step' => 1
		],
		'addon' => 'px',
	],

	'shadow_color'        => [
		'type'  => 'text',
		'val'   => '#000000',
		'atts'  => [
			'class'              => 'wpie-color',
			'data-alpha-enabled' => 'true',
		],
		'title' => __( 'Color', 'buttons' ),
	],

	// Transition
	'transition_duration' => [
		'type'  => 'number',
		'title' => __( 'Transition Duration', 'buttons' ),
		'val'   => 0.2,
		'atts'  => [
			'step' => 0.1,
			'min'  => 0,
		],
		'addon' => 's',
	],

	'transition_function' => [
		'type'  => 'select',
		'title' => __( 'Transition Function', 'buttons' ),
		'val'   => 'ease-out',
		'atts'  => [
			'ease'        => 'ease',
			'ease-in'     => 'ease-in',
			'ease-out'    => 'ease-out',
			'ease-in-out' => 'ease-in-out',
			'linear'      => 'linear',
		],
	],

];