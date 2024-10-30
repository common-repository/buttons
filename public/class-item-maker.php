<?php

namespace WPButtons;

defined( 'ABSPATH' ) || exit;

class Item_Maker {
	/**
	 * @var mixed
	 */
	private $id;
	/**
	 * @var mixed
	 */
	private $param;

	public function __construct( $id, $param ) {
		$this->id    = $id;
		$this->param = $param;
	}

	public function init(): string {

		$buttons = $this->create_buttons();
		$item    = $this->wrapper( $buttons );

		return $item;

	}

	private function wrapper( $buttons ): string {
		$options = $this->param;
		$classes = '';
		if ( isset( $options['btns_type'] ) && $options['btns_type'] === 'floating' ) {
			$classes .= ' is-floating ';
			$classes .= $options['btns_float'] ?? '-right-center-block';
		}
		$wrapper = '<div class="wpie-buttons__group' . esc_attr( $classes ) . '" id="wpbuttons-' . absint( $this->id ) . '">';
		$wrapper .= $buttons;
		$wrapper .= '</div>';

		return $wrapper;
	}

	private function create_buttons(): string {
		$options = $this->param;

		if ( empty( $options['type'] ) || ! is_array( $options['type'] ) ) {
			return '';
		}
		$buttons       = '';
		$buttons_count = count( $options['type'] );
		if ( $buttons_count > 0 ) {
			for ( $order = 0; $order < $buttons_count; $order ++ ) {
				$buttons .= $this->button( $order );
			}
		}

		return $buttons;
	}

	private function button( $order ): string {
		$options        = $this->param;
		$dropdown_class = ( $options['type'][ $order ] === 'menu' && $options['menu_open'][ $order ] === 'hover' ) ? ' is-dropdown-hover' : '';
		$button         = '<div class="wpie-btn__wrap' . esc_attr( $dropdown_class ) . '">';
		$button         .= $this->create_button( $order );
		$button         .= '</div>';

		return $button;
	}

	private function create_button( $order ): string {

		$button = '';

		switch ( $this->param['type'][ $order ] ) {
			case 'link':
				$button .= $this->create_link( $order );
				break;
			case 'button':
				$button .= $this->create_button_type( $order );
				break;
			case 'share':
				$button .= $this->create_share( $order );
				break;
			case 'translate':
				$button .= $this->create_translate( $order );
				break;
			case 'counter':
				$button .= $this->create_counter( $order );
				break;
			case 'next_post':
			case 'previous_post':
				$button .= $this->create_navigation_links( $order );
				break;
			case 'print':
			case 'toTop':
			case 'toBottom':
			case 'back':
			case 'forward':
			case 'scroll':
				$button .= $this->create_action_button( $order );
				break;
			case 'login':
			case 'logout':
			case 'lostpassword':
			case 'register':
				$button .= $this->create_meta_links( $order );
				break;
			case 'menu':
				$button .= $this->create_menu( $order );
				break;
		}

		return $button;
	}

	private function create_menu( $order ): string {
		$options  = $this->param;
		$label    = $options['text'][ $order ] ?? '';
		$position = $options['menu_position'][ $order ] ?? '';
		$item     = '<button class="wpie-btn" aria-label="' . esc_attr( $label ) . '" data-wpbutton-toggle="dropdown" aria-expanded="false">';
		$item     .= $this->get_icon( $order );
		$item     .= $this->get_text( $order );
		$item     .= $this->get_triangle( $order );
		$item     .= '</button>';
		$item     .= '<ul class="wpie-btn__dropdown -' . esc_attr( $position ) . '">';
		$item     .= $this->create_items( $order );
		$item     .= '</ul>';
		$item     .= $this->get_tooltip( $order );

		return $item;
	}

	private function create_items( $order ): string {
		$options = $this->param;
		if ( empty( $options['menu_type'][ $order ] ) || ! is_array( $options['menu_type'][ $order ] ) ) {
			return '';
		}
		$items       = '';
		$items_count = count( $options['menu_type'][ $order ] );
		if ( $items_count > 0 ) {
			for ( $order_i = 0; $order_i < $items_count; $order_i ++ ) {
				$items .= $this->create_item( $order, $order_i );
			}
		}

		return $items;
	}

