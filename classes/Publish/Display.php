<?php

namespace WPButtons\Publish;

use WPButtons\Admin\DBManager;

defined( 'ABSPATH' ) || exit;

class Display {

	public static function init( $id, $param ): bool {
		if ( empty( $param ) || ! is_array( $param ) || empty( absint( $id ) ) ) {
			return false;
		}

		$count = ! empty( $param['show'] ) && is_array( $param['show'] ) ? count( $param['show'] ) : 0;
		$check = false;

		if ( $count > 0 ) {
			for ( $i = 0; $i < $count; $i ++ ) {
				$show = $param['show'][ $i ];

				switch ( $show ) {
					case 'everywhere':
						$check = true;
						break;
				}
			}
		}


		return $check;
	}

}