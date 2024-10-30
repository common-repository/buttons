<?php

namespace WPButtons;

defined( 'ABSPATH' ) || exit;

class Style_Maker {

	public static function init( $id, $params ): string {

		$css = self::group_style( $id, $params );
		$css .= self::items_style( $id, $params );

		return trim( preg_replace( '~\s+~s', ' ', $css ) );
	}

	private static function group_style( $id, $params ) {
		$btns_gap       = isset( $params['btns_gap'] ) ? absint( $params['btns_gap'] ) : '12';
		$btns_direction = isset( $params['btns_direction'] ) ? sanitize_text_field( $params['btns_direction'] ) : 'row';
		$btns_align     = isset( $params['btns_align'] ) ? sanitize_text_field( $params['btns_align'] ) : 'center';
		$btns_justify   = isset( $params['btns_justify'] ) ? sanitize_text_field( $params['btns_justify'] ) : 'left';
		$btns_offset_inline   = isset( $params['btns_offset_inline'] ) ? sanitize_text_field( $params['btns_offset_inline'] ) : '15';
		$btns_offset_block   = isset( $params['btns_offset_block'] ) ? sanitize_text_field( $params['btns_offset_block'] ) : '15';

		$css = "#wpbuttons-{$id} {
			--wpie-btns-gap: {$btns_gap}px;
			--wpie-btns-direction: {$btns_direction};
			--wpie-btns-align: {$btns_align};
			--wpie-btns-justify: {$btns_justify};
			--wpie-btns-offset-inline: {$btns_offset_inline}px;
			--wpie-btns-offset-block: {$btns_offset_block}px;
		}";