	private function create_item( $order, $order_i ) {
		$options = $this->get_item_option( $order, $order_i );
		$label   = $options['label'];
		$icon    = '';
		if ( ! empty( $options['icon_enable'] ) ) {
			if ( $options['icon_type'] === 'class' ) {
				$icon = '<span class="wpie-item__icon"><span class="' . esc_attr( $options['icon'] ) . '"></span></span>';
			}
			if ( $options['icon_type'] === 'img' ) {
				$icon = '<span class="wpie-item__icon"><img src="' . esc_url( $options['icon'] ) . '" alt="' . esc_attr( $label ) . '"></span>';
			}
			if ( $options['icon_type'] === 'emoji' ) {
				$icon = '<span class="wpie-item__icon">' . wp_encode_emoji( $options['icon'] ) . '</span>';
			}
		}

		$nav_post = '';
		if ( $options['type'] === 'next_post' ) {
			$nav_post = get_next_post( true );
		} elseif ( $options['type'] === 'previous_post' ) {
			$nav_post = get_previous_post( true );
		}

		if ( empty( $nav_post ) && ( $options['type'] === 'next_post' || $options['type'] === 'previous_post' ) ) {
			return '';
		}

		$extra_link = $options['extra_link'];
		$item       = '<li><a class="wpie-btn__dropdown-item" ';
		switch ( $options['type'] ) {
			case 'link':
				$target = ! empty( $options['target'] ) ? '_blank' : '_self';
				$item   .= 'href="' . esc_url( $options['link'] ) . '" target="' . esc_attr( $target ) . '"';
				if ( ! empty( $options['rel'] ) ) {
					$item .= ' rel="' . esc_attr( $options['rel'] ) . '"';
				}
				$item .= '>';
				break;
			case 'share':
				$share = $options['share'];
				$item  .= 'href="#" data-wpbutton-share="' . esc_attr( $share ) . '">';
				break;
			case 'translate':
				$lang = $options['translate'];
				$item .= 'href="#" data-wpbutton-lang="' . esc_attr( $lang ) . '">';
				break;
			case 'next_post':
			case 'previous_post':
				$link = get_permalink( $nav_post );
				$item .= 'href="' . esc_url( $link ) . '">';
				break;
			case 'print':
			case 'toTop':
			case 'toBottom':
			case 'back':
			case 'forward':
				$type = $options['type'];
				$item .= 'href="#" data-wpbutton-action="' . esc_attr( $type ) . '">';
				break;
			case 'scroll':
				$item .= 'href="#" data-wpbutton-action="scroll" data-wpbutton-anchor="' . esc_attr( $extra_link ) . '">';
				break;
			case 'login':
				$link = wp_login_url( $extra_link );
				$item .= 'href="' . esc_url( $link ) . '">';
				break;
			case 'logout':
				$link = wp_logout_url( $extra_link );
				$item .= 'href="' . esc_url( $link ) . '">';
				break;
			case 'lostpassword':
				$link = wp_lostpassword_url( $extra_link );
				$item .= 'href="' . esc_url( $link ) . '">';
				break;
			case 'register':
				$link = wp_registration_url();
				$item .= 'href="' . esc_url( $link ) . '">';
				break;
		}
		$item .= wp_kses_post( $icon ) . esc_attr( $label ) . '</a></li>';

		return $item;
	}


	private function get_item_option( $order, $order_i ): array {
		$options = $this->param;

		return [
			'label'       => $options['menu_label'][ $order ][ $order_i ] ?? '',
			'type'        => $options['menu_type'][ $order ][ $order_i ] ?? '',
			'icon_enable' => $options['menu_icon_enable'][ $order ][ $order_i ] ?? '',
			'icon'        => $options['menu_icon'][ $order ][ $order_i ] ?? '',
			'icon_type'   => $options['menu_icon_type'][ $order ][ $order_i ] ?? '',
			'link'        => $options['menu_link'][ $order ][ $order_i ] ?? '',
			'rel'         => $options['menu_link_rel'][ $order ][ $order_i ] ?? '',
			'target'      => $options['menu_link_new_window'][ $order ][ $order_i ] ?? '',
			'share'       => $options['menu_share'][ $order ][ $order_i ] ?? '',
			'translate'   => $options['menu_translate'][ $order ][ $order_i ] ?? '',
			'extra_link'  => $options['menu_extra_link'][ $order ][ $order_i ] ?? '',
		];

	}

