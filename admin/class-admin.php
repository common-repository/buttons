<?php

namespace WPButtons;

use WPButtons\Admin\AdminActions;
use WPButtons\Admin\Dashboard;

defined( 'ABSPATH' ) || exit;

class WP_Admin {
	public function __construct() {
		Dashboard::init();
		AdminActions::init();
		$this->includes();

		add_action( WOWP_Plugin::PREFIX . '_admin_header_links', [ $this, 'plugin_links' ] );
		add_filter( WOWP_Plugin::PREFIX . '_save_settings', [ $this, 'save_settings' ] );
		add_action( WOWP_Plugin::PREFIX . '_admin_load_assets', [ $this, 'load_assets' ] );
	}

	public function includes(): void {
		require_once plugin_dir_path( __FILE__ ) . 'class-settings-helper.php';
	}

	public function plugin_links(): void {
		?>
        <div class="wpie-links">
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'pro' ) ); ?>" target="_blank">PRO Plugin</a>
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'support' ) ); ?>" target="_blank">Support</a>
            <a href="<?php echo esc_url( WOWP_Plugin::info( 'rating' ) ); ?>" target="_blank" class="wpie-color-orange">Rating</a>
        </div>
		<?php
	}

	public function save_settings() {

		$verify = AdminActions::verify( WOWP_Plugin::PREFIX . '_settings' );

		if ( ! $verify ) {
			return false;
		}

		$param = ! empty( $_POST['param'] ) ? map_deep( wp_unslash( $_POST['param'] ), 'sanitize_text_field' ) : [];

		if ( isset( $_POST['param']['text'] ) ) {
			$param['text'] = map_deep( wp_unslash( $_POST['param']['text'] ), [ $this, 'sanitize_text' ] );
		}

		if ( isset( $_POST['param']['tooltip'] ) ) {
			$param['tooltip'] = map_deep( wp_unslash( $_POST['param']['tooltip'] ), [ $this, 'sanitize_text' ] );
		}


		return $param;

	}

	public function sanitize_text( $value ): string {
		return sanitize_text_field( wp_unslash( $value ) );
	}

	public function load_assets(): void {

		wp_enqueue_style( 'wp-color-picker' );
		wp_enqueue_script( 'wp-color-picker' );
		wp_enqueue_script( 'jquery-ui-sortable' );

		$url_fontawesome = WOWP_Plugin::url() . '/vendors/fontawesome/css/all.min.css';
		wp_enqueue_style( 'wpie-fontawesome', $url_fontawesome, null, '6.5.1' );

	}

}