		return $css;
	}

	private static function items_style( $id, $params ): string {
		$css = '';

		if ( empty( $params['type'] ) || ! is_array( $params['type'] ) ) {
			return $css;
		}

		$count = count( $params['type'] );

		if ( $count < 1 ) {
			return $css;
		}

		$default = self::default();

		for ( $i = 0; $i < $count; $i ++ ) {
			$order = $i + 1;
			$css   .= '#wpbuttons-' . absint( $id ) . ' .wpie-btn__wrap:nth-of-type(' . absint( $order ) . '){';
			foreach ( $default as $key => $value ) {
				if ( ! isset( $params[ $key ][ $i ] ) ) {
					continue;
				}
				if ( $params[ $key ][ $i ] == $value[0] ) {
					continue;
				}
				if ( $key === 'width' || $key === 'shadow_horizontal' || $key === 'shadow_vertical' || $key === 'shadow_blur' || $key === 'shadow_spread' || $key === 'shadow_color' ) {
					continue;
				}
				if ( $key === 'width_option' && $params[ $key ][ $i ] === 'px' && isset( $params['width'][ $i ] ) ) {
					$css .= '--wpie-btn-width: ' . sanitize_text_field( $params['width'][ $i ] ) . 'px;';
					continue;
				}
				if ( $key === 'shadow' && $params[ $key ][ $i ] !== 'none' ) {
					$inset = ( $params[ $key ][ $i ] === 'inset' ) ? ' inset ' : '';
					$css   .= '--wpie-btn-shadow:' . esc_attr( $inset );
					$css   .= sanitize_text_field( $params['shadow_horizontal'][ $i ] ) . 'px ';
					$css   .= sanitize_text_field( $params['shadow_vertical'][ $i ] ) . 'px ';
					$css   .= sanitize_text_field( $params['shadow_blur'][ $i ] ) . 'px ';
					$css   .= sanitize_text_field( $params['shadow_spread'][ $i ] ) . 'px ';
					$css   .= sanitize_text_field( $params['shadow_color'][ $i ] ) . ';';
					continue;
				}

				if ( $key === 'transition_duration' ) {
					$css .= $value[1] . ': ' . sanitize_text_field( $params['transition_duration'][ $i ] ) . 's;';
					continue;
				}
				if ( $key === 'icon_rotate' ) {
					$css .= $value[1] . ': ' . sanitize_text_field( $params['icon_rotate'][ $i ] ) . 'deg;';
					continue;
				}
				if ( $key === 'dropdown_zindex' ) {
					$css .= $value[1] . ': ' . sanitize_text_field( $params['dropdown_zindex'][ $i ] ) . ';';
					continue;
				}

				if ( is_numeric( $value[0] ) ) {
					$css .= $value[1] . ': ' . sanitize_text_field( $params[ $key ][ $i ] ) . 'px;';
					continue;
				}

				$css .= $value[1] . ': ' . sanitize_text_field( $params[ $key ][ $i ] ) . ';';

			}
			$css .= '}';
		}

		return $css;
	}

	private static function default() {
		$arg = [
			'gap'                       => [ 8, '--wpie-btn-gap' ],
			'direction'                 => [ 'row', ' --wpie-btn-reverse' ],
			'justify'                   => [ 'left', '--wpie-btn-justify' ],
			'transition_duration'       => [ 0.2, '--wpie-btn-transition-duration' ],
			'transition_function'       => [ 'ease-out', '--wpie-btn-transition-function' ],
			'width'                     => [ 100, '--wpie-btn-width' ],
			'width_option'              => [ 'auto' ],
			'height'                    => [ 40, '--wpie-btn-height' ],
			'font_size'                 => [ 16, '--wpie-btn-font-size' ],
			'color'                     => [ '#ffffff', '--wpie-btn-color' ],
			'color_hover'               => [ '#ffffff', '--wpie-btn-color-hover' ],
			'background'                => [ '#6c757d', '--wpie-btn-bg' ],
			'background_hover'          => [ '#5a6268', '--wpie-btn-bg-hover' ],
			'border_radius'             => [ 4, '--wpie-btn-border-radius' ],
			'border_width'              => [ 1, '--wpie-btn-border-width' ],
			'border_style'              => [ 'solid', '--wpie-btn-border-style' ],
			'border_color'              => [ '#6c757d', '--wpie-btn-border-color' ],
			'border_color_hover'        => [ '#5a6268', '--wpie-btn-border-color-hover' ],
			'icon_size'                 => [ 16, '--wpie-btn-icon-size' ],
			'icon_rotate'               => [ 0, '--wpie-btn-icon-rotate' ],
			'icon_color'                => [ '#ffffff', '--wpie-btn-icon-color' ],
			'counter_size'              => [ 16, '--wpie-btn-counter-size' ],
			'counter_color'             => [ '#ffffff', '--wpie-btn-counter-color' ],
			'shadow'                    => [ 'none', '--wpie-btn-shadow' ],
			'shadow_horizontal'         => [ 0 ],
			'shadow_vertical'           => [ 0 ],
			'shadow_blur'               => [ 0 ],
			'shadow_spread'             => [ 0 ],
			'shadow_color'              => [ '#000000' ],
			'dropdown_zindex'           => [ 999, '--wpie-btn-dropdown-zindex' ],
			'dropdown_width'            => [ 160, '--wpie-btn-dropdown-min-width' ],
			'dropdown_size'             => [ 14, '--wpie-btn-dropdown-size' ],
			'triangle_size'             => [ 16, '--wpie-btn-triangle-size' ],
			'dropdown_color'            => [ '#212529', '--wpie-btn-dropdown-color' ],
			'dropdown_background'       => [ '#ffffff', '--wpie-btn-dropdown-bg' ],
			'dropdown_background_hover' => [ '#f8f9fa', '--wpie-btn-dropdown-bg-hover' ],
			'triangle_color'            => [ '#000000', '--wpie-btn-color-triangle' ],
			'dropdown_border_radius'    => [ 4, '--wpie-btn-dropdown-border-radiu' ],
			'dropdown_border_width'     => [ 1, '--wpie-btn-dropdown-border-width' ],
			'dropdown_border_style'     => [ 'solid', '--wpie-btn-dropdown-border-style' ],
			'dropdown_border_color'     => [ '#c4c4c4', '--wpie-btn-dropdown-border-color' ],
		];

		return $arg;

	}
}