	private function create_meta_links( $order ): string {
		$options  = $this->param;
		$type     = $options['type'][ $order ];
		$redirect = $options['extra_link'][ $order ] ?? '';

		$link = '#';
		switch ( $type ) {
			case 'login':
				$link = wp_login_url( $redirect );
				break;
			case 'logout':
				$link = wp_logout_url( $redirect );
				break;
			case 'lostpassword':
				$link = wp_lostpassword_url( $redirect );
				break;
			case 'register':
				$link = wp_registration_url();
				break;
		}

		$label = $options['text'][ $order ] ?? '';
		$item  = '<a href="' . esc_url( $link ) . '" class="wpie-btn" aria-label="' . esc_attr( $label ) . '">';
		$item  .= $this->get_icon( $order );
		$item  .= $this->get_text( $order );
		$item  .= '</a>';
		$item  .= $this->get_tooltip( $order );

		return $item;
	}

	private function create_action_button( $order ): string {
		$options = $this->param;
		$type    = $options['type'][ $order ];
		$item    = '';
		$label   = $options['text'][ $order ] ?? '';
		if ( $type === 'scroll' ) {
			$url  = $options['extra_link'][ $order ] ?? '#';
			$item .= '<button class="wpie-btn" aria-label="' . esc_attr( $label ) . '" data-wpbutton-action="' . esc_attr( $type ) . '" data-wpbutton-anchor="' . esc_attr( $url ) . '">';
		} else {
			$item .= '<button class="wpie-btn" aria-label="' . esc_attr( $label ) . '" data-wpbutton-action="' . esc_attr( $type ) . '">';
		}
		$item .= $this->get_icon( $order );
		$item .= $this->get_text( $order );
		$item .= '</button>';
		$item .= $this->get_tooltip( $order );

		return $item;

	}

	private function create_navigation_links( $order ): string {
		$options  = $this->param;
		$nav_post = '';
		if ( $options['type'][ $order ] === 'next_post' ) {
			$nav_post = get_next_post( true );
		} elseif ( $options['type'][ $order ] === 'previous_post' ) {
			$nav_post = get_previous_post( true );
		}

		if ( empty( $nav_post ) ) {
			return '';
		}

		$url   = get_permalink( $nav_post );
		$label = $options['text'][ $order ] ?? '';
		$item  = '<a href="' . esc_url( $url ) . '" class="wpie-btn" aria-label="' . esc_attr( $label ) . '">';
		$item  .= $this->get_icon( $order );
		$item  .= $this->get_text( $order );
		$item  .= '</a>';
		$item  .= $this->get_tooltip( $order );

		return $item;
	}

	private function create_counter( $order ): string {
		$options = $this->param;
		$label   = $options['text'][ $order ] ?? '';
		$counter = $options['counter'][ $order ] ?? '';
		$item    = '<button class="wpie-btn" aria-label="' . esc_attr( $label ) . '" data-wpbutton-counter="' . absint( $order ) . '">';
		$item    .= $this->get_icon( $order );
		$item    .= $this->get_text( $order );
		$item    .= '<span class="wpie-btn__counter">' . esc_html( $counter ) . '</span>';
		$item    .= '</button>';
		$item    .= $this->get_tooltip( $order );

		return $item;
	}

	private function create_translate( $order ) {
		$options = $this->param;
		$label   = $options['text'][ $order ] ?? '';
		$lang    = $options['translate'][ $order ] ?? '';
		$item    = '<button class="wpie-btn" aria-label="' . esc_attr( $label ) . '" data-wpbutton-lang="' . esc_attr( $lang ) . '">';
		$item    .= $this->get_icon( $order );
		$item    .= $this->get_text( $order );
		$item    .= '</button>';
		$item    .= $this->get_tooltip( $order );

		return $item;

	}

