<?php

namespace WPButtons;

use WPButtons\Admin\DBManager;
use WPButtons\Publish\Conditions;
use WPButtons\Publish\Display;

defined( 'ABSPATH' ) || exit;

class WP_Public {
	/**
	 * @var array|false|object|\stdClass[]
	 */
	private $results;

	public function __construct() {
		$this->results = DBManager::get_all_data();
		$this->includes();
		add_shortcode( WOWP_Plugin::SHORTCODE, [ $this, 'shortcode' ] );
		add_action( 'wp_head', [ $this, 'add_inline_css' ] );

		if ( $this->results !== false ) {
			add_action( 'wp_footer', [ $this, 'footer' ] );
			add_filter( 'the_content', [ $this, 'filter_content' ] );
		}

	}

	public function add_inline_css(): void {
		echo '<style type="text/css">.wpie-buttons__group{visibility: hidden;}</style>';
	}

	public function includes(): void {
		require_once plugin_dir_path( __FILE__ ) . 'class-item-maker.php';
		require_once plugin_dir_path( __FILE__ ) . 'class-style-maker.php';
	}

	public function shortcode( $atts ) {
		$atts = shortcode_atts(
			[ 'id' => "" ],
			$atts,
			WOWP_Plugin::SHORTCODE
		);

		if ( empty( $atts['id'] ) ) {
			return '';
		}
		$result = DBManager::get_data_by_id( $atts['id'] );

		if ( empty( $result->param ) ) {
			return '';
		}

		$conditions = Conditions::init( $result );
		if ( $conditions === false ) {
			return '';
		}

		$param   = maybe_unserialize( $result->param );
		$walker  = new Item_Maker( $atts['id'], $param );
		$buttons = $walker->init();

		$this->load_assets( $atts['id'], $param );

		return $buttons;

	}

	public function load_assets( $id, $param ): void {

		$handle          = WOWP_Plugin::SLUG;
		$assets          = plugin_dir_url( __FILE__ ) . 'assets/';
		$version         = WOWP_Plugin::info( 'version' );
		$url_fontawesome = WOWP_Plugin::url() . '/vendors/fontawesome/css/all.min.css';

		if ( empty( $param['fontawesome'] ) ) {
			wp_enqueue_style( $handle . '-fontawesome', $url_fontawesome, null, '6.5.1' );
		}

		wp_enqueue_style( $handle, $assets . 'css/wpbuttons.css', [], $version, $media = 'all' );
		$style = Style_Maker::init( $id, $param );
		wp_add_inline_style( $handle, $style );

		wp_enqueue_script( $handle, $assets . 'js/wpbuttons.js', [], $version, true );

	}

	public function footer(): void {

		foreach ( $this->results as $result ) {
			$param = maybe_unserialize( $result->param );
			$id    = $result->id;
			if ( $param['btns_type'] === 'floating' && Display::init( $id, $param ) === true ) {
				echo do_shortcode( '[' . esc_attr( WOWP_Plugin::SHORTCODE ) . ' id="' . absint( $id ) . '"]' );
			}
		}
	}

	public function filter_content( $content ) {

		foreach ( $this->results as $result ) {
			$param = maybe_unserialize( $result->param );
			$id    = $result->id;
			if ( ! isset( $param['btns_type'] ) ) {
				continue;
			}
			if ( $param['btns_type'] === 'standard' && Display::init( $id, $param ) === true ) {
				$btns = do_shortcode( '[' . esc_attr( WOWP_Plugin::SHORTCODE ) . ' id="' . absint( $id ) . '"]' );
				if ( $param['btns_standard'] === 'after' ) {
					$content .= $btns;
				}
				if ( $param['btns_standard'] === 'before' ) {
					$content = $btns . $content;
				}
			}
		}

		return $content;
	}


}