	private function create_share( $order ): string {
		$options = $this->param;
		$label   = $options['text'][ $order ] ?? '';
		$share   = $options['share'][ $order ] ?? '';
		$item    = '<button class="wpie-btn" aria-label="' . esc_attr( $label ) . '" data-wpbutton-share="' . esc_attr( $share ) . '">';
		$item    .= $this->get_icon( $order );
		$item    .= $this->get_text( $order );
		$item    .= '</button>';
		$item    .= $this->get_tooltip( $order );

		return $item;
	}

	private function create_button_type( $order ): string {
		$options = $this->param;
		$label   = $options['text'][ $order ] ?? '';
		$item    = '<button class="wpie-btn" aria-label="' . esc_attr( $label ) . '">';
		$item    .= $this->get_icon( $order );
		$item    .= $this->get_text( $order );
		$item    .= '</button>';
		$item    .= $this->get_tooltip( $order );

		return $item;
	}

	private function create_link( $order ): string {
		$options = $this->param;
		$url     = $options['btn_link'][ $order ] ?? '#';
		$target  = empty( $options['link_new_window'][ $order ] ) ? '_self' : '_blank';
		$label   = $options['text'][ $order ] ?? '';
		$item    = '<a href="' . esc_url( $url ) . '" class="wpie-btn" target="' . esc_attr( $target ) . '" aria-label="' . esc_attr( $label ) . '"';
		if ( ! empty( $options['link_rel'][ $order ] ) ) {
			$item .= ' rel="' . esc_attr( $options['link_rel'][ $order ] ) . '"';
		}
		$item .= '>';
		$item .= $this->get_icon( $order );
		$item .= $this->get_text( $order );
		$item .= '</a>';
		$item .= $this->get_tooltip( $order );

		return $item;
	}

	private function get_icon( $order ): string {
		$options = $this->param;
		if ( empty( $options['icon_enable'][ $order ] ) ) {
			return '';
		}
		$alt       = $options['text'][ $order ] ?? '';
		$icon_val  = $options['icon'][ $order ] ?? '';
		$icon_type = $options['icon_type'][ $order ] ?? '';
		if ( $icon_type === 'class' ) {
			return '<span class="wpie-btn__icon"><span class="' . esc_attr( $icon_val ) . '"></span></span>';
		}
		if ( $icon_type === 'img' ) {
			return '<span class="wpie-btn__icon"><img src="' . esc_url( $icon_val ) . '" alt="' . esc_attr( $alt ) . '"></span>';
		}
		if ( $icon_type === 'emoji' ) {
			return '<span class="wpie-btn__icon">' . wp_encode_emoji( $icon_val ) . '</span>';
		}

		return '';

	}

	private function get_text( $order ): string {
		$options = $this->param;
		if ( empty( $options['text_enable'][ $order ] ) ) {
			return '';
		}
		$text = $options['text'][ $order ] ?? '';

		return '<span class="wpie-btn__text">' . esc_html( $text ) . '</span>';

	}

	private function get_tooltip( $order ): string {
		$options = $this->param;
		if ( empty( $options['tooltip_enable'][ $order ] ) ) {
			return '';
		}
		$tooltip  = $options['tooltip'][ $order ] ?? '';
		$position = $options['tooltip_position'][ $order ] ?? 'top';

		return '<span class="wpie-btn__tooltip -' . esc_attr( $position ) . '">' . esc_html( $tooltip ) . '</span>';
	}

	private function get_triangle( $order ): string {
		$options = $this->param;
		if ( ! empty( $options['triangle_hide'][ $order ] ) ) {
			return '';
		}
		$position = $options['menu_position'][ $order ] ?? 'top';
		if ( $position === 'bottom-left' ) {
			$position = 'bottom';
		}
		if ( $position === 'top-left' ) {
			$position = 'top';
		}

		return '<span class="wpie-btn__triangle -' . esc_attr( $position ) . '"></span>';
	}

}